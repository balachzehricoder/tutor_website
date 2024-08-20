try {
transform.OnReady(function()
{
    transform.ItemAdd({
        id: 'accordions',
        name: 'Accordions',
        options: {
            a: {'label': 'Opened', 'type': 'INPUT', 'value': '1'},
            b: {'label': 'Duration (ms)', 'type': 'INPUT', 'value': 200},
            c: {'label': 'Single mode', 'type': 'TOGGLE', 'value': true},
        },
        code: function(transform, tag, target, options, data, index)
        {
            this.init = (bind, num) =>
            {
                this.requirements();
                this.render();

                if(data.mode === 'website')
                {
                    this.click();
                }
            };

            this.requirements = () =>
            {
                target.children().each(function (){
                    if($(this).children().length !== 2)
                    {
                        console.log(`"${tag.Get('label')}" - Each accordion must have only 2 children.`);
                    }
                });
            };

            this.render = () =>
            {
                let opened = options.a.split(",");
                if ( options.a === "*" || options.a.toLowerCase() === "all" ) {
                    target.children().addClass('dh-active');
                    target.children().children().addClass('dh-active');
                    return;
                }

                target.children().find(">*:last-child").hide();
                $.each(opened, function(ind, key){
                    target.children().eq(parseInt(key) - 1).addClass('dh-active');
                    target.children().eq(parseInt(key) - 1).children().addClass('dh-active');
                    target.children().eq(parseInt(key) - 1).children().last().show();
                });
            };

            this.click = () =>
            {
                let transform = this;
                
                $(target).find(">*").find(">*:first-child").on("click", function(){
                    transform.toggle($(this).parent());
                });
            };

            this.toggle = (target) => {
                let was_opened = $(target).hasClass("dh-active");

                /* Hide others if single mode */
                if (options.c) {
                    target.parent().children().removeClass("dh-active");
                    target.parent().children().children().removeClass("dh-active");
                    target.parent().children().find(">*:last-child").slideUp(options.b);
                }

                /* Open target */
                if (was_opened) {
                    target.removeClass('dh-active');
                    target.children().removeClass('dh-active');
                    target.children().last().slideUp(options.b);
                } else {
                    target.addClass('dh-active');
                    target.children().addClass('dh-active');
                    target.children().last().slideDown(options.b);
                }
            }
            
            return this;
        }
    });
});
} catch (error) { console.log(error); }

try {
transform.OnReady(function() {

    this.effects = [
        {value:'none', title: 'None'},
        {value:'fade', title: 'Fade'},
        {value:'slide', title: 'Slide'},
    ];


    transform.ItemAdd({
        id: 'hamburger',
        name: 'Hamburger Menu',
        options: {
            a: {'label': 'Menu ID', 'type': 'INPUT', 'value': ''},
            b: {'label': 'Animation', 'type': 'SELECT', 'values': this.effects, 'value': 'fade'},
            c: {'label': 'Show', 'type': 'TOGGLE', 'value': false},
            d: {'label': 'Flex on show', 'type': 'TOGGLE', 'value': false},
        },

        code: function(transform, tag, target, options, data, index) {

            this.init = (bind, num) => {
                this.requirements();
                this.render();

                if(data.mode === 'website') {
                    this.click();
                }
            };

            this.requirements = () => {
                if(!options.a ) {
                    console.log(`Menu ID is not set.`);
                    return;
                }

                if( !$(`#${options.a}`).length ) {
                    console.log(`Menu with an id: ${options.a} doesn't exist.`);
                    return;
                }
            };

            this.render = () => {
                if (options.c ) {
                    target.addClass('dh-active');
                    $(`#${options.a}`).addClass("dh-active");
                    if (options.d) {
                        $(`#${options.a}`).css('display', 'flex');
                        return;
                    }
                    $(`#${options.a}`).show();
                }
            };

            this.click = () => {
                let transform = this;
                $(target).on("click", function(){
                    transform.menuToggle($(this));
                })
            };

            this.menuToggle = (button) => {

                $(button).toggleClass("dh-active");
                $(`#${options.a}`).toggleClass("dh-active");

                if (options.b === "none") {
                    let isVis = $(`#${options.a}`).is(":visible");
                    if (options.d ) {
                        if ( isVis ) {
                            $(`#${options.a}`).hide();
                        } else {
                            $(`#${options.a}`).css("display", "flex");
                        }
                    } else {
                        $(`#${options.a}`).toggle();
                    }
                } else if (options.b === "fade") {
                    if (options.d ) {
                        $(`#${options.a}`).fadeToggle("fast").css('display', 'flex');
                    } else {
                        $(`#${options.a}`).fadeToggle("fast");
                    }
                } else if (options.b === "slide") {
                    if (options.d ) {
                        $(`#${options.a}`).slideToggle("fast").css('display', 'flex');
                    } else {
                        $(`#${options.a}`).fadeToggle("fast");
                    }
                }
            }


            return this;
        }
    });
});
} catch (error) { console.log(error); }

