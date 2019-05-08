<?php

namespace effsoft\eff;

use RandomLib\Factory;
use yii\base\Component;

class EffRandom extends Component {

    public static function get($length = 10){
        $factory = new Factory();
        $generator = $factory->getGenerator(new \SecurityLib\Strength(\SecurityLib\Strength::MEDIUM));
        return $generator->generateString($length,'0123456789');
    }
}