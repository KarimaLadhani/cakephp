<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Log\Log;
use App\Model\Entity\ExaminationLocationT;


/**
 * ExaminationT Controller
 *
 * @property \App\Model\Table\ExaminationTTable $ExaminationT
 */
class ExaminationTController extends AdministratorTController//AppController
{
	public $paginate = [
			//'fields' => ['Exam_ID','Exam_Level','Exam_Date','Enabled','Registration_Deadline','Deferment_Deadline'],
			'limit' => 10,
	];
	
	public function initialize(){
		parent::initialize();
		//$this->loadModel('ExaminationLocationT');
		$this->loadComponent('Paginator');
	}	
	
	
	
	public function beforeFilter(Event $event)
	{
		
	}
    /**
     * createexam method
     * @author team_syzzygy     
     */
    public function createexam($username=null)
    {
    	$this->set('iusername',$this->Auth->user('Admin_Username'));
    	//Debugger::dump($_POST);
    	//return;
    	if ($this->request->is('post')) {
    		Log::write('debug','Create Exam has been called');
    		$examConfig= array(
    			//retrieve input from createexam.ctp    			
    			'Exam_Level' => $_POST["Exam_Level"],    			
    			'Exam_Date' => $_POST['Exam_Date'],
    			'Enabled' => $_POST['Enabled'],
    			'Registration_Deadline' => $_POST['Registration_Deadline'],
    			'Deferment_Deadline' => $_POST['Deferment_Deadline'],
    			'US_Enrollment_Fee' => $_POST["US_Enrollment_Fee"],
    			'International_Enrollment_Fee' => $_POST["International_Enrollment_Fee"],
    			'US_Retest_Fee_Current_Year' => $_POST["US_Retest_Fee_Current_Year"],
    			'US_Retest_Fee_Next_Year' => $_POST["US_Retest_Fee_Next_Year"],
    			'US_Deferment_Fee_Before_Deadline' => $_POST["US_Deferment_Fee_Before_Deadline"],
    			'US_Deferment_Fee_After_Deadline' => $_POST["US_Deferment_Fee_After_Deadline"],
    			'International_Retest_Fee_Current_Year' => $_POST["International_Retest_Fee_Current_Year"],
    			'International_Retest_Fee_Next_Year' => $_POST["International_Retest_Fee_Next_Year"],
    			'International_Deferment_Fee_Before_Deadline' => $_POST["International_Deferment_Fee_Before_Deadline"],
    			'International_Deferment_Fee_After_Deadline' => $_POST["International_Deferment_Fee_After_Deadline"],
    			'Exam_Passing_Score' => $_POST["Exam_Passing_Score"],
    			//Locations:    
    			'Locations'=>$_POST["Locations"],
    							
    	);
    	    		
    		for($x=0;$x<count($examConfig['Locations']);$x++){
    			if(strcmp($examConfig["Locations"][$x],"Other-SeeNote")==0){
    				
    				if(empty($_POST['ExamLocationNote'])){

    					$this->Flash->error(__('Other-SeeNote was selected but corresponding Note was empty. Either provide the note, or uncheck Other-SeeNote option'));
    					return;
    				}
    				else{
    					$examConfig['ExamLocationNote']=$_POST['ExamLocationNote'];
    					break;
    				}
    				
    			}
    			
    		}
    		
    		
    		
    		if(!empty($_POST['Note'])){
    			$examConfig['Note']=$_POST['Note'];
    		}
    		
    		
    	if (!is_numeric($_POST['US_Enrollment_Fee'])){
    		$this->Flash->error("US Enrollment fee must be numeric!");    
    		return;
    	}
    	
    	if (!is_numeric($_POST['International_Enrollment_Fee'])){
    		$this->Flash->error("International Enrollment Fee must be numeric!");    	
    		return;
    	}
    	
    	if (!is_numeric($_POST['US_Retest_Fee_Current_Year'])){
    		$this->Flash->error("US Retest Fee for current year must be numeric!");
    		return;
    	}
    	
    	if (!is_numeric($_POST['US_Retest_Fee_Next_Year'])){
    		$this->Flash->error("US Retest Fee for next year must be numeric!");
    		return;
    	}
    	
    	if (!is_numeric($_POST['US_Deferment_Fee_Before_Deadline'])){
    		$this->Flash->error("US Deferment fee before deadline must be numeric!");
    		return;
    	}
    	
    	if (!is_numeric($_POST['US_Deferment_Fee_After_Deadline'])){
    		$this->Flash->error("US Deferment fee after deadline must be numeric!");
    		return;
    	}
    	
    	if (!is_numeric($_POST['International_Retest_Fee_Current_Year'])){
    		$this->Flash->error("International Retest Fee for current year must be numeric!");
    		return;
    	}
    	
    	if (!is_numeric($_POST['International_Retest_Fee_Next_Year'])){
    		$this->Flash->error("International Retest Fee for next year must be numeric!");
    		return;
    	}
    	
    	if (!is_numeric($_POST['International_Deferment_Fee_Before_Deadline'])){
    		$this->Flash->error("International Deferment Fee before deadline must be numeric!");
    		return;
    	}
    	
    	if (!is_numeric($_POST['International_Deferment_Fee_After_Deadline'])){
    		$this->Flash->error("International Deferment Fee after deadline must be numeric!");
    		return;
    	}
    	
    	if(empty($_POST['Exam_Passing_Score'])){
    		$examConfig["Exam_Passing_Score"] = 0;
    	}
    	
    	else 
    	{
    		//Exam Passing Score should be INTEGER and between 2 and 3 digits.
    		if (!is_numeric($_POST['Exam_Passing_Score']) || strlen($_POST['Exam_Passing_Score'])<2 || strlen($_POST['Exam_Passing_Score'])>3){
    			$this->Flash->error("Exam passing score must be a numeric and between 2 & 3 digits!");    			 
    			return;
    		}    		
    	}	
    	   if(empty($_POST['Locations']) ){
	    		$this->Flash->error("Exam Location is a required field!");
	    		return;
	    	}    	
    		
    		if(empty($_POST["Exam_Level"])){
	    		Log::write('debug',"Exam Level is empty!");
	    		$this->Flash->error("Exam Level is empty!");
	    		return;
    		}
    		
    		if(empty($_POST['Exam_Date'])){
    			Log::write('debug',"Exam Date is empty!");
    			$this->Flash->error("Exam Date is empty!");
    			return;
    		}
    		
    		if(empty($_POST["Registration_Deadline"])){
    			Log::write('debug',"Registration Deadline is empty");
    			$this->Flash->error("Registration Deadline is empty");
    			return;
    		}
    		
    		if(empty($_POST["Deferment_Deadline"])){
    			Log::write('debug',"Deferment Deadline is empty");
    			$this->Flash->error("Deferment Deadline is empty");
    			return;
    		}
    		
    		if(strtotime($_POST["Exam_Date"]) < strtotime('today')){
    			$this->Flash->error("Exam Date should be held later than today's date.");    			
    		return;}
    		
    		if(strtotime($_POST["Registration_Deadline"]) < strtotime('today')){
    			$this->Flash->error("Exam Registration Deadline should be later than today's date");
    		return;}

    		
    		if(strtotime($_POST["Deferment_Deadline"]) < strtotime('today')){
    			$this->Flash->error("Exam Deferment Deadline should be later than today's date.");
    			return;
    		}
    		
    		if(strtotime($_POST["Registration_Deadline"]) >= strtotime($_POST["Deferment_Deadline"]))
    		{
    			$this->Flash->error("Exam Deferment Deadline should be later than Registration Deadline.");
    			return;
    		}
    		
    		else
    			Log::write('debug','Passed all validations of the data posted for new create exam. Attempting to persist the data now');
    		

    		try{
    			$dbConn=$this->getDBConnector();
    			Log::write('debug',$examConfig);
    			$results=$this->ExaminationT->createExam($dbConn,$examConfig);
    			//Debugger::dump($results);
    			if($results==true)
    			 $this->Flash->success("Exam created successfully.");
    			else
    				$this->Flash->error("Exam not saved.");
    			
    		}
    	    catch(\Exception $e){
    				$this->Flash->error("Something went wrong while registration.A group of highly trained monkeys is
    				actively working to solve the problem. Please try again later");
    				$this->redirect(['action' => 'logout','controller'=>'AdministratorT']);
    				return;
    		}	
    
    	}//This is the end of the is post request check
    }
    
    


    /**
     * This method will display the set of exams to the admin only
     *
     * @param string|null $id Examination T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function displayexam($iusername = null)
    {       
    	$this->set('iusername',$this->Auth->user('Admin_Username'));
        $dbConn=$this->getDBConnector();
        $examModel = $this->ExaminationT;
        $results=$examModel->displayexam();  
        $this->set('results',$this->paginate($results));
    }
    
    
    /**
     * @param Connection $dbConn
     * @param string|null $id Examination T id.
     * @return multitype:
     */
    public function displayregisteredstudentsforexam($iusername = null){
    	$dbConn=$this->getDBConnector();
    	$examId=$this->request->params['pass'][0];
        $examModel = $this->ExaminationT;
        $results=$examModel->displayregisteredstudentsforexam($dbConn,$examId);
        //Debugger::dump($results);
        $this->set('results',$this->paginate($results));
    }
}