try {
transform.OnReady(function()
{
    let callbacks = [];

    $(window).on('scroll', function(event) 
    {
        callbacks.forEach((callback, index) =>
        {
            callback(event, index);
        });
    });

    $(document).on('dh/pages/unload', (event, page) =>
    {
        callbacks = [];
    });

    /* Close Popup on Page Change */
    mdEvents.Fn('catch', 'pages.ready', () =>
    {
        $.each(mdModal.ItemsGet(), (id, item) =>
        {
            if(id.startsWith('p79-'))
            {
                item.Remove({animation: 'fade'});
            }
        });
    });

    transform.ItemAdd({
        id: 'popup',
        name: 'Popup',
        options: {
            d1: {
                label: 'Event',
                type: 'OPTIONS', 
                options: [
                    {title: 'Click', value: 'click'},
                    {title: 'Hover', value: 'hover'},
                    {title: 'Scroll', value: 'scroll'},
                ],
                value: 'hover'
            },
            s: {
                label: 'Scroll',
                type: 'INPUT', 
                units: ['px', '%'],
                value: '30%',
                condition: (option, values) =>
                {
                    return values.d1 === 'scroll'
                }
            },
            d2: {
                label: 'Type',
                type: 'OPTIONS', 
                options: [
                    {title: 'Text', value: 'text'},
                    {title: 'Comp.', value: 'component'},
                    {title: 'Tag', value: 'tag'},
                ],
                value: 'text'
            },
            t: {
                label: 'Text',
                type: 'TEXTAREA',
                condition: (option, values) =>
                {
                    return values.d2 === 'text'
                }
            },
            c: {
                label: 'Component',
                type: 'COMPONENT',
                condition: (option, values) =>
                {
                    return values.d2 === 'component'
                }
            },
            d: {
                label: 'Tag',
                type: 'SIBLING',
                condition: (option, values) =>
                {
                    return values.d2 === 'tag'
                }
            },
            a1: {
                label: 'Horizontal Align',
                type: 'SELECT', 
                values: [
                    {title: 'Center', value: 'center'},
                    {title: 'Center Left', value: 'center-left'},
                    {title: 'Center Right', value: 'center-right'},
                    {title: 'Left Inside', value: 'left-in'},
                    {title: 'Left Outside', value: 'left-out'},
                    {title: 'Right Inside', value: 'right-in'},
                    {title: 'Right Outside', value: 'right-out'},
                ],
                value: 'center'
            },
            a2: {
                label: 'Vertical Align',
                type: 'SELECT', 
                values: [
                    {title: 'Center', value: 'center'},
                    {title: 'Center Top', value: 'center-top'},
                    {title: 'Center Bottom', value: 'center-bottom'},
                    {title: 'Top Inside', value: 'top-in'},
                    {title: 'Top Outside', value: 'top-out'},
                    {title: 'Bottom Inside', value: 'bottom-in'},
                    {title: 'Bottom Outside', value: 'bottom-out'},
                ],
                value: 'center'
            },
            b1: {
                label: 'Horizontal Offset',
                placeholder: '0',
                type: 'INPUT', 
                units: ['px']
            },
            b2: {
                label: 'Vertical Offset',
                placeholder: '0',
                type: 'INPUT', 
                units: ['px']
            },
            l: {
                label: 'Sticky',
                type: 'OPTIONS', 
                options: [
                    {title: 'Yes', value: true},
                    {title: 'No', value: false},
                ],
                value: true
            },
            o1: {
                label: 'Overlay',
                type: 'OPTIONS', 
                options: [
                    {title: 'Yes', value: true},
                    {title: 'No', value: false},
                ],
                value: false
            },
            o2: {
                label: 'Overl. Opacity',
                type: 'INPUT', 
                units: ['%'],
                value: '70',
                condition: (option, values) =>
                {
                    return values.o1;
                }
            },
            o3: {
                label: 'Overl. Clickable',
                type: 'OPTIONS', 
                options: [
                    {title: 'Yes', value: true},
                    {title: 'No', value: false},
                ],
                value: false,
                condition: (option, values) =>
                {
                    return values.o1;
                }
            },
            gc: {
                label: 'Target',
                type: 'OPTIONS', 
                options: [
                    {title: 'Tag', value: 'tag'},
                    {title: 'Window', value: 'window'},
                ],
                value: 'tag',
            },
            g: {
                label: 'Target',
                type: 'PARENT',
                condition: (option, values) =>
                {
                    return values.gc === 'tag';
                }
            },
            gw: {
                label: 'Inherit Width',
                type: 'OPTIONS', 
                options: [
                    {title: 'Yes', value: true},
                    {title: 'No', value: false},
                ],
                value: false,
                condition: (option, values) =>
                {
                    return values.g;
                }
            },
            x: {
                label: 'Closeable',
                type: 'SELECT', 
                values: [
                    {title: 'None', value: 'none', description: 'Popup can only be manually closed.'},
                    {title: 'Soft', value: 'soft', description: 'Any outside click excluding other popup clicks.'},
                    {title: 'Hard', value: 'hard', description: 'Any outside click including other popup clicks.'},
                ],
                value: 'soft'
            },
        },
        code: function(transform, tag, target, options, data, i)
        {
            let tagHtml = '';
            
            if(options.d2 === 'tag' && options.d)
            {
                tagHtml = target.siblings('.t' + options.d.Get('id')).get(0).outerHTML;
                target.siblings('.t' + options.d.Get('id')).hide();
            }

            if(data.mode !== 'website')
            {
                return;
            }

            this.init = () =>
            {
                if(options.d1 === 'hover')
                {
                    target.hover(
                        () =>
                        {
                            target.addClass('dh-popup-hover');
                            this.modalOpen();
                        },
                        (event) => 
                        {
                            mdModal.ItemGet('p79-' + tag.Get('id') + '-' + i, (item) =>
                            {
                                item.TargetItem().find('main').hover(null, () => 
                                {
                                    target.removeClass('dh-popup-hover');
                                    this.modalClose();
                                });
                            });

                            clearTimeout(tag.data.timeout);

                            tag.data.timeout = setTimeout(() =>
                            {
                                let mouseTarget = $(dh.getPoint(window.x, window.y));

                                if(
                                    !mouseTarget.hasClass('dh-popup-hover') &&
                                    !mouseTarget.parents('.dh-popup-hover').length &&
                                    !mouseTarget.parents(`item[for="md.modal"][data-id="${'p79-' + tag.Get('id') + '-' + i}"]`).length
                                )
                                {
                                    target.removeClass('dh-popup-hover');
                                    this.modalClose();
                                }
                            }, 250);
                        }
                    );
                }
                else if(options.d1 === 'click')
                {
                    target.on('click', () =>
                    {
                        console.log('POPUP: click');
                        this.modalOpen();
                    });
                }
                else if(options.d1 === 'scroll')
                {
                    callbacks.push((event, index) =>
                    {
                        /* Pixels */
                        if(options.s.includes('px'))
                        {
                            let top = options.s.replace('px', '');

                            if(window.scrollY >= top)
                            {
                                this.modalOpen();
                                delete callbacks[index];
                            }
                        } 

                        /* Percent */
                        else if (options.s.includes('%'))
                        {
                            let top = options.s.replace('%', '');
                            let scrollPerc = $(window).scrollTop() / (($(document).height() - $(window).height())) * 100;

                            if(scrollPerc >= top)
                            {
                                this.modalOpen();
                                delete callbacks[index];
                            }
                        }
                    });
                }
            };

            this.modalOpen = () =>
            {
                let overlay = false;
                let closeable = false;
                let element = target;

                if(options.o1)
                {
                    overlay = {
                        opacity: parseInt(options.o2.replace('%', '')) / 100,
                        clickable: options.o3,
                        closeable: options.x !== 'none',
                    };
                }

                if(['soft', 'hard'].includes(options.x))
                {
                    closeable = options.x;
                }

                if(options.gc === 'window')
                {
                    element = $('#dh-modal');
                }
                else if(options.g)
                {
                    if(options.g.Get('name') === 'body')
                    {
                        element = $('#dh-modal');
                    }
                    else
                    {
                        element = target.closest('.t' + options.g.Get('id'));
                    }
                }

                mdModal.ItemAdd({
                    id: 'p79-' + tag.Get('id') + '-' + i,
                    align: {
                        x: options.a1, 
                        y: options.a2
                    },
                    offset: {
                        x: options.b1 ? parseInt(options.b1.replace('px', '')) : 0, 
                        y: options.b2 ? parseInt(options.b2.replace('px', '')) : 0
                    },
                    clean: true,
                    width: options.gw ? 'inherit' : null,
                    corners: options.l,
                    closeable,
                    overlay,
                    element,
                    html: () =>
                    {
                        return this.modalHtml();
                    }
                });
                
                transform.Fn('run', {mode: 'website'});
            };

            this.modalClose = () =>
            {
                mdModal.ItemGet('p79-' + tag.Get('id') + '-' + i, (item) =>
                {
                    item.Remove({animation: 'fade'});
                });
            };

            this.modalHtml = () =>
            {
                if(options.d2 === 'text')
                {
                    return `
                        <main style="pointer-events: ${options.d1 === 'hover' ? 'none' : 'auto'}!important; background: transparent!important; padding: 0!important; min-height: auto!important; height: auto!important;">
                            <span class="dh-tooltip">${options.t}</span>
                        </main>
                    `;
                }
                else if(options.d2 === 'component' && options.c)
                {
                    let html = options.c.Fn('render.html', {}, null, false);

                    return `
                        <main style="background: transparent!important; padding: 0!important; min-height: auto!important; height: auto!important;">${html}</main>
                    `;
                }
                else if(options.d2 === 'tag' && options.d)
                {
                    return `
                        <main style="background: transparent!important; padding: 0!important; min-height: auto!important; height: auto!important;">${tagHtml}</main>
                    `;
                }
            };

            return this.init();
        },
    });
});
} catch (error) { console.log(error); }

