<?php

/*
 * The MIT License
 *
 * Copyright 2015 Steve Guidetti.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

if(!empty($_FILES)) {
    $file = 'data/' . sha1(microtime()) . '.zip';

    $zip = new ZipArchive();
    $zip->open($file, ZipArchive::CREATE);

    if(($image = getImage('AppList')) !== null) {
        $nameFormat = 'Square44x44Logo.scale-%d.png';
        generateImage($image, $zip, sprintf($nameFormat, 400), 176, 176);
        generateImage($image, $zip, sprintf($nameFormat, 200), 88, 88);
        generateImage($image, $zip, sprintf($nameFormat, 150), 66, 66);
        generateImage($image, $zip, sprintf($nameFormat, 125), 55, 55);
        generateImage($image, $zip, sprintf($nameFormat, 100), 44, 44);
        imagedestroy($image);
    }

    if(($image = getImage('NoMargins')) !== null) {
        $nameFormat = 'Square44x44Logo.targetsize-%d.png';
        generateImage($image, $zip, sprintf($nameFormat, 256), 256, 256);
        generateImage($image, $zip, sprintf($nameFormat, 48), 48, 48);
        generateImage($image, $zip, sprintf($nameFormat, 32), 32, 32);
        generateImage($image, $zip, sprintf($nameFormat, 24), 24, 24);
        generateImage($image, $zip, sprintf($nameFormat, 16), 16, 16);

        $nameFormat = 'LockScreenLogo.scale-%d.png';
        generateImage($image, $zip, sprintf($nameFormat, 400), 96, 96);
        generateImage($image, $zip, sprintf($nameFormat, 200), 48, 48);
        generateImage($image, $zip, sprintf($nameFormat, 150), 36, 36);
        generateImage($image, $zip, sprintf($nameFormat, 125), 30, 30);
        generateImage($image, $zip, sprintf($nameFormat, 100), 24, 24);
        imagedestroy($image);
    }

    if(($image = getImage('TileSmall')) !== null) {
        $nameFormat = 'Square71x71Logo.scale-%d.png';
        generateImage($image, $zip, sprintf($nameFormat, 400), 284, 284);
        generateImage($image, $zip, sprintf($nameFormat, 200), 142, 142);
        generateImage($image, $zip, sprintf($nameFormat, 150), 107, 107);
        generateImage($image, $zip, sprintf($nameFormat, 125), 89, 89);
        generateImage($image, $zip, sprintf($nameFormat, 100), 71, 71);
        imagedestroy($image);
    }

    if(($image = getImage('TileLargeMedium')) !== null) {
        $nameFormat = 'Square310x310Logo.scale-%d.png';
        generateImage($image, $zip, sprintf($nameFormat, 400), 1240, 1240);
        generateImage($image, $zip, sprintf($nameFormat, 200), 620, 620);
        generateImage($image, $zip, sprintf($nameFormat, 150), 465, 465);
        generateImage($image, $zip, sprintf($nameFormat, 125), 388, 388);
        generateImage($image, $zip, sprintf($nameFormat, 100), 310, 310);

        $nameFormat = 'Square150x150Logo.scale-%d.png';
        generateImage($image, $zip, sprintf($nameFormat, 400), 600, 600);
        generateImage($image, $zip, sprintf($nameFormat, 200), 300, 300);
        generateImage($image, $zip, sprintf($nameFormat, 150), 225, 225);
        generateImage($image, $zip, sprintf($nameFormat, 125), 188, 188);
        generateImage($image, $zip, sprintf($nameFormat, 100), 150, 150);
        imagedestroy($image);
    }

    if(($image = getImage('TileWide')) !== null) {
        $nameFormat = 'Square310x150Logo.scale-%d.png';
        generateImage($image, $zip, sprintf($nameFormat, 400), 1240, 600);
        generateImage($image, $zip, sprintf($nameFormat, 200), 620, 300);
        generateImage($image, $zip, sprintf($nameFormat, 150), 465, 225);
        generateImage($image, $zip, sprintf($nameFormat, 125), 388, 188);
        generateImage($image, $zip, sprintf($nameFormat, 100), 310, 150);
        imagedestroy($image);
    }

    if(($image = getImage('SplashScreen')) !== null) {
        $nameFormat = 'SplashScreen.scale-%d.png';
        generateImage($image, $zip, sprintf($nameFormat, 400), 2480, 1200);
        generateImage($image, $zip, sprintf($nameFormat, 200), 1240, 600);
        generateImage($image, $zip, sprintf($nameFormat, 150), 930, 450);
        generateImage($image, $zip, sprintf($nameFormat, 125), 775, 375);
        generateImage($image, $zip, sprintf($nameFormat, 100), 620, 300);
        imagedestroy($image);
    }

    if(($image = getImage('StoreLogo')) !== null) {
        $nameFormat = 'StoreLogo.scale-%d.png';
        generateImage($image, $zip, sprintf($nameFormat, 400), 200, 200);
        generateImage($image, $zip, sprintf($nameFormat, 200), 100, 100);
        generateImage($image, $zip, sprintf($nameFormat, 150), 75, 75);
        generateImage($image, $zip, sprintf($nameFormat, 125), 63, 63);
        generateImage($image, $zip, sprintf($nameFormat, 100), 50, 50);
        imagedestroy($image);
    }

    $zip->close();

    header('Content-Disposition: attachment; filename=uwp-image-assets.zip');
    header('Content-Type: application/octet-stream');
    header('Content-Length: ' . filesize($file));

    echo file_get_contents($file);
} else {
    header('Location: index.php');
}

function generateImage($srcImage, ZipArchive $zip, $name, $w, $h) {
    $image = imagecreatetruecolor($w, $h);
    imagesavealpha($image, true);
    imagefill($image, 0, 0, imagecolorallocatealpha($image, 0, 0, 0, 127));
    imagecopyresampled($image, $srcImage, 0, 0, 0, 0, $w, $h, imagesx($srcImage), imagesy($srcImage));

    ob_start();
    imagepng($image, null, 9, PNG_NO_FILTER);
    $zip->addFromString($name, ob_get_contents());
    ob_end_clean();

    imagedestroy($image);
}

function getImage($key) {
    if(!array_key_exists($key, $_FILES) || !array_key_exists('error', $_FILES[$key]) || is_array($_FILES[$key]['error'])) {
        return null;
    }

    switch($_FILES[$key]['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            return null;
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Upload file size exceeded.');
        default:
            throw new RuntimeException('Unknown error.');
    }

    switch((new finfo(FILEINFO_MIME_TYPE))->file($_FILES[$key]['tmp_name'])) {
        case 'image/jpg':
            return imagecreatefromjpeg($_FILES[$key]['tmp_name']);
        case 'image/gif':
            return imagecreatefromgif($_FILES[$key]['tmp_name']);
        case 'image/png':
            return imagecreatefrompng($_FILES[$key]['tmp_name']);
        default:
            throw new RuntimeException('Invalid file format.');
    }

    return null;
}
