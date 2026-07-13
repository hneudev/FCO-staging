/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

// Main navigation toggle functionality (IIFE to avoid conflicts)
(function () {
	const siteNavigation = document.getElementById("site-navigation");

	// Return early if the navigation don't exist.
	if (!siteNavigation) {
		return;
	}

	const button = siteNavigation.getElementsByTagName("button")[0];

	// Return early if the button don't exist.
	if ("undefined" === typeof button) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName("ul")[0];

	// Hide menu toggle button if menu is empty and return early.
	if ("undefined" === typeof menu) {
		button.style.display = "none";
		return;
	}

	if (!menu.classList.contains("nav-menu")) {
		menu.classList.add("nav-menu");
	}

	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	button.addEventListener("click", function () {
		siteNavigation.classList.toggle("toggled");

		if (button.getAttribute("aria-expanded") === "true") {
			button.setAttribute("aria-expanded", "false");
		} else {
			button.setAttribute("aria-expanded", "true");
		}
	});

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener("click", function (event) {
		const isClickInside = siteNavigation.contains(event.target);

		if (!isClickInside) {
			siteNavigation.classList.remove("toggled");
			button.setAttribute("aria-expanded", "false");
		}
	});

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName("a");

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll(".menu-item-has-children > a, .page_item_has_children > a");

	// Toggle focus each time a menu link is focused or blurred.
	for (const link of links) {
		link.addEventListener("focus", toggleFocus, true);
		link.addEventListener("blur", toggleFocus, true);
	}

	// Toggle focus each time a menu link with children receive a touch event.
	for (const link of linksWithChildren) {
		link.addEventListener("touchstart", toggleFocus, false);
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		if (event.type === "focus" || event.type === "blur") {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while (!self.classList.contains("nav-menu")) {
				// On li elements toggle the class .focus.
				if ("li" === self.tagName.toLowerCase()) {
					self.classList.toggle("focus");
				}
				self = self.parentNode;
			}
		}

		if (event.type === "touchstart") {
			const menuItem = this.parentNode;
			event.preventDefault();
			for (const link of menuItem.parentNode.children) {
				if (menuItem !== link) {
					link.classList.remove("focus");
				}
			}
			menuItem.classList.toggle("focus");
		}
	}
})();

