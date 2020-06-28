<html>

<head>
    <title>Overview</title>
    <link href="resources/stylesheets/page.css" rel="stylesheet" type="text/css" />
    <link href="resources/stylesheets/styles.css" rel="stylesheet" type="text/css" />
    <link href="resources/stylesheets/responsive.css" rel="stylesheet" type="text/css" />
    <link href="resources/stylesheets/fontawesome-all.css" rel="stylesheet"/>
    <link href="resources/stylesheets/fontface.css" rel="stylesheet"/>
    <script src="resources/scripts/jquery.js"></script>
    <script src="resources/scripts/time/timestamp.js"></script>
    <script src="resources/scripts/time/date.js"></script>
    <script src="resources/scripts/status/temphum/welcome_overview.js"></script>
    <script src="resources/scripts/status/temphum/temp_overview.js"></script>
    <script src="resources/scripts/status/temphum/hum_overview.js"></script>
    <script src="resources/scripts/status/powered_devices/powered_devices.js"></script>
    <script src="resources/scripts/notifications.js"></script>
    <script src="resources/scripts/switches.js"></script>
</head>

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
                            <li style="font-weight: 600; padding-left: 0 !important;" class="onomecpl_Navigation_active">Overview</li>
                        <a href="devices/">
                            <li>Devices</li>
                        </a>
                        <a href="security/">
                            <li>Security</li>
                        </a>
                        <a href="system/">
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
                <div id="onomecpl_temphum" style="text-align: center; padding-bottom: 50px;">
                    <p class="activity_title" id="onomecpl_welcome_overview" style="font-size: 32px;"></p>
                    <p id="onomecpl_temperature_overview" style="font-size: 90px; margin: 0; font-weight: 300; letter-spacing: -7.0px; display: inline-block;">
                    </p>
                    <p id="onomecpl_humidity_overview" style="font-size: 18px; margin: 0; margin-top: -25px;">
                        
                    </p>
                </div>
            <div id="onomecpl_lightsmanager" style="padding-top: 50px; display: inline-block; float: left;">
                <p class="activity_title">Lights</p>
                <div style="display: inline-block;">
                    <ul style="margin-left: -38px; list-style-type: none; font-size: 23px; letter-spacing: -1.0px; font-weight: 400; line-height: 60px;">
                        <li>Aisle</li>
                        <li>Living room</li>
                        <li>Kitchen</li>
                        <li>Bathroom</li>
                        <li>Bedroom</li>
                        <li>Garage</li>
                    </ul>
                </div>
                <div id="onomecpl_lightsmanager_switchers" style="display: inline-block;">
                    <div id="onomecpl_SwitchersCouple">
                        <!-- AISLE -->
                        <a id="aisle_on" href="#">
                            <div id="onomecpl_Switch" class="onomecpl_Switch-left">ON</div>
                        </a>
                        <a id="aisle_off" href="#">
                            <div id="onomecpl_Switch" class="onomecpl_Switch-right" style="margin-left: 0; padding-left: 0;">OFF</div>
                        </a>
                    </div>
                    <div id="onomecpl_SwitchersCouple">
                        <!-- LIVING -->
                        <a id="living_on" href="#">
                            <div id="onomecpl_Switch" class="onomecpl_Switch-left">ON</div>
                        </a>
                        <a id="living_off" href="#">
                            <div id="onomecpl_Switch" class="onomecpl_Switch-right" style="margin-left: 0; padding-left: 0;">OFF</div>
                        </a>
                    </div>
                    <div id="onomecpl_SwitchersCouple">
                        <!-- KITCHEN -->
                        <a id="kitchen_on" href="#">
                            <div id="onomecpl_Switch" class="onomecpl_Switch-left">ON</div>
                        </a>
                        <a id="kitchen_off" href="#">
                            <div id="onomecpl_Switch" class="onomecpl_Switch-right" style="margin-left: 0; padding-left: 0;">OFF</div>
                        </a>
                    </div>
                    <div id="onomecpl_SwitchersCouple">
                        <!-- BATHROOM -->
                        <a id="bathroom_on" href="#">
                            <div id="onomecpl_Switch" class="onomecpl_Switch-left">ON</div>
                        </a>
                        <a id="bathroom_off" href="#">
                            <div id="onomecpl_Switch" class="onomecpl_Switch-right" style="margin-left: 0; padding-left: 0;">OFF</div>
                        </a>
                    </div>
                    <div id="onomecpl_SwitchersCouple">
                        <!-- BEDROOM -->
                        <a id="bedroom_on" href="#">
                            <div id="onomecpl_Switch" class="onomecpl_Switch-left">ON</div>
                        </a>
                        <a id="bedroom_off" href="#">
                            <div id="onomecpl_Switch" class="onomecpl_Switch-right" style="margin-left: 0; padding-left: 0;">OFF</div>
                        </a>
                    </div>
                    <div id="onomecpl_SwitchersCouple">
                        <!-- GARAGE -->
                        <a id="garage_on" href="#">
                            <div id="onomecpl_Switch" class="onomecpl_Switch-left">ON</div>
                        </a>
                        <a id="garage_off" href="#">
                            <div id="onomecpl_Switch" class="onomecpl_Switch-right" style="margin-left: 0; padding-left: 0;">OFF</div>
                        </a>
                    </div>
                </div>
            </div>
            <div style="padding-top: 50px; display: inline-block; margin-left: 13%; float: right; text-align: right;">
            <div>
            <div style="width: 500px;">
                <div id="onomecpl_TempHumController">
                    <p class="activity_title">Automatic barrier</p>
                    <p style="font-size: 18px; padding: 0; margin: 0;">Open or close the automatic barrier.</p>
                </div>
            </div>
            <div style="width: 500px; vertical-align: top;">
                <div id="onomecpl_SwitchersCouple" style="padding-bottom: 150px; padding-top: 20px;">
                    <!-- TEMPHUM -->
                    <a id="maingate_open" href="#">
                        <div id="onomecpl_Switch" class="onomecpl_Switch-left" style="margin-left: 0;">OPEN</div>
                    </a>
                    <a id="maingate_close" href="#">
                        <div id="onomecpl_Switch" class="onomecpl_Switch-right" style="margin-left: 0; padding-left: 0;">CLOSE</div>
                    </a>
                </div>
            </div>
                </div>
                <div id="onomecpl_Notifications" style="margin-top: -100px;">
                    <p class="activity_title">Notifications</p>
                    <!-- NOTIFICATIONS PROVIDER -->
                    <?php include "resources/data/notifications.php" ?>
                    <!-- END OF NOTIFICATIONS PROVIDER -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>
