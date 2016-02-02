<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Log\Log;
use Cake\Network\Email\Email;
use Cake\Controller\Component\AuthComponent;
use Cake\I18n\Time;

/**
 * IndividualT Controller
 *
 * @property \App\Model\Table\IndividualTTable $IndividualT
 */
class IndividualTController extends AppController {
	public function initialize() {
		$this->loadComponent ( 'Auth', [ 
				'authenticate' => [ 
						'Form' => [ 
								'passwordHasher' => [ 
										'className' => 'Legacy' 
								],
								'fields' => [ 
										'username' => 'Email_Address',
										'password' => 'Password' 
								],
								'userModel' => 'IndividualT' 
						] 
				],
				
				'loginAction' => [ 
						'controller' => 'IndividualT',
						'action' => 'login' 
				],
				'loginRedirect' => [ 
						'controller' => 'IndividualT',
						'action' => 'login' 
				],
				
				'unauthorizedRedirect' => [ 
						'controller' => 'IndividualT',
						'action' => 'login' 
				],
				
				'logoutRedirect' => [ 
						'controller' => 'IndividualT',
						'action' => 'login' 
				] 
		] );
		// we need the following model to be loaded since register for exam depends on this
		parent::initialize ();
		$this->loadModel ( 'RegistrationT' );
		$this->loadModel ( 'ExaminationT' );
		$this->loadModel('PaymentCodeT');		
	}
	
