<?php
namespace app\controllers;
use lithium\storage\Session;

use app\models\Ruchidoctor_followup;
use app\models\Ruchidoctor_users;
use app\models\Ruchidoctor_ctl;

class CtlController extends \lithium\action\Controller {

	protected function _init(){
		parent::_init();
//		$this->_render['layout'] = 'coach';
	}

	public function index(){
		$m = new \MongoDB\Driver\Manager("mongodb://localhost:27017");

$listdatabases = new \MongoDB\Driver\Command(["listDatabases" => 1]);
$res = $m->executeCommand("admin", $listdatabases);


		$courses = Ruchidoctor_ctl::find('all',array('order'=>array('id'=>'ASC'))); 
		return $this->render(array('json' => array("success"=>"Yes",'coarses'=>$courses)));		      
		
	}
	
	public function tests(){}
}
?>