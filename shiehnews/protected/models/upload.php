<?php
class Upload extends CActiveRecord
{
    public $file;
    
    public function rules()
    {
        return array(
            array('file', 'file', 'types'=>'jpg,gif,png','maxSize'=>1048576),
        );
    }
}