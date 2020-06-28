<html>

<head>
    <title>Security System (Powered by SecurDude)</title>
    <link href="../resources/stylesheets/page.css" rel="stylesheet" type="text/css" />
    <link href="../resources/stylesheets/styles.css" rel="stylesheet" type="text/css" />
    <link href="../resources/stylesheets/responsive.css" rel="stylesheet" type="text/css" />
    <link href="../resources/stylesheets/fontawesome-all.css" rel="stylesheet"/>
    <link href="../resources/stylesheets/fontface.css" rel="stylesheet"/>
    <script src="../resources/scripts/jquery.js"></script>
    <script src="../resources/scripts/time/timestamp.js"></script>
    <script src="../resources/scripts/time/date.js"></script>
    <script src="../resources/scripts/status/powered_devices/powered_devices.js"></script>
    <script src="../resources/scripts/switches.js"></script>
    <script src="../resources/scripts/status/alarm/alarm_status.js"></script>
    <script src="../resources/scripts/status/alarm/movement_status.js"></script>
    <script src="../resources/scripts/status/alarm/step_status.js"></script>
    <script src="../resources/scripts/status/alarm/video_status.js"></script>
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
    
    function TriggerSecuritySystemButton() {
        $.ajax({
        url: '/OnomeWeb/resources/data/tmp/onomeSecurDudeOn',
        success: function () {
                $('#securdude_TriggerAlarm').html("Disable Security System");
        },
        error: function () {
            $('#securdude_TriggerAlarm').html("Enable Security System");
        },
    });
    }
    
    $(document).ready(function () {
        TriggerSecuritySystemButton();
        setInterval(TriggerSecuritySystemButton,5000);
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
                        <a href="../index.php">    
                        <li style="padding-left: 0 !important;">Overview</li>
                        </a>
                        <a href="../devices/">
                            <li>Devices</li>
                        </a>

                            <li style="font-weight: 600;" class="onomecpl_Navigation_active">Security</li>

                        <a href="../system/">
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
        <div id="onomecpl_Content">
            <div>
            <div style="width: 25%; display: inline-block;">
            <p class="activity_title">Security</p>
            <h4 style="padding: 0; margin: 0; margin-top: -5px; font-weight: 500; display: none;">Powered by <span style="font-weight: 700;">SecurDude</span></h4>
            </div>
                <div style="width: 75%; display: inline-block; float: right; text-align: right;">
                    <a href="auths/alarm_auth.php">
                    <div id="securdude_TriggerAlarm" class="onomecpl_Button" style="vertical-align: middle;">Trigger Security System</div>
                    </a>
                    <a href="auths/security_settings_auth.php">
                    <div id="securdude_Settings" class="onomecpl_Button" style="vertical-align: middle;"><i class="fa fa-cog" style="line-height: 22px;"></i></div>
                    </a>
                </div>
            </div>
            <div id="securdude_video" style="width: 100%; text-align: center; padding-bottom: 20px;">
            <h3>Video camera</h3>
                <p style="width: 65%; text-align: center; margin-left: auto; margin-right: auto;">There might be a delay of 30-40 seconds than the real video caused by the streaming engine, your internet browser or your internet connection.</p>
            <img id="video_image" style="width: 100%; height: 100%; max-width: 660px; max-height: 500px;" frameborder="0"/>
                <div id="video_unavailable" style="width: 100%; height: 100%; max-width: 660px; max-height: 500px; background-color: grey; display: none; margin-left: auto; margin-right: auto; line-height: 500px;">Camera disabled</div>
            </div>
            <h3>How to check if Security System is enabled</h3>
            <p>When this icon <i class="fas fa-eye"></i> appears on the top bar, it means that security system is enabled. More details about system status and motion records are displayed below:</p>
            <p class="activity_subtitle">System status</p>
            <p id="securdude_status" style="padding: 0; margin: 0; margin-top: -4px;">Please connect to server</p>
            <p class="activity_subtitle">Latest movement record</p>
            <p id="securdude_movementstatus" style="padding: 0; margin: 0; margin-top: -4px;">Please connect to server</p>
            <p class="activity_subtitle">Actual step</p>
            <p id="securdude_stepstatus" style="padding: 0; margin: 0; margin-top: -4px;">Please connect to server</p>
        </div>
    </div>
</body>

</html>
