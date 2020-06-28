$(document).on('keypress', function(e) {
    var sdauth_key = $('#securdude_auth_input').val();
    if ( e.which === 13) 
        if (sdauth_key == 's3curdud3') {
           $('#sderror_nomatch').hide();
        $('#sderror_nofill').hide();
            $.get('/OnomeWeb/resources/scripts/securdude/alarm_trigger.php', function (data) {
        });
            $(location).attr('href', 'http://192.168.2.25/OnomeWeb/security/')
        }
    if (sdauth_key == '') {
        $('#sderror_nofill').show();
        $('#sderror_nomatch').hide();
    }
    else {
        $('#sderror_nomatch').show();
        $('#sderror_nofill').hide();
    }
});