import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

import { MaskInput } from "maska"
import jquery from 'jquery';
import Alpine from 'alpinejs';
import mask from '@alpinejs/mask';
import * as bootstrap from 'bootstrap';
import './vendors/swiped-events';
import select2 from 'select2';
import {Fancybox} from "@fancyapps/ui/dist/fancybox/fancybox.esm.js";
import "@fancyapps/ui/dist/fancybox/fancybox.css";
import * as mega from './modules/appointment';
import * as megaAuth from './modules/auth';
import * as megaScroll from './modules/scroll'
import './modules/mobile-nav';

window.jQuery = jquery;
window.$ = jquery;
window.mega = mega.default;
window.megaAuth = megaAuth.default;
window.megaScroll = megaScroll.default

window.Alpine = Alpine;
Alpine.plugin(mask);
Alpine.start();

window.addEventListener('formSubmitted', event => {
    ym(95133373,'reachGoal','appointment')
})

window.addEventListener('flash-review', event => {
    $('.employee-page__submitted').addClass('show');

    setTimeout(() => {
        $('.employee-page__submitted').removeClass('show');
    }, 2000)
})

$(document).ready(function () {

    new MaskInput("[data-maska]");
    // mask
    function animateBox()
    {
        const animateBox = document.querySelectorAll('.services-canvas');

        if(animateBox)
        {
            animateBox.forEach((el, index) =>
            {
                const src = el.parentNode.dataset.animation;
                const item = {src: src, stateMachines: `anim${index}`}
                let isAnimationPlaying = false;
                const anim = new rive.Rive(
                {
                    src: item.src,
                    canvas: el,
                    autoplay: false,
                    stateMachineName: item.stateMachines,
                    onLoad: () => { anim.resizeDrawingSurfaceToCanvas(); },
                });

                el.parentNode.addEventListener('mouseenter', () =>
                {
                    if (!isAnimationPlaying)
                    {
                        anim.reset();
                        anim.play();
                        isAnimationPlaying = true;
                    }
                });
                
                animateBox[index].parentNode.addEventListener('mouseleave', () =>
                {
                    if (isAnimationPlaying)
                    {
                        anim.stop();
                        isAnimationPlaying = false;
                    }
                });

                // мобильный тригер
                animateBox[index].parentNode.addEventListener('touchstart', () =>
                {
                    if (!isAnimationPlaying)
                    {
                        anim.reset();
                        anim.play();
                        isAnimationPlaying = true;
                    }
                });
                
                animateBox[index].parentNode.addEventListener('touchend', () =>
                {
                    if (isAnimationPlaying)
                    {
                        anim.stop();
                        isAnimationPlaying = false;
                    }
                });
            });
        }

    }
    // init animation
    animateBox();

    function scrollToTop() {
        if (window.innerWidth < 768)
        {
            const btn = document.querySelector('.g-btn-up');

            if(btn)
            {
                window.addEventListener('scroll', function()
                {
                    if (window.scrollY > 300)
                    {
                        btn.style.opacity = 0.7;
                        btn.style.pointerEvents = 'auto';
                    }
                    else
                    {
                        btn.style.opacity = 0;
                        btn.style.pointerEvents = 'auto';
                    }
                        
                })
            }

        } 
        else
        {
            window.removeEventListener('scroll', scrollToTop);
            btn.style.opacity = 0;
        }
    }
    // mobile sscroll
    scrollToTop()

    select2($);
    // scroll
    $('.accordion-item').on ('click', '.accordion-item', (e) =>
    {
        const numbers = e.target.dataset.bsTarget.match(/\d+/g);
        const scrollTopValue = (numbers.join()-1) * 64;
        if(numbers.join() === '15')
            setTimeout(()=> {$(".appointment-page__scroll").animate({scrollTop: 300 }, 500)}, 300);
        else
            $(".appointment-page__scroll").scrollTop(scrollTopValue);

    })

    const diagnosticsSelect2 = $('#diagnostics-select2');
    
    diagnosticsSelect2.select2({
        width: '100%',
    });

    diagnosticsSelect2.on('select2:select', function (e) {
        const data = e.params.data;
        Livewire.emit('diagnosticsSelectChange', data.id);
    });

    Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });

    // Tooltip all
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    //Tabs
    const forgorTabEl = document.querySelector('#nav-tab .nav-link-forgot')
    const forgotTab = new bootstrap.Tab(forgorTabEl)
    const createTabEl = document.querySelector('#nav-tab .nav-link-create')
    const createTab = new bootstrap.Tab(createTabEl)

    $('#login-create-link').click(event => {
        event.preventDefault();
        createTab.show();
    })

    $('#login-forgot-link').click(event => {
        event.preventDefault();
        forgotTab.show();
    })
});