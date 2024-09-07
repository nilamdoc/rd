<?php
namespace app\controllers;
use lithium\storage\Session;

use app\models\Ruchidoctor_personalitytests;

use app\models\Users;

class PersonalityController extends \lithium\action\Controller {

	protected function _init(){
		parent::_init();
		
		

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT, GET, POST");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

//		$this->_render['layout'] = 'coach';
	}

	public function index(){
		
		$questions = Ruchidoctor_personalitytests::find('all',array('order'=>array('question'=>'ASC'))); 
		
		return $this->render(array('json' => array("success"=>"Yes",'questions'=>$questions)));
		
	}
	
	public function resister(){
		
				return $this->render(array('json' => array("success"=>"Yes")));

		
	}
}
?>