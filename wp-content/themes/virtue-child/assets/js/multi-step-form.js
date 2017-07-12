jQuery(document).ready(function ($) {

    /* ========== Form ==========*/
    $('#order-form').fadeIn('slow');
    var current = 1,
        $fieldset = $("#order-form fieldset"),
        steps = $fieldset.length - 1;

    /*========= Button Group ==========*/
    var $buttonGroup = '<div class="button-group"> <button type="button" class="btn btn-next">Next</button> <button type="button" class="btn btn-previous">Previous</button> </div>';

    $fieldset.each(function (e) {
        if ($(this).hasClass('last-child')) {
            return;
        }
        $(this).append($buttonGroup);
    });


    /*========= Next Step ==========*/
    $('#order-form .btn-next').on('click', function () {
        var parent_fieldset = $(this).parents('fieldset'),
            $radioInput = parent_fieldset.find('input:radio'),
            next_step = true,
            $errorMessage = '<span class="error-message">Please provide an answer.</span>',
            error = $('.error-message');

        if (($radioInput.length > 0) && (!$radioInput.is(':checked'))) {
            next_step = false;
        }

        parent_fieldset.find('input').each(function () {

            /*========= ZIP Code Validation ========= */
            if ($(this).hasClass('postcode')) {
                if (validCode($(this).val()) == false) {
                    $errorMessage = '<span class="error-message">Please use a valid zip code.</span>';
                    next_step = false;
                }
            }

            if ($(this).val() == "") {
                next_step = false;
            }
        });

        if (!next_step) {
            if (error.length == 0) {
                parent_fieldset.find('label.vfb-desc').append($errorMessage);
            }
        }
        else {
            if (error.length > 0) {
                error.remove();
            }
            parent_fieldset.fadeOut(400, function () {
                $(this).next().fadeIn();
            });
            setProgressBar(++current);
        }
    });

    /*========= Previous Step ==========*/
    $('#order-form .btn-previous').on('click', function () {
        $(this).parents('fieldset').fadeOut(400, function () {
            $(this).prev().fadeIn();
        });
        setProgressBar(--current);
    });

    setProgressBar(current);

    /*========= Change progress bar action ==========*/
    function setProgressBar(curStep) {
        if (steps == curStep) {
            $('#order-form .vfb-item-submit').addClass('active');
        } else {
            $('#order-form .vfb-item-submit').removeClass('active');
        }

        if (curStep == 2) {
            $(".progress").fadeIn();
        }
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
            .html(percent + "%");
    }
});