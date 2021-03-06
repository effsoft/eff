<?php
namespace effsoft\eff\libraries;

use Picqer\Barcode\BarcodeGeneratorPNG;
use yii\base\Component;
use Picqer\Barcode\Exceptions\BarcodeException;

class BarcodeGeneratorPNGWithText extends BarcodeGeneratorPNG {
    public function getBarcode($code, $type, $widthFactor = 2, $totalHeight = 30, $color = array(0, 0, 0))
    {
        $barcodeData = $this->getBarcodeData($code, $type);

        // calculate image size
        $width = ($barcodeData['maxWidth'] * $widthFactor);
        $height = $totalHeight;

        if (function_exists('imagecreate')) {
            // GD library
            $imagick = false;
            $png = imagecreate($width, $height + 20); // +20 (+)
            $colorBackground = imagecolorallocate($png, 255, 255, 255);
            imagecolortransparent($png, $colorBackground);
            $colorForeground = imagecolorallocate($png, $color[0], $color[1], $color[2]);
        } elseif (extension_loaded('imagick')) {
            $imagick = true;
            $colorForeground = new \imagickpixel('rgb(' . $color[0] . ',' . $color[1] . ',' . $color[2] . ')');
            $png = new \Imagick();
            $png->newImage($width, $height + 20, 'none', 'png'); // +20 (+)
            $imageMagickObject = new \imagickdraw();
            $imageMagickObject->setFillColor($colorForeground);
        } else {
            return false;
        }

        // print bars
        $positionHorizontal = 0;
        foreach ($barcodeData['bars'] as $bar) {
            $bw = round(($bar['width'] * $widthFactor), 3);
            $bh = round(($bar['height'] * $totalHeight / $barcodeData['maxHeight']), 3);
            if ($bar['drawBar']) {
                $y = round(($bar['positionVertical'] * $totalHeight / $barcodeData['maxHeight']), 3);
                // draw a vertical bar
                if ($imagick && isset($imageMagickObject)) {
                    $imageMagickObject->rectangle($positionHorizontal, $y, ($positionHorizontal + $bw), ($y + $bh));
                } else {
                    imagefilledrectangle($png, $positionHorizontal, $y, ($positionHorizontal + $bw) - 1, ($y + $bh),
                        $colorForeground);
                }
            }
            $positionHorizontal += $bw;
        }

        if ($imagick && isset($imageMagickObject)) {
            $draw = new ImagickDraw();
            $draw->setFillColor('black');

            /* Font properties */
            $draw->setFont('Bookman-DemiItalic');
            $draw->setFontSize(5);

            // Write the barcode's code, change $code to write other text
            $imageMagickObject->annotateImage($draw, 0, $height + 5, 0, $code);
        }

        else
        {
            // Detect center position
            $font = 7;
            $font_width = ImageFontWidth($font);
            $font_height = ImageFontHeight($font);
            $text_width = $font_width * strlen($code);
            $position_center = ceil(($width - $text_width) / 2);

            // Default font
            // Write the barcode's code, change $code to write other text
            imagestring($png, 7, $position_center, $height + 5, $code, imagecolorallocate($png, 0, 0, 0));

            // For custom font specify path to font file
            /*$fontPath = '..\font.ttf';
            imagettftext($png, 12, 0, $position_center, $height + 5, imagecolorallocate($png, 0, 0, 0), $fontPath, $code);*/
        }

        ob_start();
        if ($imagick && isset($imageMagickObject)) {
            $png->drawImage($imageMagickObject);
            echo $png;
        } else {
            imagepng($png);
            imagedestroy($png);
        }
        $image = ob_get_clean();

        return $image;
    }
}