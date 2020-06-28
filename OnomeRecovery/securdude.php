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
                            <li class="onomecpl_Navigation_active" style="font-weight: 600;">SecurDude</li>
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
            <h3>SecurDude.</h3>
            <p>Service status: <span id="securdude_status"></span>
            </p>
            </div>
        </div>
    </div>
</body>

</html>
