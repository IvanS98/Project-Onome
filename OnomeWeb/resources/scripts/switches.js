// Onome Switches Script File
// (C) 2017-2018 Ivan Sollazzo. All rights are reserved.

$(function () {
    // DHT11 Switches
    $('#temphum_enable').click(function () {
        $.get('/OnomeWeb/resources/scripts/temphum_on.php', function (data) {
        });
        return false;
    });
    $('#temphum_disable').click(function () {
        $.get('/OnomeWeb/resources/scripts/temphum_off.php', function (data) {
        });
        return false;
    });
    // Security alarm
    $('#alarm_enable').click(function () {
        $.get('/OnomeWeb/resources/scripts/securdude/alarm_on.php', function (data) {
        });
        return false;
    });
    $('#alarm_disable').click(function () {
        $.get('/OnomeWeb/resources/scripts/securdude/alarm_off.php', function (data) {
        });
        return false;
    });
    // Video surveillance
    $('#video_enable').click(function () {
        $.get('/OnomeWeb/resources/scripts/securdude/video_on.php', function (data) {
        });
        return false;
    });
    $('#video_disable').click(function () {
        $.get('/OnomeWeb/resources/scripts/securdude/video_off.php', function (data) {
        });
        return false;
    });
    // Automated lights
    $('#autolights_enable').click(function () {
        $.get('/OnomeWeb/resources/scripts/autolight_on.php', function (data) {
        });
        return false;
    });
    $('#autolights_disable').click(function () {
        $.get('/OnomeWeb/resources/scripts/autolight_off.php', function (data) {
        });
        return false;
    });
    // Video
    $('#video_enable').click(function () {
        $.get('/OnomeWeb/resources/scripts/securdude/video_on.php', function (data) {
        });
        return false;
    });
    $('#video_disable').click(function () {
        $.get('/OnomeWeb/resources/scripts/securdude/video_off.php', function (data) {
        });
        return false;
    });
    // RFID
    $('#rfid_enable').click(function () {
        $.get('/OnomeWeb/resources/scripts/RFID/rfid_on.php', function (data) {
        });
        return false;
    });
    $('#rfid_disable').click(function () {
       $(location).attr('href', 'http://192.168.2.25/OnomeWeb/security/auths/rfid_auth.php')
    });

    // LIGHTS MANAGER
    // Aisle
    $('#aisle_on').click(function () {
        $.get('/OnomeWeb/resources/scripts/rooms/aisle/lights/aisle_lights_on.php', function (data) {
        });
        return false;
    });
    $('#aisle_off').click(function () {
        $.get('/OnomeWeb/resources/scripts/rooms/aisle/lights/aisle_lights_off.php', function (data) {
        });
        return false;
    });
    // Living room
    $('#living_on').click(function () {
        $.get('/OnomeWeb/resources/scripts/rooms/living/lights/living_lights_on.php', function (data) {
        });
        return false;
    });
    $('#living_off').click(function () {
        $.get('/OnomeWeb/resources/scripts/rooms/living/lights/living_lights_off.php', function (data) {
        });
        return false;
    });
    // Kitchen
    $('#kitchen_on').click(function () {
        $.get('/OnomeWeb/resources/scripts/rooms/kitchen/lights/kitchen_lights_on.php', function (data) {
        });
        return false;
    });
    $('#kitchen_off').click(function () {
        $.get('/OnomeWeb/resources/scripts/rooms/kitchen/lights/kitchen_lights_off.php', function (data) {
        });
        return false;
    });
    // Bathroom
    $('#bathroom_on').click(function () {
        $.get('/OnomeWeb/resources/scripts/rooms/bathroom/lights/bathroom_lights_on.php', function (data) {
            
        });
        return false;
    });
    $('#bathroom_off').click(function () {
        $.get('/OnomeWeb/resources/scripts/rooms/bathroom/lights/bathroom_lights_off.php', function (data) {
            
        });
        return false;
    });
    // Bedroom
    $('#bedroom_on').click(function () {
        $.get('/OnomeWeb/resources/scripts/rooms/bedroom/lights/bedroom_lights_on.php', function (data) {
            
        });
        return false;
    });
    $('#bedroom_off').click(function () {
        $.get('/OnomeWeb/resources/scripts/rooms/bedroom/lights/bedroom_lights_off.php', function (data) {
            
        });
        return false;
    });
    // Garage
    $('#garage_on').click(function () {
        $.get('/OnomeWeb/resources/scripts/rooms/garage/lights/garage_lights_on.php', function (data) {
            
        });
        return false;
    });
    $('#garage_off').click(function () {
        $.get('/OnomeWeb/resources/scripts/rooms/garage/lights/garage_lights_off.php', function (data) {
            
        });
        return false;
    });
	// Main Gate
	$('#maingate_open').click(function () {
        $.get('/OnomeWeb/resources/scripts/motors/maingate_open.php', function (data) {
            
        });
        return false;
    });
	$('#maingate_close').click(function () {
        $.get('/OnomeWeb/resources/scripts/motors/maingate_close.php', function (data) {
            
        });
        return false;
    });
    // Power options
	$('#system_poweroff').click(function () {
        $(location).attr('href', 'http://192.168.2.25/OnomeWeb/system/pwr_options/poweroff.php');
        return false;
    });
	$('#system_restart').click(function () {
        $(location).attr('href', 'http://192.168.2.25/OnomeWeb/system/pwr_options/restart.php');
        return false;
    });
});