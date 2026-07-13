/**
 * Enhanced Accordion Diagnostics
 * This script will help identify what's preventing accordion clicks from working
 */

document.addEventListener("DOMContentLoaded", function () {

	// Test Featured FAQ Accordions
	const featuredTriggers = document.querySelectorAll(".featured-faq-trigger");

	featuredTriggers.forEach((trigger, index) => {
		const controls = trigger.getAttribute("aria-controls");
		const content = document.getElementById(controls);
		const expanded = trigger.getAttribute("aria-expanded");


		if (content) {
		}

		// Add detailed click listener for testing
		trigger.addEventListener("click", function (e) {

			const wasExpanded = this.getAttribute("aria-expanded") === "true";

			setTimeout(() => {
				const nowExpanded = this.getAttribute("aria-expanded") === "true";
				const hasOpenClass = content && content.classList.contains("open");
				if (content) {
				}
			}, 50);
		});
	});

	// Test FAQ Page Accordions
	const faqTriggers = document.querySelectorAll(".faq-accordion-trigger");

	faqTriggers.forEach((trigger, index) => {
		const controls = trigger.getAttribute("aria-controls");
		const content = document.getElementById(controls);


		// Add detailed click listener
		trigger.addEventListener("click", function (e) {
			const wasExpanded = this.getAttribute("aria-expanded") === "true";

			setTimeout(() => {
				const nowExpanded = this.getAttribute("aria-expanded") === "true";
				const hasOpenClass = content && content.classList.contains("open");
			}, 50);
		});
	});

	// Check for conflicting event listeners

	// Test for jQuery conflicts
	if (window.jQuery) {

		// Check if any jQuery click handlers are attached
		jQuery(".featured-faq-trigger, .faq-accordion-trigger").each(function (index, element) {
			const events = jQuery._data(element, "events");
			if (events && events.click) {
			}
		});
	}

	// Check for CSS transitions that might affect functionality
	const sampleContent = document.querySelector(".featured-faq-content");
	if (sampleContent) {
		const styles = getComputedStyle(sampleContent);
	}

	// Manual test button
	if (featuredTriggers.length > 0) {
		setTimeout(() => {
			const firstTrigger = featuredTriggers[0];
			const clickEvent = new MouseEvent("click", {
				bubbles: true,
				cancelable: true,
			});
			firstTrigger.dispatchEvent(clickEvent);
		}, 2000);
	}

});
