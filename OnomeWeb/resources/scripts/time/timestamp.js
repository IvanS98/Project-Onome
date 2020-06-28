function timestamp() {
    $.ajax({
        url: '/OnomeWeb/resources/scripts/time/timestamp.php',
        success: function (data) {
            $('#onomecpl_HeaderTime').html(data);
        },
    });
}

$(document).ready(function () {
	timestamp();
    setInterval(timestamp, 5000);
});
