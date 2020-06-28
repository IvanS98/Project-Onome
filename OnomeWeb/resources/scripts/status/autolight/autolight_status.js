function autolight_overview() {
    $.ajax({
        url: '/OnomeWeb/resources/scripts/status/autolight/autolight_status.php',
        success: function (data) {
            $('#onomecpl_autolight_overview').html(data);
        },
    });
}

$(document).ready(function () {
	autolight_overview();
    setInterval(autolight_overview, 5000);
});