<?php

namespace effsoft\eff\widgets;

use effsoft\eff\EffWidget;


class TinymceWidget extends EffWidget{

    public $options;
    public $model;
    public $attribute;

    function run(){
        return $this->render('//widgets/tinymce',[
            'name' => $this->options['name'],
        ]);
    }
}