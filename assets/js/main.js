function get_siblings(elem) {
	// for collecting siblings
	let siblings = [];
	// if no parent, return no sibling
	if (!elem.parentNode) {
		return siblings;
	}
	// first child of the parent node
	let sibling = elem.parentNode.firstChild;
	// collecting siblings
	while (sibling) {
		if (sibling.nodeType === 1 && sibling !== elem) {
			siblings.push(sibling);
		}
		sibling = sibling.nextSibling;
	}
	return siblings;
}

function slideToggle(elem) {
	if (elem.offsetHeight === 0) {
		elem.style.maxHeight = `${elem.scrollHeight}px`;
	} else {
		elem.style.maxHeight = 0;
	}
}

function setHeaderScrollClass() {
	const header = document.querySelector(".header");

	window.addEventListener("scroll", function () {
		if (window.scrollY >= header.offsetHeight) {
			header.classList.add("scroll");
		} else {
			header.classList.remove("scroll");
		}
	});
}

function setTelMask() {
	[].forEach.call(document.querySelectorAll('[type="tel"]'), function (input) {
		let keyCode;

		function mask(event) {
			event.keyCode && (keyCode = event.keyCode);
			let pos = this.selectionStart;
			if (pos < 3) event.preventDefault();
			let matrix = "+7 (___) ___-__-__",
				i = 0,
				def = matrix.replace(/\D/g, ""),
				val = this.value.replace(/\D/g, ""),
				new_value = matrix.replace(/[_\d]/g, function (a) {
					return i < val.length ? val.charAt(i++) || def.charAt(i) : a;
				});
			i = new_value.indexOf("_");
			if (i != -1) {
				i < 5 && (i = 3);
				new_value = new_value.slice(0, i);
			}
			let reg = matrix
				.substr(0, this.value.length)
				.replace(/_+/g, function (a) {
					return "\\d{1," + a.length + "}";
				})
				.replace(/[+()]/g, "\\$&");
			reg = new RegExp("^" + reg + "$");
			if (
				!reg.test(this.value) ||
				this.value.length < 5 ||
				(keyCode > 47 && keyCode < 58)
			)
				this.value = new_value;
			if (event.type == "blur" && this.value.length < 5) this.value = "";
		}

		input.addEventListener("input", mask, false);
		input.addEventListener("focus", mask, false);
		input.addEventListener("blur", mask, false);
		input.addEventListener("keydown", mask, false);
	});
}

function sendForm() {
	document.querySelectorAll("form[name]").forEach(function (form) {
		form.addEventListener("submit", function (e) {
			e.preventDefault();
			const form = this;
			let formData = new FormData(form);
			const formName = form.name;
			const fileInput = form.querySelector("input[type=file]");

			formData.append("action", "send_mail");

			if (formName) {
				formData.append("form_name", formName);
			} else {
				return;
			}

			if (fileInput) {
				Array.from(fileInput.files).forEach((file, key) => {
					formData.append(key.toString(), file);
				});
			}

			const response = fetch(adem_ajax.url, {
				method: "POST",
				body: formData,
			})
				.then((response) => response.text())
				.then((data) => {
					Fancybox.close(true);
					form.reset();
					setTimeout(function () {
						Fancybox.show([
							{
								src: "#success",
								type: "inline",
							},
						]);
					}, 100);
				})
				.catch((error) => {
					console.error("Error:", error);
				});
		});
	});
}

function tabs() {
	const tabsLists = document.querySelectorAll(".js-tabs");
	if (tabsLists) {
		tabsLists.forEach(function (tabsList) {
			bindUIFunctions(tabsList);
		});
	}

	function bindUIFunctions(tabsList) {
		tabsList.addEventListener("click", function (e) {
			const tabItem = e.target.closest("li");
			if (tabItem.classList.contains("active")) {
				toggleMobileMenu(tabItem);
			}
			if (!tabItem.classList.contains("active") && e.target !== tabsList) {
				changeTab(tabItem);
			}
		});
	}

	function changeTab(tabItem) {
		const tabContainer = document.querySelector(
			"#" + tabItem.getAttribute("data-tab")
		);

		tabItem.classList.add("active");
		get_siblings(tabItem).forEach(function (tab) {
			tab.classList.remove("active");
		});

		tabContainer.classList.add("active");
		get_siblings(tabContainer).forEach(function (tab_container) {
			tab_container.classList.remove("active");
		});

		tabItem.parentNode.classList.remove("open");
	}

	function toggleMobileMenu(tabItem) {
		tabItem.parentNode.classList.toggle("open");
	}
}

//Ajax

// function showMorePosts() {
// 	const show_more_btn = document.querySelector(".js-show-more");

// 	if (!show_more_btn) return;

// 	show_more_btn.addEventListener("click", function (e) {
// 		e.stopImmediatePropagation();
// 		const container = document.querySelector(".js-show-more-container");
// 		this.textContent = "Загрузка...";

