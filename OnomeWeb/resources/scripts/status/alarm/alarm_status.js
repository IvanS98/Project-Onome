function securdude_status() {
    $.ajax({
        url: '/OnomeWeb/resources/scripts/status/alarm/alarm_status.php',
        success: function (data) {
            $('#securdude_status').html(data);
        },
    });
}

$(document).ready(function () {
	securdude_status();
    setInterval(securdude_status, 2000);
});