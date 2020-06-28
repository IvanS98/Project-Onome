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
                            <li style="font-weight: 600; padding-left: 0 !important;" class="onomecpl_Navigation_active">Overview</li>
                        <a href="securdude.php">
                            <li>SecurDude</li>
                        </a>
                        <a href="engine.php">
                            <li>Engine</li>
                        </a>
                        <a href="platform.php">
                            <li>Platform</li>
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
            <h3>Welcome to Project Onome Recovery Mode.</h3>
            <p>System version: 
                <?php
                $onome_version = file_get_contents("../OnomeWeb/resources/data/onome_version");
                echo $onome_version;
                ?>
            </p>
            </div>
            <div style="padding-top: 30px;">
            <h3>Services monitor</h3>
                <p>RFID service: <span id="rfid_status">Getting info</span></p>
                <p>ATMEGA2560 Serial Port reader: <span id="atmegaserial_status">Getting info</span></p>
                <p>DHT11 service: <span id="dht11_status">Getting info</span></p>
                <p>SecurDude Alarm Extensions: <span id="securdudeextra_status">Getting info</span></p>
                <p>Autolights provider: <span id="autolights_status">Getting info</span></p>
            </div>
        </div>
    </div>
</body>

</html>
