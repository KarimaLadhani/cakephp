<?php
namespace App\Model\Table;

use App\Model\Entity\ExaminationT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Database\Connection;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;
use Cake\Core\Exception\Exception;
use Cake\Error\Debugger;
use Cake\I18n\Time;
use App\Model\Entity\ExaminationLocationT;


/**
 * ExaminationT Model
 */
class ExaminationTTable extends Table
{
	
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('EXAMINATION_T');
        $this->displayField('Exam_ID');
        $this->primaryKey('Exam_ID');
        $this->hasMany('ExaminationLocationT', [
        		'foreignKey' => 'Exam_ID',
        		'dependent' => true,
        		'className' => 'ExaminationLocationT',
        		'propertyName' => 'examLocationInfo',
        		'strategy' => 'subquery'
        		
        ]);
        
                
        $this->hasMany('RegistrationT', [
        		'foreignKey' => 'Exam_ID',
        		'dependent' => true,
        		'className' => 'RegistrationT',
        		'propertyName' => 'examRegistrationInfo',
        		'bindingKey' => 'Exam_ID'
        ]);               
    }
    
    private function getExamReference(){
    	return TableRegistry::get('ExaminationT');
    }
    
    private function getRegistrationReference(){
    	return TableRegistry::get('RegistrationT');
    }

    private function getIndividualReference(){
    	return TableRegistry::get('IndividualT');
    }
  
     /**
  	This function will fetch the highest level passed by a given candidate
     */
    public function fetchHighestLevelPassedFromDB(Connection $dbConn,$userID){
    	$examLocTbl=$this->getExamReference();
    	$innerQuery=$examLocTbl->RegistrationT->find()->select(['Exam_ID'])->where(['Outcome'=>'Pass','Student_ID'=>$userID]);
    	$result=$examLocTbl->find()->select(['Exam_Level'])->where(['Exam_ID IN'=>$innerQuery])->order(['Exam_Level'=>'DESC'])->first();    	
    	return $result;
    }
    
    /**
     * This function pulls out the exam locations for a given examID
     * @param Connection $dbConn
     * @param unknown $examID
     * @return multitype:
     */
    public function fetchExamLocation(Connection $dbConn,$examID){    
    	//fetching all the possible locations for the passed in exam ID	
    	$examLocTbl=$this->getExamReference()->ExaminationLocationT;
    	$result=$examLocTbl->find('all',
    			array(
    					'fields'=>array('Location_Name','Note'),
  						'order' => array('RIGHT(Location_Name,2)')
					 ))->where(['Exam_ID'=>$examID])->toArray();
    	return $result;
    }
    
    
    /**
     * This function pulls out the registered students for a given examID
     * @param Connection $dbConn
     * @param unknown $examID
     * @return multitype:
     */
    public function displayregisteredstudentsforexam(Connection $dbConn,$examID){
    	Log::write('debug',"EXAM ID IS".$examID);
    	$registrationTbl=$this->getExamReference()->RegistrationT;
    	
    	$studentInfo=$registrationTbl->find()->select(['Student_ID'])->where(['Exam_ID'=>$examID])->order(['Student_ID'=>'ASC']);
		//$regInfo= $registrationTbl->find()->select(['Student_ID','Registration_ID','Outcome','Location','Date_Materials_Sent','Registration_Complete_Flag','Raw_Passing_Score'])->where(['Exam_ID'=>$examID])->order(['Student_ID'=>'ASC']);	
    
		
		/**
		 * $this->Message->find('all', array(
    'joins' => array(
        array(
            'table' => 'users',
            'alias' => 'UserJoin',
            'type' => 'INNER',
            'conditions' => array(
                'UserJoin.id = Message.from'
            )
        )
    ),
    'conditions' => array(
        'Message.to' => 4
    ),
    'fields' => array('UserJoin.*', 'Message.*'),
    'order' => 'Message.datetime DESC'
));
		 */
		
		$regInfo=$registrationTbl->find('all',[				
				'join'=>[
							[
									'table'=>'INDIVIDUAL_T',
									'alias'=>'ind',
									'type'=>'INNER',
									'conditions'=>[
											['ind.individual_id=RegistrationT.student_id']
											
									]									
							]
						],
				'conditions'=>[
						'RegistrationT.Exam_ID'=>$examID
				],
				'order'=>'RegistrationT.Student_ID ASC',
				'fields'=>['ind.First_Name',
						'ind.Last_Name',
						'ind.Email_Address',
						'Student_ID',
						'Registration_ID',
						'Outcome',
						'Location',				
						'Date_Materials_Sent',
						'Registration_Complete_Flag',
						'Raw_Passing_Score'			
				]
		]);
		
		//Debugger::dump($regInfo->first());
		return $regInfo;
// 		$individualTbl=$this->getIndividualReference();
// 		//TODO IMPORTANT FIX THIS...
// 		$result=$individualTbl->find()->select(['First_Name','Last_Name']);//->where([]);
    
    }
    
    
    
    /**
     * This function will fetch a list of registrable exams for the logged in user
     * @param Connection $dbConnection
     * @param int $level
     * @author team_syzzygy
     */
    public function getRegistrableExams(Connection $dbConnection,$level,$id){
    	$today=date('Y-m-d');//'2010-01-01' -> TEST DATE...USE THIS FOR TESTING
    	$examTable=$this->getExamReference();    	
    	$registrationTbl=$this->getRegistrationReference();
    	/* QUERY GETTING EXECUTED BELOW IS THE FOLLOWING:
    	 * select * from EXAMINATION_T where Registration_Deadline >= '$today' 
          and Exam_Level=$level and Enabled = 'Yes' and Exam_ID != all (select Exam_ID from REGISTRATION_T
          where Student_ID=$ID and Registration_Complete_Flag='Yes' and (Outcome != 'Withdrawn' or Outcome != 'Cancelled'))
    	 */
    	$registrableExamQueryInner=$registrationTbl->find()->select('Exam_ID')->where(['Student_ID'=>$id,'Registration_Complete_Flag'=>'Yes','OR'=>[['Outcome !='=>'Withdrawn'],['Outcome !='=>'Cancelled']]]);
    	$registrableExamList=$examTable->find()->where(['Registration_Deadline >=' => $today,'Exam_Level'=>$level,'Enabled'=>'Yes', 'Exam_ID NOT IN'=>$registrableExamQueryInner])->order(['Exam_Date'=>'ASC']);
    	return $registrableExamList;    	
    }
    
   /**
    * this method specifically fetches the registrable list for deferrals
    * @param $dbConnection
    * @param $level
    * @param  $id
    * @author team_syzzygy
    */
    public function getDeferralRegistrableExams(Connection $dbConnection,$level,$id){    	
    	$today=date('Y-m-d');
    	
    	$examTable=$this->getExamReference();
    	$registrationTbl=$this->getRegistrationReference();
    	/* select * from EXAMINATION_T where Registration_Deadline >= '$today' 
	and Exam_Level=$level and (Enabled = 'Yes' or Enabled='Deferments Only') 
	and Exam_ID != all (select Exam_ID from REGISTRATION_T
          where Student_ID=$ID and Registration_Complete_Flag='Yes')
	order by Exam_ID asc
	"*/
    	$registrableExamQueryInner=$registrationTbl->find()->select('Exam_ID')->where(['Student_ID'=>$id,'Registration_Complete_Flag'=>'Yes']);
    	$registrableExamList=$examTable->find()->where(['Registration_Deadline >=' => $today,'Exam_Level'=>$level,  'OR'=>[['Enabled'=>'Yes'],['Enabled'=>'Deferments Only']], 'Exam_ID NOT IN'=>$registrableExamQueryInner]);
    	return $registrableExamList;
    }
    
    /**
     * @param Connection $dbConnection
     * @param array $exam
     * @author  team_syzzygy
     */
    public function createExam(Connection $dbConnection,array $examConfig){
    	$examTable=$this->getExamReference();
    	$exam=$examTable->newEntity();
    	
    	//Debugger::dump($examConfig);
    	$exam->Exam_Level=$examConfig['Exam_Level'];
    	
    	$exam_date=new Time($examConfig['Exam_Date']);
    	$exam->Exam_Date=$exam_date->i18nFormat('YYYY-MM-dd');
    	$exam->Exam_Year=$exam_date->i18nFormat('YYYY');
    	
    	$exam->Enabled=$examConfig['Enabled'];
    	
    	$registration_deadline=new Time($examConfig['Registration_Deadline']);
    	$exam->Registration_Deadline=$registration_deadline->i18nFormat('YYYY-MM-dd');
    	
    	$deferment_deadline=new Time($examConfig['Deferment_Deadline']);
    	$exam->Deferment_Deadline=$deferment_deadline->i18nFormat('YYYY-MM-dd');
    
    	$exam->US_Enrollment_Fee=$examConfig['US_Enrollment_Fee'];
    	$exam->International_Enrollment_Fee=$examConfig['International_Enrollment_Fee'];
    	$exam->US_Retest_Fee_Current_Year=$examConfig['US_Retest_Fee_Current_Year'];
    	$exam->US_Retest_Fee_Next_Year=$examConfig['US_Retest_Fee_Next_Year'];
    	$exam->US_Deferment_Fee_Before_Deadline=$examConfig['US_Deferment_Fee_Before_Deadline'];
    	$exam->US_Deferment_Fee_After_Deadline=$examConfig['US_Deferment_Fee_After_Deadline'];
    	$exam->International_Retest_Fee_Current_Year=$examConfig['International_Retest_Fee_Current_Year'];
    	$exam->International_Retest_Fee_Next_Year=$examConfig['International_Retest_Fee_Next_Year'];
    	$exam->International_Deferment_Fee_Before_Deadline=$examConfig['International_Deferment_Fee_Before_Deadline'];
    	$exam->International_Deferment_Fee_After_Deadline=$examConfig['International_Deferment_Fee_After_Deadline'];
    	$exam->Exam_Passing_Score=$examConfig['Exam_Passing_Score'];
    	
    	
    	if(!empty($examConfig['Note'])){
    		$exam->Note=$examConfig['Note'];
    	}
    	
    	//Debugger::dump($examConfig);
    	 $examLocations=array();
        for( $i=0; $i < count($examConfig['Locations']); $i++ )
        {
        	$examEntity=$examTable->ExaminationLocationT->newEntity();
        	$examEntity->Location_Name=$examConfig['Locations'][$i];
        	$examEntity->System_Date_Time=time();
        	if(strcmp($examConfig['Locations'][$i],"Other-SeeNote")==0){
        		$examEntity->Note=$examConfig['ExamLocationNote'];
        	}
        	$examLocations[$i]=$examEntity;        
        }
        $exam->examLocationInfo=$examLocations;
    	if($examTable->save($exam)){
    		return true;
    		
    	}
    	else{
    		return false;
    		
    	}
    }

    
    /**
     * This method will retrieve the location counts for every exam created by the admin
     * @param Connection $dbConnection
     * @author team_syzzygy
     */
    public function getExamLocationCount(Connection $dbConnection){
    	
    	$query=$this->getExamReference()->ExaminationLocationT->find('all',array('group'=>array('Exam_ID'),'order'=>array('Exam_ID ASC') ));
    	$query->select(['exam_id','examCount' => $query->func()->count('exam_id')]);
		$examLocationCount=$query->toArray();
		return $examLocationCount;    				
    }

    /**
     * This function fetches the defined data to show in the display exams section
     * @return \Cake\ORM\Query
     * @author team_syzzygy
     */
    public function displayexam(){
    	$examTable=$this->getExamReference();    	    	
    	$query=$examTable->find();
    	$result=$query->select(['Exam_ID','Exam_Level','Exam_Date','Enabled','Registration_Deadline','Deferment_Deadline'])
   	  	->contain(['RegistrationT'=> function ($q) {
    	return $q
    	->select(['RegistrationT.Exam_ID']);    	
    	},'ExaminationLocationT'=> function ($q1) {
    	return $q1
    	->select(['ExaminationLocationT.Exam_ID']);    	
    	}
    	]);
		//Debugger::dump($result->toArray()[5]->examRegistrationInfo);
    	return $result;
   	  	    }
    
   	/**
   	 * This function fetches the student examination history
   	 */
   	public function getStudentExamHistory($userID){     		
   	  	    $studentRegistration=$this->getRegistrationReference();
   	  	    $registeredExamIDs= $studentRegistration->find()->select(['Exam_ID'])->where(['Student_ID'=>$userID]);
   	  	    $examReference=$this->getExamReference();
   	  	    $result=$examReference->find()
   	  	    					->contain([
					//if we want to pass a parameter into the inner query the cakephp syntax mandates using 'use' keyword
   	  	    		'RegistrationT'=>function($q) use ($userID){
   	  	    			   	  	    	return $q->select(['Exam_ID','Student_ID','Location','Outcome',
   	  	    			'Amount_Charged','Raw_Passing_Score','Registration_Complete_Flag'])
   	  	    			->where(['Student_ID'=>$userID]); 
   	  	    		}])->where(['Exam_ID IN'=>$registeredExamIDs]);
   	  	    return $result;
   	}
   	  	    
   	/**
   	 * This function will fetch the recent exam Information that will be displayed in the dashboard - Recent Exam Information Section
   	 * @param unknown $studentID
   	 */
   	public function getRecentExamInformation(Connection $dbConnection,$studentID){
   		$studentRegistration=$this->getRegistrationReference();
   		//IT IS CRITICAL THAT NO ONE CHANGES THE FIRST() CALL IN THE FOLLOWING STATEMENT TO ARRAY..ELSE THE CODE WILL BREAK IN HORRIBLE HORRIBLE WAYS..YOU HAVE BEEN WARNED..
   		$registeredExamIDs= $studentRegistration->find()->select(['Exam_ID'])->where(['Student_ID'=>$studentID])->order(['Registration_ID'=>'DESC'])->first();
   		$examReference=$this->getExamReference();
   		$result=$examReference->find()
   		->contain([
   				//if we want to pass a parameter into the inner query the cakephp syntax mandates using 'use' keyword
   				'RegistrationT'=>function($q) use ($studentID){
   					return $q->select(['Exam_ID','Location','Outcome'])
   							->where(['Student_ID'=>$studentID]);
   				}])->where(['Exam_ID'=>$registeredExamIDs['Exam_ID']])->first();   				   		
   				return $result;   		
   	}
   	
  
   	/**
   	 * This method will check the number of remaining Deferrals for a given student
   	 * @param Connection $dbConnection
   	 * @param unknown $studentID
   	 */
   	public function checkRemainingDeferrals(Connection $dbConnection,$studentID,$level){
   		$examRef=$this->getExamReference();
   		$registrationRef=$this->getRegistrationReference();
   		$deferredExams=$registrationRef->find()->select(['Exam_ID'])->where(['Student_ID'=>$studentID,'Outcome'=>'Deferred']);
   		if($deferredExams->count()==0)
   			return 0;   				
   		$result=$this->getExamReference()->find()->where(['Exam_ID IN'=>$deferredExams,'Exam_Level'=>$level]);
   		$count=$result->count();   		
   		Log::write('debug','Number of times the candidate with ID=>'.$studentID.' has deferred an exam is=>'.$count);
   		return $count;
   	}

   	
   	/**
   	 * This function will check if the student is already registered for the level he is trying to register for
   	 * @param Connection $dbConnection
   	 * @param unknown $studentID
   	 * @param unknown $level
   	 * 
   	 * TODO : fix this code when the defer exam gets implemented...will need to revisit this piece of logic
   	 */
   	public function isStudentPreRegisteredForLevel(Connection $dbConnection,$studentID,$level){
   		
   		$examreference=$this->getExamReference();
   		$registrationReference=$examreference->RegistrationT;
   		
   		//find all the exams for which the student has registered and the ones that 
   		$examsRegistered=$registrationReference->find()->select(['Exam_ID'])
   														->where(['Student_ID'=>$studentID,
   																 'OR'=>[['Outcome'=>'Not Yet Taken'],['Outcome'=>'Pending Results'],['Outcome'=>'Deferred']]])->order(['Registration_ID'=>'DESC']);

   		//from the exam table check if the 											
   		$examreginfo=$examreference->find()->select(['Exam_ID'])->where(['Exam_ID IN'=>$examsRegistered,'Exam_Level'=>$level]);	   												   		
   		return $examreginfo->count();				   		
   	}
   	
   	
   	  	    
    /**
     * This function returns the number of candidates that are registered for every exam
     * @param Connection $dbConnection 
     * @author team_syzzygy
     */
    public function getNumOfCandidates(Connection $dbConnection){
    	$query=$this->getExamReference()->RegistrationT->find('all',array('group'=>array('Exam_ID'),'order'=>array('Exam_ID ASC') ));
    	$query->select(['exam_id','studCount' => $query->func()->count('student_id')]);
    	$studentCount=$query->first();    	
    	//Debugger::dump($studentCount);
    	
    	return $studentCount;
    }
    
    /**
     * Given the exam id and location this will fetch the exam fee
     * @param Connection $dbConnection
     * @param unknown $examID
     * @param unknown $location
     */
    public function getExamFee(Connection $dbConnection,$examID,$location,$retest,$defer,$studentID){
    	$query=$this->getExamReference()->find();
    	//fetch the exam for which the student wishes to register    	
    	$examObject=$query->where(['Exam_ID'=>$examID])->first();
    	//check for location
    	if($location=="Non-US"){
    		//If location is international check if this is a retest
    		if(strcmp(strtoupper($retest),"YES")==0){
    			//If the scenario is that of a retest    			
    			//get all the exams failed by the candidate
    			$allFailedExamsByStudent=$this->getRegistrationReference()->find()->select(['Exam_ID'])->where(['Student_ID'=>$studentID,'Outcome'=>'Fail'])->order(['Registration_ID'=>'DESC']);
    			//this query will find the most recent failure of the student...
    			$lastExamDate=$this->getExamReference()->find()->select(['Exam_Date'])->where(['Exam_ID IN'=>$allFailedExamsByStudent, 'Exam_Level'=>$examObject->Exam_Level])->order(['Exam_ID'=>'DESC'])->first();
    			Log::write('debug','Fetched last Exam Fail date as '.$lastExamDate->Exam_Date);
    			Log::write('debug','Exam date for which candidate wants to register is '.$examObject->Exam_Date);
    			//if this is an international retest
    			$timediff=abs(strtotime($examObject->Exam_Date)-strtotime($lastExamDate->Exam_Date));
    			$daydiff=floor($timediff/(60*60*24));
    			Log::write('debug','Day diff calculated as='.$daydiff);
    			if($daydiff<=365){
    				//international retest fee current year
					Log::write('debug','Returning international retest fee for current year '.$examObject->International_Retest_Fee_Current_Year);
    				return $examObject->International_Retest_Fee_Current_Year;    				
    			}
    			else if($daydiff>365){
    				Log::write('debug','Returning international retest fee for next year '.$examObject->International_Retest_Fee_Next_Year);
    				return $examObject->International_Retest_Fee_Next_Year;
    			}    			
    		}
    		
    		//Is this an international Deferral
    		else if(strcmp(strtoupper($defer),"YES")==0){    			
    			//This section is dealing with international deferral fees
    			Log::write('debug','Exam date to which candidate wants to do an international deferral is '.$examObject->Exam_Date);
    			
    			$today=date('Y-m-d');
    			$examDefermentDeadlineDate=$examObject->Deferment_Deadline;    
    			
    			if(strtotime($today)<=strtotime($examDefermentDeadlineDate)){
    				Log::write('debug','Since today='.$today.' is before the internal exam deferral deadline of ='.$examDefermentDeadlineDate.' returning the internation deferment fee before deadline of'.$examObject->International_Deferment_Fee_Before_Deadline.' USD');
    				return $examObject->International_Deferment_Fee_Before_Deadline;	
    			}
    			else if (strtotime($today) > strtotime($examDefermentDeadlineDate) && strtotime($examObject->Exam_Date) > strtotime($today)){
    				//check if there is at least 5 days between the exam date and todays date
    				$daydiff=floor((strtotime($examObject->Exam_Date)-strtotime($today))/(60*60*24));
    				if($daydiff>=5){
    					Log::write('debug','Since todays date'.$today.' is after the examination deferment deadline='.$examDefermentDeadlineDate.' returning the international deferment fee after deadline of=>'. $examObject->International_Deferment_Fee_After_Deadline.' USD' );    						
    					return $examObject->International_Deferment_Fee_After_Deadline;
    				}    				 				
    			}	
    		}
    		
    		//IS THIS AN INTERNATIONAL NEW REGISTRATION
    		else{
    			$allPassExamsByStudent=$this->getRegistrationReference()->find()->select(['Exam_ID'])->where(['Student_ID'=>$studentID,'Outcome'=>'Pass'])->order(['Registration_ID'=>'DESC']);
    			
    			//If the student has not passed any exams till date then he would not have progressed beyond level 1 itself.
    			if($allPassExamsByStudent==null || empty($allPassExamsByStudent)){
    				$result= $this->getExamReference()->find()->select(['International_Enrollment_Fee'])->where(['Exam_ID'=>$examID])->first();
    				Log::write('debug','Returning regular international enrollment fees '.$result->International_Enrollment_Fee);
    				return $result->International_Enrollment_Fee;
    			}
    			
    			//this query will find the most recent passed exam date of the student...
    			$lastExamDate=$this->getExamReference()->find()->select(['Exam_Date'])->where(['Exam_ID IN'=>$allPassExamsByStudent, 'Exam_Level'=>$examObject->Exam_Level])->order(['Exam_ID'=>'DESC'])->first();
    			
    			
    			
    			if(!empty($lastExamDate->Exam_Date))
    			Log::write('debug','Fetched last Exam Pass date as '.$lastExamDate->Exam_Date);
    			Log::write('debug','Exam date for which candidate wants to register is '.$examObject->Exam_Date);
    			//if this is an international retest
    			
    			
    			
    			if(empty($lastExamDate->Exam_Date))
    				$timediff=0;    				
    			else
    			$timediff=abs(strtotime($examObject->Exam_Date)-strtotime($lastExamDate->Exam_Date));
    			
    			$daydiff=floor($timediff/(60*60*24));
    			$result= $this->getExamReference()->find()->select(['International_Enrollment_Fee'])->where(['Exam_ID'=>$examID])->first();
    			if($daydiff > 365){
    				//this is a hack..since the individual controller will subtract 200 for levels > 1 .. making the determination 
    				//if the same exam cycle was used to register for level 2/3 or not such that we can charge the candidate more money...
    				Log::write('debug','Since the candidate did not use the same cycle to register for the exam we shall not give the candidate a discount of 200 USD. Fees to be paid will be ='.$result->International_Enrollment_Fee);
    				return $result->International_Enrollment_Fee+200;
    			}else {
    				Log::write('debug','Returning regular international enrollment fees subject to a 200 USD discount'.$result[0]->International_Enrollment_Fee);
    				return $result->International_Enrollment_Fee;
    			}
    		}
    	} // ALL INTERNATIONAL RETEST/DEFER/NEW REGISTRATION LOGIC ends here
    	
    	
    	//IF THE DESIRED LOCATION WAS US BASED
    	else{
    		
    		//If This is a US based retest
    		if(strcmp(strtoupper($retest),"YES")==0){
    			//If the scenario is that of a retest
    			//get all the exams failed by the candidate
    			$allFailedExamsByStudent=$this->getRegistrationReference()->find()->select(['Exam_ID'])->where(['Student_ID'=>$studentID,'Outcome'=>'Fail'])->order(['Registration_ID'=>'DESC']);
				//this query will find the most recent failure of the student...
    			$lastExamDate=$this->getExamReference()->find()->select(['Exam_Date'])->where(['Exam_ID IN'=>$allFailedExamsByStudent, 'Exam_Level'=>$examObject->Exam_Level])->order(['Exam_ID'=>'DESC'])->first();
    			Log::write('debug','Fetched last Exam Fail date as '.$lastExamDate);
    			Log::write('debug','Exam date for which candidate wants to register is '.$examObject->Exam_Date);
    			
    			//The time difference being calculated here is that in seconds.    			
    			$timediff=abs(strtotime($examObject->Exam_Date)-strtotime($lastExamDate->Exam_Date));
    			Log::write('debug','Time1=>'.strtotime($examObject->Exam_Date));
    			Log::write('debug','Time2=>'.strtotime($lastExamDate->Exam_Date));
    			Log::write('debug','TimeDiff=>'.$timediff);
    			$daydiff=floor($timediff/(60*60*24));
    			
    			Log::write('debug','Day diff calculated as='.$daydiff);
    			if($daydiff<=365){
    				//US based retest fee current year
    				Log::write('debug','Returning us based retest fee for current year '.$examObject->US_Retest_Fee_Current_Year);
    				return $examObject->US_Retest_Fee_Current_Year;
    			}
    			else if($daydiff>365){
    				Log::write('debug','Returning us based retest fee for next year '.$examObject->US_Retest_Fee_Next_Year);
    				return $examObject->US_Retest_Fee_Next_Year;
    			}	 
    		}
    			
    		//Is this a domestic  Deferral?
    		else if(strcmp(strtoupper($defer),"YES")==0){
    			//This section is dealing with international deferral fees
    			Log::write('debug','Exam date to which candidate wants to do a domestic deferral is '.$examObject->Exam_Date);
    			 
    			$today=date('Y-m-d');
    			$examDefermentDeadlineDate=$examObject->Deferment_Deadline;
    			 
    			Log::write('debug','Exam Deferment Deadline is='.$examDefermentDeadlineDate);
    			Log::write('debug','Todays date is===>'.strtotime($today));
    			
    			if(strtotime($today)<=strtotime($examDefermentDeadlineDate)){
    				Log::write('debug','Since todays date'.$today.' is before the examination deferment deadline='.$examDefermentDeadlineDate.' returning the domestic deferment fee before deadline of=>'. $examObject->US_Deferment_Fee_Before_Deadline.'USD' );
    				return $examObject->US_Deferment_Fee_Before_Deadline;
    			}
    			else if (strtotime($today) > strtotime($examDefermentDeadlineDate) && strtotime($examObject->Exam_Date) > strtotime($today)){
    				//check if there is at least 5 days between the exam date and todays date
    				$daydiff=floor((strtotime($examObject->Exam_Date)-strtotime($today))/(60*60*24));
    				if($daydiff>=5){
    					Log::write('debug','Since todays date'.$today.' is after the examination deferment deadline='.$examDefermentDeadlineDate.' returning the domestic deferment fee after deadline of=>'. $examObject->US_Deferment_Fee_Before_Deadline.' USD' );
    					return $examObject->US_Deferment_Fee_After_Deadline;
    				}
    			}
    		}
    		
    		else{    		
    			$allPassExamsByStudent=$this->getRegistrationReference()->find()->select(['Exam_ID'])->where(['Student_ID'=>$studentID,'Outcome'=>'Pass'])->order(['Registration_ID'=>'DESC']);
    			 
    			//If the student has not passed any exams till date then he would not have progressed beyond level 1 itself.
    			if($allPassExamsByStudent==null || empty($allPassExamsByStudent)){
    				$result= $this->getExamReference()->find()->select(['US_Enrollment_Fee'])->where(['Exam_ID'=>$examID])->first();
    				Log::write('debug','Returning regular US enrollment fees '.$result->US_Enrollment_Fee);
    				return $result->US_Enrollment_Fee;
    			}
    			 
    			//this query will find the most recent passed exam date of the student...
    			$lastExamDate=$this->getExamReference()->find()->select(['Exam_Date'])->where(['Exam_ID IN'=>$allPassExamsByStudent, 'Exam_Level'=>$examObject->Exam_Level])->order(['Exam_ID'=>'DESC'])->first();
    			
    			if(!empty($lastExamDate->Exam_Date))
    			Log::write('debug','Fetched last Exam Pass date as '.$lastExamDate->Exam_Date);
    			Log::write('debug','Exam date for which candidate wants to register is '.$examObject->Exam_Date);
    			//if this is an international retest

    			
    			if(empty($lastExamDate->Exam_Date)){
    				$timediff=0;
    			}
    			else
    			$timediff=abs(strtotime($examObject->Exam_Date)-strtotime($lastExamDate->Exam_Date));
    			
    			
    			$daydiff=floor($timediff/(60*60*24));
    			$result= $this->getExamReference()->find()->select(['US_Enrollment_Fee'])->where(['Exam_ID'=>$examID])->first();
    			if($daydiff > 365){
    				//this is a hack..since the individual controller will subtract 200 for levels > 1 .. making the determination
    				//if the same exam cycle was used to register for level 2/3 or not such that we can charge the candidate more money...
    				Log::write('debug','Since the candidate did not use the same cycle to register for the exam we shall not give the candidate a discount of 200 USD. US domestic Fees to be paid will be ='.$result->US_Enrollment_Fee);
    				return $result->US_Enrollment_Fee+200;
    			}else {
    				Log::write('debug','Returning regular US enrollment fees subject to a 200 USD discount'.$result->US_Enrollment_Fee);
    				return $result->US_Enrollment_Fee;
    			}    			
    		}
    	}	
    }
    
    /**
     * Given the exam id retrieve the exam date
     * @param Connection $dbConnection
     * @param unknown $examID
     */
    public function getExamDate(Connection $dbConnection,$examID){
    	$query=$this->getExamReference()->find();
    	return $query->select(['Exam_Date','Exam_Level'])->where(['Exam_ID'=>$examID])->toArray();    	
    }
    
   
    
    
    
    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('Exam_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Exam_ID', 'create');
            
        
        
        $validator
            ->add('Exam_Level', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Exam_Level');
            
        $validator
            ->add('Exam_Date', 'valid', ['rule' => 'date'])
            ->allowEmpty('Exam_Date');
            
        $validator
            ->add('Exam_Year', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Exam_Year');
            
        $validator
            ->allowEmpty('Enabled');
            
        $validator
            ->add('Registration_Deadline', 'valid', ['rule' => 'date'])
            ->allowEmpty('Registration_Deadline');
            
        $validator
            ->add('Deferment_Deadline', 'valid', ['rule' => 'date'])
            ->allowEmpty('Deferment_Deadline');
            
        $validator
            ->add('US_Enrollment_Fee', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('US_Enrollment_Fee');
            
        $validator
            ->add('International_Enrollment_Fee', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('International_Enrollment_Fee');
            
        $validator
            ->add('US_Retest_Fee_Current_Year', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('US_Retest_Fee_Current_Year');
            
        $validator
            ->add('US_Retest_Fee_Next_Year', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('US_Retest_Fee_Next_Year');
            
        $validator
            ->add('US_Deferment_Fee_Before_Deadline', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('US_Deferment_Fee_Before_Deadline');
            
        $validator
            ->add('US_Deferment_Fee_After_Deadline', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('US_Deferment_Fee_After_Deadline');
            
        $validator
            ->add('International_Retest_Fee_Current_Year', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('International_Retest_Fee_Current_Year');
            
        $validator
            ->add('International_Retest_Fee_Next_Year', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('International_Retest_Fee_Next_Year');
            
        $validator
            ->add('International_Deferment_Fee_Before_Deadline', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('International_Deferment_Fee_Before_Deadline');
            
        $validator
            ->add('International_Deferment_Fee_After_Deadline', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('International_Deferment_Fee_After_Deadline');
            
        $validator
            ->add('Deferment_Fee_Past_Due_Date', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('Deferment_Fee_Past_Due_Date');
            
        $validator
            ->allowEmpty('Sample');
            
        $validator
            ->add('Exam_Passing_Score', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Exam_Passing_Score');
            
        $validator
            ->allowEmpty('Location_For_Private_Exam');
            
        $validator
            ->allowEmpty('Note');        
        return $validator;
    }
}