	/**
	 * This method captures the before Filter rules for the Individual Controller
	 * @see \App\Controller\AppController::beforeFilter()
	 */
	public function beforeFilter(Event $event)	
	{			
		$this->Auth->allow(['login','logout','register','forgot']);
		
		// This is important to handle, else paypal success callbacks will fail.
		if($this->request->params['action'] === 'paypalsuccess') {
			$this->eventManager()->off($this->Csrf);
			$this->Security->config('unlockedActions',['paypalsuccess']);
		}
	}
	
	
	/**
	 * @author team_syzzygy
	 *         this method needs to get overridden for every login action ( namely candidate and admin )
	 */
	public function login() {
		try {
			if(!empty($this->Auth->user('Individual_ID'))){	
					return $this->redirect ( array (
					'action' => 'dashboard'
					) );
			}
			if ($this->request->is ( 'post' )) {
				$individualT = $this->Auth->identify();				
				if ($individualT) {
					$this->Auth->setUser ( $individualT );
					return $this->redirect ( array (
							'action' => 'dashboard'	
					) ); // Don't do camelcasing in controller action names
				} else {
					$this->Flash->error ( __ ( 'Login failed ... ' ) );
				}
			}
			// this try catch is necessary to handle system errors...If the DB is down and someone tries to login they will be shown the following message. Interesting test case..
		} catch ( \PDOException $e ) {
			$this->Flash->error ( __ ( 'Something went wrong with the system. A group of highly trained monkeys have been alerted and are looking into this problem right away.Please try after sometime' ) );
		}
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
	 
	/**
	 * This function will change the work information for the individual
	 * 
	 * @param unknown $iemail        	
	 */
	public function changeworkinfo($iemail = null) {		
		if ($this->request->is ( 'post' )) {
			// If the user hit the cancel button take him back to the dashboard
			if (isset ( $this->request->data ['cancel'] ))
				return $this->redirect ( array (
						'action' => 'dashboard'
						 
				) );
			if (empty ( $_POST ['jobchange'] ))
				$this->Flash->error ( __ ( 'If you do not wish to update/create your work information, please hit the back button' ) );
			else {
				$jobAction = $_POST ['jobchange'];
				if (strcmp ( $jobAction, 'create' ) == 0) {
					$this->Flash->success ( __ ( 'Create New Work Information' ) );
					return $this->redirect ( [ 
							'action' => 'createnewworkinfo',
							'controller' => 'IndividualT'
					] );
				} else if (strcmp ( $jobAction, 'update' ) == 0) {
					$this->Flash->success ( __ ( 'Update Work Information and hit Submit to Update' ) );
					$this->redirect ( [ 
							'action' => 'updateworkinfo',
							'controller' => 'IndividualT'
					] );
				}
			} // else ends
		} // post section ends
		
		$dbConn = $this->getDBConnector ();
		$individualModel = $this->IndividualT;
		$result = $individualModel->fetchRegisteredUserTotalWorkInfo ( $dbConn, $this->Auth->user('Email_Address'), $this->Auth->user ( 'Individual_ID' ) );
		// setting the workInfoId is critical for updating the entity
		
		if (empty ( $result->Indivdual_Department )) {
			$this->set ( 'deptempty', true );
		} else {
			$this->set ( 'deptempty', false );
		}
		
		if (empty ( $result->Work_Country )) {
			$this->set ( 'countryempty', true );
		} else {
			$this->set ( 'countryempty', false );
		}
		if (empty ( $result->Work_State )) {
			$this->set ( 'stateempty', true );
		} else {
			$this->set ( 'stateempty', false );
		}
		$this->Auth->session->write ( 'workInfoId', $result->Individual_Work_Info_ID );
		$this->set ( 'results', $result );
		$this->set ( 'disabled', true );
	}
	
	/**
	 * This function will update the current work information
	 * 
	 * @param string $iemail        	
	 */
	public function updateworkinfo($iemail = null) {		
		if ($this->request->is ( 'post' )) {
			if (isset ( $this->request->data ['cancel'] ))
				return $this->redirect ( array (
						'action' => 'changeworkinfo' 
				) );
			else if (isset ( $this->request->data ['ok'] )) {
				$individualWorkModel = $this->IndividualT->IndividualWorkInfoT;
				$dbConn = $this->getDBConnector ();
				
				// prepare the work information entity for update
				$workInfoIdFromSession = $this->Auth->session->read ( 'workInfoId' );
				$workInfo = $individualWorkModel->fetchWorkInformation ( $workInfoIdFromSession );
				$workInfo->Individual_Company = $_POST ['company'];
				$workInfo->Work_Address1 = $_POST ['workaddress1'];
				$workInfo->Work_Address2 = $_POST ['workaddress2'];
				$workInfo->Work_City = $_POST ['workcity'];
				$workInfo->Work_State = $_POST ['workstate'];
				$workInfo->Work_Postal_Code = $_POST ['workpostcode'];
				$workInfo->Work_Country = $_POST ['workcountry'];
				$workInfo->Work_Phone = $_POST ['workphone'];
				$workInfo->Is_Current = 'Yes';
				$workInfo->Individual_Title = $_POST ['title'];
				$workInfo->Individual_Department = $_POST ['department'];
				if ($individualWorkModel->saveUpdatedWorkInfo ( $workInfo )) {
					$this->Flash->success ( 'Successfully updated user work information.' );
					$this->Auth->session->delete ( 'workInfoId' );
					return $this->redirect ( array (
							'action' => 'dashboard' 
					) );
				} else {
					$this->Flash->error ( __ ( 'Something seems to have gone wrong while updating the user work information. Please try again' ) );
					$this->Auth->session->delete ( 'workInfoId' );
					return $this->redirect ( array (
							'action' => 'dashboard'
					) );
				}
			} else {
				$this->Flash->error ( __ ( 'Unknown request type received' ) );
				return $this->redirect ( [ 
						'action' => 'dashboard'
				] );
			}
		}
		$dbConn = $this->getDBConnector ();
		$individualModel = $this->IndividualT;
		$result = $individualModel->fetchRegisteredUserTotalWorkInfo ( $dbConn, $this->Auth->user('Email_Address'), $this->Auth->user ( 'Individual_ID' ) );
		
		// The following if else block is used to dynamically handle the empty attribute in the forms
		if (empty ( $result->Indivdual_Department ))
			$this->set ( 'deptempty', true );
		else
			$this->set ( 'deptempty', false );
		
		if (empty ( $result->Work_Country ))
			$this->set ( 'countryempty', true );
		else
			$this->set ( 'countryempty', false );
		
		if (empty ( $result->Work_State ))
			$this->set ( 'stateempty', true );
		else
			$this->set ( 'stateempty', false );
		
		$this->set ( 'results', $result );
	}
	
	/**
	 * This function is used to create a new work information entity associated with the user
	 * 
	 * @param string $iemail        	
	 */
	public function createnewworkinfo($iemail = null) {		
		if ($this->request->is ( 'post' )) {
			// check if this is a cancel request
			if (isset ( $this->request->data ['cancel'] ))
				return $this->redirect ( array (
						'action' => 'dashboard' 
				) );
				// make the ugly check because there is no other way to enforce that the user will
				// not try to make an empty work information ( especially since work information is not mandatory - even in create work information )
			if ($this->checkNewWorkInfoParams ( $this->request->data )) {
				return $this->Flash->error ( __ ( 'No work information was entered when attempting to create new work information.' ) );
			}
			
			// If I am here it means there is at least something to create the new work Information with
			$existingWorkInfoId=$this->Auth->session->read('workInfoId');
			$workInfo = $this->IndividualT->IndividualWorkInfoT->newEntity();
			$dbConn = $this->getDBConnector();			
			$workInfo->Individual_Company = $_POST ['company'];
			$workInfo->Work_Address1 = $_POST ['workaddress1'];
			$workInfo->Work_Address2 = $_POST ['workaddress2'];
			$workInfo->Work_City = $_POST ['workcity'];
			$workInfo->Work_State = $_POST ['workstate'];
			$workInfo->Work_Postal_Code = $_POST ['workpostcode'];
			$workInfo->Work_Country = $_POST ['workcountry'];
			$workInfo->Work_Phone = $_POST ['workphone'];
			$workInfo->Is_Current = 'Yes';
			$workInfo->Individual_Title = $_POST ['title'];
			$workInfo->Individual_Department = $_POST ['department'];
			
			if($this->IndividualT->createNewWorkInformation($dbConn,$existingWorkInfoId,$workInfo,$this->Auth->user('Individual_ID'))){
				$this->Flash->success(__('New Work Information has been saved successfully'));
				$this->redirect(['action'=>'dashboard']);
			}
			
		}
	}
	
	/**
	 * This method takes the request data as parameter and verifies if the new work information data was sent in as empty
	 * 
	 * @param array $requestData        	
	 */
	private function checkNewWorkInfoParams(array $requestData) {
		if (empty ( $requestData ['company'] ) && empty ( $requestData ['department'] ) && empty ( $requestData ['title'] ) && empty ( $requestData ['workaddress1'] ) && empty ( $requestData ['workaddress2'] ) && empty ( $requestData ['workcity'] ) && empty ( $requestData ['workstate'] ) && empty ( $requestData ['workpostcode'] ) && empty ( $requestData ['workcountry'] ) && empty ( $requestData ['workphone'] )) {
			return true;
		}
		return false;
	}
	
	/**
	 * This function is invoked both by register exam, defer exam and retake exam..DO NOT TOUCH THIS METHOD....
	 * @param string $iemail
	 * @return Ambigous <void, \Cake\Network\Response>
	 * @author team_syzzygy
	 */
	private function generateExamRegistration($iemail=null){
		// 4442 student_id has data with pending results outcome...
		$dbConn = $this->getDBConnector ();
		// If there is a student who has given any level of Exam that is currently pending, the student should not be allowed to register again
		$outcome = $this->RegistrationT->findOutcomeCountForStudent ( $dbConn, $this->Auth->user ( 'Individual_ID' ),'Pending Results' );
		if ($outcome > 0) {
			$this->Flash->success ( 'You currently have results from a previous test pending. You will be able to register once those results are posted. Please contact the CEPI if you have any questions' );
			;
			return $this->redirect ( array (
					'action' => 'dashboard'
			) ); // Don't do camelcasing in controller action names
		}
					
		$levelFromDB=$this->ExaminationT->fetchHighestLevelPassedFromDB($dbConn,$this->Auth->user('Individual_ID'));
		$level=$levelFromDB['Exam_Level']+1;
		$examModel = $this->ExaminationT;
		// retrieve a list of all the possible registrable Exams at this moment
		if($this->Auth->session->check('deferexam') && strcmp($this->Auth->session->read('deferexam'),"Yes")==0)
			$registrableExams = $examModel->getDeferralRegistrableExams ( $dbConn, $level,$this->Auth->user ( 'Individual_ID' ) );
		else
		// retrieve a list of all the possible registrable Exams at this moment
		$registrableExams = $examModel->getRegistrableExams ( $dbConn, $level,$this->Auth->user ( 'Individual_ID' ) );
		
		$registrableExamCount = $registrableExams->count();
		// If there are no exams currently open for registration, just show them a message
		if ($registrableExamCount == 0) {
			$this->Flash->success ( 'There are currently no exams available. Please contact the CEPI if you have any questions' );
			;
			return $this->redirect ( array (
					'action' => 'dashboard'
			) ); // Don't do camelcasing in controller action names
		} else {
			// Apparently there is an exam that can be registered
			$registrableExamList = $registrableExams->toArray ();
			// the locationArray will be an array of arrays. Storing the maps of [Exam Ids -> [array of locations where the exams are created]]
			$locationArray = array ();
		
			// Magic: Do not touch
			for($x = 0; $x < count ( $registrableExamList ); $x ++) {
				$examIdlocation = $examModel->fetchExamLocation ( $dbConn, $registrableExamList [$x]->Exam_ID );
				// the examLocArray will store a map of [examLocation=> examLocation]. eg [Phoenix, AZ -> Phoenix, AZ,San Francisco, CA->San Francisco, CA ]
				$examLocArray = array ();
				for($y = 0; $y < count ( $examIdlocation ); $y ++) {
					if(strpos($examIdlocation[$y]->Location_Name,"Other")===false)
					$examLocArray [$examIdlocation [$y]->Location_Name] = $examIdlocation [$y]->Location_Name;
					else 
						$examLocArray [$examIdlocation [$y]->Location_Name] = $examIdlocation [$y]->Note;
				}
					
				$locationArray [$registrableExamList [$x]->Exam_ID] = $examLocArray;
			}
		
			$this->set ( 'results', $registrableExamList );
			$this->set ( 'examloc', $locationArray );
		}		
	}
	
	/**
	 * This method will maintaint the integrity of the work the user will have to 
	 * do to ensure that multiple sessions opened by the candidate remain in sync 
	 * as far as the exam registration is concerned.
	 */
	private function _clearSession(){
		$this->Auth->session->delete ( 'paymentMethod' );
		$this->Auth->session->delete ( 'disabled' );
		$this->Auth->session->delete( 'satadmission');
		$this->Auth->session->delete( 'releaseInfo');
		$this->Auth->session->delete ( 'date' );
		$this->Auth->session->delete ( 'level' );
		$this->Auth->session->delete ( 'paymentCode' );
		$this->Auth->session->delete ( 'currentWorkAddress' );
		$this->Auth->session->delete ( 'primaryAddress' );
		$this->Auth->session->delete ( 'selectedAddress' );
		$this->Auth->session->delete ( 'prefAddress' );
		$this->Auth->session->delete ( 'selectedExamLocation' );
		$this->Auth->session->delete ( 'retest' );
		$this->Auth->session->delete ( 'fee' );
		$this->Auth->session->delete ( 'deferexam' );
		$this->Auth->session->delete ( 'randomhash' );
		$this->Auth->session->delete('selectedExamId');
	}
	
	/**
	 * This function is the post request handler for exam registration/retake/defer. DO NOT TOUCH THIS METHOD....
	 * @param string $iemail
	 * @return void|Ambigous <void, \Cake\Network\Response>
	 */
	private function examRegistrationPostRequestHandler($iemail=null){
		// If the user hit the cancel button take him back to the dashboard
		if (isset ( $this->request->data ['cancel'] )) {
			$this->Auth->session->delete('selectedExamId');
				$this->_clearSession();
				return $this->redirect ( array (
					'action' => 'dashboard'
			) );
		}
			
		// write these keys into the session so re-entrancy is maintained
		$this->Auth->session->delete ( 'paymentMethod' );
		// payment code should be selectively deleted since it is not mandatory the user will always select paycode as an option
		if ($this->Auth->session->check ( 'paymentCode' ))
			$this->Auth->session->delete ( 'paymentCode' );
		$this->Auth->session->write ( 'disabled', 'No' );
		$this->Auth->session->write ( 'satadmission', 'No' );
		$this->Auth->session->write ( 'releaseInfo', 'No' );
		$this->Auth->session->delete ( 'date' );
		$this->Auth->session->delete ( 'level' );
			
		// Looks like the candidate is trying to register for the exam
		$selectedExamLocation = $_POST ['locations'];
		$selectedExamId = $_POST ['exam'];
		$examRegOptions = $_POST ['examregoptions'.$selectedExamId];
		// this holds the option that was selected for payment
		$paymentMethod = $_POST ['payment'];
		// will hold the payment code if paycode was the option selected
		$paymentCode = $_POST ['paycodeinput'.$selectedExamId];
		if (strcmp ( $paymentMethod, 'paycode' ) == 0) {
			if (empty ( $paymentCode )) {
				$this->Flash->error ( 'Payment Code is a mandatory field' );
				return;
			} else {
				// payment code has been entered and payment option chosen is paycode
				$this->Auth->session->write ( 'paymentCode', $paymentCode );
			}
		}
			
		$this->Auth->session->write ( 'paymentMethod', $paymentMethod );
		// switch over the exam registration option keys and set options as selected
		if (! empty ( $examRegOptions ))
			for($i = 0; $i < count ( $examRegOptions ); $i ++) {
				switch ($examRegOptions [$i]) {
					case 'disabled' :
						$this->Auth->session->write ( 'disabled', 'Yes' );
						break;
					case 'satadmission' :
						$this->Auth->session->write ( 'satadmission', 'Yes' );
						break;
					case 'releaseInfo' :
						$this->Auth->session->write ( 'releaseInfo', 'Yes' );
						break;
				}
			}
			
		$examModel = $this->ExaminationT;
		$dbConn = $this->getDBConnector ();
		$fee = $examModel->getExamFee ( $dbConn, $selectedExamId, $selectedExamLocation,$this->Auth->session->read('retest'),$this->Auth->session->read('deferexam'),$this->Auth->user('Individual_ID'));
		
		$examDateNLvl = $examModel->getExamDate ( $dbConn, $selectedExamId );
		$this->Auth->session->write ( 'date', Time::parse ( $examDateNLvl [0]->Exam_Date )->format ( 'm/d/Y' ) );
		$this->Auth->session->write ( 'level', $examDateNLvl [0]->Exam_Level );
		// This action will be called only for fresh registrations.
		$this->Auth->session->write ( "fee", $fee );
		$this->Auth->session->write ( "selectedExamLocation", $selectedExamLocation );
		$this->Auth->session->write ( "selectedExamId", $selectedExamId );
		$this->Auth->session->write ( 'randomhash', md5 ( $selectedExamId ) );
		return $this->redirect ( array (
				'action' => 'selectmailaddress',
				
		) );		
	}
	
	/**
	 * This method is used to allow the candidate to retake a previously failed exam
	 * @param string $iemail
	 * @param string $examid
	 * @author team_syzzygy
	 * @return Ambigous <void, \Cake\Network\Response>
	 */
	public function retakeexam($iemail=null){
		$this->set('email',$this->Auth->user('Email_Address'));
		if($this->request->is('get')){
			$this->generateExamRegistration($this->Auth->user('Email_Address'));
			$dbConn=$this->getDBConnector();
			$recentExamInfo=$this->ExaminationT->getRecentExamInformation($dbConn,$this->Auth->user('Individual_ID'));
			$this->set('recentExamInfo',$recentExamInfo);				
	}
	else if ($this->request->is ( 'post' )) {		
			$this->Auth->session->write('retest','Yes');
			//putting this as a safeguard so that if a candidate tries to retake exam and then immediately defer in the same session we do not go bonkers
			$this->Auth->session->delete('deferexam');
			return $this->examRegistrationPostRequestHandler($this->request->paramas['pass'][0]);			
	}		
	}	
	
	
	/**
	 * This method is used to allow the candidate to defer an exam
	 * @param string $iemal
	 */
	public function deferexam($iemal=null){		
		$this->set('email',$this->Auth->user('Email_Address'));
		
		if($this->request->is('get')){			
 			$this->Auth->session->delete('retest');
 			$this->Auth->session->delete('deferexam');
			$this->generateExamRegistration($this->Auth->user('Email_Address'));
			$dbConn=$this->getDBConnector();
			$recentExamInfo=$this->ExaminationT->getRecentExamInformation($dbConn,$this->Auth->user('Individual_ID'));	
			
			//Debugger::dump($recentExamInfo->Exam_Date);
			//if less than 5 days are remaining from the exam date then candidate cannot defer the exam
			$today=date('Y-m-d', strtotime('+5 days'));
			if(strtotime($recentExamInfo->Exam_Date) < strtotime($today)){
				$this->Flash->error(__('You cannot use the online system to defer your exam since less than 5 days are remaining for the exam. Please contact the CEP Institute directly at 408-554-2187'));
				return $this->redirect ( array (
						'action' => 'dashboard'
				) );
			}
			
			//check deferrals remaining for given exam_level
			$deferralCount=$this->ExaminationT->checkRemainingDeferrals($dbConn,$this->Auth->user('Individual_ID'),$recentExamInfo->Exam_Level);
			
			if($deferralCount==2){
				$this->Flash->error(__('This exam registration has been deferred the maximum number of times.  If you would like to defer your exam date, please contact the CEP Institute directly at 408-554-2187'));
				return $this->redirect ( array (
				'action' => 'dashboard',
		) );	
			}		
			$this->set('recentExamInfo',$recentExamInfo);
			$this->set('deferralsremaining',2-$deferralCount);
		}
		else if ($this->request->is ( 'post' )) {
			//putting this as a safeguard 
			$this->Auth->session->write('retest','No');
			$this->Auth->session->write('deferexam','Yes');			
			return $this->examRegistrationPostRequestHandler($this->request->paramas['pass'][0]);
		}
		
	}
	/**
	 * This method is used to allow the candidate to register for an exam
	 * 
	 * @author team_syzzygy
	 * @param string $iemail        	
	 */
	public function registerexam($iemail = null) {
		$this->set ( 'email', $this->Auth->user('Email_Address'));
 		if ($this->request->is ( 'get' )) { 			
 			//this block of code is specific to decide if we need redirection to defer exam page
 			$isLastLevelCleared=$this->RegistrationT->isLastLevelCleared($this->getDBConnector(),$this->Auth->user('Individual_ID'));
 			if(strcmp(strtoupper($isLastLevelCleared['Outcome']),"FAIL")==0){ 				
 						//$this->Auth->session->
 						$this->Auth->session->write('retest','Yes');
 						$this->Auth->session->delete('deferexam');
 						$this->Flash->success(__('You have not cleared your previous exam. Please retake the uncleared exam.'));
 						return $this->redirect(['action'=>'retakeexam']);
 			}
 			
 			//This block of code is specific for defer exam redirection
 			$levelFromDB=$this->ExaminationT->fetchHighestLevelPassedFromDB($this->getDBConnector(),$this->Auth->user('Individual_ID'));
 			$level=$levelFromDB['Exam_Level']+1;
 			$currentExamRegistrationCount=$this->ExaminationT->isStudentPreRegisteredForLevel($this->getDBConnector(),$this->Auth->user('Individual_ID'),$level);
 			if($currentExamRegistrationCount>0){
 				$this->Flash->success(__('You have a current registration for exam level '.$level. ' You can defer your current selection if you wish to.')); 					
 				$this->Auth->session->write('deferexam','Yes');
 				$this->Auth->session->write('retest','No');
 					return $this->redirect ( array (
 							'action' => 'deferexam'
 					) ); // Don't do camelcasing in controller action names
 			}
 			
 			//call the private function to generate the Exam Registration Page..
 			
 			return $this->generateExamRegistration($this->Auth->user('Email_Address'));
 		} 
		else if ($this->request->is ( 'post' )) {
			$this->Auth->session->write('retest','No');				
		return $this->examRegistrationPostRequestHandler($this->request->paramas['pass'][0]);		
		}
	}
	
	/**
	 * This method is used to select the mailing address when registering for the exam
	 * 
	 * @param string $iemail        	
	 * @return void|Ambigous <void, \Cake\Network\Response>
	 * @author team_syzzygy
	 */
	public function selectmailaddress($iemail = null) {				
		$iemail=$this->Auth->user('Email_Address');
		// This is a security feature on the server side from preventing the client to hit URLs directly...
		if (! $this->Auth->session->check ( 'selectedExamId' ) && ! $this->Auth->session->check ( 'selectedExamLocation' ) 
				&& ! $this->Auth->session->check ( 'date' ) && ! $this->Auth->session->check ( 'level' ) 
				&& $this->Auth->session->read ( 'randomhash' ) != md5 ( $this->Auth->session->read ( 'selectedExamId' ) )) {
			$this->Flash->error ( __ ( 'You are unauthorized to access that location.' ) );
			return $this->redirect ( array (
					'action' => 'dashboard' 
			) );
		}
		
		$this->set ( 'email', $this->Auth->user('Email_Address') );
		if ($this->request->is ( 'post' )) {
	
			// If the user hit the cancel button take him back to the dashboard
			if (isset ( $this->request->data ['cancel'] )) {				
				$this->_clearSession();
				return $this->redirect ( array (
						'action' => 'dashboard' 
				) );
			}
			
			// read which address was selected from the UI
			$addressSelected = $_POST ['shippingAddress']; // possible values are work and home
			                                            
			// if no address is selected show error..Address must be selected
			if (empty ( $addressSelected )) {
				$this->Flash->error ( __ ( 'Please select one of the addresses displayed' ) );
				$this->set ( 'currentWorkAddress', $this->Auth->session->read ( 'currentWorkAddress' ) );
				$this->set ( 'primaryAddress', $this->Auth->session->read ( 'primaryAddress' ) );
				return;
			}
			
			// check if the address that was selected in the form was indeed the work address. If it is unknown then error out.
			if ($addressSelected == 'work') {
				// reading the work address that was set in the session during the corresponding GET request
				$sessionWorkAddress = $this->Auth->session->read ( 'currentWorkAddress' );
				if ($sessionWorkAddress == 'N/A') {
					// since the work address is unknown but we do not have the capability to not display it, we will error out at runtime rather not display it
					$this->Flash->error ( __ ( 'Cannot select work address since it is N/A' ) );
					$this->set ( 'currentWorkAddress', $this->Auth->session->read ( 'currentWorkAddress' ) );
					$this->set ( 'primaryAddress', $this->Auth->session->read ( 'primaryAddress' ) );
					return;
				} else {
					// If valid work address is selected
					Log::write ( 'debug', 'Valid Work Address selected for shipping is ' . $sessionWorkAddress );
					// set the addresses to be extracted by the ctp file
					$this->Auth->session->write ( 'selectedAddress', $sessionWorkAddress );
					$this->Auth->session->write('prefAddress','work');
					return $this->redirect ( array (
							'action' => 'confirmexamregistration' 
					) );
				}
			} else {
				// looks like the home address was selected. No reason for the home address to be blank since it is mandatory at Register time
				// set the address that needs to be displayed in the confirm exam registration page.
				$this->Auth->session->write ( 'selectedAddress', $this->Auth->session->read ( 'primaryAddress' ) );
				$this->Auth->session->write('prefAddress','home');
				return $this->redirect ( array (
						'action' => 'confirmexamregistration'
				) );
			}
		} // POST section ends here
		  
		// GETTER section
		$selectedExamID = $this->Auth->session->read ( "selectedExamId" );
		$primaryAddress = $this->Auth->user ( 'Address1' ) . ' ' . $this->Auth->user ( 'Address2' ) . ',' . $this->Auth->user ( 'City' ) . ' ' . $this->Auth->user ( 'State' ) . '-' . $this->Auth->user ( 'Postal_Code' ) . ',' . $this->Auth->user ( 'Country' );
		$dbConn = $this->getDBConnector ();
		$individualModel = $this->IndividualT;
		$currentWorkAddress = $individualModel->fetchUserCurrentWorkAddress ( $dbConn, $this->Auth->user('Individual_ID') );
		if (empty ( $currentWorkAddress )) {
			$currentWorkAddress = "N/A";
		}
		
		// setting the addresses to the session so we can access it when the post request comes along
		$this->Auth->session->write ( 'currentWorkAddress', $currentWorkAddress );
		$this->Auth->session->write ( 'primaryAddress', $primaryAddress );
		
		// set the following so that the ctp file can access the addresses for displaying
		$this->set ( 'primaryAddress', $primaryAddress );
		$this->set ( 'currentWorkAddress', $currentWorkAddress );
	}
	
	/**
	 * This method is used to confirm the exam registration of the candidate
	 * 
	 * @author team_syzzygy
	 * @param string $iemail        	
	 */
	public function confirmexamregistration($iemail = null) {
		$this->set ( 'email', $this->Auth->user('Email_Address'));
		
		//POST REQUEST HANDLER
		if ($this->request->is ( 'post' )) {
			// If the user hit the cancel button take him back to the dashboard
			if (isset ( $this->request->data ['cancel'] )) {
				$this->_clearSession();
				return $this->redirect ( array (
						'action' => 'dashboard' 
				) );
			}
			
			if (strcmp ( $this->Auth->session->read ( 'paymentMethod' ), 'credit' ) == 0) {
				return $this->redirect ( array (
						'action' => 'confirmexamregistrationcc' 
				) );
			}
			else if (strcmp ( $this->Auth->session->read ( 'paymentMethod' ), 'paycode' ) == 0) {
				return $this->redirect ( array (
						'action' => 'confirmexamregistrationpc' 
				) );
			}
			
			else if (strcmp ( $this->Auth->session->read ( 'paymentMethod' ), 'check' ) == 0) {
				return $this->redirect ( array (
						'action' => 'confirmexamregistrationch'
				) );
			}
			
		}//POST REQUEST HANDLER ENDS HERE
		
		
		if(empty($this->Auth->session->read('fee'))){
			$this->Flash->error(__('Fees information not found. Please contact CEPI at (408) 554-2187 or email us at cepi@scu.edu'));
			return $this->redirect ( array (
					'action' => 'dashboard'
					
			) );
		}
		
		
		
		
		//The following will alter the fee that the Individual needs to pay .. $200 discount if he is registering for any level apart from 1
		if($this->Auth->session->read('level')>1 && !strcmp($this->Auth->session->read('retest'),"Yes")==0 && !strcmp($this->Auth->session->read('deferexam'),"Yes")==0){
			$this->set ( 'fee', $this->Auth->session->read ( 'fee' )-200 );
		}
		else $this->set ( 'fee', $this->Auth->session->read ( 'fee' ) );	
		$this->set ( 'studentId', $this->Auth->user ( 'Individual_ID' ) );
		$this->set ( 'selectedAddress', $this->Auth->session->read ('selectedAddress') );
		$this->set ( 'location', $this->Auth->session->read ( 'selectedExamLocation' ) );
		$this->set ( 'disabled', $this->Auth->session->read ( 'disabled' ) );
		$this->set ( 'satadmission', $this->Auth->session->read ( 'satadmission' ) );
		$this->set ( 'releaseInfo', $this->Auth->session->read ( 'releaseInfo' ) );
		$this->set ( 'paymentMethod', $this->Auth->session->read ( 'paymentMethod' ) );
		if ($this->Auth->session->check ( 'paymentCode' ))
			$this->set ( 'paymentCode', $this->Auth->session->read ( 'paymentCode' ) );
		$this->set ( 'date', $this->Auth->session->read ( 'date' ) );
		$this->set ( 'level', $this->Auth->session->read ( 'level' ) );
	}
	
	
	/**
	 * This will be the call back URL from Paypal in case something went wrong with the payment...Needs to be changed as per CEPI instructions
	 * @return Ambigous <void, \Cake\Network\Response>
	 */
	public function paypalerror(){
		$this->Flash->error(__('Something went wrong in your payment with Paypal. Please contact CEPI at (408) 554-2187 or email us at cepi@scu.edu '));
		return $this->redirect(['action'=>'dashboard']);
	}
	
	
	/**
	 * * This will be the call back URL from Paypal in case user decides to cancel payment to Paypal...Needs to be changed as per CEPI instructions
	 * @return Ambigous <void, \Cake\Network\Response>
	 */
	public function paypalcancel(){
		$this->Flash->error(__('You have cancelled your payment with Paypal.Your exam registration has been cancelled. Please contact CEPI at (408) 554-2187 or email us at cepi@scu.edu '));
		return $this->redirect(['action'=>'dashboard']);
	}
	
	/**
	 * This will be the call back URL from paypal when payment is approved..Needs to be changed as per CEPI instructions
	 * @return Ambigous <void, \Cake\Network\Response>
	 */
	public function paypalsuccess(){		
		$outcome="Not Yet Taken";
		//If the deferexam flag is set to true in the session
		if(strcmp($this->Auth->session->read('deferexam'),"Yes")==0){
			$outcome="Deferred";
		}
		
		$explodedarr=explode(',',$this->Auth->session->read('selectedAddress'),2);
		
		
		$examCCConfirmation=[
				'Student_ID'=>$this->Auth->user('Individual_ID'),
				'Exam_ID'=>$this->Auth->session->read('selectedExamId'),
				'Payment_Type'=>'Credit Card',				
				'Amount_Charged' => $_POST['AMT'],
				'Retest' => $this->Auth->session->read('retest'),
				'Disability_Accomodations' => $this->Auth->session->read('disabled'),
				'Location' => $this->Auth->session->read('selectedExamLocation'),
				'Required_Non_Saturday_Admission' => $this->Auth->session->read ( 'satadmission' ),
				'Release_Contact_Info_To_Others' => $this->Auth->session->read ( 'releaseInfo' ),
				'Registration_Complete_Flag' => 'Yes',
				'Outcome'=>$outcome,
				'Verisign_Transaction_Number'=>$_POST["PNREF"],
				'Verisign_Address_Line1'=>$explodedarr[0],
				'Verisign_Address_Line2'=>$explodedarr[1],
				'Payment_Execution_Date_Time'=>$_POST['TRANSTIME']
						];
		
		
		
		try{
			$this->RegistrationT->persistExamRegistrationPC($examCCConfirmation);
			$this->Auth->session->write('pyplbypass',true);
			$this->Flash->success(__("Successfully registered for Exam Level ".$this->Auth->session->read ('level') ."..
					Good Luck!! If you have any questions about your exam registration please contact CEPI at (408) 554-2187 or email us at cepi@scu.edu"));
			return $this->redirect(['action'=>'examconfirmletter']);
				
		}catch(\Exception $e){
			$this->Flash->error($e->getMessage());
			return	$this->redirect(['action'=>'dashboard']);
		}	
	}
	
	/**
	 * This function will perform the actual Credit Card processing
	 *
	 * @param string $iemail
	 */
	public function confirmexamregistrationcc($iemail = null) {
		$this->set ( 'email', $this->Auth->user('Email_Address'));
		$this->set ( 'date', $this->Auth->session->read ( 'date' ) );
		$this->set ( 'level', $this->Auth->session->read ( 'level' ) );
		$this->set ( 'location', $this->Auth->session->read ( 'selectedExamLocation' ) );
		$this->set ( 'studentId', $this->Auth->user ( 'Individual_ID' ) );
		$this->set ( 'fee', $this->Auth->session->read ( 'fee' ) );
		$this->set('randregid',md5(($this->Auth->user('Individual_ID').''. $this->Auth->session->read ( 'level' ).''.strtotime($this->Auth->session->read( 'date' )))));		
	}
	
	/**
	 * This function will confirm exam registration if the payment option is CHECK
	 * @param string $iemail
	 */
	public function confirmexamregistrationch($iemail=null){
		$this->set ( 'email', $this->Auth->user('Email_Address'));
		$this->set ( 'date', $this->Auth->session->read ( 'date' ) );
		$this->set ( 'level', $this->Auth->session->read ( 'level' ) );
		$this->set ( 'location', $this->Auth->session->read ( 'selectedExamLocation' ) );
		$this->set ( 'studentId', $this->Auth->user ( 'Individual_ID' ) );
		$this->set ( 'fee', $this->Auth->session->read ( 'fee' ) );	

		//find payment code
		$paymentCodeId=$this->PaymentCodeT->findCheckPaymentCode()->Payment_Code_ID;
		$outcome="Not Yet Taken";
		//If the deferexam flag is set to true in the session
		if(strcmp($this->Auth->session->read('deferexam'),"Yes")==0){
			$outcome="Deferred";
		}
		
		//Now that the payment code has been validated...complete the registration
		$examCheckConfirmation=[
				'Student_ID'=>$this->Auth->user('Individual_ID'),
				'Exam_ID'=>$this->Auth->session->read('selectedExamId'),
				'Payment_Type'=>'Check (Pending)',
				'Payment_Code_ID' => $paymentCodeId,
				'Amount_Charged' => $this->Auth->session->read('fee'),
				'Retest' => $this->Auth->session->read('retest'),
				'Disability_Accomodations' => $this->Auth->session->read('disabled'),
				'Location' => $this->Auth->session->read('selectedExamLocation'),
				'Required_Non_Saturday_Admission' => $this->Auth->session->read ( 'satadmission' ),
				'Release_Contact_Info_To_Others' => $this->Auth->session->read ( 'releaseInfo' ),
				'Registration_Complete_Flag' => 'Yes',
				'Outcome'=>$outcome
		];
		
		try{
		$this->RegistrationT->persistExamRegistrationPC($examCheckConfirmation);
		$this->Flash->success(__("Successfully registered for Exam Level ".$this->Auth->session->read ('level') ."..
					Good Luck!! If you have any questions about your exam registration please contact CEPI at (408) 554-2187 or email us at cepi@scu.edu"));
		return $this->redirect(['action'=>'examconfirmletter']);
			
		}catch(\Exception $e){
			$this->Flash->error ( $e->getMessage() );
			return	$this->redirect(['action'=>'dashboard']);
		}		
	}
	
	/**
	 * This function will confirm exam registration if the payment option is PAYCODE
	 * @param string $iemail
	 */
	
	public function confirmexamregistrationpc($iemail=null){
		$this->set ( 'email',$this->Auth->user('Email_Address'));
		$this->set ( 'date', $this->Auth->session->read ( 'date' ) );
		$this->set ( 'level', $this->Auth->session->read ( 'level' ) );
		$this->set ( 'location', $this->Auth->session->read ( 'selectedExamLocation' ) );
		$this->set ( 'studentId', $this->Auth->user ( 'Individual_ID' ) );
		$this->set ( 'fee', $this->Auth->session->read ( 'fee' ) );
		
		//if the fee is NOT 0 then check the paymentcode punched in... 
		if($this->Auth->session->read('fee')!=0){
			$result=$this->PaymentCodeT->verifyPaymentCode($this->Auth->session->read('paymentCode'));
			
			//if the result comes back as empty that means that the paymentCode is not valid.
			if(empty($result)){
				$this->Flash->error(__("Payment Code ".$this->Auth->session->read('paymentCode')." is invalid. Please contact CEPI at (408) 554-2187 or email us at cepi@scu.edu"));
				return	$this->redirect(['action'=>'dashboard']);
			}
		}				
		
		$outcome="Not Yet Taken";
		//If the deferexam flag is set to true in the session
		if(strcmp($this->Auth->session->read('deferexam'),"Yes")==0){
			$outcome="Deferred";
		}

		//Now that the payment code has been validated...complete the registration
		$examPCConfirmation=[ 
		  						'Student_ID'=>$this->Auth->user('Individual_ID'),
								'Exam_ID'=>$this->Auth->session->read('selectedExamId'),
								'Payment_Type'=>'Payment Code - Unconfirmed',
				 				'Payment_Code_ID' => $result->Payment_Code_ID,
         						'Amount_Charged' => $this->Auth->session->read('fee'),
						        'Retest' => $this->Auth->session->read('retest'),
						        'Disability_Accomodations' => $this->Auth->session->read('disabled'),
						        'Location' => $this->Auth->session->read('selectedExamLocation'),
						        'Required_Non_Saturday_Admission' => $this->Auth->session->read ( 'satadmission' ),
						        'Release_Contact_Info_To_Others' => $this->Auth->session->read ( 'releaseInfo' ),
						        'Registration_Complete_Flag' => 'Yes',
						        'Outcome'=>$outcome		  		
		  ];		
		try{			
			if($this->Auth->session->check('prefAddress'))
			$this->IndividualT->updateShippingPreference($this->Auth->user('Individual_ID'),$this->Auth->session->read('prefAddress'));
			else{
				throw new \Exception();
			}

			$this->RegistrationT->persistExamRegistrationPC($examPCConfirmation);
			$this->Flash->success(__("Successfully registered for Exam Level ".$this->Auth->session->read ('level') ."..
					Good Luck!! If you have any questions about your exam registration please contact CEPI at (408) 554-2187 or email us at cepi@scu.edu"));			
			return $this->redirect(['action'=>'examconfirmletter']);
							
			}catch(\Exception $e){	
				Debugger::dump($e->getMessage());		
			$this->Flash->error ( $e->getMessage().'.If you continue to have problems
								 registering for this exam using your payment code, contact the CEPI at
								cepi@scu.edu or (408) 554-2187 ' );			
			return	$this->redirect(['action'=>'dashboard']);
		}
		
	}
	
	
	
	/**
	 * This function will generate the confirmation letter for the exam level 1/2/3
	 * @param string $iemail
	 * @return Ambigous <void, \Cake\Network\Response>
	 */
	public function examconfirmletter($iemail=null,$level=null){
		$this->set('email',$this->Auth->user('Email_Address'));
		$function_referer=$this->request->referer();		
		if(!$this->Auth->session->check('pyplbypass')){
		//if I have not come from confirmexamregistrationpc or dashboard then I should bomb out
		if(strpos(strtoupper($function_referer),"CONFIRMEXAMREGISTRATION") === false){
			$this->Flash->error(__('You are not authorized to access that location'));	
			return $this->redirect (['action' => 'dashboard']);			
		} 
		}
		else{
			//this is a hack only for credit card processing...since the referrer for from paypal success is somehow coming out to be /
			$this->Auth->session->delete('pyplbypass');
		}
		if($this->request->is('get')){
			//GET the most recent Exam 1 confirmation letter.If nothing is found redirect to the dashboard with error 			
			$this->set('examlocation',$this->Auth->session->read('selectedExamLocation'));
			$this->set('date',$this->Auth->session->read ( 'date' ));
			$this->set('amountcharged',$this->Auth->session->read('fee'));
			$this->set('level',$this->Auth->session->read('level'));
			$this->set('fname',$this->Auth->user('First_Name'));
			$this->set('lname',$this->Auth->user('Last_Name'));
		}
		else
		{
			$this->Flash->error(__('You are not authorized to access this location. Once you register for an exam you will be able to access the confirmation letter for level 1'));
			return $this->redirect (['action' => 'dashboard']);	
		}		
	}
	
	/**
	 * This function is used to process the status and the examination registration status section in the dashboard
	 * @param unknown $examid
	 * @param unknown $level
	 * @param unknown $outcome
	 * @author team_syzzygy
	 */
	private function _processStatusInformation($examid,$level,$outcome){
		if(empty($examid))
			{
				$this->set('status',"Register for Exam Level 1");
				$this->set('examstatus',"Register for Exam Level 1");				
				return;			
			}		
		$upperOutcome=strtoupper($outcome);		
		if($level==1){				
			if(strcmp($upperOutcome,"NOT YET TAKEN")==0 || strcmp($upperOutcome,"PENDING RESULTS")==0 || strcmp($upperOutcome,"DEFERRED")==0)
			{
				$this->set('status', "Registered for Exam Level 1");
				$this->set('examstatus',"Registered for Exam Level 1");
				$this->set('exam1confirmletter',"Print Exam 1 Confirmation  Letter");
				return;
			}
						
			else if(strcmp($upperOutcome,"FAIL")==0 || strcmp($upperOutcome,"CANCELLED")==0|| strcmp($upperOutcome,"NO SHOW")==0 || strcmp($upperOutcome,"WITHDRAWN")==0 || strcmp($upperOutcome,"TRANSFERRED")==0)
			{
				$this->set('status','Register for Exam Level 1');			
				$this->set('examstatus','Register for Exam Level 1');
				return;
			}
			else if (strcmp($upperOutcome,"PASS")==0){
				$this->set('status','Register for Exam Level 2');
				$this->set('examstatus','Cleared Exam Level 1');
				return;
			}
		}//if block for level 1
		else if ($level ==2){
			if(strcmp($upperOutcome,"NOT YET TAKEN")==0 || strcmp($upperOutcome,"PENDING RESULTS")==0 || strcmp($upperOutcome,"DEFERRED")==0)
			{
				$this->set('status', "Registered for Exam Level 2");
				$this->set('examstatus',"Cleared Exam Level 1");
				$this->set('exam2confirmletter',"Print Exam 2 Confirmation  Letter");
				return;
			}
			
			else if(strcmp($upperOutcome,"FAIL")==0 || strcmp($upperOutcome,"CANCELLED")==0|| strcmp($upperOutcome,"NO SHOW")==0 || strcmp($upperOutcome,"WITHDRAWN")==0 || strcmp($upperOutcome,"TRANSFERRED")==0)
			{
				$this->set('status','Register for Exam Level 2');
				$this->set('examstatus','Cleared Exam Level 1');
				return;
			}
			else if (strcmp($upperOutcome,"PASS")==0){
				$this->set('status','Register for Exam Level 3');
				$this->set('examstatus','Cleared Exam Level 2');
				return;
			}
		}//conditional block for level 2 ends
		
		else if ($level ==3){
			if(strcmp($upperOutcome,"NOT YET TAKEN")==0 || strcmp($upperOutcome,"PENDING RESULTS")==0 || strcmp($upperOutcome,"DEFERRED")==0)
			{
				$this->set('status', "Registered for Exam Level 3");
				$this->set('examstatus',"Cleared Exam Level 2");
				$this->set('exam3confirmletter',"Print Exam 3 Confirmation  Letter");
				return;
			}
				
			else if(strcmp($upperOutcome,"FAIL")==0 || strcmp($upperOutcome,"CANCELLED")==0|| strcmp($upperOutcome,"NO SHOW")==0 || strcmp($upperOutcome,"WITHDRAWN")==0 || strcmp($upperOutcome,"TRANSFERRED")==0)
			{
				$this->set('status','Register for Exam Level 3');
				$this->set('examstatus','Cleared Exam Level 2');
				return;
			}
			else if (strcmp($upperOutcome,"PASS")==0){
				$this->set('status','CEP - Active');
				$this->set('examstatus','Cleared Exam Level 3');
				return;
			}
		}//conditional block for level 3 ends
		else{
			$this->set('status','---');
			$this->set('examstatus','---');
			return;
		}
	}
	
	/**
	 *
	 * @author team_syzzygy
	 *         This method will display the user dashboard
	 */
	public function dashboard($iemail = null) {
		$this->_clearSession();		
		$dbConn = $this->getDBConnector ();
		$iemail=$this->Auth->user('Email_Address');
		
		//Log::write('debug','EMAIL PASSED IN AS=====>'.$iemail);
		if ($iemail == null || empty ( $iemail )) {
			Log::write ( 'debug', 'Unable to display information on dashboard was shown because the email address that was passed was empty or null.' );
			return $this->redirect ( [ 
					'action' => 'logout' 
			] );
		}
		$individualModel = $this->IndividualT;
		$results = $individualModel->fetchRegisteredUser ( $dbConn, $this->Auth->user('Individual_ID') );		
		
		//Debugger::dump($results);
		
		$recentExamInfo=$this->ExaminationT->getRecentExamInformation($dbConn,$this->Auth->user('Individual_ID'));		

		if(empty($recentExamInfo->Exam_ID)){
			$this->_processStatusInformation('','','');
		}
		else
		$this->_processStatusInformation($recentExamInfo->Exam_ID,$recentExamInfo->Exam_Level,$recentExamInfo->examRegistrationInfo[0]->Outcome);			
		//TODO : finish off the data that needs to get populated in the Registration Information section
		Log::write ( 'debug', 'Email retrieved from database is ' . $results->Email_Address );
		$this->set( 'results', $results);
		$this->set('recentexaminfo',$recentExamInfo);			
	}
	
	/**
	 *
	 * @author team_syygy
	 */
	public function usereditprofile($iemail = null) {
		$dbConn = $this->getDBConnector ();
		$iemail=$this->Auth->user('Email_Address');
		
		if ($this->request->is ( 'post' )) {
			$individualModel = $this->IndividualT;
			if (isset ( $this->request->data ['cancel'] )) {
				return $this->redirect ( array (
						'action' => 'dashboard',						 
				) );
			} else {
				// user has submitted changes with the data...
				if(strcmp($_POST['email'],$this->Auth->user('Email_Address'))!=0 && $individualModel->checkIfEmailIsPreRegistered($_POST['email'])===true){
					$this->Flash->error(__('Cannot use '.$_POST['email'].'. It is already taken by another user'));
					return $this->redirect ( array (
						'action' => 'dashboard',						 
				) );					
				}				
				$results = $individualModel->fetchRegisteredUser ( $dbConn, $this->Auth->user('Individual_ID') );
				$results->First_Name = $_POST ['fname'];
				$results->Last_Name = $_POST ['lname'];
				$results->Middle_Initial = $_POST ['mname'];
				$results->Home_Phone=$_POST['homephone'];
				$results->Mobile_Phone=$_POST['mobilephone'];				
				$results->Email_Address = $_POST ['email'];
				$results->Alternate_Email_Address = $_POST ['alternateemail'];
				$results->Address1 = $_POST ['address1'];
				$results->Address2 = $_POST ['address2'];
				$results->City = $_POST ['city'];
				$results->State = $_POST ['state'];
				$results->Postal_Code = $_POST ['zip'];
				$results->Country = $_POST ['country'];
				$results->Do_Not_Mail = $_POST ['emailoptout'];
				$results->studentInfo->Purpose_For_Enrollment = $_POST ['purpose'];
				$results->studentInfo->Referred_By = $_POST ['referer'];
				$results->studentInfo->Highest_Education_Level = $_POST ['education'];
				$studentOrgTypeArray = array ();
				if (! empty ( $_POST ['memberoforgs'] )) {
					for($x = 0; $x < count ( $_POST ['memberoforgs'] ); $x ++) {
						$studentOrgType = $individualModel->StudentT->StudentOrganizationTypeT->newEntity ();
						$studentOrgType->Organization_Type = $_POST ['memberoforgs'] [$x];
						$studentOrgTypeArray [$x] = $studentOrgType;
					}
				}
				
				for($x = 0; $x < count ( $results->studentInfo->studentOrgType ); $x ++)
					$individualModel->StudentT->StudentOrganizationTypeT->delete ( $results->studentInfo->studentOrgType [$x] );
				
				$results->studentInfo->studentOrgType = $studentOrgTypeArray;
				

				
				
				
				
				$individualModel->saveUserProfile ( $dbConn, $results );				
				$temp=$this->Auth->user();
				$temp['Email_Address']=$results->Email_Address;
				$this->Auth->setUser($temp);
				$this->Flash->success ( 'Successfully updated user profile.' );
				return $this->redirect ( array (
						'action' => 'dashboard'						 
				) );
			}
			
			
			
			
			
			
			
			
		} else if ($this->request->is ( 'get' )) {
			$this->_clearSession();			
			$individualModel = $this->IndividualT;
			$results = $individualModel->fetchRegisteredUser ( $dbConn, $this->Auth->user('Individual_ID') );
			$memberOfOrgs = array ();
			// set the memberOfOrgs in a separate array so that we do not have to do this in the ctp layer,
			// and can directly assign the values to the memberOfOrgs array
			for($i = 0; $i < count ( $results->studentInfo->studentOrgType ); $i ++) {
				$memberOfOrgs [$i] = $results->studentInfo->studentOrgType [$i]->Organization_Type;
			}
			// Debugger::dump($memberOfOrgs);
			$this->set ( 'email', $results->Email_Address);
			$this->set ( 'results', $results );
			$this->set ( 'memberOfOrgs', $memberOfOrgs );
		}
	}
	
	/**
	 *
	 * @author team_syzzygy
	 *         This method will edit the login credentials of the candidate
	 */
	public function usereditlogin() {		
		$iemail=$this->IndividualT->fetchLoggedInUserPrimaryEmailAddress($this->Auth->user('Individual_ID'));
		$this->set ( 'email', $iemail->Email_Address);
		$this->_clearSession();
		if ($this->request->is ( 'post' )) {
			if (isset ( $this->request->data ['cancel'] )) {
				return $this->redirect ( array (
						'action' => 'dashboard'												 
				) );
			} else if (isset ( $this->request->data ['ok'] )) {
				$newemail = $_POST ['email'];
				$newpasswd = $_POST ['passwd'];
				$newconfpasswd = $_POST ['confirmpasswd'];
				// if no updates have been requested..both passwords are empty and the original email address is the same as the new one
				if (empty ( $newconfpasswd ) && empty ( $newpasswd ) && strcmp ( $newemail, $this->Auth->user('Email_Address')) == 0) {
					return $this->Flash->success ( 'No updates requested.' );
				} 				// Change password is empty but Repeat Password is not empty
				else if (empty ( $newpasswd ) && ! empty ( $newconfpasswd ) && $newconfpasswd != null) {
					return $this->Flash->error ( 'If you want to change your password please fill in both Change Password and Repeat Password fields' );
				} 				// Change password is not empty but Repeat password is empty
				else if (! empty ( $newpasswd ) && empty ( $newconfpasswd ) && $newpasswd != null) {
					return $this->Flash->error ( 'If you want to change your password please fill in both Repeat Password and Change Password fields' );
				} 				// If the passwords do not match
				else if (strcmp ( $newpasswd, $newconfpasswd ) != 0) {
					return $this->Flash->error ( 'Passwords do not match' );
				} 				// If the password length is less than 8 characters
				else if (! empty ( $newconfpasswd ) && strlen ( $newconfpasswd ) < 8) {
					return $this->Flash->error ( 'Password should have minimum of 8 characters' );
				} else {
					// pull out the original user based on their email address
					$individualModel = $this->IndividualT;
					$dbConn = $this->getDBConnector ();
					$user = $individualModel->fetchRegisteredUser ( $dbConn, $this->Auth->user('Individual_ID'));
					
					// has the email been requested to change
					if (strcmp ( $newemail, $this->Auth->user('Email_Address') ) != 0) {
						// email has been requested to be changed
						$user ['Email_Address'] = $newemail;
					}
					$passwdchange=false;
					// has the password been requested to change
					if (! empty ( $newpasswd )) {
						$user ['Password'] = $newpasswd;					
						$passwdchange=true;
					}
					try {
						$individualModel->updateIndividual ( $dbConn, $user,$passwdchange );
						$this->Flash->success ( 'Successfully updated login information.' );
						return $this->redirect ( array (
								'action' => 'dashboard' 
						) );
					} catch ( \Exception $e ) {
						$this->Flash->error ( 'Something went wrong while updating login information.If you continue to have problems
								 accessing your account, contact the CEPI at 
								cepi@scu.edu or (408) 554-2187 ' );
					}
				}
			}
		}
	}
	
	/**
	 *
	 * @author team_syzzygy
	 *         generateRandStr - Generates a string made up of randomized
	 *         letters (lower and upper case) and digits, the length
	 *         is a specified parameter. Used in forgot password scripts.
	 */
	function generateRandStr($length) {
		$randstr = "";
		for($i = 0; $i < $length; $i ++) {
			$randnum = mt_rand ( 0, 61 );
			if ($randnum < 10) {
				$randstr .= chr ( $randnum + 48 );
			} else if ($randnum < 36) {
				$randstr .= chr ( $randnum + 55 );
			} else {
				$randstr .= chr ( $randnum + 61 );
			}
		}
		return $randstr;
	}
	
	/**
	 * sendNewPassword - Sends the newly generated password
	 * to the user's email address that was specified at
	 * sign-up.
	 */
	function sendNewPassword($username, $emailaddress, $password) {
		$from = "";
		$subject = "CEPI Site - Your new password";
		$body = "Dear " . $username . ",\n\n" . "We've generated a new password for you at your " . "request, you can use this new password with your " . "username to log in to CEPI Site.\n\n" . "Username: " . $emailaddress . "\n" . "New Password: " . $password . "\n\n" . "It is recommended that you change your password " . "to something that is easier to remember, which " . "can be done by going to the Update Admin page " . "and clicking on your username " . "after signing in.\n\n\n" . "CEP Institute\n" . "cepi@scu.edu\n" . "(408) 554-2187\n" . "http://www.scu.edu/business/cepi\n";
		$email = new Email ( 'default' );
		return $email->from ( [ 
				'cepi@scu.edu' => 'CEP Institute' 
		] )->to ( $emailaddress )->subject ( $subject )->send ( $body );
	}
	/**
	 *
	 * @author team_syzzygy
	 *         If the forgot Password form is submitted then this method gets invoked
	 */
	public function forgot() {
		if ($this->request->is ( 'post' )) {
			$dbConn = $this->getDBConnector ();
			$usermail = $_POST ['Email_Address'];
			$lastName = $_POST ['Last_Name'];
			$individualModel = $this->IndividualT;
			try {
				$individual = $individualModel->fetchForgotPasswordIndividual ( $dbConn, $usermail, $lastName );
				$newRandomPasswd = $this->generateRandStr ( 8 );
				$email = $this->sendNewPassword ( $individual ['First_Name'], $usermail, $newRandomPasswd );
				$individual ['Password'] = $newRandomPasswd;
				$individualModel->updateIndividual ( $dbConn, $individual,true );
				$this->Flash->success ( 'Password Reset Successful' );
				return $this->redirect ( array (
						'action' => 'login' 
				) );
			} catch ( \Exception $e ) {
				if (strcmp ( $e->getMessage (), 'Multiple users found' ) == 0) {
					Log::write ( 'error', 'Multiple users found with Email=>' . $usermail . ' and Last Name=>' . $lastName );
					$this->Flash->error ( __ ( 'Something went wrong while 
								resetting your password. If you continue to have problems
								 accessing your account, contact the CEPI at 
								cepi@scu.edu or (408) 554-2187' ) );
				} else if (strcmp ( $e->getMessage (), 'User not found' ) == 0) {
					Log::write ( 'debug', 'User with Email=>' . $usermail . ' and Last Name=>' . $lastName . ' not found' );
					$this->Flash->error ( __ ( 'Email and last name combination not found.
Please re-enter or contact the CEPI at cepi@scu.edu or (408) 554-2187' ) );
				} else {
					Log::write ( 'debug', 'Failed to update the new password for the user with email=' . $usermail );
					$this->Flash->error ( __ ( 'Something went wrong while 
								resetting your password. If you continue to have problems
								 accessing your account, contact the CEPI at 
								cepi@scu.edu or (408) 554-2187' ) );
				}
			}
		}
	}
	
	
	
	/**
	 *
	 * @author team_syzzygy
	 *         This function should remain empty. This will render the register.ctp page
	 */
	public function register() {
		if ($this->request->is ( 'post' )) {			
			$this->registerIndividual ();
		}
	}
	
	/**
	 *
	 * @author team_syzzygy
	 * @param string $iemail        	
	 * @return Ambigous <void, \Cake\Network\Response>
	 */
	public function viewexamhistory($iemail = null) {		
		$paginate = [
				// 'fields' => ['Exam_ID','Exam_Level','Exam_Date','Enabled','Registration_Deadline','Deferment_Deadline'],
				'limit' => 10 
		];
		if ($this->request->is ( 'get' )) {
			$this->_clearSession();
			$dbConn = $this->getDBConnector ();
			$examhistory = $this->ExaminationT->getStudentExamHistory ( $this->Auth->user ( 'Individual_ID' ) );
			$this->set ( 'results', $this->paginate ( $examhistory ) );
		} else {
			$this->Flash->error ( 'Invalid Request Issued' );
			return $this->redirect ( array (
					'action' => 'dashboard' 
			) );
		}
	}
	
	/**
	 *
	 * @author team_syzzygy
	 *         This function will receive the posted information from the register.ctp page, and will persist to the individual_t table
	 *        
	 */
	public function registerIndividual() {
		Log::write ( 'debug', 'Register Individual has been called' );
		$userConfig = array (
				// retrieve input from new_student_create.php
				// individual:
				'First_Name' => $_POST ["fname"],
				'Last_Name' => $_POST ['lname'],
				'Middle_Initial' => $_POST ['mname'],
				'Email_Address' => $_POST ['email'],
				'Alternate_Email_Address' => $_POST ['alternateemail'],
				'Home_Phone' => $_POST ["homephone"],
				'Mobile_Phone' => $_POST ["mobilephone"],
				'Password' => $_POST ["password"],
				'Address1' => $_POST ["address1"],
				'Address2' => $_POST ["address2"],
				'City' => $_POST ["city"],
				'State' => $_POST ["state"],
				'Postal_Code' => $_POST ["zip"],
				'Country' => $_POST ["country"],				
				'Do_Not_Mail' => 'No',
				// student
				'Purpose_For_Enrollment' => $_POST ["purpose"],
				'Referred_By' => $_POST ["referer"],
				'Highest_Education_Level' => $_POST ["education"],
				'Individual_Company' => $_POST ["company"],
				'Individual_Title' => $_POST ["title"],
				'Individual_Department' => $_POST ["department"],
				'Company_Type' => $_POST ["companytype"],
				'memberoforgs' => $_POST ['memberoforgs'],
				'Work_Phone' => empty($_POST ['companyphone'])?null:$_POST['companyphone'],
				'Work_Extension' => empty($_POST ['extension'])?null:$_POST['extension'],
				'Work_Fax_Number' => empty($_POST ['fax'])?null:$_POST['fax'] 
		);
		//$userConfig ['Do_Not_Mail'] = 'Yes';
		if ($_POST ["sameaddress"] == '1') {
			$userConfig ['Work_Address1'] = $_POST ['address1'];
			$userConfig ['Work_Address2'] = $_POST ['address2'];
			$userConfig ['Work_City'] = $_POST ['city'];
			$userConfig ['Work_State'] = $_POST ['state'];
			$userConfig ['Work_Postal_Code'] = $_POST ['zip'];
			$userConfig ['Work_Country'] = $_POST ['country'];
		} else if ($_POST ["sameaddress"] == '0') {
			$userConfig ['Work_Address1'] = $_POST ["companyaddress1"];
			$userConfig ['Work_Address2'] = $_POST ["companyaddress2"];
			$userConfig ['Work_City'] = $_POST ["companycity"];
			$userConfig ['Work_State'] = $_POST ["companystate"];
			$userConfig ['Work_Postal_Code'] = $_POST ["companyzip"];
			$userConfig ['Work_Country'] = $_POST ["companycountry"];
		}
		// check for the same password:
		if (strcmp ( $_POST ["password"], $_POST ["passconfirm"] ) != 0) {
			Log::write ( 'debug', "Passwords do not match" );
			$this->Flash->error ( "Passwords do not match" );
			return $this->redirect ( array (
					'action' => 'register' 
			) );
		}
		
		
		// passwords match..check for minimum length
		if (strlen ( $_POST ["password"] ) < 8) {
			Log::write ( 'debug', 'Password length passed in =>' . strlen ( $_POST ["password"] . " and password is =>" . $_POST ["password"] ) );
			Log::write ( 'debug', "Passwords must have a minimum of 8 characters" );
			$this->Flash->error ( "Passwords must have a minimum of 8 characters" );
			return $this->redirect ( array (
					'action' => 'register' 
			) );
		}
		
		if (empty ( $_POST ["fname"] )) {
			Log::write ( 'debug', "firstname is empty!" );
			$this->Flash->error ( "firstname is empty!" );
			return;
		}
		if (empty ( $_POST ['lname'] )) {
			Log::write ( 'debug', "lastname is empty!" );
			$this->Flash->error ( "lastname is empty!" );
			return;
		}
		if (empty ( $_POST ["homephone"] )) {
			Log::write ( 'debug', "primary phone is empty" );
			$this->Flash->error ( "primary phone is empty" );
			return;
		}
		if (empty ( $_POST ["address1"] )) {
			Log::write ( 'debug', "address1 is empty" );
			$this->Flash->error ( "address1 is empty" );
			return;
		}
		
		if (empty ( $_POST ["state"] )) {
			Log::write ( 'debug', "state is empty" );
			$this->Flash->error ( "state is empty" );
			return;
		}
		
		if (empty ( $_POST ["city"] )) {
			Log::write ( 'debug', "city is empty" );
			$this->Flash->error ( "city is empty" );
			return;
		}
		
		if (empty ( $_POST ["country"] )) {
			Log::write ( 'debug', "country is empty" );
			$this->Flash->error ( "country is empty" );
			return;
		}
		
		if (empty ( $_POST ["password"] )) {
			Log::write ( 'debug', "pass is empty" );
			$this->Flash->error ( "pass is empty" );
			return;
		}
		
		if (empty ( $_POST ["passconfirm"] )) {
			Log::write ( 'debug', "passconfirm is empty" );
			$this->Flash->error ( "passconf is empty" );
			return;
		}
		
		if (empty ( $_POST ["purpose"] )) {
			Log::write ( 'debug', "purpose is empty" );
			$this->Flash->error ( "purpose is empty" );
			return;
		}
		
		if (empty ( $_POST ["referer"] )) {
			Log::write ( 'debug', "referer is empty" );
			$this->Flash->error ( "referer is empty" );
			return;
		}
		
		if (empty ( $_POST ["education"] )) {
			Log::write ( 'debug', "education is empty" );
			$this->Flash->error ( "education is empty" );
			return;
		} 

		else {
			Log::write ( 'debug', 'Passed all validations of the data posted for new user registration. Attempting to persist the data now' );
		}
		try {
			$dbConn = $this->getDBConnector ();
			Log::write ( 'debug', $userConfig );
			$results = $this->IndividualT->registerUser ( $dbConn, $userConfig );
			
			
			//$this->Auth->setUser ( $userConfig );
			
			$this->Flash->success(__('Candidate registration was successful. Please login with your credentials'));
			return $this->redirect ( array (
					'action' => 'login'
			) );
		} catch ( \PDOException $e1 ) {
			Log::write ( 'error', $e1->getMessage () );
			if (strcmp ( $e1->getMessage (), 'Integrity constraint violation' ) != 0) {
				$this->Flash->error ( "User already exists. Please login using your existing credentials" );
				$this->redirect ( [ 
						'action' => 'login' 
				] );
				return;
			}
		} catch ( \Exception $e ) {
			Log::write ( 'debug', $e->getMessage () );
			if (strcmp ( $e->getMessage (), 'User exists' ) != 0) {
				$this->Flash->error ( "Something went wrong while registration.A group of highly trained monkeys is 
    				actively working to solve the problem. Please try again later");
    		$this->redirect(['action' => 'login']);
    		return;
    	}
    }
    }//register function ends
    
}//end of controller
?>
