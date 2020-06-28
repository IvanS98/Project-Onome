<html>

<head>
    <title>Security System Authentication</title>
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
    <script src="../../resources/scripts/securdude/auth.js"></script>
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
            <p class="activity_title" style="text-align: center; padding-top: 50px;">Secure Authentication</p>
            <div id="securdude_auth" style="width: 100%; text-align: center; padding-bottom: 20px;">
                <p style="width: 65%; text-align: center; margin-left: auto; margin-right: auto; padding-top: 0; margin-top: 0;">In order to interact with Security System, you need to authenticate. Please enter the right passcode.</p>
                <div>
                    <form id="securdude_auth_ask" method="post" action="" onSubmit="return false;">
                        <input type="password" name="passcode" id="securdude_auth_input" style="width: 200px; height: 50px; font-size: 30px; border: 0;" >
                    </form>
                    <p id="sderror_nomatch" style="display: none;">The passcode you entered is not valid.</p>
                    <p id="sderror_nofill" style="display: none;">You didn't enter any passcode</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
