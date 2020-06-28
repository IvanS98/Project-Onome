function hum_overview() {
    $.ajax({
        url: '/OnomeWeb/resources/scripts/status/temphum/hum_overview.php',
        success: function (data) {
            $('#onomecpl_humidity_overview').html(data);
        },
    });
}

$(document).ready(function () {
	hum_overview();
    setInterval(hum_overview, 60000);
});