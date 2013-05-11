<?php
/**
 * 
 * @author David Shieh <mykingheaven@gmail.com>
 * @blog :  http://davidshieh.cn/
 *
 */
class BaseController extends CController {
	
	public function actions() {
		return array(
			'captcha'=>array(
				'class' => 'CCaptchaAction',
				'backColor' => 0xCCCCCC,
				'testLimit' => 1,
			),
		);

	}
<<<<<<< HEAD
	public function beforeAction($action) {
		// put your logic here.
		// you can log every action here.
		$user_IP = (getenv("HTTP_VIA")) ? getenv("HTTP_X_FORWARDED_FOR") : getenv("REMOTE_ADDR");
		$user_IP = ($user_IP) ? $user_IP : getenv("REMOTE_ADDR");

		$connection = Yii::app()->db;
		/*
		$sql = "SELECT * FROM `mycounter` where ip='$user_IP'";
		$command = $connection->createCommand($sql);
		$results = $command->queryAll(); 
		if($results)
		{
			return true;
		}
		else{
			*/
			$count="SELECT Counter FROM `mycounter` order by Counterid DESC";
			//$count=$count+1;
			$query=$connection->createCommand($count);
			$results=$query->query();
			$row = $results->read();
			$row['Counter']=$row['Counter']+1;
			$insert_sql="insert into `mycounter` (RecordDate,Counter,address) values(now(),'$row[Counter]','$user_IP')";
			$result=$connection->createCommand($insert_sql);
			$result->execute();
			if($result==true)
			{
				return true;
			}else{
				return false;
			}
		//}
	}
	
=======
	
	public function beforeAction() {
		// put your logic here.
		// you can log every action here.
		return true;
	}
>>>>>>> 8301e3943d524116b16f16f7c2eec3bb6bd8d2c8
}