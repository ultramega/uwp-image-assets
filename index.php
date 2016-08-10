<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <title>UWP Image Asset Generator</title>
    </head>
    <body>
        <div id="content">
            <h1>UWP Image Asset Generator</h1>
            <p>Generates scaled image assets for Universal Windows Platform apps.</p>
            <p>To create your source images, you can use these <a href="psd-templates.zip">Photoshop templates</a> with guides based on the <a href="https://msdn.microsoft.com/en-us/windows/uwp/controls-and-patterns/tiles-and-notifications-app-assets" target="_blank">guidelines</a>.</p>
            <form method="post" action="process.php" enctype="multipart/form-data">
                <label>
                    <div>
                        <h2>Logo-AppList (176x176)</h2>
                        <input type="file" name="AppList" />
                    </div>
                </label>
                <label>
                    <div>
                        <h2>Logo-NoMargins (256x256)</h2>
                        <input type="file" name="NoMargins" />
                    </div>
                </label>
                <label>
                    <div>
                        <h2>Logo-TileSmall (284x284)</h2>
                        <input type="file" name="TileSmall" />
                    </div>
                </label>
                <label>
                    <div>
                        <h2>Logo-TileLargeMedium (1240x1240)</h2>
                        <input type="file" name="TileLargeMedium" />
                    </div>
                </label>
                <label>
                    <div>
                        <h2>Logo-TileWide (1240x600)</h2>
                        <input type="file" name="TileWide" />
                    </div>
                </label>
                <label>
                    <div>
                        <h2>SplashScreen (2480x1200)</h2>
                        <input type="file" name="SplashScreen" />
                    </div>
                </label>
                <label>
                    <div>
                        <h2>StoreLogo (200x200)</h2>
                        <input type="file" name="StoreLogo" />
                    </div>
                </label>
                <div><input type="submit" value="Generate" /></div>
            </form>
        </div>
        <div id="footer">Copyright &copy; <?php echo date('Y'); ?> <a href="http://ultramegasoft.com/">UltraMega Software</a> | <a href="https://sguidetti.mit-license.org/">MIT License</a> | <a href="https://github.com/ultramega/uwp-image-assets">Source available on GitHub</a>.</div>
    </body>
</html>
