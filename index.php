<!DOCTYPE html>
<!--
The MIT License (MIT)
Copyright © 2016 Steve Guidetti

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the “Software”), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>UWP Image Asset Generator</title>
        <style lang="text/css">
            body {
                background-color: #1681b5;
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                color: #333333;
            }

            h1, h2 {
                margin: 0;
                font-family: 'Segoe UI', Tahoma, Helvetica, sans-serif;
                font-weight: 400;
            }

            h2 {
                font-size: 20px;
                margin-bottom: 4px;
            }

            p {
                font-size: 15px;
            }

            #content {
                width: 900px;
                margin: 12px auto;
                padding: 8px 18px;
                background: #ffffff;
                border: 1px solid #999999;
            }

            #footer p {
                font-size: 9px;
                text-align: center;
                color: #eeeeee;
            }

            #footer a {
                color: #cccccc;
            }

            label div {
                margin-bottom: 4px;
                padding: 6px;
                background: #fefefe;
                border: 2px solid #cccccc;
            }

            input[type=submit] {
                display: block;
                margin: 0 auto;
                padding: 4px 20px;
                font-size: 16px;
                font-weight: bold;
            }
        </style>
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
        <div id="footer">
            <p>Copyright &copy; <?php echo date('Y'); ?> <a href="http://ultramegasoft.com/" target="_blank">UltraMega Software</a>. <a href="https://github.com/ultramega/uwp-image-assets" target="_blank">Source available on GitHub</a>.</p>
        </div>
    </body>
</html>
