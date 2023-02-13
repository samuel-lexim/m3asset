(function ($) {

    function svgInit() {
        $('img[src$=".svg"]').each(function () {
            let $img = $(this);
            let imgID = $img.attr('id');
            let imgClass = $img.attr('class');
            let imgURL = $img.attr('src');
            $.get(imgURL, function (data) {
                // Get the SVG tag, ignore the rest
                let $svg = $(data).find('svg');
                // Get Class name
                let $svgClass = $svg.attr('class') ? $svg.attr('class') : '';
                // Add replaced image's ID to the new SVG
                if (typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                // Add replaced image's classes to the new SVG
                if (typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass + ' ' + $svgClass + ' replaced-svg');
                }
                // Remove any invalid XML tags as per http://validator.w3.org
                $svg.removeAttr('xmlns:a');
                // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
                if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                    $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'));
                }
                // Replace image with new SVG
                $img.replaceWith($svg);
            }, 'xml');
        });
    }

    svgInit(); // Convert img to svg


    $(document).ready(function () {
        // Start - Header
        $('#NavMenuButton').click(function (e, i) {
            let parent = $(this).parent();

            if (parent.hasClass('open')) {
                $('.site-header').removeClass('open');
                $('body').removeClass('menuIsOpened');
                parent.removeClass('open');
            } else {
                $('.site-header').addClass('open');
                $('body').addClass('menuIsOpened');
                parent.addClass('open');
            }
        });
        // End - Header

        // Home Slider section (full width) - Slick
        $('.slider_section_slick').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            dots: true,
            arrows: false,
            fade: true,
            adaptiveHeight: true
        });

        // Home Slider section (2 columns) - Slick
        $('.slider_2cols_section_slick').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            dots: true,
            arrows: false,
            fade: true,
            adaptiveHeight: false
        });

        // START - Page section script
        let pageSection = {
            selector: {
                'boxGridSection_ReadMoreButton' : '.box_grid_section ._readMoreButton',
                'boxGridSection_PopUpCloseButton': '.box_grid_section ._xClosePopup',
                'boxPopUpHeading': '.box_grid_popup_section ._box_item_content_heading',
                'boxPopUpCloseButton': '.box_grid_popup_section ._xClosePopup',
            },

            init: function () {
                this.boxGridSection();
                this.boxGridPopupSection();
                this.mouseup();
                this.resize();
                this.pressEsc();
            },

            pressEsc: function () {
                let _this = this;
                $(document).keyup(function (e) {
                    // press esc
                    if (e.keyCode === 27) {
                        // close header
                        $('.nav-button-wrap').removeClass('open');
                        $('.site-header').removeClass('open');
                        $('body').removeClass('menuIsOpened');

                        // close popup
                        _this.boxGridSection_clearPopUp();
                    }
                });
            },

            boxGridSection: function () {
                let _this = this;
                $(_this.selector.boxGridSection_ReadMoreButton).click(function () {
                    let thisClick = $(this);
                    _this.boxGridSection_clearPopUp();
                    $('body').addClass("openLayer");
                    thisClick.addClass('activated');
                });

                $(_this.selector.boxGridSection_PopUpCloseButton).click(function () {
                    _this.boxGridSection_clearPopUp();
                });
            },

            boxGridSection_clearPopUp: function () {
                let _this = this;
                $(_this.selector.boxGridSection_ReadMoreButton).removeClass('activated');
                $('body').removeClass("openLayer");
            },

            boxGridPopupSection: function () {
                let _this = this;
                $(_this.selector.boxPopUpHeading).click(function () {
                    let thisClick = $(this);
                    _this.boxGridPopupSection_clearPopUp();
                    thisClick.addClass('activated');
                });

                $(_this.selector.boxPopUpCloseButton).click(function () {
                    _this.boxGridPopupSection_clearPopUp();
                });
            },

            boxGridPopupSection_clearPopUp: function () {
                let _this = this;
                $(_this.selector.boxPopUpHeading).removeClass('activated');
            },

            mouseup: function () {
                let _this = this;

                $(document).mouseup(function (e) {
                    // close popup when click outside the boxGridPopup
                    if ($(e.target).closest("._box_item_content_heading.activated + ._box_item_content_popup_wrap").length === 0) {
                        _this.boxGridPopupSection_clearPopUp();
                    }
                });
            },

            resize: function () {
                let _this = this;

                $(window).resize(function () {
                    let curWidth = $(window).width();
                    if (curWidth > 1366) {
                        _this.boxGridPopupSection_clearPopUp();
                    }
                });
            }
        }

        pageSection.init();
        // END - Page section script


    });

}(jQuery));
