<html>

<head>
    <title>Project Onome</title>
    <link href="resources/stylesheets/page.css" rel="stylesheet" type="text/css" />
    <link href="resources/stylesheets/styles.css" rel="stylesheet" type="text/css" />
    <link href="resources/stylesheets/responsive.css" rel="stylesheet" type="text/css" />
    <link href="resources/stylesheets/fontawesome-all.css" rel="stylesheet"/>
    <link href="resources/stylesheets/fontface.css" rel="stylesheet">
    <script src="resources/scripts/jquery.js"></script>
    <script src="resources/scripts/working_services.js"></script>
</head>

<body>
    <div id="container">
        <!-- HEADER -->
        <div id="onomecpl_HeaderBarBG">
            <div id="onomecpl_HeaderBar">
                <div id="onomeLogo" style="line-height: 100px;">
                    <p style="padding: 0; margin: 0; font-size: 18px;">Recovery Mode</p>
                </div>
                <div id="onomecpl_Navigation">
                    <ul style="padding-right: 6%;">
                        <a href="index.php">
                            <li style="padding-left: 0 !important;">Overview</li>
                        </a>
                        <a href="securdude.php">
                            <li>SecurDude</li>
                        </a>
                        <a href="engine.php">
                            <li>Engine</li>
                        </a>
                       
                            <li style="font-weight: 600;font-weight: 600;" class="onomecpl_Navigation_active">Platform</li>
                        
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
            <h3>Platform string.</h3>
            <p>
                <?php
                $rpi_model = exec("cat /proc/cpuinfo | grep 'a02082' | cut -c 12-17");
                if ($rpi_model == 'a02082') {
                    echo "Raspberry Pi 3 Model B";
                }
                ?> on Linux
                <?php
                $linux_version = exec("uname -r");
                echo $linux_version;
                ?>
            </p>
            </div>
            <div>
                <h3>Platform cats</h3>
                <?php
                $verid = exec("cat /etc/os-release | grep 'VERSION_ID'");
                echo $verid;
                ?>
                <br>
                <?php
                $id= exec("cat /etc/os-release | grep 'ID_LIKE=debian'");
                echo $id;
                ?>
                <br>
            </div>
            <div>
                <h3>Memory info</h3>
                <?php
                $memtotal= exec("cat /proc/meminfo | grep 'MemTotal'");
                echo $memtotal;
                ?>
                <br>
                <?php
                $memfree= exec("cat /proc/meminfo | grep 'MemFree'");
                echo $memfree;
                ?>
                <br>
                <?php
                $swaptot= exec("cat /proc/meminfo | grep 'SwapTotal'");
                echo $swaptot;
                ?>
                <br>
                <?php
                $swapfree= exec("cat /proc/meminfo | grep 'SwapFree'");
                echo $swapfree;
                ?>
            </div>
        </div>
    </div>
</body>

</html>
