import { trim } from "jquery";

export default {
	searchServices(event)
	{
		const categories = event.target.parentNode.querySelectorAll('.accordion-header');
		const services = event.target.parentNode.querySelectorAll('.accordion-element');
		const searchText = event.target.value.toLowerCase();

		if(!searchText)
		{
			this.setDefaultClasses(categories, services);
			return;
		}

		categories.forEach(category => this.toggleCategoryClasses(category, 'add'));

		services.forEach(service =>
		{
			const title = service.querySelector('.accordion-element__name').textContent.toLowerCase();

			if(title.includes(searchText))
				service.classList.remove('hide');
			else
				service.classList.add('hide');
		});
	},
	searchAnalys(event)
	{
		const box = event.target.parentNode
		const inputValue = event.target.value.toLowerCase().trim();
		const textFilter = box.querySelectorAll('.accordion-button');
		
        let timeout;

        const debounce = function()
        {
            clearTimeout(timeout);
            timeout = setTimeout(async () => {
				
				textFilter.forEach( btnItem =>
				{

					const box = btnItem.closest('.accordion-item');
					const subBox = box.querySelectorAll('.price-list__item')
					
					box.querySelector('.accordion-header').classList.add('d-none')

					subBox.forEach(subEl =>
					{
						const textSubElem = subEl.querySelector('.price-list__item-name').textContent.toLowerCase().trim();

							if (textSubElem.includes(inputValue) && inputValue)
							{
								btnItem.closest('.accordion-item').classList.remove('d-none');
								subEl.classList.remove('d-none');
								box.querySelector('.accordion-collapse').classList.add('show');
								box.querySelector('.accordion-header').classList.add('d-none');

							} 
							else if (!inputValue)
							{
								subEl.classList.remove('d-none');
								box.querySelector('.accordion-header').classList.remove('d-none');
								box.querySelector('.accordion-collapse').classList.remove('show'); 
							} 
							else 
							{
								
								subEl.classList.add('d-none');
								box.querySelector('.accordion-header').classList.add('d-none');
							}

					})
					const subBoxNone = box.querySelectorAll('.price-list__item.d-none');
					if (subBox.length === subBoxNone.length)
					{
						box.querySelector('.accordion-collapse').classList.remove('show');
					}
				})
			}, 300);
		}

        debounce()
	},
	setDefaultClasses(categories, services)
	{
		categories.forEach(category => this.toggleCategoryClasses(category, 'remove'));
		services.forEach(service => service.classList.remove('hide'));
	},
	toggleCategoryClasses(category, action)
	{
		category.classList[action]('hide');
		category.nextElementSibling.classList[action]('visible');
	},
	toggleCheckbox(event, id = '')
    {
        if(event.target.checked)
        {

            $(`._account-page__form-wr${id}`).addClass('account-page__form-auth-password');
            $(`._account-page__form-wr${id}`).removeClass('account-page__form-auth-code');
            Livewire.emit('toggleCheckbox', {
				phone: $(`._auth-code${id}`).find('._password-input').val(),
				selected: 1
			});
        }
        else
        {
            $(`._account-page__form-wr${id}`).addClass('account-page__form-auth-code');
            $(`._account-page__form-wr${id}`).removeClass('account-page__form-auth-password');
            Livewire.emit('toggleCheckbox', {
				phone: $(`._auth-password${id}`).find('._password-input').val(),
				selected: 0
			});
        }
    },
	quickSearch(event, resultContainer){
        let timeout;

        const debounce = function()
        {
            clearTimeout(timeout);
            timeout = setTimeout(async () => {
                const response = await fetch(`/api/quick-search?q=${event.target.value}`);
                const result = await response.json();
                const searchResult = document.querySelector(`.${resultContainer}`);

                searchResult.innerHTML = '';
                searchResult.classList.add('hidden');
				jQuery(document).on('click.autsideInput',function (e)
				{
					searchResult.innerHTML = '';
					searchResult.classList.add('hidden');
					jQuery(document).off('click.autsideInput');
				})
                if(result.data != '')
                {
                    searchResult.innerHTML = result.data;
                    searchResult.classList.remove('hidden');
                }

            }, 300);
        }

        debounce()
    }
};
