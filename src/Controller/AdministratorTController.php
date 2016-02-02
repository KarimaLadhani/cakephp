<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Log\Log;
use Cake\Network\Email\Email;
use Cake\Controller\Component\AuthComponent;

/**
 * AdministratorT Controller
 *
 * @property \App\Model\Table\AdministratorTTable $AdministratorT
 */
class AdministratorTController extends AppController
{
	public function initialize()
	{
		$this->loadComponent('Auth', [
				'authenticate' => [
						'Form' => [
								'passwordHasher' => [
										'className' => 'Legacy',
								],
								'fields' => [
										'username'=>'Admin_Username',
										'password'=>'Admin_Password'
								],
								'userModel' =>'AdministratorT'
						]
				],
				'loginAction' => [
						'controller' => 'AdministratorT',
						'action' => 'login'
				],
				'loginRedirect' => [
						'controller' => 'AdministratorT',
						'action' => 'menuboard'
				],
					
				'unauthorizedRedirect' => [
						'controller' => 'AdministratorT',
						'action' => 'login'
				],
				'logoutRedirect' => [
						'controller' => 'AdministratorT',
						'action' => 'login'
				]
		]);
	
		parent::initialize();
	}
	
	public function beforeFilter(Event $event){
		$this->Auth->allow(['logout','login']);
	}
	
    /**
     *
     * @author team_syzzygy
     *         This method is invoked when logout is invoked
     */
    public function logout($logoutCode = null) {
    	$this->Auth->session->destroy ();
    	if ($logoutCode == null)
    		$this->Flash->success ( 'Logout Successful' );
    	else
    		$this->Flash->error ( $logoutCode );
    	return $this->redirect ( $this->Auth->logout () );
    }
    
       public function login()
    {
    	{	try{
    		
    		if(!empty($this->Auth->user('Admin_ID'))){
    			return $this->redirect(array('action'=>'menuboard'));//Don't do camelcasing in controller action names    			    
    		}
    		
    		
    		if ($this->request->is('post')) {
    			$AdministratorT = $this->Auth->identify();
    			if ($AdministratorT) {
    				$this->Auth->setUser($AdministratorT);
    				return $this->redirect(array('action'=>'menuboard'));//Don't do camelcasing in controller action names    				
    			}else{
    				$this->Flash->error(__('Login failed ... '));
    			}
    		}
    		//this try catch is necessary to handle system errors...If the DB is down and someone tries to login they will be shown the following message. Interesting test case..
    	}catch(\PDOException $e){
    		$this->Flash->error(__('Something went wrong with the system. A group of highly trained monkeys have been alerted and are looking into this problem right away.Please try after sometime'));
    	}
    	}    	
    }
    
    /**
     * This is the menuboard code
     * @param string $iusername
     * @return Ambigous <void, \Cake\Network\Response>
     */
    public function menuboard($iusername = null){
    	$this->set('username',$this->Auth->user('Admin_Username'));     
    	$iusername=$this->Auth->user('Admin_Username');	
    	$dbConn=$this->getDBConnector();
    	if($iusername==null || empty($iusername)){
    		Log::write('debug','Unable to display information on dashboard was shown because the email address that was passed was empty or null.');
    		return $this->redirect(['action'=>'logout','System Error. Please check back after sometime']);
    	}
    	$AdministratorModel=$this->AdministratorT;
    	$results=$AdministratorModel->fetchRegisteredUser($dbConn,$iusername);
    	Log::write('debug', 'Admin Username retrieved from database is '.$results->Admin_Username);
    	$this->set('results', $results);
    
    }
    
    }
