<?php

namespace effsoft\eff;

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use yii\base\Component;
use yii\helpers\Url;

class EffQrcode extends Component
{

    private static function _get($url)
    {
        $qrCode = new QrCode($url);
        $qrCode->setWriterByName('png');
        $qrCode->setMargin(10);
        $qrCode->setEncoding('UTF-8');
        $qrCode->setErrorCorrectionLevel(new ErrorCorrectionLevel(ErrorCorrectionLevel::HIGH));
        $qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
        $qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
//        $qrCode->setLabel('Scan the code', 16, __DIR__.'/../assets/fonts/noto_sans.otf', LabelAlignment::CENTER);
//        $qrCode->setLogoPath(__DIR__.'/../assets/images/symfony.png');
//        $qrCode->setLogoSize(150, 200);
        $qrCode->setRoundBlockSize(true);
        $qrCode->setValidateResult(false);
        $qrCode->setWriterOptions(['exclude_xml_declaration' => true]);
        return $qrCode->writeString();
    }

    public static function getItemUrl($item_id)
    {
        $url = Url::to(['/shop/item', 'i' => $item_id], true);
        return self::_get($url);
    }

    public static function getSkuUrl($item_id, $sku_id)
    {
        $url = Url::to(['/shop/item', 'i' => $item_id, 's' => $sku_id], true);
        return self::_get($url);
    }
}