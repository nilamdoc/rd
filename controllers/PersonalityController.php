<?php
namespace app\controllers;
use lithium\storage\Session;

use app\models\Ruchidoctor_personalitytests;

use app\models\Ruchidoctor_users;

class PersonalityController extends \lithium\action\Controller {

	protected function _init(){
		parent::_init();
		error_reporting(E_ALL);
		ini_set('display_errors', 'On');

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT, GET, POST");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

//		$this->_render['layout'] = 'coach';
	}

	public function index(){
		
		$questions = Ruchidoctor_personalitytests::find('all',array('order'=>array('question'=>'ASC'))); 
	//	var_dump($questions);
		return $this->render(array("json" => array("questions"=>$questions)));
		
	}
	
	public function register(){
		
				return $this->render(array('json' => array("success"=>"Yes")));

		
	}
}
?>