<html>

<head>
    <title>Status</title>
    <link href="../../resources/stylesheets/page.css" rel="stylesheet" type="text/css" />
    <link href="../../resources/stylesheets/styles.css" rel="stylesheet" type="text/css" />
    <link href="../../resources/stylesheets/responsive.css" rel="stylesheet" type="text/css" />
    <link href="../../resources/stylesheets/fontawesome-all.css" rel="stylesheet"/>
    <link href="../../resources/stylesheets/fontface.css" rel="stylesheet"/>
    <script src="../../resources/scripts/jquery.js"></script>
</head>
<body>
    <script>
        function sysoff_action() {
            $.get('/OnomeWeb/resources/scripts/system/system_poweroff.php', function (data) { 
        });
        }
        
        function sysoff_log() {
    $.ajax({
        url: '/OnomeWeb/resources/data/tmp/sys_off_log',
        success: function (data) {
            $('#sysoff_log').html(data);
        },
    });
}
$(document).ready(function () {
    sysoff_action();
	sysoff_log();
    setInterval(sysoff_log, 500);
});
    </script>
    <div id="container">
        <!-- HEADER -->
        <!-- END OF HEADER -->
        <div id="onomecpl_Content">
            <div style="display: inline-block; text-align: center; width: 100%; padding-top: 160px;">
            <p class="activity_title">Thank you for using Project Onome!</p>
            <div>
                <p style="vertical-align: middle; display: inline-block; padding-right: 10px;"><i class="fas fa-circle-notch fa-spin"></i></p>
                <p style="vertical-align: middle; display: inline-block;" id="sysoff_log"><!-- OUTPUT MESSAGE LOADS FROM SCRIPT --></p>
            </div>
            </div>
        </div>
    </div>
</body>

</html>