try {
transform.OnReady(function()
{


    this.animations =  [
        {value: 'fadeIn', title: 'Fade In'},
        {value: 'fadeInDown', title: 'Fade In Down'},
        {value: 'fadeInUp', title: 'Fade In Up'},
        {value: 'fadeInLeft', title: 'Fade In Left'},
        {value: 'fadeInRight', title: 'Fade In Right'},
    ];

    let callbacks = [];
    $(window).on('scroll', () => 
    {
        callbacks.forEach((callback) =>
        {
            callback();
        });
    });

    $(document).on('dh/pages/unload', (event, page) =>
    {
        callbacks = [];
    });


    transform.ItemAdd({
        id: 'simple-animations',
        name: 'Simple Animation',
        options: {
            a: {'label': 'Type', 'type': 'SELECT', 'value': 'fadeIn', 'values': this.animations},
            b: {'label': 'Delay (ms)', 'type': 'INPUT', 'value': '200'},
            c: {'label': 'Offset (px)', 'type': 'INPUT', 'value': '100'},
            d: {'label': 'Duration (ms)', 'type': 'INPUT', 'value': '600'},
        },
        code: function(transform, tag, target, options, data, index)
        {
            
            this.init = () => {

                if (data.mode === "website") {
                    $(target).css("opacity", "0");
                    this.startAnimation(target);
                    callbacks.push(() => {
                        if(!$(target).hasClass('plugin_simpleScroll-is-animated')) {
                            this.startAnimation(target);
                        }
                    });
                }

            }

            this.startAnimation = (target) => {
          
                let offset = options.c;
                if (!offset) {offset = 0}
                const elPos = parseInt ( $(target).offset().top ) + parseInt ( offset );
                const topOfWindow = $(window).scrollTop();
                if (elPos < topOfWindow + $(window).height()) {
                    $(target).addClass('plugin_simpleScroll-is-animated');
                    console.log("add animation", target, options);
                    $(target).css("animation", `${options.a} ${options.d}ms ease ${options.b}ms forwards`);
                }
            }

         


            return this;
        },
    });
});
} catch (error) { console.log(error); }

