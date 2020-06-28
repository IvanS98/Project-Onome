function sysrestart_log() {
    $.ajax({
        url: '/OnomeWeb/resources/data/tmp/sys_restart_log',
        success: function (data) {
            $('#sysrestart_log').html(data);
        },
    });
}
$(document).ready(function () {
	sysrestart_log();
    setInterval(sysrestart_log, 500);
});