<?php
ob_start();

/**
 * Contact Controller
 * @author James Fairhurst <info@jamesfairhurst.co.uk>
 */
class ContactController extends AppController {

	/**
	 * Components
	 */
	var $uses = array(); 
	var $helpers = array('Form','Html','Js','Paginator','Time','Text','Number','Session');
	var $pageLimit = '10';
	var $components = array('Cookie','Session','RequestHandler','Email');
	
	/**
	 * Before Filter callback
	 */
	public function beforeFilter() {
		parent::beforeFilter();

		// Change layout for Ajax requests
		if ($this->request->is('ajax')) {
			$this->layout = 'ajax';
		}
	}

	/**
	 * Main index action
	 */
	public function index() {
		//$this->layout = "public";
		$cont_var = $this->Contact->find('all');
		//session_start();
		$_SESSION['var']=$cont_var;
		if ($this->request->is('post')) {
			  	$this->Contact->create();
			if (
			    $this->Contact->save($this->request->data))
				 {
				$cont_var = $this->Contact->find('all');
				$_SESSION['var']=$cont_var;
				$this->Session->setFlash('Your message has been submitted');
				$this->redirect(array('action' => 'index'));			
			}
		}
	}
	#----------------del------------#
	/* public function delete($id) 
{
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }
    if ($this->Contact->delete($id)) 
	{
        $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
    }
	 /*else {
        $this->Session->setFlash(
            __('The post with id: %s could not be deleted.', h($id))
        );
    }*/
	/*

 $this->redirect(array('action' => 'index'));
}*/
######333333_____________________________

	function delete($id)
	{
		$this->layout='';
		if($this->RequestHandler->isAjax())
		{		
			$this->loadModel($Contact);
			$this->layout=false;
			$this->autoRender = false;				
			$getRec = $this->$Contact->find('All',array('conditions'=>array($Contact.'.id'=>$id)));
			$field=array();
			$conditions=array();
			//echo $this->data->['Contact']['id']; die;	
			pr($getRec); die;

			if(!empty($getRec))
			{
				if($tableName=='contacts')
				{	
						
					$this->$tableName->delete(array($tableName.'.id'=>$id));
				}
				
			} 
    			
		}
	}
	



















}