try {
mdLibraries.ItemAdd({
    id: 'swiper',
    js: ['https://static.divhunt.com/assets/library/Swiper.js'],
    css: ['https://static.divhunt.com/assets/library/Swiper.css'],
});


transform.OnReady(function()
{
    this.effects =  [
        {value: 'default', title: 'Slide'},
        {value: 'fade', title: 'Fade'},
        {value: 'cube', title: 'Cube'},
        {value: 'flip', title: 'Flip'},
        {value: 'coverflow', title: 'Coverflow'},
        {value: 'creative', title: 'Creative'},
    ];

    this.pag =  [
        {value: 'bullets', title: 'Bullets'},
        {value: 'fraction', title: 'Numbers'},
        {value: 'progressbar', title: 'Progress Bar'}
    ];

    transform.ItemAdd({
        id: 'swiper',
        name: 'Swiper',
        bind: [
            'component.render',
        ],
        options: {
            
            a: {'label': 'Slides per View', 'type': 'INPUT', 'value': '1', 'placeholder': '1', condition: function(value, values){ return values.c === "default"; }},
            b: {'label': 'Space Between (px)', 'type': 'INPUT', 'value': 0, 'placeholder': '0', condition: function(value, values){ return values.c === "default"; }},
            c: {'label': 'Effect', 'type': 'SELECT', 'values': this.effects, 'value': 'default'},
            d: {'label': 'Freemode', 'type': 'TOGGLE', 'value': false},
            e: {'label': 'Loop', 'type': 'TOGGLE', 'value': false},
            f: {'label': 'Centered', 'type': 'TOGGLE', 'value': false},
            g: {'label': 'Grab Cursor', 'type': 'TOGGLE', 'value': false},
            h: {'label': 'Initial Slide', 'type': 'INPUT', 'value': 1},
            i: {'label': 'Disable Drag', 'type': 'TOGGLE', 'value': false},

            ca: {'label': 'Keyboard Control', 'type': 'TOGGLE', 'value': false, 'group': "Controls"},
            cb: {'label': 'Mousewheel Control', 'type': 'TOGGLE', 'value': false, 'group': "Controls"},

            na: {'label': 'Next Class', 'type': 'INPUT', 'value': '', 'group': "Navigation (Arrows)"},
            nb: {'label': 'Previous Class', 'type': 'INPUT', 'value': '', 'group': "Navigation (Arrows)"},
            
            pa: {'label': 'Enable', 'type': 'TOGGLE', 'value': false, 'group': "Pagination"},
            pd: {'label': 'Type', 'type': 'SELECT', 'value': 'bullets', 'values': this.pag, 'group': "Pagination"},
            pb: {'label': 'Dynamic Bullets', 'type': 'TOGGLE', 'value': false, 'group': "Pagination", condition: function(value, values){ return values.pd === "bullets"; }},
            pc: {'label': 'Clickable', 'type': 'TOGGLE', 'value': false, 'group': "Pagination", condition: function(value, values){ return values.pd === "bullets"; }},
            
            

            a1: {'label': 'Enable', 'type': 'TOGGLE', 'value': false, 'group': "Autoplay"},
            aa: {'label': 'Speed (ms)', 'type': 'INPUT', 'value': '5000', 'group': "Autoplay" , condition: function(value, values){ return values.a1; }},
            ab: {'label': 'Disable on Interaction', 'type': 'TOGGLE', 'value': false, 'group': "Autoplay", condition: function(value, values){ return values.a1; }},
            ac: {'label': 'Stop on Last Slide', 'type': 'TOGGLE', 'value': false, 'group': "Autoplay", condition: function(value, values){ return values.a1; }},
            ad: {'label': 'Pause on Mouse Enter', 'type': 'TOGGLE', 'value': false, 'group': "Autoplay", condition: function(value, values){ return values.a1; }},
            ae: {'label': 'Reverse Direction', 'type': 'TOGGLE', 'value': false, 'group': "Autoplay", condition: function(value, values){ return values.a1; }},


            ra: {'label': 'Slides per View', 'type': 'INPUT', 'value': '', 'group': "Landscape Tablet", 'placeholder': ''},
            rb: {'label': 'Space Between (px)', 'type': 'INPUT', 'value': '', 'group': "Landscape Tablet", 'placeholder': ''},
            
            rc: {'label': 'Slides per View', 'type': 'INPUT', 'value': '', 'group': "Tablet", 'placeholder': ''},
            rd: {'label': 'Space Between (px)', 'type': 'INPUT', 'value': '', 'group': "Tablet", 'placeholder': ''},

            re: {'label': 'Slides per View', 'type': 'INPUT', 'value': '', 'group': "Landscape Mobile", 'placeholder': ''},
            rf: {'label': 'Space Between (px)', 'type': 'INPUT', 'value': '', 'group': "Landscape Mobile", 'placeholder': ''},

            rg: {'label': 'Slides per View', 'type': 'INPUT', 'value': '', 'group': "Mobile", 'placeholder': ''}, 
            rh: {'label': 'Space Between (px)', 'type': 'INPUT', 'value': '', 'group': "Mobile", 'placeholder': ''}, 

        },
        
        code: function(transform, tag, target, options, data, index)
        {
            this.init = () =>
            {
                mdLibraries.Fn('load', ['swiper'], () =>
                {
                 
                    target.addClass("swiper");
                    
                    /* Wrapper */
                    let wrapper = target.children().first();
                    $(wrapper).addClass("swiper-wrapper");

                    /* Slides */
                    $(wrapper).find(">*").addClass("swiper-slide");

                    /* Pagination (dots) */
                    let pagClass = "";
                    if ( options.pa) {
                        $(target).append("<div class='swiper-pagination'></div>");
                        pagClass = ".swiper-pagination";
                    }


                    /* In builder swiper doesnt know which resolution is used on canvas, because it is watcing window width, so we need change swiper defaults based on breakpoint */
                    const breakpoints = this.breakpoints(options);
                    let slidesPerView = options.a;
                    let spaceBetween = options.b;

        
                    if (data.mode === "builder") {
                        const currentRes = responsive.GetSave("active.pixels", 1920);
                        const result = this.correct_slides_per_view_builder(breakpoints, slidesPerView, spaceBetween, currentRes);
                        slidesPerView = result.slidesPerView;
                        spaceBetween = result.spaceBetween;
                        breakpoints[1201].slidesPerView = slidesPerView;
                        breakpoints[1201].spaceBetween = spaceBetween;
                    }
                    
                    if (!data.mode) {
                        data.mode = "website";
                    }


                    let autoplayDelay = options.aa ? parseInt(options.aa) : 9999999999999;
                    if (!options.a1) {autoplayDelay = 9999999999999;}

                    /* Load Swiper */
                    new Swiper(target[0], {
                        /* Defaults */
                        slidesPerView,
                        spaceBetween,
                        effect: options.c,
                        allowTouchMove: data.mode === 'website' && !options.i,
                        freeMode: options.d,
                        loop: options.e,
                        centeredSlides: options.f,
                        grabCursor: options.g,
                        initialSlide: parseInt(options.h) - 1,

                        /* Controls */
                        keyboard: { enabled: options.ca },
                        mousewheel: options.cb,

                        /* Navigation */
                        navigation: {
                            nextEl: options.na ? `.${options.na}`: '',
                            prevEl: options.nb ? `.${options.nb}`: '',
                        },

                        /* Pagination */
                        pagination: {
                            el: pagClass,
                            dynamicBullets: options.pb,
                            clickable: options.pc,
                            type: options.pd,
                        },             

                        /* Autoplay, if delay is not set, we are setting value to infinite */
                        /* If we dont send anything inside of autoplay, default is 1s */
                        autoplay : {
                            delay: autoplayDelay,
                            disableOnInteraction: options.ab ,
                            stopOnLastSlide: options.ac,
                            pauseOnMouseEnter: options.ad,
                            reverseDirection: options.ae,
                        },

                        /* Responsive */
                        breakpoints,
                        
                    });

                });
            }


            this.breakpoints = (options) => 
            {
                const createBreakpoint = (slidesPerView, spaceBetween) => ({
                    slidesPerView: slidesPerView === 'auto' ? 'auto' : parseFloat(slidesPerView) || null,
                    spaceBetween: parseFloat(spaceBetween) || null,
                });
  
                const cleanBreakpoint = (bp, fallback) => {
                    const cleaned = { ...fallback };
                    if (bp.slidesPerView) cleaned.slidesPerView = bp.slidesPerView;
                    if (bp.spaceBetween) cleaned.spaceBetween = bp.spaceBetween;
                    return cleaned;
                };

                const default_res = {
                    slidesPerView: options.a,
                    spaceBetween: options.b,
                };

                const res_0 = createBreakpoint(options.rg, options.rh);
                const res_481 = createBreakpoint(options.re, options.rf);
                const res_768 = createBreakpoint(options.rc, options.rd);
                const res_992 = createBreakpoint(options.ra, options.rb);

                const breakpoints = {
                    1201: default_res,
                    992: cleanBreakpoint(res_992, default_res),
                    768: cleanBreakpoint(res_768, cleanBreakpoint(res_992, default_res)),
                    481: cleanBreakpoint(res_481, cleanBreakpoint(res_768, cleanBreakpoint(res_992, default_res))),
                    0: cleanBreakpoint(res_0, cleanBreakpoint(res_481, cleanBreakpoint(res_768, cleanBreakpoint(res_992, default_res)))),
                };

                return breakpoints;
            };


            this.correct_slides_per_view_builder = (breakpoints, defaultSlidesPerView, defaultSpaceBetween, currentRes) => {
                    let slidesPerView = defaultSlidesPerView;
                    let spaceBetween = defaultSpaceBetween;

                    const breakpointKeys = Object.keys(breakpoints)
                        .map(Number)
                        .sort((a, b) => b - a);

                    for (const key of breakpointKeys) {
                        if (currentRes > key) {
                            slidesPerView = breakpoints[key].slidesPerView;
                            spaceBetween = breakpoints[key].spaceBetween;
                            break;
                        }
                    }

                    return { slidesPerView: slidesPerView === 'auto' ? 'auto' : parseFloat(slidesPerView) || null, spaceBetween };
                }




            return this;
        },
        
    });
});
} catch (error) { console.log(error); }

