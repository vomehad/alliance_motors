export function popup() {
	const popupLinks = document.querySelectorAll('.popup-link'); //  В эту переменную приходят все объекты с классом popup-link это ссылки или кнопки и картинки котрые будут открвывать модальное окно
	const body = document.querySelector('body'); // Лежит боди чтобы блокировать скролл
	const lockPadding = document.querySelectorAll(".lock-padding");

	const menuBody = document.querySelector('.menu_body');
	const header_contact = document.querySelector('.header_contact');
	const phone_contact = document.querySelectorAll('.phone_text');
	const phone_number = document.querySelectorAll('.phone_number');
	const iconMenu = document.querySelector('.menu_icon');

	let unlock = true; // Предовращает двойные нажатия 



	const timeout = 300; // цифра из свойств transition 0.8s она ровна 800 милисекунд для скорлла  

	// Проверка есть ли такие ссылки на html стрванице
	if (popupLinks.length > 0) {

		for (let index = 0; index < popupLinks.length; index++) {
			// получаем ссылки и присваимае в перевеменую popupLink
			const popupLink = popupLinks[index];
			// Вешаем на переменную событие Запускаем событие, удаляем #,  
			popupLink.addEventListener("click", function (e) {
				const popupName = popupLink.getAttribute('href').replace('#', '');// Удаляет #
				const curentPopup = document.getElementById(popupName);
				popupOpen(curentPopup);// Вызов функции которая открывает окно
				if(menuBody.classList.contains('_active')){
					document.body.classList.remove('_lock');
					iconMenu.classList.remove('_active');
					header_contact.classList.remove('_active');
					menuBody.classList.remove('_active');
					for (let i = 0; i < phone_contact.length; i++) {
						const element = phone_contact[i];
						element.classList.remove('_scroll');
					}
					for (let i = 0; i < phone_number.length; i++) {
						phone_number[0].classList.remove('_isActive');
						phone_number[1].classList.remove('_scroll');
					}
				}
				
				e.preventDefault(); // Запрещает перезагружать страницу
			});
		}
	}
	// Блок кода которые будет проверять ссылки у котрых есть класс .close-popup  и это для закрытия кода
	const popupCloseIcon = document.querySelectorAll('.close-popup');
	if (popupCloseIcon.length > 0) {
		for (let index = 0; index < popupCloseIcon.length; index++) {
			const el = popupCloseIcon[index];
			// Функция которая будет закрывать модальное окно
			el.addEventListener('click', function (e) {
				popupClose(el.closest('.popup'));
				e.preventDefault();
			});
		}
	}

	//Функция которая открывает окон
	function popupOpen(curentPopup) {
		// if (menu_body.classList.contains('_active')){
		// 	menu_body.classList.remove('_active')
		// }


		if (curentPopup && unlock) {
			const popupActive = document.querySelector('.popup.open');
			if (popupActive) {
				popupClose(popupActive, false);
			} else {
				bodyLock();
			}


			curentPopup.classList.add('open');
			curentPopup.addEventListener("click", function (e) {

				if (!e.target.closest('.popup__content')) {
					popupClose(e.target.closest('.popup'));

				}
			});
		}
	}

	// Функия которая закрывает модальное окно 
	function popupClose(popupActive, doUnlock = true) {
		if (unlock) {
			popupActive.classList.remove("open");
			if (doUnlock) {
				bodyUnLock();
			}
		}
	}
	// Функция которая скрывает скролл для сайта и высчитывает его ширину 
	function bodyLock() {
		const lockPaddingValue = window.innerWidth - document.querySelector('.wrapper').offsetWidth + 'px';

		for (let index = 0; index < lockPadding.length; index++) {
			const el = lockPadding[index];
			el.style.paddingRight = lockPaddingValue;
		}
		body.style.paddingRight = lockPaddingValue;
		body.classList.add('lock');

		unlock = false;
		setTimeout(function () {
			unlock = true;
		}, timeout);
	}

	function bodyUnLock() {
		setTimeout(function () {
			for (let index = 0; index < lockPadding.length; index++) {
				const el = lockPadding[index];
				el.style.paddingRight = '0px';
			}
			body.style.paddingRight = '0px';
			body.classList.remove('lock');
		}, timeout);

		unlock = false;
		setTimeout(function () {
			unlock = true;
		}, timeout);
	}
	// попап закрывается через клавишу esc
	document.addEventListener('keydown', function (e) {
		if (e.which === 27) {
			const popupActive = document.querySelector('.popup.open');
			popupClose(popupActive);
		}
	});
	// Полифилы - подгоняет старые браузеры параметры
	(function () {
		// проверяем поддержку 
		if (!Element.prototype.closest) {
			// ревлизуем
			Element.prototype.closest = function (css) {
				var node = this;
				while (node) {
					if (node.matches(css)) return node;
					else node = node.parentElement;
				}
				return null;
			};
		}
	})();
	(function () {
		//проверяем
		if (!Element.prototype.matches) {
			//определяем свойтсво
			Element.prototype.matches = Element.prototype.matches ||
				Element.prototype.webkitMatchesSelector ||
				Element.prototype.mozkitMatchesSelector ||
				Element.prototype.mskitMatchesSelector;
		}
	})();
}