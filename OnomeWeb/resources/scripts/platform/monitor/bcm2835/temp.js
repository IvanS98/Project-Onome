function bcm2835_temp() {
    $.ajax({
        url: '/OnomeWeb/resources/scripts/platform/monitor/bcm2835/temp.php',
        success: function (data) {
            $('#bcm2835_temp_output').html(data);
        },
    });
}

$(document).ready(function () {
    bcm2835_temp();
    setInterval(bcm2835_temp, 10000);
});