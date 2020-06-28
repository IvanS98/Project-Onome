function securdude_stepstatus() {
    $.ajax({
        url: '/OnomeWeb/resources/scripts/status/alarm/step_status.php',
        success: function (data) {
            $('#securdude_stepstatus').html(data);
        },
    });
}

$(document).ready(function () {
	securdude_stepstatus();
    setInterval(securdude_stepstatus, 5000);
});