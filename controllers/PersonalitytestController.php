<?php
namespace app\controllers;
use lithium\storage\Session;

use app\models\Ruchidoctor_personalitytests;
use app\models\Ruchidoctor_users;


class PersonalitytestController extends \lithium\action\Controller {

	protected function _init(){
		parent::_init();
//		$this->_render['layout'] = 'coach';
	}

	public function index(){
		
		$questions = Ruchidoctor_personalitytests::find('all',array('order'=>array('Question'=>'ASC'))); 
//		return $this->render(array('json' => array("success"=>"Yes",'questions'=>$questions)));
		
	}
	public function action(){
		if($this->request->data){
		 	$add = ruchidoctor_users::create();
			$add->save($this->request->data);
//		$questions = Ruchidoctor_personalitytests::find('all',array('order'=>array('Question'=>'ASC'))); 
//		return $this->render(array('json' => array("success"=>"Yes",'questions'=>$questions)));
		}
	}
	
	public function tests(){}
}
?>