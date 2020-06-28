// Project Onome
// Working services configuration file
// (C) 2017-2018 Ivan Sollazzo. All rights reserved.


// Radio Frequency Identification Reader
function rfid_status() {
    $.ajax({
        url: '../../../OnomeWeb/resources/data/tmp/onomeRFIDAvailable',
        success: function () {
                $('#rfid_status').text("Service is online");
        },
        error: function () {
            $('#rfid_status').text("Service is not available");
        },
    });
}

function securdude_status() {
    $.ajax({
        url: '../../../OnomeWeb/resources/data/tmp/onomeSecurDudeRunning',
        success: function () {
                $('#securdude_status').text("Service is online");
        },
        error: function () {
            $('#securdude_status').text("Service is not available");
        },
    });
}

// SecurDude Alarm Extensions
function securdudeextra_status() {
    $.ajax({
        url: '../../../OnomeWeb/resources/data/tmp/onomeSecurDudeOn',
        success: function () {
                $('#securdudeextra_status').text("Service is online");
        },
        error: function () {
            $('#securdudeextra_status').text("Service is not available");
        },
    });
}

// Autolights Provider
function autolights_status() {
    $.ajax({
        url: '../../../OnomeWeb/resources/data/tmp/onomeAutoLightsOn',
        success: function () {
                $('#autolights_status').text("Service is online");
        },
        error: function () {
            $('#autolights_status').text("Service is not available");
        },
    });
}

// DHT11 Sensor
function dht11_status() {
    $.ajax({
        url: '../../../OnomeWeb/resources/data/tmp/onomeDHT11On',
        success: function () {
                $('#dht11_status').text("Service is online");
        },
        error: function () {
            $('#dht11_status').text("Service is not available");
        },
    });
}

// ATMEGA2560 Serial
function atmegaserial_status() {
    $.ajax({
        url: '../../../OnomeWeb/resources/data/tmp/onomeSerialAvailable',
        success: function () {
                $('#atmegaserial_status').text("Service is online");
        },
        error: function () {
            $('#atmegaserial_status').text("Service is not available");
        },
    });
}

$(document).ready(function () {
    rfid_status();
    securdudeextra_status();
    securdude_status();
    autolights_status();
    dht11_status();
    atmegaserial_status();
    setInterval(rfid_status, 5000);
    setInterval(securdude_status, 5000);
    setInterval(securdudeextra_status, 5000);
    setInterval(autolights_status, 5000);
    setInterval(dht11_status, 5000);
    setInterval(atmegaserial_status,5000);
});