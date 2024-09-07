<?php
namespace app\controllers;
use lithium\storage\Session;

use app\models\ruchidoctor_typeform;
use app\models\ruchidoctor_users;

class TypeformController extends \lithium\action\Controller {

	protected function _init(){
		parent::_init();
//		$this->_render['layout'] = 'coach';
	}

	public function index(){
		
		$users = Ruchidoctor_users::find('all',array('order'=>array('id'=>'ASC'))); 
		return $this->render(array('json' => array("success"=>"Yes",'users'=>$users)));		      
		
	}
	
	public function tests(){}
}
?>