try {
transform.OnReady(function() {

    this.styles =  [
        {value: 'custom', title: 'Custom'},
        {value: 'simple', title: 'Simple'},
        {value: 'numeric', title: 'Numeric'},
        {value: 'arrows', title: 'Arrows'},
    ];

    transform.ItemAdd({
        id: 'table-of-contents',
        name: 'Table of Contents',
        options: {
            tag: { 'label': 'Content', 'type': 'TAG', 'value': '' },
            smartSubmenu: {
                label: 'Smart Submenu',
                type: 'OPTIONS', 
                options: [
                    {title: 'Yes', value: true},
                    {title: 'No', value: false},
                ],
                value: false
            },
            rcolor: { 'label': 'Links Color', 'type': 'COLOR', 'value': '#454545' , 'group': 'Styles'},
            acolor: { 'label': 'Active Color', 'type': 'COLOR', 'value': '#a375ff' , 'group': 'Styles'},
            style: {'label': 'Style', 'type': 'SELECT', 'values': this.styles, 'value': 'none', 'group': 'Styles'},
            
        },

        code: function(transform, tag, target, options, data, index) {

            this.init = () => {
                this.checkContentAndGenerateTOC(); 
                this.loadStyles();
            }

            this.checkContentAndGenerateTOC = () => {
                
                if (!$(`.t${options.tag.Get('id')}`).length) { return; }

                let attempts = 0;
                const checkContent = () => {
                    let content = $(`.t${options.tag.Get('id')}`).children().length;
                    if (content > 1) {
                        this.generateTOC(target);
                    } else if (attempts < 10) {
                        attempts++;
                        setTimeout(checkContent, 100);
                    } else {
                        console.log("Max attempts reached. Aborting.");
                    }
                }
                checkContent();
                
            }

            this.generateTOC = (target) => {
                
                let toc = $("<ul></ul>");
            
                let This = this;
                $(`.t${options.tag.Get('id')} h2`).each(function() {
                    let h2 = $(this);
                    if (h2.text().startsWith('[toc-omit]')) {
                        h2.text(h2.text().replace('[toc-omit]', '').trim());
                        return; 
                    }
                    let h2Anchor = This.generateAnchorID(h2.text());
                    h2.attr('id', h2Anchor);

                    let h2Li = $('<li><a href="#' + h2Anchor + '">' + h2.text() + '</a></li>');
                    let h3ul = $('<ul></ul>');

                    h2.nextUntil('h2', 'h3').each(function() {
                        let h3 = $(this);
                        if (h3.text().startsWith('[toc-omit]')) {
                            h3.text(h3.text().replace('[toc-omit]', '').trim());
                            return; 
                        }
                        let h3Anchor = This.generateAnchorID(h3.text());
                        h3.attr('id', h3Anchor);

                        let h3Li = $('<li><a href="#' + h3Anchor + '">' + h3.text() + '</a></li>');
                        let h4ul = $('<ul></ul>');

                        h3.nextUntil('h3', 'h4').each(function() {
                            let h4 = $(this);
                            if (h4.text().startsWith('[toc-omit]')) {
                                h4.text(h4.text().replace('[toc-omit]', '').trim());
                                return; 
                            }
                            let h4Anchor = This.generateAnchorID(h4.text());
                            h4.attr('id', h4Anchor);

                            let h4Li = $('<li><a href="#' + h4Anchor + '">' + h4.text() + '</a></li>');
                            h4ul.append(h4Li);
                        });

                        if (h4ul.children().length > 0) {
                            h3Li.append(h4ul);
                        }

                        h3ul.append(h3Li);
                    });

                    if (h3ul.children().length > 0) {
                        h2Li.append(h3ul);
                    }

                    toc.append(h2Li);
                });

                $(target).append(toc);
                this.observeSections();
            }

            this.generateAnchorID = (text) => {
                return text.trim().toLowerCase().replace(/[^a-z0-9]+/g, '-');
            }


            this.observeSections = () => {
                const updateActiveLink = () => {

                    const targetPositionFromTop = $(window).height() * 0.2;
                    let foundActive = false;

                    $('h2, h3, h4').each(function() {
                        const $section = $(this);
                        const distanceFromTop = $section.offset().top - $(window).scrollTop();

                        if (distanceFromTop <= targetPositionFromTop ) {
                            $(target).find('a[href^="#"]').parent().removeClass('dh-active');

                            const id = $section.attr('id');
                            $(target).find(`a[href="#${id}"]`).parent().addClass('dh-active');
                            foundActive = true;
                        } else {
                            return !foundActive;
                        }
                    });

                    if (!foundActive) {
                        const firstId = $('h2, h3, h4').first().attr('id');
                        $(`a[href="#${firstId}"]`).addClass('dh-active');
                    }
                };

                updateActiveLink();

                $(window).on('scroll', updateActiveLink);
            }

            this.loadStyles = () => {

                let id = tag.Get('id');
                let styleID = "dh-toc-"+id;

                let cssContent = `
                    .t${id} ul li a {
                        color:${options.rcolor}
                    }
                    .t${id} > ul li.dh-active > a {
                        color:${options.acolor}
                    }
                `;

                if (options.smartSubmenu) {
                    cssContent += `
                    
                        .t${id} > ul > li ul {
                            display: none;
                        }

                         .t${id} > ul li.dh-active ul {
                            display: block;
                        }

                        .t${id} > ul ul:has(.dh-active) {
                            display: block;
                        }  
                                

                    `;
                }

                if (options.style === "simple") {
                    cssContent += `
                        .t${id} ul {
                            list-style-type:none;
                            margin-top:10px;
                            margin-bottom:10px;
                            border-left:1px solid #f1f1f1;
                        }

                        .t${id} > ul {
                            padding-left:0;
                            margin-top:0;
                            margin-bottom:0;
                            border-left:none;
                        }

                        .t${id} ul li {
                            margin-bottom:5px;
                        }

                        .t${id} ul li a {
                            text-decoration:none;
                        }

                    `;
                }
                else if (options.style === "numeric") {
                    cssContent += `
                        .t${id} ul {
                            list-style-type:none;
                            margin-top:10px;
                            margin-bottom:10px;
                        }

                        .t${id} > ul {
                            margin-top:0;
                            margin-bottom:0;
                        }

                        .t${id} ul li {
                            margin-bottom:10px;
                        }

                        .t${id} ul li a {
                            text-decoration:none;
                        }

                        .t427 li:before {
                            color:${options.rcolor}
                        }

                        .t${id} > ul {
                            counter-reset: level1;
                        }

                        .t${id} > ul > li {
                            counter-increment: level1;
                        }

                        .t${id} > ul > li:before {
                            content: counter(level1) ". ";
                        }

                        .t${id} > ul > li > ul {
                            counter-reset: level2;
                        }

                        .t${id} > ul > li > ul > li {
                            counter-increment: level2;
                        }

                        .t${id} > ul > li > ul > li:before {
                            content: counter(level1) "." counter(level2) " ";
                        }

                        .t${id} > ul > li > ul > li > ul {
                            counter-reset: level3;
                        }

                        .t${id} > ul > li > ul > li > ul > li {
                            counter-increment: level3;
                        }

                        .t${id} > ul > li > ul > li > ul > li:before {
                            content: counter(level1) "." counter(level2) "." counter(level3) " ";
                        }

                        .t${id} > ul > li > ul > li > ul > li > ul {
                            counter-reset: level4;
                        }

                        .t${id} > ul > li > ul > li > ul > li > ul > li {
                            counter-increment: level4;
                        }

                        .t${id} > ul > li > ul > li > ul > li > ul > li:before {
                            content: counter(level1) "." counter(level2) "." counter(level3) "." counter(level4) " ";
                        }

                    `;
                }

                else if (options.style === "arrows") {
                    cssContent += `
                        .t${id} ul {
                            list-style-type:disclosure-closed;
                            margin-top:10px;
                            margin-bottom:10px;
                        }

                        .t${id} > ul {
                            margin-top:0;
                            margin-bottom:0;
                        }

                        .t${id} ul li {
                            margin-bottom:10px;
                        }

                        .t${id} ul li a {
                            text-decoration:none;
                        }

                    `;
                }


                

                let styleElement = $('#' + styleID);
                if (styleElement.length) {
                    styleElement.html(cssContent);
                } else {
                    $('body').append('<style id="' + styleID + '">' + cssContent + '</style>');
                }


            }


            return this;
        },

    });
});

} catch (error) { console.log(error); }

