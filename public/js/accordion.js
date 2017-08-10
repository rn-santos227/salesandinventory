$(document).ready(function(e) {
    console.log($('#show').val());

    if($('#show').data('value') == 1) {
        showReceipt(e);
    }


    $('.accordion-section-title').click(function(e) {
        showReceipt(e);
    });

    function showReceipt(e) {
        var currentAttrValue = $('.accordion-section-title').attr('href');
        if($(e.target).is('.active')) {
            close_accordion_section();
        }else {
            close_accordion_section();

            // Add active class to section title
            $('.accordion-section-title').addClass('active');
            // Open up the hidden content panel
            $('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
        }    
    }

    function close_accordion_section() {
        $('.accordion .accordion-section-title').removeClass('active');
        $('.accordion .accordion-section-content').slideUp(300).removeClass('open');
    }
});