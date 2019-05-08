<?php

namespace effsoft\eff;

use effsoft\eff\helpers\Ids;
use yii\mongodb\ActiveRecord;

class EffActiveRecord extends ActiveRecord{

    public function getId(){
        return Ids::encodeId($this->_id);
    }
}