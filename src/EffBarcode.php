<?php
namespace effsoft\eff;

use effsoft\eff\libraries\BarcodeGeneratorPNGWithText;
use Picqer\Barcode\BarcodeGeneratorPNG;
use yii\base\Component;

class EffBarcode extends Component {

    private static $_instance = null;
    public static function getInstance(){
        if (self::$_instance == null){
//            self::$_instance = new BarcodeGeneratorPNGWithText();
            self::$_instance = new BarcodeGeneratorPNG();
        }
        return self::$_instance;
    }
}