// All other functionality in one DOMContentLoaded event
document.addEventListener("DOMContentLoaded", function () {
	// Initialize all functionality
	initTeamMemberScrolling();
	initFAQTabs();
	initFAQAccordions();
	initFeaturedFAQAccordions();
	initFAQTabShowMore();
	initStickyNavigation();

	/**
	 * Team Member Smooth Scrolling
	 */
	function initTeamMemberScrolling() {
		const teamLinks = document.querySelectorAll('a[href*="#team-"]');

		teamLinks.forEach(function (link) {
			link.addEventListener("click", function (e) {
				const href = this.getAttribute("href");
				const hashIndex = href.indexOf("#");

				if (hashIndex !== -1) {
					const hash = href.substring(hashIndex);
					const targetElement = document.querySelector(hash);

					if (targetElement) {
						e.preventDefault();

						// Close mobile menu if open
						const siteNavigation = document.getElementById("site-navigation");
						const button = siteNavigation && siteNavigation.querySelector(".menu-toggle");
						if (button && siteNavigation.classList.contains("toggled")) {
							siteNavigation.classList.remove("toggled");
							button.setAttribute("aria-expanded", "false");
						}

						// Smooth scroll to target
						targetElement.scrollIntoView({
							behavior: "smooth",
							block: "start",
						});
					}
				}
			});
		});

		// Handle direct hash navigation
		if (window.location.hash && window.location.hash.startsWith("#team-")) {
			setTimeout(function () {
				const targetElement = document.querySelector(window.location.hash);
				if (targetElement) {
					targetElement.scrollIntoView({
						behavior: "smooth",
						block: "start",
					});
				}
			}, 500);
		}
	}

	/**
	 * FAQ Tab Functionality
	 */
	function initFAQTabs() {
		const tabButtons = document.querySelectorAll(".faq-tab-button");
		const tabPanels = document.querySelectorAll(".faq-tab-panel");

		if (tabButtons.length === 0) return;

		function activateTab(targetButton, targetPanel) {
			// Remove active class from all tabs and panels
			tabButtons.forEach((btn) => {
				btn.classList.remove("active");
				btn.setAttribute("aria-selected", "false");
			});
			tabPanels.forEach((panel) => {
				panel.classList.remove("active");
			});

			// Add active class to target tab and panel
			targetButton.classList.add("active");
			targetButton.setAttribute("aria-selected", "true");
			targetPanel.classList.add("active");

			// Close all accordions in the newly active tab
			const accordions = targetPanel.querySelectorAll(".faq-accordion-trigger");
			accordions.forEach((trigger) => {
				trigger.setAttribute("aria-expanded", "false");
				const content = document.getElementById(trigger.getAttribute("aria-controls"));
				if (content) {
					content.classList.remove("open");
				}
			});
		}

		// Add click listeners to tab buttons
		tabButtons.forEach((button) => {
			button.addEventListener("click", function () {
				const targetId = this.getAttribute("aria-controls");
				const targetPanel = document.getElementById(targetId);

				if (targetPanel) {
					activateTab(this, targetPanel);
				}
			});

			// Add keyboard navigation for tabs
			button.addEventListener("keydown", function (e) {
				const currentIndex = Array.from(tabButtons).indexOf(this);
				let targetIndex;

				switch (e.key) {
					case "ArrowLeft":
						e.preventDefault();
						targetIndex = currentIndex > 0 ? currentIndex - 1 : tabButtons.length - 1;
						tabButtons[targetIndex].focus();
						break;
					case "ArrowRight":
						e.preventDefault();
						targetIndex = currentIndex < tabButtons.length - 1 ? currentIndex + 1 : 0;
						tabButtons[targetIndex].focus();
						break;
					case "Home":
						e.preventDefault();
						tabButtons[0].focus();
						break;
					case "End":
						e.preventDefault();
						tabButtons[tabButtons.length - 1].focus();
						break;
				}
			});
		});
	}

	/**
	 * FAQ Page Accordion Functionality
	 */
	function initFAQAccordions() {
		// Add a small delay to ensure all elements are rendered
		setTimeout(() => {
			const accordionTriggers = document.querySelectorAll(".faq-accordion-trigger");

			if (accordionTriggers.length === 0) {
				return;
			}

			accordionTriggers.forEach((trigger, index) => {
				const controlsId = trigger.getAttribute("aria-controls");
				const content = document.getElementById(controlsId);

				if (!content) {
					return;
				}

				// FORCE RESET: Ensure all accordions start in closed state
				trigger.setAttribute("aria-expanded", "false");
				content.classList.remove("open");

				// Add click event listener with enhanced logging
				trigger.addEventListener("click", function (e) {
					// Prevent any potential event conflicts
					e.preventDefault();
					e.stopPropagation();

					// FORCE CHECK: Use visual state as the true indicator
					const computedStyle = getComputedStyle(content);
					const currentMaxHeight = computedStyle.maxHeight;
					const isVisuallyOpen = currentMaxHeight !== "0px" && currentMaxHeight !== "0";

					// Use visual state as the true indicator
					if (isVisuallyOpen) {
						trigger.setAttribute("aria-expanded", "false");
						content.classList.remove("open");
					} else {
						trigger.setAttribute("aria-expanded", "true");
						content.classList.add("open");
					}

					// Log the result
					setTimeout(() => {
						const newState = trigger.getAttribute("aria-expanded") === "true";
						const newHasOpenClass = content.classList.contains("open");
					}, 50);
				});

				// Add keyboard support for accordions
				trigger.addEventListener("keydown", function (e) {
					if (e.key === "Enter" || e.key === " ") {
						e.preventDefault();
						trigger.click();
					}
				});
			});
		}, 100); // Small delay to ensure DOM is ready

		// Handle direct linking to FAQ items
		function handleFAQHash() {
			const hash = window.location.hash;
			if (hash.startsWith("#faq-")) {
				const targetAccordion = document.querySelector(hash + "-trigger");
				if (targetAccordion) {
					setTimeout(() => {
						targetAccordion.click();
						targetAccordion.scrollIntoView({
							behavior: "smooth",
							block: "center",
						});
					}, 100);
				}
			}
		}

		// Handle hash on page load
		handleFAQHash();

		// Handle hash changes
		window.addEventListener("hashchange", handleFAQHash);
	}

	/**
	 * Featured FAQ Accordion (Homepage)
	 */
	function initFeaturedFAQAccordions() {
		// Add a small delay to ensure all elements are rendered
		setTimeout(() => {
			const featuredAccordionTriggers = document.querySelectorAll(".featured-faq-trigger");

			if (featuredAccordionTriggers.length === 0) {
				return;
			}

			featuredAccordionTriggers.forEach((trigger, index) => {
				const controlsId = trigger.getAttribute("aria-controls");
				const content = document.getElementById(controlsId);

				if (!content) {
					return;
				}

				// FORCE RESET: Ensure all accordions start in closed state
				trigger.setAttribute("aria-expanded", "false");
				content.classList.remove("open");

				// Add click event listener with enhanced logging
				trigger.addEventListener("click", function (e) {
					// Prevent any potential event conflicts
					e.preventDefault();
					e.stopPropagation();

					// FORCE CHECK: Always remove any unwanted open classes before checking state
					// This handles timing issues where other scripts might set classes
					const classList = Array.from(content.classList);

					// If max-height is 0px, it should be considered closed regardless of class
					const computedStyle = getComputedStyle(content);
					const currentMaxHeight = computedStyle.maxHeight;
					const isVisuallyOpen = currentMaxHeight !== "0px" && currentMaxHeight !== "0";

					// Use visual state as the true indicator
					if (isVisuallyOpen) {
						trigger.setAttribute("aria-expanded", "false");
						content.classList.remove("open");
					} else {
						trigger.setAttribute("aria-expanded", "true");
						content.classList.add("open");
					}

					// Log the result
					setTimeout(() => {
						const newState = trigger.getAttribute("aria-expanded") === "true";
						const newHasOpenClass = content.classList.contains("open");
					}, 50);
				});

				// Add keyboard support for accordions
				trigger.addEventListener("keydown", function (e) {
					if (e.key === "Enter" || e.key === " ") {
						e.preventDefault();
						trigger.click();
					}
				});
			});
		}, 100); // Small delay to ensure DOM is ready

		// Handle direct linking to featured FAQs
		function handleFeaturedFAQHash() {
			const hash = window.location.hash;
			if (hash.startsWith("#featured-faq-")) {
				const targetAccordion = document.querySelector(hash + "-trigger");
				if (targetAccordion) {
					setTimeout(() => {
						targetAccordion.click();
						targetAccordion.scrollIntoView({
							behavior: "smooth",
							block: "center",
						});
					}, 100);
				}
			}
		}

		// Handle hash on page load for featured FAQs
		handleFeaturedFAQHash();

		// Handle hash changes for featured FAQs
		window.addEventListener("hashchange", handleFeaturedFAQHash);
	}

	/**
	 * Sticky Navigation - Desktop Only
	 */
	function initStickyNavigation() {
		// Only enable sticky navigation on desktop (screen width > 1000px)
		if (window.innerWidth <= 1000) {
			return;
		}

		const header = document.getElementById("masthead");
		const body = document.body;

		if (!header) {
			return;
		}

		// Get the original offset position of the header
		const headerOffset = header.offsetTop;
		let isSticky = false;

		function handleScroll() {
			const scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

			// Add sticky class when scrolled past header
			if (scrollPosition > headerOffset && !isSticky) {
				header.classList.add("sticky-nav");
				body.classList.add("sticky-nav-active");
				isSticky = true;
			}
			// Remove sticky class when scrolled back to top
			else if (scrollPosition <= headerOffset && isSticky) {
				header.classList.remove("sticky-nav");
				body.classList.remove("sticky-nav-active");
				isSticky = false;
			}
		}

		// Throttle scroll events for better performance
		let ticking = false;
		function requestTick() {
			if (!ticking) {
				requestAnimationFrame(handleScroll);
				ticking = true;
				setTimeout(() => {
					ticking = false;
				}, 16); // ~60fps
			}
		}

		// Add scroll event listener
		window.addEventListener("scroll", requestTick);

		// Re-initialize on window resize
		window.addEventListener("resize", function () {
			// Reset sticky state
			if (window.innerWidth <= 1000) {
				header.classList.remove("sticky-nav");
				body.classList.remove("sticky-nav-active");
				isSticky = false;
			}
		});
	}
});