try {
transform.OnReady(function()
{
    this.anims =  [
        {value: 'none', title: 'None'},
        {value: 'fade', title: 'Fade'},
    ];

    this.bars = [
        {value: 'none', title: 'None'},
        {value: 'horizontal', title: 'Horizontal'},
        {value: 'vertical', title: 'Vertical'},
    ];

    let tabs = {};
    let callbacks = [];
    let intervals = {};

    $(window).on('scroll', () => 
    {
        callbacks.forEach((callback) =>
        {
            callback();
        });
    });

    $(document).on('dh/pages/unload', (event, page) =>
    {
        callbacks = [];
        intervals = {}
    });


    transform.ItemAdd({
        id: 'tabs',
        name: 'Tabs',
        options: {
            a: {'label': 'Opened Tab', 'type': 'INPUT', 'value': '1'},
            b: {'label': 'Animation', 'type': 'SELECT', 'values': this.anims, 'value': 'fade'},
            c: {'label': 'Duration (ms)', 'type': 'INPUT', 'value': 250},

            f: {'label': 'Prev Class', 'type': 'INPUT', 'value': '', 'group': "Navigation (Arrows)"},
            e: {'label': 'Next Class', 'type': 'INPUT', 'value': '', 'group': "Navigation (Arrows)"},

            aa: {'label': 'Enable', 'type': 'TOGGLE', 'value': false, 'group': "Autoplay"},
            ab: {'label': 'Delay (s)', 'type': 'INPUT', 'value': 5, 'group': "Autoplay"},
            ac: {'label': 'Disable on Interaction', 'type': 'TOGGLE', 'value': false, 'group': "Autoplay"},
            ad: {'label': 'Progress Bar', 'type': 'SELECT', 'values': this.bars, 'value': 'none', 'group': "Autoplay"},
            ae: {'label': 'Progress Bar Color', 'type': 'INPUT', 'value': "#000", 'group': "Autoplay"},
        },

        code: function(transform, tag, target, options, data, index)
        {

            if(data.mode === 'builder') {
                options.aa = false;
                options.b = "none";
            } 


            this.init = (bind, num) =>
            {

                this.setTabsDefaults(target, options);
                this.render();

                if (options.aa) {
                    this.autoplayStart(target);
                  
                    callbacks.push(() => {
                        this.autoplayStart(target);
                    }); 
                }

                if(data.mode === 'website')
                {
                    this.navigation(target);
                    this.click(target);
                }
            };

            this.render = () =>
            {
               
                let initTab = options.a;
                if (!initTab) {initTab = 1;}
                if (initTab === "*" && data.mode === "builder") {
                    return;
                }

                initTab = isNaN(parseInt(initTab)) ? 1 : parseInt(initTab);
                target.children().eq(1).children().hide();

                this.openTab(target, initTab - 1, false); 
            };

            /* DEFAULTS */
            this.setTabsDefaults = (target, options) => {
                let microtime = new Date().getTime(); 
                let randomNum = Math.floor(Math.random() * 10000); 
                let uniqueId = microtime + '_' + randomNum; 
                let className = "dh-tabs_"+uniqueId;
                $(target).addClass(className);
                $(target).attr("data-transform","tabs");
                $(target).attr("data-tabs-class", className);
                tabs[className] = {target, options};
            }


            /* ACTIONS */
            this.click = (target) =>
            {
               let transform = this;
                target.children().first().children().click(function()
                {
                    if ($(this).hasClass('dh-active')) {
                        return;
                    }

                    transform.openTab(target, $(this).index());
                });
            };

            this.openTab = (target, index, userClick = true) =>
            {   
                let tabs_id = $(target).attr("data-tabs-class");
                let options = tabs[tabs_id].options;

                /* reset autoplay if user clicks on tab, disable */
                if (options.aa && userClick) {
                    this.resetAutoplay(userClick && options.ac, target);
                }
             
                /* Set active to navigation */  
                target.children().first().children().removeClass('dh-active');        
                setTimeout(function(){
                    target.children().first().children().eq(index).addClass('dh-active');
                }, 1)

                /* Open tab content with index */
                switch (options.b)
                {
                    case 'fade':
                        this.animationFade(target, index);
                        break;
                    default:
                        this.animationNone(target, index);
                        break;
                }
            }

            /* ANIMATIONS */
            this.animationNone = (target, index) =>
            {
                let active = target.children().eq(1).find('> .dh-active');
                let content = target.children().eq(1).children().eq(index);
                active.hide();
                content.show();
                
                target.children().eq(1).find('> .dh-active').removeClass('dh-active');
                target.children().eq(1).children().eq(index).addClass('dh-active');
            };

            this.animationFade = (target, index) =>
            {
                let active = target.children().eq(1).find('> .dh-active');
                let content = target.children().eq(1).children().eq(index);

                $(active).hide();
                $(content).fadeIn();

                target.children().eq(1).find('> .dh-active').removeClass('dh-active');
                target.children().eq(1).children().eq(index).addClass('dh-active');
            };




            /* AUTOPLAY */
            this.autoplay = (target) => {

                let tabs_id = $(target).attr("data-tabs-class");
                let options = tabs[tabs_id].options;
                let transform = this;
                let totalTabs = target.children().first().children().length;
            
                intervals[tabs_id] = setInterval(() => {
                    let currentIndex = target.children().first().find('> .dh-active').index();
                    let nextIndex = (currentIndex + 1) % totalTabs;
                    transform.openTab(target, nextIndex, false);
                }, options.ab * 1000);
            };


            this.autoplayStart = (target) => {
                let isLoaded = $(target).attr("data-tabs-loaded");
                if (!isLoaded && this.inViewport(target)) {
                    $(target).attr("data-tabs-loaded", "true");
                    
                    let activeNav = $(target).children().first().find(".dh-active");
                    $(activeNav).removeClass('dh-active');  
                    setTimeout(()=> {
                       $(activeNav).addClass('dh-active');    
                    }, 1)  
                    this.autoplay(target);
                    this.progressBar(target);
                } 
            }

            this.resetAutoplay = (disableOnInteraction, target) => {

                let tab_name = $(target).attr("data-tabs-class");
                clearInterval(intervals[tab_name]);
                intervals[tab_name] = null;

                if (!disableOnInteraction) {
                    this.autoplay(target);
                } else {
                    this.stopProgressBar(target);
                }  
            };

            this.inViewport = (target) => {
                let rect = target[0].getBoundingClientRect();
                return rect.bottom > 0 &&
                    rect.right > 0 &&
                    rect.left < (window.innerWidth || document.documentElement.clientWidth) &&
                    rect.top < (window.innerHeight || document.documentElement.clientHeight);
            }


            /* AUTOPLAY PROGRESS BAR */

            this.progressBar = (target) => {

                let tab_id = $(target).attr("data-tabs-class");
                let options = tabs[tab_id].options;


                if (options.ad === "none") { return; }
                if (!target.children().first().find('> *').find(".progress-bar").length) { 
                    let message =  `Div with the class "progress-bar" inside tabs doesnt exist.`;
                    mdBugs.ItemAdd({message}); 
                    return; 
                }

                let css = "width:0%;height:100%;";
                let cssSide = "width";
                if ( options.ad === "vertical") {
                    css = "height:0%;width:100%;";
                    cssSide = "height";
                }

                let line_color = options.ae;
                let progress_line = `<div style="background:${line_color}; position:absolute;left:0;top:0;${css}"></div>`
                target.children().first().find('> *').find(".progress-bar").append(progress_line);

                if ( !options.aa  ) { options.ab = "0";}
                let style = `
                    <style id="style-dh-tabs-progressBar">
                        .${tab_id} .dh-active .progress-bar > div {
                            ${cssSide}: 100%!important;
                            transition:${options.ab}s all cubic-bezier(.25, .46, .45, .94);
                        }
                    </style>
                `;
                $(target).append(style);
            }


            this.stopProgressBar = (target) => {

                let tab_id = $(target).attr("data-tabs-class");
                let options = tabs[tab_id].options;

                let cssSide = "width";
                if ( options.ad === "vertical") {
                    cssSide = "height";
                }

                $(target).find("#style-dh-tabs-progressBar").remove();
                let style = `
                    <style id="style-dh-tabs-progressBar">
                        .${tab_id} .dh-active .progress-bar > div {
                            ${cssSide}: 100%!important;
                            transition:0s all cubic-bezier(.25, .46, .45, .94);
                        }
                    </style>
                `;
                $(target).append(style);
            }


            /* NAVIGATION */
            this.navigation = (target) =>
            {
                /* Prev */
                if(options.f.length)
                {
                    
                    let hold_target = target;
                    let transform = this;
                    $(target).find('.' + options.f).on("click", function(){
                        let total = $(this).closest("[data-transform='tabs']").find(">*").first().find(">*").length - 1;
                        let current = $(this).closest("[data-transform='tabs']").find(">*").first().find('> .dh-active').index();
                        let prev = current - 1;
                        if (prev < 0) {
                            prev = total;
                        }

                        transform.openTab(hold_target, prev, true);
                    });
                }

                /* Next */
                if(options.e.length)
                {
                    let hold_target = target;
                    let transform = this;
                    $(target).find('.' + options.e).on("click", function(){
                        
                        let total = $(this).closest("[data-transform='tabs']").find(">*").first().find(">*").length - 1;
                        let current = $(this).closest("[data-transform='tabs']").find(">*").first().find('> .dh-active').index();

                        let next = current + 1;
                        if (next > total) {
                            next = 0;
                        }

                        transform.openTab(hold_target, next, true);
                    });
                }
            };

            return this;
        }
    });
});
} catch (error) { console.log(error); }

