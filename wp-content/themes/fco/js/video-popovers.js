(function() {
    const players = {};
    let apiReadyPromise = null;

    function loadYTApi() {
        if (!apiReadyPromise) {
            apiReadyPromise = new Promise((resolve, reject) => {
                if (typeof YT !== 'undefined' && typeof YT.Player !== 'undefined') {
                    return resolve(YT);
                }
                if (document.querySelector('script[src="https://www.youtube.com/iframe_api"]')) {
                    const checkReady = setInterval(() => {
                        if (typeof YT !== 'undefined' && typeof YT.Player !== 'undefined') {
                            clearInterval(checkReady);
                            resolve(YT);
                        }
                    }, 100);
                    return;
                }
                const tag = document.createElement('script');
                tag.src = 'https://www.youtube.com/iframe_api';
                tag.onerror = () => reject(new Error("Failed to load YouTube API"));
                document.head.appendChild(tag);
                window.onYouTubeIframeAPIReady = () => resolve(YT);
            });
        }
        return apiReadyPromise;
    }

    function createOrGetPlayer(iframeId, videoId) {
        return loadYTApi().then(YT => {
            return new Promise((resolve, reject) => {
                const iframeEl = document.getElementById(iframeId);
                if (!iframeEl) return reject(new Error(`Iframe ${iframeId} not found.`));

                if (players[iframeId] && typeof players[iframeId].playVideo === 'function') {
                    return resolve(players[iframeId]);
                }

                try {
                    players[iframeId] = new YT.Player(iframeId, {
                        playerVars: { autoplay: 0, rel: 0 },
                        events: {
                            onReady: (event) => {
                                resolve(event.target);
                            },
                            onError: (event) => {
                                console.error(`Error ${iframeId}:`, event.data);
                                delete players[iframeId];
                                reject(new Error(`YT.Player error: ${event.data}`));
                            },
                        }
                    });
                } catch (error) {
                    console.error(`Player creation failed ${iframeId}:`, error);
                    delete players[iframeId];
                    reject(error);
                }
            });
        }).catch(error => {
            console.error(`API or Player init failed for ${iframeId}:`, error);
            throw error;
        });
    }

    function checkPlaybackStatus(player, iframeId) {
        const alertDiv = document.getElementById('playback-alert');
        if (!alertDiv) return;

        player.seekTo(0, true);
        player.playVideo();

        let attempts = 0;
        const maxAttempts = 3;
        const checkInterval = setInterval(() => {
            const state = player.getPlayerState();

            if (state === YT.PlayerState.PLAYING || state === YT.PlayerState.BUFFERING) {
                clearInterval(checkInterval);
                alertDiv.classList.add('video-played');
                // Hide after transition ends
                alertDiv.addEventListener('transitionend', () => {
                    alertDiv.style.display = 'none';
                }, { once: true });
            }
            attempts++;
            if (attempts >= maxAttempts) {
                clearInterval(checkInterval);
            }
        }, 1000);
    }

    function initializeVideoPopovers() {
        const triggers = document.querySelectorAll('.yt-trigger-layer');
        if (!triggers.length) {
            return;
        }

        const alertDiv = document.getElementById('playback-alert');
        if (alertDiv) {
            const okButton = alertDiv.querySelector('button');
            if (okButton && !okButton.dataset.listenerAdded) {
                okButton.addEventListener('click', () => {
                    alertDiv.classList.add('video-played');
                    alertDiv.addEventListener('transitionend', () => {
                        alertDiv.style.display = 'none';
                    }, { once: true });
                });
                okButton.dataset.listenerAdded = 'true';
            }
        }

        triggers.forEach(trigger => {
            trigger.addEventListener('click', event => {
                event.preventDefault();
                const videoBlock = trigger.closest('.yt-video');
                if (!videoBlock) return console.error('No video block:', trigger);

                const videoId = trigger.dataset.videoId;
                if (!videoId) return console.error('No video ID:', trigger);

                const popover = videoBlock.querySelector(`.yt-video-popover[data-video-id="${videoId}"]`);
                if (!popover) return console.error(`No popover for ${videoId}`);

                const iframe = popover.querySelector('iframe');
                if (!iframe || !iframe.id) return console.error('Invalid iframe:', iframe);

                const iframeId = iframe.id;

                document.querySelectorAll('.yt-video.active').forEach(block => {
                    if (block !== videoBlock) {
                        block.classList.remove('active');
                        const otherIframeId = block.querySelector('iframe')?.id;
                        if (otherIframeId && players[otherIframeId] && typeof players[otherIframeId].pauseVideo === 'function') {
                            players[otherIframeId].pauseVideo();
                        }
                    }
                });

                videoBlock.classList.add('active');

                createOrGetPlayer(iframeId, videoId)
                    .then(player => {
                        checkPlaybackStatus(player, iframeId);
                    })
                    .catch(error => {
                        console.error(`Failed ${iframeId}:`, error);
                        videoBlock.classList.remove('active');
                    });
            });
        });

        document.querySelectorAll('.close-icon').forEach(closeBtn => {
            closeBtn.addEventListener('click', event => {
                event.stopPropagation();
                const videoBlock = closeBtn.closest('.yt-video');
                if (!videoBlock) return;
                const iframeId = videoBlock.querySelector('iframe')?.id;
                if (iframeId && players[iframeId] && typeof players[iframeId].pauseVideo === 'function') {
                    players[iframeId].pauseVideo();
                }
                videoBlock.classList.remove('active');
            });
        });
    }

    loadYTApi()
        .then(() => {
            initializeVideoPopovers();
        })
        .catch(error => console.error('API load error:', error));
})();