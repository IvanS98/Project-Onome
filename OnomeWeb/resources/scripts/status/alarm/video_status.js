$(document).ready(function () {
    video_available_check();
    video_source();
    setInterval(video_source, 1000);
    setInterval(video_available_check, 1000);
});

function video_available_check() {
    $.ajax({
        url: '/OnomeWeb/resources/data/tmp/onomeVideoAvailable',
        success: function () {
                $('#video_image').show();
                $('#video_unavailable').hide();
        },
        error: function () {
            $('#video_image').hide();
            $('#video_unavailable').show();
        },
    });
}

function video_source() {
    if (!document.images) return;
    document.images['video_image'].src = 'http://192.168.2.25:8081/' + Math.random();
}