<html>

<head>
    <title>Power options</title>
    <link href="../resources/stylesheets/page.css" rel="stylesheet" type="text/css" />
    <link href="../resources/stylesheets/styles.css" rel="stylesheet" type="text/css" />
    <link href="../resources/stylesheets/responsive.css" rel="stylesheet" type="text/css" />
    <link href="../resources/stylesheets/fontawesome-all.css" rel="stylesheet"/>
    <link href="../resources/stylesheets/fontface.css" rel="stylesheet"/>
    <script src="../resources/scripts/jquery.js"></script>
    <script src="../resources/scripts/time/timestamp.js"></script>
    <script src="../resources/scripts/status/powered_devices/powered_devices.js"></script>
    <script src="../resources/scripts/time/date.js"></script>
    <script src="../resources/scripts/switches.js"></script>
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
                        <a href="../index.php">    
                        <li style="padding-left: 0 !important;">Overview</li>
                        </a>
                        <a href="../devices/">
                            <li>Devices</li>
                        </a>
                        <a href="../security/">
                            <li>Security</li>
                        </a>

                            <li style="font-weight: 600;" class="onomecpl_Navigation_active">System</li>

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
                <p class="activity_title">System</p>
                <ul>
                    <a href="index.php"><li>About System</li></a>
                    <a href="power-options.php"><li class="sidebar_click_hold">Power options</li></a>
                    <a href="update.php"><li>Update</li></a>
                </ul>
                <p class="activity_title" style="padding-top: 40px;">Platform</p>
                <ul style="padding: 0; margin: 0; list-style-type: none; font-size: 20px;">
                    <a href="webmin.php"><li>Webmin</li></a>
                    <a href="routercp.php"><li>Router CP</li></a>
                </ul>
            </div>
            <div style="display: inline-block; float: right; width: 75%;">
            <p class="activity_title">Power options</p>
                
            <a href="#" class="onomecpl_poweroptions_links"><div id="system_poweroff" style="width: 100%; height: 90px;">
            <div style="float: left; width: 7%; display: inline-block;"><i class="fas fa-power-off" style="padding-right: 10px; line-height: 90px;"></i> </div>
            <div style="float: right; width: 93%; display: inline-block;">
            <p class="activity_subtitle">Power off</p>
            <p style="padding: 0; margin: 0;">
                Stop all services and power off system. Some devices may need a forced shutdown.
                </p>
                </div>
                </div></a>
                
                <a href="#" class="onomecpl_poweroptions_links"><div id="system_restart" style="width: 100%; height: 90px;">
            <div style="float: left; width: 7%; display: inline-block;"><i class="fas fa-redo" style="padding-right: 10px; line-height: 90px;"></i> </div>
            <div style="float: right; width: 93%; display: inline-block;">
            <p class="activity_subtitle">Restart</p>
            <p style="padding: 0; margin: 0;">
                Stop all services and restart system.
                </p>
                </div>
                </div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
