function welcome_overview() {
    $.ajax({
        url: '/OnomeWeb/resources/scripts/status/temphum/welcome_overview.php',
        success: function (data) {
            $('#onomecpl_welcome_overview').html(data);
        },
    });
}

$(document).ready(function () {
	welcome_overview();
    setInterval(welcome_overview, 60000);
});