<?php
/**
 * Template for FAQ Page
 *
 * This template displays FAQs with tabs, accordions, and Schema markup.
 * Template Name: FAQ Page
 *
 * @package FCO
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="wrap">
        <?php
        while ( have_posts() ) :
            the_post();

            // Use the standard page content template which includes hero section
            get_template_part( 'template-parts/content/content', 'page' );

        endwhile; // End of the loop.
        ?>
        
        <!-- Separator -->
        <div class="faq-separator">
            <hr class="faq-divider">
        </div>
        
        <!-- FAQ Content -->
        <div class="faq-content-section">
            <?php 
            // Display FAQ content with topic sections and accordions
            if (function_exists('display_faq_page_content')) {
                display_faq_page_content();
            }
            ?>
        </div>
    </div>
</main><!-- #main -->

<noscript>
    <style>
        .faq-topic-section .faq-accordion[hidden] {
            display: block !important;
        }
    </style>
</noscript>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const topicControllers = new Map();

    // Handle smooth scrolling for quick navigation links
    document.querySelectorAll('.quick-nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                const targetSection = targetElement.closest('.faq-topic-section') || targetElement;
                const controller = topicControllers.get(targetSection);

                if (controller) {
                    controller.setTopicState(true);
                }

                // Update URL without scrolling
                history.pushState(null, '', `#${targetId}`);
                
                // Smooth scroll to target
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Toggle FAQ topics via topic headers
    document.querySelectorAll('.faq-topic-section').forEach(section => {
        const header = section.querySelector('.topic-title');
        const accordion = section.querySelector('.faq-accordion');

        if (!header || !accordion) {
            return;
        }

        const setTopicState = expanded => {
            const isExpanded = Boolean(expanded);
            header.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
            accordion.hidden = !isExpanded;
            accordion.setAttribute('aria-hidden', (!isExpanded).toString());
            section.classList.toggle('topic-open', isExpanded);

            if (!isExpanded) {
                section.querySelectorAll('.faq-accordion-trigger[aria-expanded="true"]').forEach(openTrigger => {
                    openTrigger.setAttribute('aria-expanded', 'false');
                    const openContent = document.getElementById(openTrigger.getAttribute('aria-controls'));
                    if (openContent) {
                        openContent.classList.remove('open');
                    }
                    const openIcon = openTrigger.querySelector('.faq-accordion-icon');
                    if (openIcon) {
                        openIcon.style.transform = 'rotate(0deg)';
                    }
                });
            }
        };

        setTopicState(false);

        topicControllers.set(section, {
            setTopicState,
            header,
            accordion
        });

        const toggleSection = () => {
            const expanded = header.getAttribute('aria-expanded') === 'true';
            setTopicState(!expanded);
        };

        header.addEventListener('click', toggleSection);
        header.addEventListener('keydown', event => {
            if (event.key === 'Enter' || event.key === ' ' || event.key === 'Spacebar') {
                event.preventDefault();
                toggleSection();
            }
        });
    });

    // Handle accordion functionality
    document.querySelectorAll('.faq-accordion-trigger').forEach(trigger => {
        trigger.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            const content = document.getElementById(this.getAttribute('aria-controls'));
            
            // Toggle aria-expanded
            this.setAttribute('aria-expanded', (!expanded).toString());
            
            // Toggle content visibility
            content.classList.toggle('open');
            
            // Update icon
            const icon = this.querySelector('.faq-accordion-icon');
            if (icon) {
                icon.style.transform = expanded ? 'rotate(0deg)' : 'rotate(45deg)';
            }
            
            // Close other open accordions in this topic section
            const currentAccordion = this.closest('.faq-accordion-item');
            const topicSection = currentAccordion.closest('.faq-topic-section');
            
            if (topicSection) {
                topicSection.querySelectorAll('.faq-accordion-trigger').forEach(otherTrigger => {
                    if (otherTrigger !== this && otherTrigger.getAttribute('aria-expanded') === 'true') {
                        otherTrigger.setAttribute('aria-expanded', 'false');
                        const otherContent = document.getElementById(otherTrigger.getAttribute('aria-controls'));
                        otherContent.classList.remove('open');
                        const otherIcon = otherTrigger.querySelector('.faq-accordion-icon');
                        if (otherIcon) {
                            otherIcon.style.transform = 'rotate(0deg)';
                        }
                    }
                });
            }
        });
    });

    // Check if URL has a hash and scroll to that topic
    if (window.location.hash) {
        const targetElement = document.getElementById(window.location.hash.substring(1));
        if (targetElement) {
            const targetSection = targetElement.closest('.faq-topic-section');
            if (targetSection && topicControllers.has(targetSection)) {
                topicControllers.get(targetSection).setTopicState(true);
            }

            const labelledBy = targetElement.getAttribute('aria-labelledby');
            if (labelledBy) {
                const trigger = document.getElementById(labelledBy);
                if (trigger && trigger.classList.contains('faq-accordion-trigger') && trigger.getAttribute('aria-expanded') !== 'true') {
                    trigger.click();
                }
            } else if (targetElement.classList.contains('faq-accordion-trigger') && targetElement.getAttribute('aria-expanded') !== 'true') {
                targetElement.click();
            }

            setTimeout(() => {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }, 100);
        }
    }
});
</script>

<?php
get_sidebar();
get_footer();