/**
 * Smooth scrolling for team member anchor links
 */
document.addEventListener("DOMContentLoaded", function () {
	// Handle clicks on team member submenu links
	const teamLinks = document.querySelectorAll('a[href*="#team-"]');

	teamLinks.forEach(function (link) {
		link.addEventListener("click", function (e) {
			const href = this.getAttribute("href");
			const hashIndex = href.indexOf("#");

			// Check if we're on the same page or need to navigate first
			if (hashIndex !== -1) {
				const hash = href.substring(hashIndex);
				const targetElement = document.querySelector(hash);

				// If target exists on current page, scroll to it
				if (targetElement) {
					e.preventDefault();

					// Close mobile menu if open
					const siteNavigation = document.getElementById("site-navigation");
					const button = siteNavigation && siteNavigation.querySelector(".menu-toggle");
					if (button && siteNavigation.classList.contains("toggled")) {
						siteNavigation.classList.remove("toggled");
						button.setAttribute("aria-expanded", "false");
					}

					// Smooth scroll to target
					targetElement.scrollIntoView({
						behavior: "smooth",
						block: "start",
					});
				}
				// If target doesn't exist, let the link navigate normally
			}
		});
	});

	// Handle direct hash navigation (when page loads with hash)
	if (window.location.hash && window.location.hash.startsWith("#team-")) {
		setTimeout(function () {
			const targetElement = document.querySelector(window.location.hash);
			if (targetElement) {
				targetElement.scrollIntoView({
					behavior: "smooth",
					block: "start",
				});
			}
		}, 500); // Small delay to ensure page is fully loaded
	}
});

