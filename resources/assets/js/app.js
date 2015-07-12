$(document).ready(function(){
    $('#login').click(function() {
        $('.timer-loader').show();
        window.location.href="/login";
    });
    var options = $('#options').val();
    $('#close').click(function() {
        document.location="pebblejs://close#"+options;
    });
});
