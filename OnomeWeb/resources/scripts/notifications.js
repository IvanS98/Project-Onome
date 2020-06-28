function showSecurDudeAlert() {
    $.ajax({
        url: '/OnomeWeb/resources/data/tmp/onomeSecurDudeAlarmAlert',
        success: function () {
                $('#onomenotif_SecurDudeAlert').show();
        },
        error: function () {
            $('#onomenotif_SecurDudeAlert').hide();
        },
    });
}

function showDHT11OFRAlertLow() {
    $.ajax({
        url: '/OnomeWeb/resources/data/tmp/onomeDHT11OFRAlertLow',
        success: function () {
                $('#onomenotif_DHT11OFRAlertLow').show();
        },
        error: function () {
            $('#onomenotif_DHT11OFRAlertLow').hide();
        },
    });
}

function showDHT11OFRAlertHigh() {
    $.ajax({
        url: '/OnomeWeb/resources/data/tmp/onomeDHT11OFRAlertHigh',
        success: function () {
                $('#onomenotif_DHT11OFRAlertHigh').show();
        },
        error: function () {
            $('#onomenotif_DHT11OFRAlertHigh').hide();
        },
    });
}

function showDHT11Alert() {
    $.ajax({
        url: '/OnomeWeb/resources/data/tmp/onomeDHT11On',
        success: function () {
                $('#onomenotif_DHT11Unavailable').hide();
        },
        error: function () {
            $('#onomenotif_DHT11Unavailable').show();
        },
    });
}

$(document).ready(function () {
    showSecurDudeAlert();
    showDHT11OFRAlertHigh();
    showDHT11OFRAlertLow();
    showDHT11Alert();
    setInterval(showSecurDudeAlert, 5000);
    setInterval(showDHT11OFRAlertHigh, 5000);
    setInterval(showDHT11OFRAlertLow, 5000);
    setInterval(showDHT11Alert, 5000);
});