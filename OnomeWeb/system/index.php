<html>

<head>
    <title>Status</title>
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
    <script src="../resources/scripts/platform/monitor/bcm2835/temp.js"></script>
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
                    <a href="index.php"><li class="sidebar_click_hold">About System</li></a>
                    <a href="power-options.php"><li>Power options</li></a>
                    <a href="update.php"><li>Update</li></a>
                </ul>
                <p class="activity_title" style="padding-top: 40px;">Platform</p>
                <ul style="padding: 0; margin: 0; list-style-type: none; font-size: 20px;">
                    <a href="webmin.php"><li>Webmin</li></a>
                    <a href="routercp.php"><li>Router CP</li></a>
                </ul>
            </div>
            <div style="display: inline-block; float: right; width: 75%;">
            <p class="activity_title">About System</p>
            <p class="activity_subtitle">System version</p>
            <p style="padding: 0; margin: 0;">
                <?php
                $onome_version = file_get_contents("../resources/data/onome_version");
                echo $onome_version;
                ?>
                </p>
            <p class="activity_subtitle">Kernel version</p>
            <p style="padding: 0; margin: 0;">
                <?php
                        echo php_uname ('s');
                        echo ' ';
                        $kernel_ver = shell_exec('uname -r');
                        echo $kernel_ver;
                    ?>
                </p>
            <p class="activity_subtitle">CPU model</p>
                <p style="padding: 0; margin: 0;">
                    <?php
                        echo 'Broadcom';
                        echo ' ';
                        $platform = shell_exec("cat /proc/cpuinfo | grep 'BCM' | cut -c 12-18");
                        echo $platform;
                        echo ' ';
                        echo '(';
                        echo 'Rev ';
                        echo $platform_rev = shell_exec("cat /proc/cpuinfo | grep 'Revision' | cut -c 12-17");
                        echo ')';
                    ?>
                </p>
            <p class="activity_subtitle">Serial number</p>
                <p style="padding: 0; margin: 0;">
                    <?php
                        $serial_no = shell_exec("cat /proc/cpuinfo | grep 'Serial' | cut -c 11-26");
                        echo $serial_no;
                    ?>
                </p>
            <p class="activity_subtitle">Microcontroller board</p>
            <p style="padding: 0; margin: 0;">
                <?php
            $mcinfo = shell_exec('lsusb | grep Arduino | sort -u | cut -c 34-66');
            echo $mcinfo;
            ?>
            </p>
            <p class="activity_subtitle">Platform</p>
            <p style="padding: 0; margin: 0;">
                <?php
            $cpuinfo = shell_exec('cat /proc/cpuinfo | grep model\ name | sort -u | cut -c 13-40');
            echo $cpuinfo;
            ?>
            </p>
            <p class="activity_title" style="padding-top: 40px; font-size: 24px;">System monitor</p>
            <p class="activity_subtitle">CPU temperature</p>
            <p id="bcm2835_temp_output" style="padding: 0; margin: 0;">
            </p>
            </div>
        </div>
    </div>
</body>

</html>
