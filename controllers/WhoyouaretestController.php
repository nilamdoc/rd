<?php
namespace app\controllers;
use lithium\storage\Session;

use app\models\Ruchidoctor_personalitytests;
use app\models\Ruchidoctor_users;


class WhoyouaretestController extends \lithium\action\Controller {

	protected function _init(){
		parent::_init();
//		$this->_render['layout'] = 'coach';
	}

	public function index(){
		
		$questions = Ruchidoctor_personalitytests::find('all',array('order'=>array('id'=>'ASC'))); 
//		return $this->render(array('json' => array("success"=>"Yes",'questions'=>$questions)));
		
	}
	
	public function register(){
//		var_dump($this->request->data);
		$email = $this->request->data['email'];
		return compact("email");
	}
	public function register1(){
//		var_dump($this->request->data);
		$questions = Ruchidoctor_personalitytests::find('all',array('limit'=>36),array('order'=>array('Question'=>'ASC'))); 
		$email = $this->request->data['email'];
		return compact("email","questions");
	}
	
	public function action(){
		if($this->request->data){
		 	$add = Ruchidoctor_users::create();
			$add->save($this->request->data);
//		$questions = Ruchidoctor_personalitytests::find('all',array('order'=>array('Question'=>'ASC'))); 
//		return $this->render(array('json' => array("success"=>"Yes",'questions'=>$questions)));
		}
	}

}
?>