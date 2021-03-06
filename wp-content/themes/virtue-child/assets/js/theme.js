// Categories Drop Down
/* ------------------------------------------------------------------------ */
var button = document.querySelectorAll('.categories_list .first-item');
if (button !== null) {
    button.forEach(function (item, i, arr) {
        item.onclick = function () {
            this.classList.toggle("active");
        };
    });
}
// Accordion List
/* ------------------------------------------------------------------------ */
var acc = document.querySelectorAll("#accordion-list .panel-item");
var i;
if (acc.length > 0) {
    for (i = 0; i < acc.length; i++) {
        acc[i].onclick = function () {
            var active = document.querySelector('#accordion-list .panel-item.active');
            this.classList.toggle("active");
            if (active != null) {
                if (active.classList.contains('active')) {
                    active.classList.remove("active");
                }
            }

        }
    }
}

// ZIP Code Validatio
/* ------------------------------------------------------------------------ */
function validCode(Zip) {
    var regPostcode = /^\d{4}$/,
        $boolen = true;

    if (regPostcode.test(Zip) == false) {
        $boolen = false;
    }
    return $boolen;
}

jQuery(function ($) {
    // Remove nbsp
    /* ------------------------------------------------------------------------ */
    $('.entry-content .visual-form-builder').html(function(i,h){
        return h.replace(/&nbsp;/g,'');
    });

    // Formstyler
    /* ------------------------------------------------------------------------ */
    $('.visual-form-builder input').styler();

    // Sidebar Form
    /* ------------------------------------------------------------------------ */
    var $select = $('.sidebar-form .select-product');
    if ($select.length > 0) {
        var $link = $('.sidebar-form .continue-step');
        $select.change(function () {
            $link.attr("href", $(this).val());
        })
    }

    // Check Post Code
    /* ------------------------------------------------------------------------ */
    $("#contact-form-7").submit(function (event) {
        var $field = $('input.postcode'),
            error = '<label class="vfb-error zip-valid">Please use a valid zip code.</label>',
            $checkError = $('.zip-valid');

        if (validCode($field.val()) == false) {
            if ($checkError.length == 0) {
                $field.after(error);
            }
            return false;
        }

        if (validCode($field.val()) == true) {
            if ($checkError.length > 0) {
                $checkError.remove();
            }
        }
    });

    // Slick
    /* ------------------------------------------------------------------------ */
    $('#menu-main-menu').slicknav();

    // ==== Responsive ====
    function responsive_func() {
        if ($(window).width() < 767) {
            //==== Footer Menu ====
            $('footer .dropdown').each(function () {
                var $tis = $(this).find('h3');
                var answer = $(this).find('ul').slideUp();
                if (!$tis.hasClass('processed')) {
                    $tis.click(function () {
                        if ($(window).width() < 975) {
                            answer.slideToggle();
                            $tis.toggleClass('active');
                        }
                    });
                    $tis.addClass('processed');
                }

            });
        } else {
            //==== Footer Menu ====
            $('footer .dropdown ul').show();
        }
    }
    responsive_func();
    $(window).resize(function () {
        responsive_func();
    });
});