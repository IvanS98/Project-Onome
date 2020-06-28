function pwrdevices_overview() {
    $.ajax({
        url: '/OnomeWeb/resources/scripts/status/powered_devices/powered_devices_status.php',
        success: function (data) {
            $('#onomecpl_pwrdevices_overview').html(data);
        },
    });
}

function showSecurDudeIcon() {
    $.ajax({
        url: '/OnomeWeb/resources/data/tmp/onomeSecurDudeOn',
        success: function () {
                $('#onomeSecurDudeIcon').show();
        },
        error: function () {
            $('#onomeSecurDudeIcon').hide();
        },
    });
}

function showAutoLightsIcon() {
    $.ajax({
        url: '/OnomeWeb/resources/data/tmp/onomeAutoLightsOn',
        success: function () {
                $('#onomeAutoLightsIcon').show();
        },
        error: function () {
            $('#onomeAutoLightsIcon').hide();
        },
    });
}

$(document).ready(function () {
	pwrdevices_overview();
    showSecurDudeIcon();
    showAutoLightsIcon();
    setInterval(pwrdevices_overview, 5000);
    setInterval(showSecurDudeIcon, 5000);
    setInterval(showAutoLightsIcon, 5000);
});