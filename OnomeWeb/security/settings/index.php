<html>

<head>
    <title>Security Settings</title>
    <link href="../../resources/stylesheets/page.css" rel="stylesheet" type="text/css" />
    <link href="../../resources/stylesheets/styles.css" rel="stylesheet" type="text/css" />
    <link href="../../resources/stylesheets/responsive.css" rel="stylesheet" type="text/css" />
    <link href="../../resources/stylesheets/fontawesome-all.css" rel="stylesheet" />
    <link href="../../resources/stylesheets/fontface.css" rel="stylesheet" />
    <script src="../../resources/scripts/jquery.js"></script>
    <script src="../../resources/scripts/time/timestamp.js"></script>
    <script src="../../resources/scripts/status/powered_devices/powered_devices.js"></script>
    <script src="../../resources/scripts/time/date.js"></script>
    <script src="../../resources/scripts/switches.js"></script>
</head>
<style>
    #sidebar ul {
        padding: 0;
        margin: 0;
        list-style-type: none;
        font-size: 20px;
    }

    #sidebar li {
        padding-top: 20px;
    }

    .sidebar_click_hold {
        color: #59b4ec;
    }

</style>
<script type="text/javascript">
    
    function CallTarget() {
        $('#target_call').html("Calling...");
        $.get('/OnomeWeb/security/settings/assets/calltarget.php', function(data) {});
        setInterval(ResetTargetCallButton, 10000);
        return false;
    }
    
    function ResetTargetCallButton() {
        $('#target_call').html("Call");
    }

    function SaveTarget() {
        var target = document.getElementById('securdude_sim900_target').value;
        $.ajax({
            type: 'POST',
            url: '/OnomeWeb/security/settings/assets/savetarget.php',
            dataType: 'html',
            data: {
                'target': target
            }
        });
        $('#target_save').html("Done!");
        document.getElementById('target_save').style.background = "none";
    }

    function ReadTarget() {
        $.ajax({
            url: '/OnomeWeb/resources/data/security/settings/s900_target',
            success: function(data) {
                document.getElementById('securdude_sim900_target').value = data;
            },
        });
    }

    $(document).ready(function() {
        ReadTarget();
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
        <div id="onomecpl_Content">
            <div id="sidebar" style="display: inline-block; float: left; width: 25%;">
                <p class="activity_title">Security</p>
                <ul>
                    <a href="index.php">
                        <li class="sidebar_click_hold">Settings</li>
                    </a>
                </ul>
            </div>
            <div style="display: inline-block; float: right; width: 75%;">
                <p class="activity_title">Settings</p>
                <div id="s900_target_calls">
                    <p class="activity_subtitle">Target number for calls and texts</p>
                    <p>System will use the number you set as target for calls and texts.</p>
                    <form method="post" onSubmit="return false;">
                        <input name="s900_target" id="securdude_sim900_target" style="width: 200px; height: 30px; font-size: 20px; border: 0; vertical-align: middle; background-color: #1f1e1f; color: white;">
                        <button type="submit" name="s900_target_submit" style="height: 30px; vertical-align: middle; display: none;" onclick="SaveTarget()"><!-- FOR ENTER KEY TRIGGERING ONLY --></button>
                        <a href="#">
                            <div id="target_save" class="onomecpl_Button" style="display: inline-block; vertical-align: middle;" onclick="SaveTarget()">Save</div>
                        </a>
                        <a href="#">
                            <div id="target_call" class="onomecpl_Button" style="display: inline-block; vertical-align: middle;" onclick="CallTarget()">Call</div>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
