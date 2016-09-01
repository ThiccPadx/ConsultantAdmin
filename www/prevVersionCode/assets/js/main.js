(function($){
/* =========================
    Functions init
   ========================= */
    $('document').ready(function(){
        /* -- Theme -- */

        /* -- Shortcodes -- */
//        init_scroll_up ();

        /* -- Vendor -- */
        init_daterangepicker();
//        timecirclesInit();
//        finalCowntdownInit();
//        init_number_input();
        init_input_mask();
//        init_country_select();
        init_form_validation();
//        init_scrolly();

        /* -- Bootstrap -- */
//        init_bootstrap_js();
//        init_confirmation();
    });

    $(window).bind('load', function() {
        parallaxInit();
    });

 /* =========================
     Shortcodes
     ---------------
     1. Scroll Up
     ========================= */
    function init_scroll_up () {
        $('#scroll_up').css({
            position: "fixed",
            right: "25px",
            "text-align": "center",
            height: "40px",
            width: "40px",
            overflow: "hidden",
            cursor: "pointer",
            transition: "all 0.7s ease-in-out 0s"
        });
        $(window).scroll(function () {
            if ($(this).scrollTop() > 1) {
                $('#scroll_up').css({bottom: "25px"});
            } else {
                $('#scroll_up').css({bottom: "-100px"});
            }
        });
        $('#scroll_up').click(function () {
            $('html, body').animate({scrollTop: '0px'}, 800);
            return false;
        });
    }

    /* =========================
       Vendors
       ---------------
       1. Daterangepicker
       2. Parallax
       3. Time Circles
       4. Final Countdown
       5. Number Input
       ========================= */

    /* -- 1. Daterangepicker -- */
    function init_daterangepicker() {
        $('.form-sngl-datepicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                cancelLabel: 'Отменить',
                applyLabel: 'Применить',
                format: 'DD-MM-YYYY',
                daysOfWeek: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт','Сб'],
                monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                firstDay: 1
            }
        });
        $('.form-sngl-datetimepicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            timePicker: true,
            "timePicker24Hour": true,
            locale: {
                cancelLabel: 'Отменить',
                applyLabel: 'Применить',
                format: 'DD-MM-YYYY H:mm',
                daysOfWeek: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт','Сб'],
                monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                firstDay: 1
            }
        });
        $('.form-daterangepicker').daterangepicker({
            showDropdowns: true,
            locale: {
                cancelLabel: 'Отменить',
                applyLabel: 'Применить',
                format: 'DD-MM-YYYY',
                daysOfWeek: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт','Сб'],
                monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                firstDay: 1
            }
        });
        $('.form-datetimerangepicker').daterangepicker({
            showDropdowns: true,
            timePicker: true,
            "timePicker24Hour": true,
            locale: {
                cancelLabel: 'Отменить',
                applyLabel: 'Применить',
                format: 'DD-MM-YYYY H:mm',
                daysOfWeek: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт','Сб'],
                monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                firstDay: 1
            }
        });
    }


    /* -- 2. Parallax -- */
    function parallaxInit() {
        $('.parallax .bg-parallax').parallax("0%", 0.3);
    }

    /* -- 3. Time Circles -- */
    function timecirclesInit() {
        $(".timecircle").TimeCircles();
    }

    /* -- 4. Final Countdown -- */
    function finalCowntdownInit() {
        var countdown = $('.final-countdown');
        var finalDate = countdown.attr('data-date');

        countdown.countdown(finalDate).on('update.countdown', function(event) {
            $(this).html(event.strftime('<div>%D <span>дней</span></div>' +
                '<div>%H <span>часов</span></div>' +
                '<div>%M <span>минут</span></div>' +
                '<div>%S <span>секунд</span></div>'));
        });
    }

    /* -- 4. Final Countdown -- */
    function init_number_input() {
        $('.form-number-input').bootstrapNumber();
    }

    /* -- 5. Input Mask -- */
    function init_input_mask() {
        $('.form-mask-phone').inputmask({
                mask: '+380 (99) 999-99-99'
            }
        );

        $('.form-mask-ptn').inputmask({
                mask: '9999/9999/9999'
            }
        );

        $('.form-mask-email').inputmask({
            mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
            greedy: false,
            onBeforePaste: function (pastedValue, opts) {
                pastedValue = pastedValue.toLowerCase();
                return pastedValue.replace("mailto:", "");
            },
            definitions: {
                '*': {
                    validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
                    cardinality: 1,
                    casing: "lower"
                }
            }
            }
        );
    }

    /* -- 6. Country select -- */
    function init_country_select() {
        $(".form-country-select").countrySelect({
            defaultCountry: "",
            //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
            preferredCountries: ['eg', 'tr', 'gr', 'th', 'ae', 'bg', 'lk', 'ua' ]
        });
    }

    /* -- 7. Form Validation -- */
    function init_form_validation() {
        $(".form-validated").validate();
    }

    /* -- 8. Scrolly -- */
    function init_scrolly() {

        $('#block-main-nav').scroolly([
            {
                to: 'con-top',
                css: {
                    position: 'absolute',
                    top: ''
                }
            },
            {
                from: 'con-top',
                css: {
                    position: 'fixed',
                    top: '0'
                }
            }
        ], $('#content'));

        $('.bg-parallax').scroolly([
            {
//                    from: 'doc-top',
                to: 'el-bottom = vp-top',
                cssFrom: {
//                        '-border-radius': '0px'
//                        'background-position': 'center 0px'
//                        'opacity': '1'
                },
                cssTo: {
//                        '-border-radius': '400px'
//                        'background-position': 'center 40%'
//                        'opacity': '.1'
                },
                onScroll: function(element, offset, length){
                    var progress = offset / length;

                    element.css('background-position', 'center '+$.scroolly.getTransitionFloatValue(100, 0, progress)+'%');
                }
            },
            {
                from: 'el-center = vp-top',
                to: 'el-bottom = vp-top',
                cssFrom: {
//                        'background-position': 'center 0px',
//                        'opacity': '1'
                },
                cssTo: {
//                        'background-position': 'center 200px',
//                        'opacity': '.1'
                }
            }
        ]);
    }

    /* =========================
        Bootstrap
       ---------------
        1. Tooltip
       ======================== */
    function init_bootstrap_js() {
        $('[data-toggle="tooltip"]').tooltip();
    }

    function init_confirmation() {
        $('[data-toggle="confirmation"]').confirmation({popout: true});
    }

})(jQuery);