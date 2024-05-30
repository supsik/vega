export default {
	showPassord()
	{
		$('.account-page__password-show').addClass('hidden');
		$('.account-page__password-hide').removeClass('hidden');
		$('._account-page__password-input').attr('type', 'text');
	},
	hidePassord()
	{
		$('.account-page__password-hide').addClass('hidden');
		$('.account-page__password-show').removeClass('hidden');
		$('._account-page__password-input').attr('type', 'password');
	},
	togle(btn)
	{
		const box = btn.closest('.account-page__form-wr');
		const forms = box.querySelectorAll('.contact-form');
		const checkbox = btn.querySelector('input')
		const inputs = box.querySelectorAll('._password-input')
		if(checkbox.checked)
		{
			inputs[1].value = inputs[0].value
			forms[1].classList.add('d-none');
			forms[0].classList.remove('d-none')
		}
		else
		{
			inputs[0].value = inputs[1].value
			forms[0].classList.add('d-none');
			forms[1].classList.remove('d-none')
		}
	},
	getFormName(btn)
	{
		const data = btn.dataset.name;
		const box = btn.closest('.col-12.offset-md-2.col-md-8');
		const boxForm = box.querySelector('.tab-pane.active');
		const form = boxForm.querySelector('form.account-page__form.contact-form');
		form.name = data;
		if(data === 'reg')
		{
			const checkbox = boxForm.querySelector('.account-page__form-checkbox');
			checkbox.classList.add('d-none')
		}
	},
	getCode(event)
	{
		const form = event.target.closest('.contact-form')
		const input = form.querySelector('.form-control')
		let validate = false;

		if(this.empty(input)) 
			validate = this.validate(input);

		if(validate)
			this.getCodeSubmit(event.target, input , '/api/sendcode')
	},
	confirm(event)
	{
		
		const form = event.target.closest('.contact-form')
		const inputs = form.querySelectorAll('.form-control')
		const validate = [];
		const value = [];
		const formName = form.name
		inputs.forEach(input => {
			if(this.empty(input)) 
			{
				validate.push(this.validate(input));
				value.push(input.value)
			}
			if (!this.validate(input))
				return validate.length = [];
		})
		if(validate.length === inputs.length)
		{
			if(!formName)
				this.login(value, '/api/login', 'code', form);
			if(formName === 'reg')
				this.verifycode(value, '/api/verifycode', 'reg', form);
			if(formName === 'reset')
				this.verifycode(value, '/api/verifycode', 'reset', form);
		}

	},

	confirmPass(event)
	{
		
		const form = event.target.closest('.contact-form')
		const inputs = form.querySelectorAll('.form-control')
		const validate = [];
		const value = [];
		inputs.forEach(input =>
		{
			if(this.empty(input)) 
			{
				validate.push(this.validate(input));
				value.push(input.value)
			}
			if (!this.validate(input))
				return validate.length = [];
		})
		if(validate.length === inputs.length)
				this.login(value, '/api/login', 'password', form);
			
	},
	registration(event)
	{
		const form = event.target.closest('.contact-form')
		const inputs = form.querySelectorAll('.form-control')
		const validate = [];
		const value = [];
		let password = '';
		let secPass = '';
		inputs.forEach(input =>
		{
			if(this.empty(input)) 
			{
				validate.push(this.validate(input));
				value.push(input.value)
				if(input.dataset.validate === 'password')
					password = input.value;
				if(input.dataset.validate === 'secPas')
					secPass = input.value;
			}

			if(!this.validate(input) && password === secPass && password)
				return validate.length = [];
		})

		if(validate.length === inputs.length && password === secPass )
			this.fetchRegistration(value, '/api/register', form)
	},
	reset(event)
	{
		const form = event.target.closest('.contact-form')
		const inputs = form.querySelectorAll('.form-control')
		const validate = [];
		const value = [];
		let password = '';
		let secPass = '';
		inputs.forEach(input =>
		{
			if(this.empty(input)) 
			{
				validate.push(this.validate(input));
				value.push(input.value)
				if(input.dataset.validate === 'password')
					password = input.value;
				if(input.dataset.validate === 'secPas')
					secPass = input.value;
			}

			if(!this.validate(input) && password === secPass && password)
				return validate.length = [];
		})

		if(validate.length === inputs.length && password === secPass )
			this.fetchReset(value, '/api/forgot', form)
	},
	//  Валидация
	validate(input)
	{
		const data = input.dataset.validate;
		if (data === 'phone') 
			return this.phone(input);
		else if (data === 'password')
			return this.password(input);
		else if (data === 'code')
			return this.code(input);
		else
			return true;
	},
	empty(input)
	{
		if(input.value == '')
		{
			this.setMessage(input,'Заполните поле');
			return false;
		}
		return true;
	},
	password(input) {
		const regexLength = /^.{8,30}$/;

		if (!regexLength.test(input.value)) {
			this.setMessage(input, 'Недопустимое количество символов');
			return false;
		}
	
		// if (!regexUppercase.test(input.value)) {
		// 	this.setMessage(input, 'В пароле должна быть минимум одна заглавная буква');
		// 	return false;
		// }
	
		// if (!regexNumber.test(input.value)) {
		// 	this.setMessage(input, 'В пароле должна быть хотя бы одна цифра');
		// 	return false;
		// }
	
		return true;
	},
	repetPassword(input)
	{
		const password = document.querySelector('#register_password').value
		if(password !== input.value)
			this.setMessage(input,'пароли не совпадают');
	},
	phone(input)
	{
		const regex = /^((\+7|7|8)+\([0-9]{3}\)[0-9]{3}\-[0-9]{2}\-[0-9]{2})$/;
		if(regex.test(input.value))
			return true;

		this.setMessage(input,'Телефон введен не корректно');
		return false;
	},
	code(input)
	{
		const regex = /\b\d{4,}\b/;
		if(regex.test(input.value))
			return true

		this.setMessage(input,'код введен не корректно');
		return false;
	},
	setMessage(input ,massage)
	{
		const box = input.parentNode;
		box.querySelector('.error-message').textContent = massage;
		input.classList.add('is-invalid')
	},
	resetError(input)
	{
		const box = input.parentNode;
		box.querySelector('.error-message').textContent = '';
		input.classList.remove('is-invalid')
	},
// запросы
	getCodeSubmit(btn ,input , newUrl)
	{
		const currentUrl = window.location.href;
		const baseUrl = currentUrl.substring(0, currentUrl.lastIndexOf("/"));
		const Url = baseUrl+newUrl;
		const numbersOnly = input.value.replace(/\D/g, '')
		$.ajax(
			{
				url: `${Url}?phone=${numbersOnly}`,
				type: "POST",
				
				error: function(jqXHR)
				{
					clearInterval(timerInterval);
					btn.disabled = false;
					btn.textContent = 'Получить код';
					const form = btn.closest('.account-page__form')
					const formError = form.querySelector('.account-page__form-error');
					if (jqXHR.status === 400)
					{
						formError.classList.remove('d-none');
						formError.textContent = "Что то пошло не так"
					} else if (jqXHR.status === 409)
					{
						formError.classList.remove('d-none');
						formError.textContent = "Превышен лимит сообщений"
					} else
					{
						formError.classList.remove('d-none');
						formError.textContent = "Вы уже зарегестрированны"
					}
				}
			});
			let remainingTime = 60;
	
			btn.disabled = true;
			const timerInterval = setInterval(timerFunction, 1000);

			function timerFunction() {
				btn.textContent = remainingTime;
				remainingTime--;
				const form = btn.closest(".contact-form");
				const submit = form.querySelector('.btn-main');
				submit.classList.remove('d-none')
				if (remainingTime <= 0) {
					clearInterval(timerInterval);
					btn.disabled = false;
					btn.textContent = 'Получить код';
				}
			}
	},
	login(value, newUrl, type,form)
	{
		const currentUrl = window.location.href;
		const baseUrl = currentUrl.substring(0, currentUrl.lastIndexOf("/"));
		const Url = baseUrl+newUrl;
		const numbersOnly = value[0].replace(/\D/g, '')
		$.ajax(
			{
				url: `${Url}?`,
				type: "POST",
				data:
					{
						phone:numbersOnly,
						[type]:value[1],
					},
				success: function()
				{
					const currentUrl = window.location.href;
					const newUrl = currentUrl.substring(0, currentUrl.lastIndexOf("/"));
					window.location.href = `${newUrl}/user/profile`;
				} ,
				error: function()
				{
					const formEror = form.querySelector('.account-page__form-error');
					formEror.classList.remove('d-none');
					if(type === "password")
						formEror.textContent = "Неверный пароль";
					else
						formEror.textContent = "Неверный код";
					
				}
			});
	},
	fetchRegistration(value, newUrl , form)
	{
		const currentUrl = window.location.href;
		const baseUrl = currentUrl.substring(0, currentUrl.lastIndexOf("/"));
		const Url = baseUrl+newUrl;
		const tphone = localStorage.getItem('phone');
		const tabs = document.getElementById('nav-tab');
		$.ajax(
			{
				url: `${Url}`,
				type: "POST",
				data:
				{
					phone: tphone,
					name: value[0],
					surname: value[1],
					password:value[2],
				},
				success: function() {
					const btn = tabs.querySelectorAll('.nav-link')
					btn[0].click();
				} ,
				error: function()
				{
					const formEror = form.querySelector('.account-page__form-error');
					formEror.classList.remove('d-none');
					formEror.textContent = "Что-то пошло не так";
				}
			});

	},
	verifycode(value, newUrl, name, form)
	{
		const currentUrl = window.location.href;
		const baseUrl = currentUrl.substring(0, currentUrl.lastIndexOf("/"));
		const Url = baseUrl+newUrl;
		const numbersOnly = value[0].replace(/\D/g, '')
		$.ajax(
			{
				url: `${Url}?phone=${numbersOnly}&code=${value[1]}`,
				type: "POST",
				success: function()
				{
					localStorage.setItem('phone', numbersOnly)
					const form = document.querySelector(`form[name="${name}"]`);
					const box = form.closest('.tab-pane.active');
					form.classList.add('d-none');
					const details = box.querySelector('.account-page__detail');
					details.classList.remove('d-none');
				} ,
				error: function(jqXHR)
				{
					if (jqXHR.status === 400)
					{
						const formEror = form.querySelector('.account-page__form-error');
						formEror.classList.remove('d-none');
						formEror.textContent = "Превышен лимит сообщений";
					} else if (jqXHR.status === 409)
					{
						const formEror = form.querySelector('.account-page__form-error');
						formEror.classList.remove('d-none');
						formEror.textContent = "Что-то пошло не так";
					} else
					{
						const formEror = form.querySelector('.account-page__form-error');
						formEror.classList.remove('d-none');
						formEror.textContent = "Что-то пошло не так";
					}
				}
			});
	},
	fetchReset(value, newUrl, form)
	{
		const currentUrl = window.location.href;
		const baseUrl = currentUrl.substring(0, currentUrl.lastIndexOf("/"));
		const Url = baseUrl+newUrl;
		const tphone = localStorage.getItem('phone');
		$.ajax(
			{
				url: `${Url}`,
				type: "POST",
				data:
					{
						phone:tphone,
						password:value[0],
					},
				success: function()
				{
					const tabs = document.getElementById('nav-tab');
					const btn = tabs.querySelectorAll('.nav-link')
					btn[0].click();
				} ,
				error: function(jqXHR)
				{
					if (jqXHR.status === 400)
					{
						const formEror = form.querySelector('.account-page__form-error');
						formEror.classList.remove('d-none');
						formEror.textContent = "Что-то пошло не так";
					} else if (jqXHR.status === 409)
					{
						const formEror = form.querySelector('.account-page__form-error');
						formEror.classList.remove('d-none');
						formEror.textContent = "Что-то пошло не так";
					} else
					{
						const formEror = form.querySelector('.account-page__form-error');
						formEror.classList.remove('d-none');
						formEror.textContent = "Что-то пошло не так";
					}
				}
			});
	}
};
