/**
 * FAQ & Navigation Diagnostics Script
 * Add this script to test functionality and identify issues
 */

// Wait for DOM to be ready
document.addEventListener("DOMContentLoaded", function () {

	// Test 1: Check for Featured FAQ elements
	const featuredTriggers = document.querySelectorAll(".featured-faq-trigger");

	if (featuredTriggers.length > 0) {
		featuredTriggers.forEach((trigger, index) => {
			const controlsId = trigger.getAttribute("aria-controls");
			const content = document.getElementById(controlsId);
		});
	}

	// Test 2: Check for FAQ page tabs
	const tabButtons = document.querySelectorAll(".faq-tab-button");
	const tabPanels = document.querySelectorAll(".faq-tab-panel");

	// Test 3: Check for FAQ page accordions
	const accordionTriggers = document.querySelectorAll(".faq-accordion-trigger");

	// Test 4: Check sticky navigation setup
	const header = document.getElementById("masthead");

	if (header) {
		const headerOffset = header.offsetTop;
	}

	// Test 5: Check CSS custom properties
	const computedStyle = getComputedStyle(document.documentElement);
	const primaryColor = computedStyle.getPropertyValue("--primary-color").trim();
	const textColor = computedStyle.getPropertyValue("--text-color").trim();

	// Test 6: Add click listeners to test functionality
	featuredTriggers.forEach((trigger, index) => {
		trigger.addEventListener("click", function () {
			const controlsId = this.getAttribute("aria-controls");
			const content = document.getElementById(controlsId);
			if (content) {
				const isOpen = content.classList.contains("open");
			}
		});
	});

	tabButtons.forEach((button, index) => {
		button.addEventListener("click", function () {
			const targetId = this.getAttribute("aria-controls");
			const targetPanel = document.getElementById(targetId);
		});
	});

	// Test 7: Monitor scroll for sticky nav
	let scrollCount = 0;
	window.addEventListener("scroll", function () {
		scrollCount++;
		if (scrollCount % 10 === 0) {
			// Log every 10th scroll event
			if (header) {
				const hasSticky = header.classList.contains("sticky-nav");
			}
		}
	});

});

// Test 8: Check for JavaScript errors
window.addEventListener("error", function (e) {
	console.error(`❌ JavaScript Error: ${e.message} at ${e.filename}:${e.lineno}`);
});