/**
 * FAQ Page Interactive Elements
 * Handles tabs and accordion functionality
 */
document.addEventListener("DOMContentLoaded", function () {
	// FAQ Tab functionality
	const tabButtons = document.querySelectorAll(".faq-tab-button");
	const tabPanels = document.querySelectorAll(".faq-tab-panel");

	function activateTab(targetButton, targetPanel) {
		// Remove active class from all tabs and panels
		tabButtons.forEach((btn) => {
			btn.classList.remove("active");
			btn.setAttribute("aria-selected", "false");
		});
		tabPanels.forEach((panel) => {
			panel.classList.remove("active");
		});

		// Add active class to target tab and panel
		targetButton.classList.add("active");
		targetButton.setAttribute("aria-selected", "true");
		targetPanel.classList.add("active");

		// Close all accordions in the newly active tab
		const accordions = targetPanel.querySelectorAll(".faq-accordion-trigger");
		accordions.forEach((trigger) => {
			trigger.setAttribute("aria-expanded", "false");
			const content = document.getElementById(trigger.getAttribute("aria-controls"));
			if (content) {
				content.classList.remove("open");
			}
		});
	}

	// Add click listeners to tab buttons
	tabButtons.forEach((button) => {
		button.addEventListener("click", function () {
			const targetId = this.getAttribute("aria-controls");
			const targetPanel = document.getElementById(targetId);

			if (targetPanel) {
				activateTab(this, targetPanel);
			}
		});

		// Add keyboard navigation for tabs
		button.addEventListener("keydown", function (e) {
			const currentIndex = Array.from(tabButtons).indexOf(this);
			let targetIndex;

			switch (e.key) {
				case "ArrowLeft":
					e.preventDefault();
					targetIndex = currentIndex > 0 ? currentIndex - 1 : tabButtons.length - 1;
					tabButtons[targetIndex].focus();
					break;
				case "ArrowRight":
					e.preventDefault();
					targetIndex = currentIndex < tabButtons.length - 1 ? currentIndex + 1 : 0;
					tabButtons[targetIndex].focus();
					break;
				case "Home":
					e.preventDefault();
					tabButtons[0].focus();
					break;
				case "End":
					e.preventDefault();
					tabButtons[tabButtons.length - 1].focus();
					break;
			}
		});
	});

	// FAQ Accordion functionality
	const accordionTriggers = document.querySelectorAll(".faq-accordion-trigger");

	accordionTriggers.forEach((trigger) => {
		trigger.addEventListener("click", function () {
			const isExpanded = this.getAttribute("aria-expanded") === "true";
			const content = document.getElementById(this.getAttribute("aria-controls"));

			if (!content) return;

			// Toggle current accordion
			if (isExpanded) {
				this.setAttribute("aria-expanded", "false");
				content.classList.remove("open");
			} else {
				this.setAttribute("aria-expanded", "true");
				content.classList.add("open");
			}
		});

		// Add keyboard support for accordions
		trigger.addEventListener("keydown", function (e) {
			if (e.key === "Enter" || e.key === " ") {
				e.preventDefault();
				this.click();
			}
		});
	});

	// Initialize first tab as active if none are active
	if (tabButtons.length > 0 && !document.querySelector(".faq-tab-button.active")) {
		const firstButton = tabButtons[0];
		const firstPanel = document.getElementById(firstButton.getAttribute("aria-controls"));
		if (firstPanel) {
			activateTab(firstButton, firstPanel);
		}
	}

	// Handle URL hash for direct FAQ linking (future enhancement)
	function handleFAQHash() {
		const hash = window.location.hash;
		if (hash.startsWith("#faq-")) {
			const targetAccordion = document.querySelector(hash + "-trigger");
			if (targetAccordion) {
				// Find which tab this FAQ is in
				const tabPanel = targetAccordion.closest(".faq-tab-panel");
				const tabButton = document.querySelector('[aria-controls="' + tabPanel.id + '"]');

				if (tabButton && tabPanel) {
					// Activate the correct tab
					activateTab(tabButton, tabPanel);

					// Open the accordion
					setTimeout(() => {
						targetAccordion.click();
						targetAccordion.scrollIntoView({
							behavior: "smooth",
							block: "center",
						});
					}, 100);
				}
			}
		}
	}

	// Handle hash on page load
	handleFAQHash();

	// Handle hash changes
	window.addEventListener("hashchange", handleFAQHash);
});