// 		const response = fetch(adem_ajax.url, {
// 			method: "POST",
// 			headers: {
// 				"Content-Type": "application/x-www-form-urlencoded;charset=UTF-8",
// 			},
// 			body: new URLSearchParams({
// 				action: "load_more",
// 				query: posts,
// 				page: current_page,
// 			}),
// 		})
// 			.then((response) => response.text())
// 			.then((data) => {
// 				this.innerHTML = this.dataset.text;
// 				container.insertAdjacentHTML("beforeend", data);
// 				current_page++;
// 				if (current_page === max_pages) this.remove();
// 			})
// 			.catch((error) => {
// 				console.error("Error:", error);
// 			});
// 	});
// }

document.addEventListener("DOMContentLoaded", function () {
	setHeaderScrollClass();

	sendForm();

	setTelMask();

	tabs();

	// showMorePosts();
});

//Fancybox

try {
	Fancybox.bind("[data-fancybox]", {
		animated: false,
	});
} catch (error) {
	console.log(error);
}

//Swiper

// Слайдер .coaches

const coaches = document.querySelector('.coaches');

const thumbCoachesSwitcher = function (thumbs, slides) {
	if (window.innerWidth > 576) return;

	for (let i = 0; i < thumbs.slides.length; i++) {
		if (i !== thumbs.activeIndex) {
			thumbs.slides[i].classList.remove('swiper-slide-thumb-active');
        } else {
			thumbs.slides[i].classList.add('swiper-slide-thumb-active');
			slides.slideTo(i)
        }
	}
}

if (coaches) {
	let thumbCoachesSlider = new Swiper('.coaches__slider-wrapper', {
		spaceBetween: 40,
		slidesPerView: 1,
		watchSlidesProgress: true,
		navigation: {
			nextEl: '.coaches__slider-next',
            prevEl: '.coaches__slider-prev',
		},
		pagination: {
			el: '.coaches__slider-pagination',
            clickable: true,
		},
		breakpoints: {
			1280: {
				slidesPerView: 4,
				spaceBetween: 20
			},
			992: {
				slidesPerView: 3,
			},
			577: {
				slidesPerView: 2,
			}
		},
		on: {
			activeIndexChange: function() {
				thumbCoachesSwitcher(this, bigCoachesSlider);
			}
		}
	});

	let bigCoachesSlider = new Swiper('.coaches__person', {
		slidesPerView: 1,
		effect: 'fade',
		speed: 500,
		spaceBetween: 0,
		allowTouchMove: false,
		thumbs: {
			swiper: thumbCoachesSlider,
		}
	});

	let coachesGallery = coaches.querySelectorAll('.coaches__gallery-wrapper');

	if (coachesGallery) {
		coachesGallery.forEach(gallery => {
			let coachesGallerySlider = new Swiper(gallery, {
				spaceBetween: 18,
				slidesPerView: 1,
				navigation: {
					nextEl: gallery.parentNode.querySelector('.coaches__gallery-next'),
					prevEl: gallery.parentNode.querySelector('.coaches__gallery-prev'),
				},
				breakpoints: {
					992: {
						slidesPerView: 4,
					},
					769: {
                        slidesPerView: 3,
                    },
					577: {
                        slidesPerView: 2,
                    }
				}
			})
		});
	}
}

// Функционал шапки сайта

document.addEventListener("DOMContentLoaded", function(e) {
	const header = document.querySelector('.header');

	if (header) {
		const headerBurger = header.querySelector('.header__burger');
		const headerDrop = header.querySelector('.header__drop');

		const dropOpener = () => {
			headerBurger.classList.add('active');
			headerDrop.style.maxHeight = headerDrop.scrollHeight + "px";
		}

		const dropCloser = () => {
			headerBurger.classList.remove('active');
			headerDrop.style.maxHeight = 0;
		}

		headerBurger.addEventListener('click', function() {
			if (this.classList.contains('active')) {
				dropCloser();
			} else {
				dropOpener();
			}
		})

		if (header.classList.contains('header--index') && window.innerWidth <= 768) {
			const headerDropLinks = headerDrop.querySelectorAll('.header__drop-item a');

			headerDropLinks.forEach(link => {
				link.onclick = () => {
					dropCloser();
				}
			})
		}
	}
})

//Отступ блока .coaches

if (coaches) {
	const coachesNextElement = coaches.nextElementSibling;

	if (coachesNextElement.classList.contains('price')) {
		coaches.classList.add('coaches--half');
	}
}


//Функционал блока .price

const price = document.querySelector('.price');

if (price) {
	const priceBtns = price.querySelectorAll('.js-accordion-btn');

	const priceBtnsClose = () => {
		for (let btn of priceBtns) {
			btn.classList.remove('active');
			btn.nextElementSibling.style.maxHeight = 0;
		}
	}

	priceBtns.forEach(btn => {
		btn.addEventListener('click', function() {
			if (this.classList.contains('active')) {
				priceBtnsClose();
			} else {
				priceBtnsClose();
				this.classList.add('active');
				slideToggle(this.nextElementSibling);
			}
		})
	});
}
