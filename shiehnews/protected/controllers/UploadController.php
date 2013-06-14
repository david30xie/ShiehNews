<?php

class UploadController extends BaseController
{
    function actionIndex()
    {
        $dir = Yii::getPathOfAlias('images');
        $uploaded = false;
        
        $model=new Upload();
        $file=false;
		
        if(isset($_POST['Upload']))
        {
            $model->attributes=$_POST['Upload'];
            $file=CUploadedFile::getInstance($model,'file');
            if($model->validate()){
                $uploaded = $file->saveAs($dir.'/'.$file->getName());
            }
			else
			{
				print_r($model->errors);
			}
			
        }
        
        $this->render('index', array(
            'model' => $model,
			'file'=>$file,
            'uploaded' => $uploaded,
            'dir' => $dir,
        ));
    }
}
