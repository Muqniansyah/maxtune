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
