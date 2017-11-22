/**
Core script to handle the entire layout and base functions
**/
var App = function () {
 	
    // IE mode
    var isIE8 = false;
    var isIE9 = false;
    var isIE10 = false;
    var responsiveHandlers = [];

    //* BEGIN:CORE HANDLERS *//
    // this function handles responsive layout on screen size resize or mobile device rotate.
    var handleResponsive = function () {
        if ($.browser.msie && $.browser.version.substr(0, 1) == 8) {
            isIE8 = true; // detect IE8 version
        }

        if ($.browser.msie && $.browser.version.substr(0, 1) == 9) {
            isIE9 = true; // detect IE9 version
        }

        var isIE10 = !! navigator.userAgent.match(/MSIE 10/);

        if (isIE10) {
            $('html').addClass('ie10'); // detect IE10 version
        }

        // loops all page elements with "responsive" class and applies classes for tablet mode
        // For metornic  1280px or less set as tablet mode to display the content properly
        var _handleTabletElements = function () {
            if ($(window).width() <= 1280) {
                $(".responsive").each(function () {
                    var forTablet = $(this).attr('data-tablet');
                    var forDesktop = $(this).attr('data-desktop');
                    if (forTablet) {
                        $(this).removeClass(forDesktop);
                        $(this).addClass(forTablet);
                    }
                });
            }
        }

        // loops all page elements with "responsive" class and applied classes for desktop mode
        // For metornic  higher 1280px set as desktop mode to display the content properly
        var _handleDesktopElements = function () {
            if ($(window).width() > 1280) {
                $(".responsive").each(function () {
                    var forTablet = $(this).attr('data-tablet');
                    var forDesktop = $(this).attr('data-desktop');
                    if (forTablet) {
                        $(this).removeClass(forTablet);
                        $(this).addClass(forDesktop);
                    }
                });
            }
        }

        // remove sidebar toggler if window width smaller than 900(for table and phone mode)
        var _handleSidebar = function () {
            if ($(window).width() < 900) {
                $.cookie('sidebar-closed', null);
                $('#container').removeClass("sidebar-closed");
            }
        }

        // handle all elements which require to re-initialize on screen width change(on resize or on rotate mobile device)
        var handleElements = function () {
            // reinitialize core elements
            handleTooltip();
            _handleSidebar();
            _handleTabletElements();
            _handleDesktopElements();
            handleSidebarAndContentHeight();

            // reinitialize other subscribed elements
            for (var i in responsiveHandlers) {
                var each = responsiveHandlers[i];
                each.call();
            }
        }

        // handles responsive breakpoints.
        $(window).setBreakpoints({
            breakpoints: [320, 480, 768, 900, 1024, 1280]
        });

        $(window).bind('exitBreakpoint320', function () {
            handleElements();
        });
        $(window).bind('enterBreakpoint320', function () {
            handleElements();
        });

        $(window).bind('exitBreakpoint480', function () {
            handleElements();
        });
        $(window).bind('enterBreakpoint480', function () {
            handleElements();
        });

        $(window).bind('exitBreakpoint768', function () {
            handleElements();
        });
        $(window).bind('enterBreakpoint768', function () {
            handleElements();
        });

        $(window).bind('exitBreakpoint900', function () {
            handleElements();
        });
        $(window).bind('enterBreakpoint900', function () {
            handleElements();
        });

        $(window).bind('exitBreakpoint1024', function () {
            handleElements();
        });
        $(window).bind('enterBreakpoint1024', function () {
            handleElements();
        });

        $(window).bind('exitBreakpoint1280', function () {
            handleElements();
        });
        $(window).bind('enterBreakpoint1280', function () {
            handleElements();
        });
    }

    var handleSidebarAndContentHeight = function () {
        var content = $('#body');
        var sidebar = $('#sidebar');

        if (!content.attr("data-height")) {
            content.attr("data-height", content.height());
        }

        if (sidebar.height() > content.height()) {
            content.css("min-height", sidebar.height() + 20);
        } else {
            content.css("min-height", content.attr("data-height"));
        }
    }

    var handleSidebarMenu = function () {

        $('#sidebar .has-sub > a').click(function (e) {
            var last = $('.has-sub.open', $('#sidebar'));
            last.removeClass("open");
            $('.arrow', last).removeClass("open");
            $('.sub', last).slideUp(200);
            var sub = $(this).next();
            if (sub.is(":visible")) {
                $('.arrow', $(this)).removeClass("open");
                $(this).parent().removeClass("open");
                sub.slideUp(200, function () {
                    handleSidebarAndContentHeight(); 
                });
            } else {
                $('.arrow', $(this)).addClass("open");
                $(this).parent().addClass("open");
                sub.slideDown(200, function () {
                    handleSidebarAndContentHeight(); 
                });
            }
            e.preventDefault();
        });
    }

    var handleSidebarToggler = function () {
        if ($.cookie('sidebar-closed')) {
          $("#container").addClass("sidebar-closed");  
        } 
         $('.sidebar-toggler').click(function () {
            if ($("#container").hasClass("sidebar-closed") === false) {
                $("#container").addClass("sidebar-closed");
                $.cookie('sidebar-closed', 1);
            } else {
                $("#container").removeClass("sidebar-closed");
                $.cookie('sidebar-closed', null);
            }
            handleSidebarAndContentHeight();
        })
    }

    var handleGoTop = function () {
        /* set variables locally for increased performance */
        $('.footer .go-top').click(function (e) {
            App.scrollTo();
            e.preventDefault();
        });
    }

    var handleWidgetTools = function () {
        $('.widget .tools .icon-remove').click(function (e) {
            $(this).parents(".widget").parent().remove();
            e.preventDefault();
        });

        $('.widget .tools .icon-refresh').click(function (e) {
            var el = $(this).parents(".widget");
            App.blockUI(el);
            window.setTimeout(function () {
                App.unblockUI(el);
            }, 1000);
            e.preventDefault();
        });

        $('.widget .tools .icon-chevron-down, .widget .tools .icon-chevron-up').click(function (e) {
            var el = $(this).parents(".widget").children(".widget-body");
            if ($(this).hasClass("icon-chevron-down")) {
                $(this).removeClass("icon-chevron-down").addClass("icon-chevron-up");
                el.slideUp(200);
            } else {
                $(this).removeClass("icon-chevron-up").addClass("icon-chevron-down");
                el.slideDown(200);
            }
        });
    }

    var handleUniform = function () {
        if (!$().uniform) {
            return;
        }
        var test = $("input[type=checkbox]:not(.toggle), input[type=radio]:not(.toggle, .star)");
        if (test.size() > 0) {
            test.each(function(){
                if ($(this).parents(".checker").size() == 0) {
                    $(this).show();
                    $(this).uniform();
                }
            });
        }
    }

    var handleAccordions = function () {
        $(".accordion").collapse().height('auto');

        var lastClicked;

        //add scrollable class name if you need scrollable panes
        $('.accordion.scrollable .accordion-toggle').click(function () {
            lastClicked = $(this);
        }); //move to faq section

        $('.accordion.scrollable').on('shown', function () {
            $('html,body').animate({
                scrollTop: lastClicked.offset().top - 150
            }, 'slow');
        });
    }

    var handleScrollers = function () {

        $('.scroller').each(function () {
            $(this).slimScroll({
                size: '7px',
                color: '#a1b2bd',
                height: $(this).attr("data-height"),
                alwaysVisible: ($(this).attr("data-always-visible") == "1" ? true : false),
                railVisible: ($(this).attr("data-rail-visible") == "1" ? true : false),
                disableFadeOut: true
            });
        });
    }

    var handleTooltip = function () {
        if (App.isTouchDevice()) { // if touch device, some tooltips can be skipped in order to not conflict with click events
            $('.tooltips:not(.no-tooltip-on-touch-device)').tooltip();
        } else {
            $('.tooltips').tooltip();
        }
    }

    var handlePopover = function () {
        $('.popovers').popover();
    }

    var handleChoosenSelect = function () {
        if (!$().chosen) {
            return;
        }

        $(".chosen").each(function () {
            $(this).chosen({
                allow_single_deselect: $(this).attr("data-with-diselect") === "1" ? true : false
            });
        });
    }

    var handleFancybox = function () {
        if (!$.fancybox) {
            return;
        }

        if ($(".fancybox-button").size() > 0) {
            $(".fancybox-button").fancybox({
                groupAttr: 'data-rel',
                prevEffect: 'none',
                nextEffect: 'none',
                closeBtn: true,
                helpers: {
                    title: {
                        type: 'inside'
                    }
                }
            });
        }
    }

    var handleStyler = function () {

        var scrollHeight = '80px';

        $('#styler').click(function () {
            if ($(this).attr("opened") && !$(this).attr("opening") && !$(this).attr("closing")) {
                $(this).removeAttr("opened");
                $(this).attr("closing", "1");

                $("#styler").css("overflow", "hidden").animate({
                    width: '20px',
                    height: '22px',
                    'padding-top': '3px'
                }, {
                    complete: function () {
                        $(this).removeAttr("closing");
                        $("#styler .settings").hide();
                    }
                });
            } else if (!$(this).attr("closing") && !$(this).attr("opening")) {
                $(this).attr("opening", "1");
                $("#styler").css("overflow", "visible").animate({
                    width: '190px',
                    height: scrollHeight,
                    'padding-top': '10px'
                }, {
                    complete: function () {
                        $(this).removeAttr("opening");
                        $(this).attr("opened", 1);
                    }
                });
                $("#styler .settings").show();
            }
        });

        $('#styler .colors span').click(function () {
            var color = $(this).attr("data-style");
            setColor(color);
        });

        $('#styler .layout input').change(function () {
            setLayout();
        });

        var setColor = function (color) {
            $('#style_color').attr("href", "assets/css/themes/" + color + ".css");
        }

        var setLayout = function () {
            if ($('#styler .layout input.header').is(":checked")) {
                $("body").addClass("fixed-top");
                $("#header").addClass("navbar-fixed-top");
            } else {
                $("body").removeClass("fixed-top");
                $("#header").removeClass("navbar-fixed-top");
            }

            if ($('#styler .layout input.metro').is(":checked")) {
                $('#style_metro').attr("href", "assets/css/style-metro.css");
            } else {
                $('#style_metro').attr("href", "");
            }
        }

    }

    var handleFixInputPlaceholderForIE = function () {
        //fix html5 placeholder attribute for ie7 & ie8
        if ($.browser.msie && $.browser.version.substr(0, 1) <= 9) { // ie7&ie8

            // this is html5 placeholder fix for inputs, inputs with placeholder-no-fix class will be skipped(e.g: we need this for password fields)
            $('input[placeholder]:not(.placeholder-no-fix), textarea[placeholder]:not(.placeholder-no-fix)').each(function () {

                var input = $(this);

                $(input).addClass("placeholder").val(input.attr('placeholder'));

                $(input).focus(function () {
                    if (input.val() == input.attr('placeholder')) {
                        input.val('');
                    }
                });

                $(input).blur(function () {
                    if (input.val() == '' || input.val() == input.attr('placeholder')) {
                        input.val(input.attr('placeholder'));
                    }
                });
            });
        }
    }

    //* END:CORE HANDLERS *//

    return {

        //main function to initiate template pages
        init: function () {
            //core handlers
            handleResponsive(); // set and handle responsive
            handleUniform(); // handles uniform elements
            handleSidebarMenu(); // handles main menu
            handleSidebarToggler(); // handles sidebar hide/show
            handleScrollers(); // handles slim scrolling contents 
            handleWidgetTools(); // handles portlet action bar functionality(refresh, configure, toggle, remove)
            handleTooltip(); // handles bootstrap tooltips
            handlePopover(); // handles bootstrap popovers
            handleAccordions(); //handles accordions
            handleChoosenSelect(); // handles bootstrap chosen dropdowns
            handleFixInputPlaceholderForIE(); // fixes/enables html5 placeholder attribute for IE9, IE8
            handleGoTop(); //handles scroll to top functionality in the footer
            handleStyler(); // handles style customer tool
        },

        addResponsiveHandler: function (func) {
            responsiveHandlers.push(func);
        },

        // useful function to make equal height for contacts stand side by side
        setEqualHeight: function (els) {
            var tallestEl = 0;
            els = $(els);
            els.each(function () {
                var currentHeight = $(this).height();
                if (currentHeight > tallestEl) {
                    tallestColumn = currentHeight;
                }
            });
            els.height(tallestEl);
        },

        // wrapper function to scroll to an element
        scrollTo: function (el, offeset) {
            pos = el ? el.offset().top : 0;
            $('html,body').animate({
                scrollTop: pos + (offeset ? offeset : 0)
            }, 'slow');
        },

        
        Data: function(start, end){
        	$("#start_date").val(start);
        	$("#end_date").val(end);
        	
        	Response_Data( start, end );
        },
        // wrapper function to  block element(indicate loading)
        blockUI: function (el) {
            $(el).block({
                message: '<img src="./assets/img/loading.gif" align="absmiddle">',
                css: {
                    border: 'none',
                    padding: '2px',
                    backgroundColor: 'none'
                },
                overlayCSS: {
                    backgroundColor: '#000',
                    opacity: 0.05,
                    cursor: 'wait'
                }
            });
        },

        // wrapper function to  un-block element(finish loading)
        unblockUI: function (el) {
            $(el).unblock({
                onUnblock: function () {
                    $(el).removeAttr("style");
                }
            });
        },

        // initializes uniform elements
        initUniform: function (els) {

            if (els) {
                $(els).each(function () {
                    if ($(this).parents(".checker").size() == 0) {
                        $(this).show();
                        $(this).uniform();
                    }
                });
            } else {
                handleUniform();
            }

        },

        // initializes choosen dropdowns
        initChosenSelect: function (els) {
            $(els).chosen({
                allow_single_deselect: true
            });
        },

        initFancybox: function () {
            handleFancybox();
        },

        getActualVal: function (el) {
            var el = $(el);
            if (el.val() === el.attr("placeholder")) {
                return "";
            }

            return el.val();
        },

        getURLParameter: function (paramName) {
            var searchString = window.location.search.substring(1),
                i, val, params = searchString.split("&");

            for (i = 0; i < params.length; i++) {
                val = params[i].split("=");
                if (val[0] == paramName) {
                    return unescape(val[1]);
                }
            }
            return null;
        },

        // check for device touch support
        isTouchDevice: function () {
            try {
                document.createEvent("TouchEvent");
                return true;
            } catch (e) {
                return false;
            }
        },

        isIE8: function () {
            return isIE8;
        }

    };

}();


function Response_Data( start , end )
{
	
	if($.cookie('start') || $.cookie('end'))
	{
		$.removeCookie('start');
		$.removeCookie('end');
		
		$.cookie("start", start, {path: '/'});
		$.cookie("end", end, {path: '/'});
		
		window.location.reload();

	}else{
		$.cookie("start", start, {path: '/'});
		$.cookie("end", end, {path: '/'});
		window.location.reload();
	}

}