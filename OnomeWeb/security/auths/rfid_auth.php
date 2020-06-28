<html>

<head>
    <title>Radio Frequency Authentication</title>
    <link href="../../resources/stylesheets/page.css" rel="stylesheet" type="text/css" />
    <link href="../../resources/stylesheets/styles.css" rel="stylesheet" type="text/css" />
    <link href="../../resources/stylesheets/responsive.css" rel="stylesheet" type="text/css" />
    <link href="../../resources/stylesheets/fontawesome-all.css" rel="stylesheet"/>
    <link href="../../resources/stylesheets/fontface.css" rel="stylesheet"/>
    <script src="../../resources/scripts/jquery.js"></script>
    <script src="../../resources/scripts/time/timestamp.js"></script>
    <script src="../../resources/scripts/time/date.js"></script>
    <script src="../../resources/scripts/status/powered_devices/powered_devices.js"></script>
    <script src="../../resources/scripts/switches.js"></script>
</head>
<style>
    #sidebar ul {
        padding: 0; margin: 0; list-style-type: none; font-size: 20px;
    }
    #sidebar li {
        padding-top: 20px;
    }
    .sidebar_click_hold {
        color: #59b4ec;
    }
</style>
<script>
    function trigger_rfid_disabler() {
        $.get('/OnomeWeb/resources/scripts/RFID/RFIDDisablerOnline.php', function (data) {
        });
    }
    
    function sdmatch_outputlog() {
        $.ajax({
        url: '/OnomeWeb/resources/data/tmp/onomeRFIDDisablerOnlineOutput',
        success: function (data) {
            $('#sdmatch_outputlog').html(data);
        },
    });
    }
    
    sdmatch_processed = 0;
    
    function sdmatch_processing() {
        $.ajax({
        url: '/OnomeWeb/resources/data/tmp/onomeRFIDDisablerProcessing',
        success: function () {
                $('#action_process').show();
                $('#sdmatch_outputlog').hide();
            sdmatch_processed = 1;
        },
        error: function () {
            $('#action_process').hide();
        },
    });
    }
    
    function autoredirect() {
        if (sdmatch_processed == 1) {
                setTimeout(1000);
                $(location).attr('href', 'http://192.168.2.25/OnomeWeb/');
        return false;
            }
    }
    
    $(document).ready(function () {
        trigger_rfid_disabler();
        sdmatch_outputlog();
        sdmatch_processing();
        setInterval(sdmatch_outputlog, 500);
        setInterval(sdmatch_processing, 500);
        setInterval(autoredirect, 5000);
});
    
</script>
<body>
    <div id="container">
        <!-- HEADER -->
        <div id="onomecpl_HeaderBarBG">
            <div id="onomecpl_HeaderBar">
                <div id="onomeLogo">
                    <p style="padding: 0; margin: 0; font-size: 18px;">Project Onome</p>
                    <p style="padding: 0; margin: 0; line-height: 0; margin-top: -25px;"><span><i class="fas fa-toggle-on" style="vertical-align: middle;"></i> <span id="onomecpl_pwrdevices_overview" style="padding-left: 3px; vertical-align: middle;"></span></span><span id="onomeSecurDudeIcon" style="vertical-align: middle; padding-left: 10px; display: none;"><i class="fas fa-eye"></i></span><span id="onomeAutoLightsIcon" style="vertical-align: middle; padding-left: 10px; display: none;"><i class="fas fa-lightbulb"></i>A</span></p>
                </div>
                <div id="onomecpl_Navigation">
                    <ul style="padding-right: 6%;">
                        <a href="../../index.php">    
                        <li style="padding-left: 0 !important;">Overview</li>
                        </a>
                        <a href="../../devices/">
                            <li>Devices</li>
                        </a>
                    
                        <li style="font-weight: 600;" class="onomecpl_Navigation_active"><a href="../index.php">Security</a></li>
                        
                        <a href="../../system/">
                            <li>System</li>
                        </a>
                    </ul>
                    <div style="float:right;">
                        <div id="onomecpl_HeaderDate" style="padding-right: 5px; display: inline-block; vertical-align: middle;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF HEADER -->
        <div id="onomecpl_Content" style="background-image: url(../../resources/media/rfid_auth.png); background-repeat: no-repeat; background-position: center; background-size: contain;">
            <p class="activity_title" style="text-align: center; padding-top: 50px;">Secure Authentication</p>
            <div id="securdude_auth" style="width: 100%; text-align: center; padding-bottom: 20px;">
                <p style="width: 65%; text-align: center; margin-left: auto; margin-right: auto;">In order to disable the Radio Frequency Identification, you need to authenticate. Please trigger using a SecurDude Auth Key marked with RKILL name.</p>
                <div>
                    <p id="sdmatch_outputlog"></p>
                    <div id="action_process" style="display: none;">
                <p style="vertical-align: middle; display: inline-block; padding-right: 10px;"><i class="fas fa-circle-notch fa-spin"></i></p>
                <p style="vertical-align: middle; display: inline-block;" id="sdmatch_process">Disabling RFID</p>
            </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
