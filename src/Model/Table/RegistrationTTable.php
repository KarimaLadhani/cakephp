<?php
namespace App\Model\Table;

use App\Model\Entity\RegistrationT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Database\Connection;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;
use Cake\Core\Exception\Exception;
use Cake\Error\Debugger;

/**
 * RegistrationT Model
 */
class RegistrationTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('REGISTRATION_T');
        $this->displayField('Registration_ID');
        $this->primaryKey('Registration_ID');       
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
            ->add('Registration_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Registration_ID', 'create');
            
        $validator
            ->add('Student_ID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Student_ID', 'create')
            ->notEmpty('Student_ID');
            
        $validator
            ->add('Exam_ID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Exam_ID', 'create')
            ->notEmpty('Exam_ID');
            
        $validator
            ->allowEmpty('Outcome');
            
        $validator
            ->add('Date_Materials_Sent', 'valid', ['rule' => 'date'])
            ->allowEmpty('Date_Materials_Sent');
            
        $validator
            ->allowEmpty('Retest');
            
        $validator
            ->allowEmpty('Payer_Name');
            
        $validator
            ->allowEmpty('Payment_Type');
            
        $validator
            ->allowEmpty('Check_Number');
            
        $validator
            ->add('Check_Date', 'valid', ['rule' => 'date'])
            ->allowEmpty('Check_Date');
            
        $validator
            ->allowEmpty('Check_Name');
            
        $validator
            ->allowEmpty('Verisign_Transaction_Number');
            
        $validator
            ->allowEmpty('Verisign_Address_Line1');
            
        $validator
            ->allowEmpty('Verisign_Address_Line2');
            
        $validator
            ->add('Payment_Code_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Payment_Code_ID');
            
        $validator
            ->requirePresence('Payment_Execution_Date_Time', 'create')
            ->notEmpty('Payment_Execution_Date_Time');
            
        $validator
            ->add('Amount_Charged', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('Amount_Charged');
            
        $validator
            ->add('Amount_Paid', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('Amount_Paid');
            
        $validator
            ->allowEmpty('Disability_Accomodations');
            
        $validator
            ->allowEmpty('Alternate_Test_Site_Requirement');
            
        $validator
            ->allowEmpty('Location');
            
        $validator
            ->allowEmpty('Registration_Complete_Flag');
            
        $validator
            ->allowEmpty('Mail_Confirmation');
            
        $validator
            ->allowEmpty('Status');
            
        $validator
            ->add('Date_Passed', 'valid', ['rule' => 'date'])
            ->allowEmpty('Date_Passed');
            
        $validator
            ->add('Raw_Passing_Score', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Raw_Passing_Score');
            
        $validator
            ->allowEmpty('Required_Non_Saturday_Admission');
            
        $validator
            ->allowEmpty('Release_Contact_Info_To_Others');
            
        $validator
            ->allowEmpty('Note');
            
        $validator
            ->requirePresence('Last_Update', 'create')
            ->notEmpty('Last_Update');

        return $validator;
    }
    
    
    private function getRegistrationReference(){
    	return TableRegistry::get('RegistrationT');
    }
    
    private function getExamReference(){
    	return TableRegistry::get('ExaminationT');
    }
    
    
    /**
     * This function will fetch the outcome count for a student
     * @param Connection $dbConnection
     * @param unknown $userId
     * @param unknown $resultState
     */
    public function findOutcomeCountForStudent(Connection $dbConnection,$userId,$resultState){
    	$regReference=$this->getRegistrationReference();
    	$prevExamData=$regReference->find()->where(['Student_ID' => $userId,'Outcome'=>$resultState]);
    	return $prevExamData->count();
    }    
    
    /**
     * This function will fetch the students exam history..Result will be fed into pagination.
     * @param Connection $dbConnection
     * @param unknown $userId
     * @return NULL|unknown
     */
    public function getStudentExamHistory(Connection $dbConnection,$userId){
    	$regReference=$this->getRegistrationReference();
    	$studentExamHistory=$regReference->find()->where(['Student_ID'=>$userId])->order(['Registration_ID'=>'DESC']);
		if($studentExamHistory->count()==0){
			Log::write('debug', 'Could not find any exam history for user id '.$userId.' Returning null');
			return null;
		}    	
		return $studentExamHistory;
    }
    
    /**
     * This function will persist the exam registration for a candidate
     * @param array $registrationArray
     */
    public function persistExamRegistrationPC(array $registrationArray){
    	$regReference=$this->getRegistrationReference();
    	$regEntity=$regReference->newEntity();
    	
    	$regEntity->Student_ID = $registrationArray['Student_ID'];
          $regEntity->Exam_ID = $registrationArray['Exam_ID'];
          $regEntity->Payment_Type = $registrationArray['Payment_Type'];          
          $regEntity->Amount_Charged = $registrationArray['Amount_Charged'];
          $regEntity->Retest = $registrationArray['Retest'];
          $regEntity->Disability_Accomodations = $registrationArray['Disability_Accomodations'];
          $regEntity->Location = $registrationArray['Location'];
          $regEntity->Required_Non_Saturday_Admission = $registrationArray['Required_Non_Saturday_Admission'];
          $regEntity->Release_Contact_Info_To_Others = $registrationArray['Release_Contact_Info_To_Others'];
          $regEntity->Registration_Complete_Flag = $registrationArray['Registration_Complete_Flag'];
          $regEntity->Outcome=$registrationArray['Outcome'];
          
          
          if(strcmp(strtoupper($registrationArray['Payment_Type']),"CREDIT CARD")==0){
          	$regEntity->Verisign_Transaction_Number=$registrationArray['Verisign_Transaction_Number'];
          	$regEntity->Verisign_Address_Line1=$registrationArray['Verisign_Address_Line1'];
          	$regEntity->Verisign_Address_Line2=$registrationArray['Verisign_Address_Line2'];
          	$regEntity->Payment_Execution_Date_Time=date('Y-m-d h:i:s',strtotime($registrationArray['Payment_Execution_Date_Time']));
          }else{
          	$regEntity->Payment_Code_ID = $registrationArray['Payment_Code_ID'];
          }
          
          $currentlyRegisteredExam=$this->getRegistrationReference()->find()->select(['Exam_ID','Outcome'])->where(['Student_ID'=>$regEntity->Student_ID])->order(['Registration_ID'=>'DESC'])->first();
          //If the user tries to register
          if(!empty($currentlyRegisteredExam->Exam_ID)){
          $currentlyRegisteredExamLevel=$this->getExamReference()->find()->select(['Exam_Level'])->where(['Exam_ID'=>$currentlyRegisteredExam->Exam_ID])->first();
          if(strcmp($currentlyRegisteredExam->Outcome, $regEntity->Outcome)==0 &&  strcmp(strtoupper($regEntity->Outcome),"NOT YET TAKEN")==0){
          	throw new Exception("Failed to register for exam since you are already registered for this exam level. If your payment has been deducted please contact CEPI at (408) 554-2187 or email us at cepi@scu.edu ");
          }
          $deferralCount=$this->getExamReference()->checkRemainingDeferrals(null,$regEntity->Student_ID,$currentlyRegisteredExamLevel->Exam_Level);

          Log::write('debug','Deferral count calculated right before persisting exam information is ='.$deferralCount);
          if($deferralCount==2){
          	Log::write('debug','This exam registration has been deferred the maximum number of times.  If you would like to defer your exam date, please contact the CEP Institute directly at 408-554-2187');
          	throw new Exception('This exam registration has been deferred the maximum number of times.  If you would like to defer your exam date, please contact the CEP Institute directly at 408-554-2187');
          }
          }
          
    	if($regReference->save($regEntity)){
    		Log::write('debug','Successfully registered student with id ='.$registrationArray['Student_ID'].' for exam id='.$registrationArray['Exam_ID']);
    	}else{
    		Log::write('error','Failed to register student with id ='.$registrationArray['Student_ID'].' for exam id='.$registrationArray['Exam_ID']);
    		throw new Exception("Failed to register for exam");
    	}
    }
    
    
    
    /**
     * This function will fetch the currently registered exam Information that will be displayed in the Registration Information section of the dashboard
     * @param Connection $dbConnection
     * @param unknown $studentID
     */
    public function getRegisteredExamInformation(Connection $dbConnection,$studentID){
    	$regReference=$this->getRegistrationReference();
    	return $regReference->find()->where(['Student_ID'=>$studentID,'Registration_Complete_Flag'=>'Yes'])->order(['Registration_ID'=>'DESC'])->first();    	
    }
    
    /**
     * This function will check if the last exam level given by the student was cleared or not.
     * @param Connection $dbConnection
     * @param unknown $studentID
     * @param unknown $examLevel
     */
    public function isLastLevelCleared(Connection $dbConnection,$studentID){
    	$regReference=$this->getRegistrationReference();
    	$result= $regReference->find()->select(['Registration_ID','Outcome'])->where(['Student_ID'=>$studentID])->order(['Registration_ID'=>'DESC'])->first();    	
    	return $result;
    }
    
    
    
}
