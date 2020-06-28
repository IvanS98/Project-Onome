function securdude_movementstatus() {
    $.ajax({
        url: '/OnomeWeb/resources/scripts/status/alarm/movement_status.php',
        success: function (data) {
            $('#securdude_movementstatus').html(data);
        },
    });
}

$(document).ready(function () {
	securdude_movementstatus();
    setInterval(securdude_movementstatus, 5000);
});