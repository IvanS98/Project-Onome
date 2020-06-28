function temperature_overview() {
    $.ajax({
        url: '/OnomeWeb/resources/scripts/status/temphum/temp_overview.php',
        success: function (data) {
            $('#onomecpl_temperature_overview').html(data);
        },
    });
}

$(document).ready(function () {
	temperature_overview();
    setInterval(temperature_overview, 60000);
});