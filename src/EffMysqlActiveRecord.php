<?php

namespace effsoft\eff;

use effsoft\eff\helpers\Ids;
use yii\db\ActiveRecord;

class EffMysqlActiveRecord extends ActiveRecord{

    public function getId(){
        return Ids::encodeId($this->id);
    }
}