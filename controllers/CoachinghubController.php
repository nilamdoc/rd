<?php
namespace app\controllers;
use lithium\storage\Session;

use app\models\Ruchidoctor_personalitytests;
use app\models\Ruchidoctor_users;


class CoachinghubController extends \lithium\action\Controller {

	protected function _init(){
		parent::_init();
//		$this->_render['layout'] = 'coach';
	}

	public function index(){
		
		$questions = Ruchidoctor_personalitytests::find('all',array('order'=>array('Question'=>'ASC'))); 
//		return $this->render(array('json' => array("success"=>"Yes",'questions'=>$questions)));
		
	}
}
?>