(function () {
    var scrollify = $.scrollify;
    var isMobileSize;
    var currentPage=1;
    var createScroll = function(){
        $.scrollify({
            section : ".hero__slide",
            standardScrollElements: ".standard-scroll",
            setHeights: false,
            before: function(index){
                var pageNumber = document.getElementById("heroPageNumber");
                pageNumber.innerText = '0'+(index+1);
            },
            afterResize: function(){
                var currentMobileSize = checkIfMobile();
                if( currentMobileSize && !isMobileSize){
                    scrollify.disable();
                    isMobileSize = true;
                }
                else if( !currentMobileSize && isMobileSize){
                    scrollify.enable();
                    isMobileSize = false;
                }

            }
        });

        if(isMobileSize){
            scrollify.disable();
            scrollify.update();
        }

        var controller = new ScrollMagic.Controller();
        var secondPageScene = new ScrollMagic.Scene({
            offset: -window.innerHeight + window.innerHeight/2,
            triggerElement: "#heroSlide2", // point of execution
            duration: window.innerHeight, // pin element for the window height - 1
            triggerHook: 0, // don't trigger until #pinned-trigger1 hits the top of the viewport
            reverse: true // allows the effect to trigger when scrolled in the reverse direction
        })
            .setClassToggle("#heroIndicator", "hero__indicator__bar--66")
            .addTo(controller);
        
        var thirdPageScene = new ScrollMagic.Scene({
            triggerElement: "#heroSlide3",
            offset: -window.innerHeight + window.innerHeight/2,
            triggerHook: 0, 
            reverse: true
        })
            .setClassToggle("#heroIndicator", "hero__indicator__bar--100")
            .addTo(controller);
        
        var hiddenIndicatorScene = new ScrollMagic.Scene({
            triggerElement: "#heroSlide3", 
            offset: 50,
            triggerHook: 0,
            reverse: true
        })
            .setClassToggle("#heroIndicator", "hidden")
            .addTo(controller);
    
        var menuScene = new ScrollMagic.Scene({
            triggerElement: "#heroSlide3",
            offset: 50,
            triggerHook: 0,
            reverse: true
        })
            .setClassToggle("#header", "header--scrolled")
            .addTo(controller);
    };
    var checkIfMobile = function(){
        return window.innerWidth < 1024;
    }
    var section2Button = function(){

        $('.hero__slide--disciplines__subsection__trigger').click(function(event){
            $(".hero__slide--disciplines__subsection--active").removeClass("hero__slide--disciplines__subsection--active");
            $(this).parent().addClass("hero__slide--disciplines__subsection--active");
        })
    }
    var initCarouselPagination = function(){
        $('.rgn-put-work__body__info__pagination__page').click(function(){
            var button = $(this);
            var page = button.data('page');
            if(currentPage != page){
                currentPage = page;
                document.getElementById("ourWorkSlides").className = "rgn-out-work__body__info__slides rgn-out-work__body__info__slides--"+page;
                $('.rgn-put-work__body__info__pagination__page--active').removeClass('rgn-put-work__body__info__pagination__page--active');
                button.addClass('rgn-put-work__body__info__pagination__page--active');
            }
        })
    }

    if( !window.isMobileAndTablet() ){
        isMobileSize = checkIfMobile();
        createScroll();
        section2Button();
    }
    else{
        createMobileScroll();
    }

    
    initCarouselPagination();
})();
