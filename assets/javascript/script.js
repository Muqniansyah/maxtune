// hamburger menu
document.addEventListener("DOMContentLoaded", function () {
	const menuToggle = document.querySelector(".menu-toggle");
	const navLinks = document.querySelector(".nav-links");

	menuToggle.addEventListener("click", function () {
		navLinks.classList.toggle("show");
	});
});

// navbar sticky
let nav = document.querySelector("nav");
window.onscroll = function () {
	if (document.documentElement.scrollTop > 20) {
		nav.classList.add("sticky");
	} else {
		nav.classList.remove("sticky");
	}
};

// about teks
window.addEventListener("scroll", muncul);

function muncul() {
	let elements = document.querySelectorAll(".elemen");

	for (let i = 0; i < elements.length; i++) {
		let tinggiLayar = window.innerHeight;

		let jarakAtasElemen = elements[i].getBoundingClientRect().top;

		let ukuranScroll = 300;

		if (jarakAtasElemen < tinggiLayar - ukuranScroll) {
			elements[i].classList.add("muncul");
		} else {
			elements[i].classList.remove("muncul");
		}
	}
}

// Back to top button
window.addEventListener("scroll", function () {
	var scrollToTopBtn = document.getElementById("scrollToTopBtn");
	if (window.scrollY > 100) {
		scrollToTopBtn.style.display = "block";
	} else {
		scrollToTopBtn.style.display = "none";
	}
});

document
	.querySelector(".scroll-to-top")
	.addEventListener("click", function (event) {
		event.preventDefault();
		var scrollStep = -window.scrollY / (1500 / 15),
			scrollInterval = setInterval(function () {
				if (window.scrollY !== 0) {
					window.scrollBy(0, scrollStep);
				} else {
					clearInterval(scrollInterval);
				}
			}, 15);
	});
