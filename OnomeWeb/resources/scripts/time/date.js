function date() {
    $.ajax({
        url: '/OnomeWeb/resources/scripts/time/date.php',
        success: function (data) {
            $('#onomecpl_HeaderDate').html(data);
        },
    });
}

$(document).ready(function () {
	date();
    setInterval(date, 5000);
});
