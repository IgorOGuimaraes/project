$(window).on('load',function () {
    $(".loading-pre").fadeOut("fast", function () {
        $(this).remove()
        $('#load-header').fadeIn('fast');
        $('#load-main').fadeIn('fast');
    })
});