/**
 * Featured FAQ Accordion (Homepage)
 * Handles accordion functionality for featured FAQs on homepage
 */
document.addEventListener("DOMContentLoaded", function () {
	// Featured FAQ Accordion functionality
	const featuredAccordionTriggers = document.querySelectorAll(".featured-faq-trigger");

	featuredAccordionTriggers.forEach((trigger) => {
		trigger.addEventListener("click", function () {
			const isExpanded = this.getAttribute("aria-expanded") === "true";
			const content = document.getElementById(this.getAttribute("aria-controls"));

			if (!content) return;

			// Toggle current accordion
			if (isExpanded) {
				this.setAttribute("aria-expanded", "false");
				content.classList.remove("open");
			} else {
				this.setAttribute("aria-expanded", "true");
				content.classList.add("open");
			}
		});

		// Add keyboard support for accordions
		trigger.addEventListener("keydown", function (e) {
			if (e.key === "Enter" || e.key === " ") {
				e.preventDefault();
				this.click();
			}
		});
	});

	// Handle direct linking to featured FAQs
	function handleFeaturedFAQHash() {
		const hash = window.location.hash;
		if (hash.startsWith("#featured-faq-")) {
			const targetAccordion = document.querySelector(hash + "-trigger");
			if (targetAccordion) {
				// Open the accordion
				setTimeout(() => {
					targetAccordion.click();
					targetAccordion.scrollIntoView({
						behavior: "smooth",
						block: "center",
					});
				}, 100);
			}
		}
	}

	// Handle hash on page load for featured FAQs
	handleFeaturedFAQHash();

	// Handle hash changes for featured FAQs
	window.addEventListener("hashchange", handleFeaturedFAQHash);
});

/**
 * FAQ Tab List Show More/Less Functionality
 */
function initFAQTabShowMore() {
	// Add a small delay to ensure FAQ content is fully loaded
	setTimeout(() => {
		const showMoreBtn = document.getElementById("faq-show-more-btn");
		const tabList = document.querySelector(".faq-tab-list");

		if (!showMoreBtn || !tabList) {
			return;
		}

		function toggleTabList() {
			const isExpanded = tabList.classList.contains("expanded");

			if (isExpanded) {
				// Collapse
				tabList.classList.remove("expanded");
				showMoreBtn.textContent = "Show More";
				showMoreBtn.setAttribute("aria-expanded", "false");
			} else {
				// Expand
				tabList.classList.add("expanded");
				showMoreBtn.textContent = "Show Less";
				showMoreBtn.setAttribute("aria-expanded", "true");
			}
		}

		showMoreBtn.addEventListener("click", toggleTabList);
	}, 100); // Small delay to ensure content is loaded
}
