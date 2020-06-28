<html>

<head>
    <title>Control devices</title>
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
                        <a href="../index.php">    
                        <li style="padding-left: 0 !important;">Overview</li>
                        </a>

                            <li style="font-weight: 600;" class="onomecpl_Navigation_active">Devices</li>

                        <a href="../security/">
                            <li>Security</li>
                        </a>
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
            <p class="activity_title">Devices</p>
            <div id="onomecpl_DevicesControllers" style="width: 500px; display: inline-block; width: 25% !important; float: left;">
                <div id="onomecpl_TempHumController">
                    <p class="activity_subtitle">Temperature and humidity</p>
                    <p style="font-size: 18px;">System can check home's temperature and humidity. You are free to enable or enable this option.</p>
                </div>
                <div id="onomecpl_AutoLightsController" style="width: 500px;">
                    <p class="activity_subtitle">Automated lights</p>
                    <p style="font-size: 18px;">System is able to manage home’s lights, according to external light intensity. Remember, automated lights are automatically disabled if user tries to control them manually.</p>
                </div>
                <div id="onomecpl_VideoController" style="width: 500px;">
                    <p class="activity_subtitle">Video surveillance</p>
                    <p style="font-size: 18px;">In addition to the security system, you can check in real time what's happening in the environment. Video surveillance will be automatically enabled if you activate the security system trough the contactless smart card.</p>
                </div>
                <div id="onomecpl_RFIDController" style="width: 500px;">
                    <p class="activity_subtitle">Radio Frequency Identification</p>
                    <p style="font-size: 18px;">System has a built-in contactless radio frequency cards reader. You can enable or disable it. Please note that to disable RFID you'll need to use the RKILL authentication key when asked.</p>
                </div>
            </div>
            <div id="onomecpl_DevicesSwitchers" style="width: 500px; display: inline-block; padding-left: 200px; vertical-align: top; margin-top: 50px; width: 25% !important; float: right;">
                <div id="onomecpl_SwitchersCouple" style="padding-bottom: 120px;">
                    <!-- TEMPHUM -->
                    <a id="temphum_enable" href="#">
                        <div id="onomecpl_Switch" class="onomecpl_Switch-left">ON</div>
                    </a>
                    <a id="temphum_disable" href="#">
                        <div id="onomecpl_Switch" class="onomecpl_Switch-right" style="margin-left: 0; padding-left: 0;">OFF</div>
                    </a>
                </div>
                <div id="onomecpl_SwitchersCouple" style="padding-bottom: 160px;">
                    <!-- AUTO LIGHTS -->
                    <a id="autolights_enable" href="#">
                        <div id="onomecpl_Switch" class="onomecpl_Switch-left">ON</div>
                    </a>
                    <a id="autolights_disable" href="#">
                        <div id="onomecpl_Switch" class="onomecpl_Switch-right" style="margin-left: 0; padding-left: 0;">OFF</div>
                    </a>
                </div>
                <div id="onomecpl_SwitchersCouple" style="padding-bottom: 180px;">
                    <!-- VIDEO CAMERA -->
                    <a id="video_enable" href="#">
                        <div id="onomecpl_Switch" class="onomecpl_Switch-left">ON</div>
                    </a>
                    <a id="video_disable" href="#">
                        <div id="onomecpl_Switch" class="onomecpl_Switch-right" style="margin-left: 0; padding-left: 0;">OFF</div>
                    </a>
                </div>
                <div id="onomecpl_SwitchersCouple" style="padding-bottom: 140px;">
                    <!-- RFID READER -->
                    <a id="rfid_enable" href="#">
                        <div id="onomecpl_Switch" class="onomecpl_Switch-left">ON</div>
                    </a>
                    <a id="rfid_disable" href="#">
                        <div id="onomecpl_Switch" class="onomecpl_Switch-right" style="margin-left: 0; padding-left: 0;">OFF</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