try {
transform.OnReady(function()
{

    this.ratios =  
    [
        {value: '42.85%', title: '21:9'},
        {value: '56.25%', title: '16:9'},
        {value: '62.25%', title: '16:10'},
        {value: '75%', title: '4:3'},
        {value: '66.66%', title: '3:2'},
        {value: '100%', title: '1:1'},
        {value: '177%', title: '9:16'},
        {value: '160%', title: '10:16'},
        {value: '133%', title: '3:4'}
    ];


    transform.ItemAdd({
        id: 'youtube',
        name: 'Youtube Embed',
        options: {
            a: {'label': 'Video URL', 'type': 'INPUT', 'value': ''},
            b: {'label': 'Aspect Ratio', 'type': 'SELECT', 'values': this.ratios, 'value': '56.25%'},
            c: {'label': 'Autoplay', 'type': 'TOGGLE', 'value': false},
            d: {'label': 'Loop', 'type': 'TOGGLE', 'value': false},
            e: {'label': 'Muted', 'type': 'TOGGLE', 'value': false},
            f: {'label': 'Controls', 'type': 'TOGGLE', 'value': true},
            g: {'label': 'YT Branding', 'type': 'TOGGLE', 'value': true},

            pa: {'label': 'Enable Poster', 'type': 'TOGGLE', 'value': false, 'group': 'Poster'},
            pb: {'label': 'Poster', 'type': 'FILE', 'value': '', 'group': 'Poster'},
            pc: {'label': 'Button', 'type': 'FILE', 'value': 'https://global.divhunt.com/0d33d1a9aa0053533261839b312bbf40_552.svg', 'group': 'Poster'},
            pd: {'label': 'Button Class', 'type': 'INPUT', 'value': '', 'group': 'Poster'},
            pe: {'label': 'Play in Popup', 'type': 'TOGGLE', 'value': false, 'group': 'Poster'},

            eh: {'label': 'Start (mm:ss)', 'type': 'INPUT', 'value': '00:00', 'group': 'Extras'},
            ei: {'label': 'End (mm:ss)', 'type': 'INPUT', 'value': '', 'group': 'Extras'},
            ea: {'label': 'Fullscreen Button', 'type': 'TOGGLE', 'value': true, 'group': 'Extras'},
            eb: {'label': 'Force 1080p', 'type': 'TOGGLE', 'value': false, 'group': 'Extras'},
            ec: {'label': 'Progress Bar', 'type': 'SELECT', 'values': [ {value: 'red', title: 'Red'}, {value: 'white', title: 'White'} ], 'value': 'red', 'group': 'Extras'},
        },
        
        code: function(transform, tag, target, options, data, index)
        {

            let isBuilder = data.mode === "builder";

            this.init = () =>
            {
                let params = this.getParams();
                let videoId = this.getVideoID();
                let src = `https://www.youtube.com/embed/${videoId}?${params}`

               
                let html = "";
                if (options.pa ) {
                    html = this.createPoster(src);
                } else {
                    html = plugins.Render('youtube_embed.video', {options, src, isBuilder: String(isBuilder) }); 
                }
                
                $(target).append(html);

                if (data.mode === "website") {this.click();}
            }


            this.getVideoID = () => 
            {
                let src = options.a;
                if (!src) {return "";}
                var videoID = src.match(/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/|user\/[^\/]+\/[^\/]+\/))([^\?&\/\s]{11})/)[1];
                return videoID;
            };

            this.getParams = () => {
                
                 const {
                    eh = '00:00',
                    ei = '',
                    c,
                    d,
                    e,
                    f,
                    ea,
                    eb,
                    ec,
                    g
                } = options;

                const convertToSeconds = (time) => {
                    const [minutes, seconds] = time.split(':').map(Number);
                    return minutes * 60 + seconds;
                };

                const data = {
                    autoplay: c ,
                    loop: d,
                    mute: e,
                    controls: f,
                    start: convertToSeconds(eh),
                    end: convertToSeconds(ei),
                    fs: ea,
                    vq: eb,
                    color: ec,
                    modestbranding: g,
                    showinfo: g,
                };

                const params = new URLSearchParams();

                Object.entries(data).forEach(([key, value]) => {
                    switch (key) {
                        case 'autoplay':
                        case 'loop':
                        case 'mute':
                        case 'controls':
                        case 'fs':
                        case 'vq':
                            params.set(key, value ? '1' : '0');
                            break;
                        case 'start':
                        case 'end':
                            if (value) {
                                params.set(key, value);
                            }
                            break;
                        case 'color':
                            params.set(key, value);
                            break;
                        default:
                            break;
                    }
                });

                if (data.loop) {
                    params.set('playlist', this.getVideoID());
                }

                return params.toString();
            }

            this.createPoster = (src) => {

                let playButton = options.pc;
                let playButtonClass = options.pd;
                
                if (!playButtonClass) {
                    playButtonClass = "plugin_youtube-embed_play-button";
                }

                let buttonType = "popup" ;
                if (!options.pe) {
                    buttonType = "regular";
                }

                let pointer_css = "";
                if ( isBuilder ) {
                    pointer_css = "pointer-events:none";
                }

                let html = `
                    <div style="position:relative; height:0px; padding-bottom:${options.b}; ${pointer_css}">
                        <img
                            style="position:absolute; left:0; top:0; width: 100%; height: 100%; object-fit:cover;z-index:4"
                            src="${options.pb}"
                        >
                        <img 
                            class="js-youtube_embed-play ${playButtonClass}" data-play-type="${buttonType}"
                            src="${playButton}"
                            style="z-index:5"
                            data-aspect-ratio="${options.b}"
                            data-video-src="${src}"
                            data-is-builder="${isBuilder}"
                        >
                    </div>
                `;
                return html;
            }

            this.click = () => {

                $(target).find(".js-youtube_embed-play").on("click", function(){

                    let isBuilder = $(this).attr("data-is-builder");
                    let res = $(this).attr("data-aspect-ratio");
                    let src = $(this).attr("data-video-src");
                    let options = {
                        b:res
                    };

                    let type = $(this).attr("data-play-type");

                    src = src.replace("autoplay=0","autoplay=1");
                    if (!src.includes("autoplay=1")) {
                        src+= "&autoplay=1";
                    }

                    if (type === "popup") {
                        let html = plugins.Render('youtube_embed.video', {options, src, isBuilder});
                        mdModal.ItemAdd({
                            id: 'youtube_embed-popup',
                            overlay: {opacity: 0.6, closeable: true},
                            align: {x: 'center', y: 'center'},
                            element: $('#dh-modal'),
                            html: function()
                            {
                                return `<div style="width:100vw; max-width:900px"> ${html} </div>`;
                            }
                        });
                    } else if (type === "regular") {
                        let html = plugins.Render('youtube_embed.video', {options, src, isBuilder, onlyIframe:true});
                        $(this).parent().append(html);
                        $(this).parent().find(">img").fadeOut();
                    }
                });



            }

 
            return this;
        },
        
    });
});
} catch (error) { console.log(error); }

try {
plugins.RenderCreate('youtube_embed.video', function(content, data, tag, a,b){

    let options = data('options', {});
    let src = data('src', '');
    let onlyIframe = data('onlyIframe', false);
    let isBuilder = data('isBuilder', 'true');
    let pointer_css = `pointer-events:none;`
    
    if (isBuilder === "false") {
        pointer_css = "";
    }

    let iframe = `
        <iframe
            style="position:absolute; left:0; top:0; width: 100%; height: 100%;"
            src="${src}" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen
        >
        </iframe>
    `;

    if (onlyIframe) {
        return iframe;
    }

    return `
        <div style="width:100%; height:0px; position:relative; padding-bottom:${options.b}; ${pointer_css}">
            ${iframe}
        </div>
    `;
});
} catch (error) { console.log(error); }

