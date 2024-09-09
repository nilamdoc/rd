<?php
namespace app\controllers;
use lithium\storage\Session;

use app\models\Ruchidoctor_videos;
use app\models\Ruchidoctor_users;

class NtlController extends \lithium\action\Controller {

	protected function _init(){
		parent::_init();
//		$this->_render['layout'] = 'coach';
	}

	public function index(){
		
		$users = Ruchidoctor_users::find('all',array('order'=>array('id'=>'ASC'))); 
		$videos = Ruchidoctor_videos::find('all', array('conditions'=>array('confirm'=>'no'))); 
		return compact('videos');
//		return $this->render(array('json' => array("success"=>"Yes",'users'=>$users)));		      
	
	}
	
	public function tests(){}
}
?>