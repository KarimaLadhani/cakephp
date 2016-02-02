<?php

namespace App\Model\Table;

use App\Model\Entity\IndividualT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Database\Connection;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;
use Cake\Core\Exception\Exception;
use Cake\Error\Debugger;
use App\Model\Entity\IndividualWorkInfoT;

/**
 * IndividualTS Model
 */
class IndividualTTable extends Table {
	
	/**
	 * Initialize method
	 *
	 * @param array $config
	 *        	The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config) {
		$this->table ('INDIVIDUAL_T');
		$this->displayField ( 'Individual_ID' );
		$this->primaryKey ( 'Individual_ID' );
		// Individual has 1 to 1 relation with the student
		$this->hasOne ( 'StudentT', [ 
				'foreignKey' => 'Student_ID',
				'dependent' => true,
				'className' => 'StudentT',
				'propertyName' => 'studentInfo' 
		]
		// 'bindingKey' => 'Individual_ID'
		
		 );
		// Individual has 1 to many relation with work information of the individual
		$this->hasMany ( 'IndividualWorkInfoT', [ 
				'foreignKey' => 'Individual_ID',
				'dependent' => true,
				'className' => 'IndividualWorkInfoT',
				'propertyName' => 'workInfo',
				'strategy' => 'subquery',
				'sort' => 
						['IndividualWorkInfoT.Individual_Work_Info_ID'=>'DESC'], 
				
		] );
	}
	
	/**
	 * Default validation rules.
	 *
	 * @param \Cake\Validation\Validator $validator
	 *        	Validator instance.
	 * @return \Cake\Validation\Validator
	 */
	public function validationDefault(Validator $validator) {
		$validator->add ( 'Individual_ID', 'valid', [ 
				'rule' => 'numeric' 
		] )->allowEmpty ( 'Individual_ID', 'create' );
		
		$validator->allowEmpty ( 'First_Name' );
		
		$validator->allowEmpty ( 'Middle_Initial' );
		
		$validator->requirePresence ( 'Last_Name', 'create' )->notEmpty ( 'Last_Name' );
		
		$validator->allowEmpty ( 'Address1' );
		
		$validator->allowEmpty ( 'Address2' );
		
		$validator->allowEmpty ( 'City' );
		
		$validator->allowEmpty ( 'State' );
		
		$validator->allowEmpty ( 'Postal_Code' );
		
		$validator->allowEmpty ( 'Country' );
		
		$validator->allowEmpty ( 'Home_Phone' );
		
		$validator->allowEmpty ( 'Mobile_Phone' );
		
		$validator->allowEmpty ( 'Email_Address' );
		
		$validator->allowEmpty ( 'Alternate_Email_Address' );
		
		$validator->allowEmpty ( 'Password' );
		
		$validator->allowEmpty ( 'Preferred_Address' );
		
		$validator->allowEmpty ( 'Do_Not_Mail' );
		
		$validator->allowEmpty ( 'Is_Student' );
		
		$validator->allowEmpty ( 'Is_Volunteer' );
		
		$validator->allowEmpty ( 'Is_Contact' );
		
		$validator->allowEmpty ( 'Note' );
		
		$validator->requirePresence ( 'Last_Update', 'create' )->notEmpty ( 'Last_Update' );
		
		return $validator;
	}
	private function getIndividualReference() {
		return TableRegistry::get ( 'IndividualT' );
	}
	
	/**
	 *
	 * @author team_syzzygy
	 * @param Connection $dbConnection        	
	 * @param
	 *        	string email
	 * @return Cake Entity
	 */
	public function fetchRegisteredUser(Connection $dbConnection, $candidateID) {
		$individualTable = $this->getIndividualReference();
		Log::write ( 'debug', "Candidate ID PASSED INTO QUERY TO FETCH REGISTERED USER IS" . $candidateID );
		$individualQuery= $individualTable->find()->where(['Individual_ID' => $candidateID])->contain(['IndividualWorkInfoT']);
		$individualData=$individualQuery->first();
		// fetching this separately since in the above query we are limiting to 1...wherein the StudentT might have more than 1
		$individualData->studentInfo = $this->StudentT->fetchStudentOrganizations( $dbConnection, $candidateID );
		$individualData->Password='';		
		return $individualData;
	}
	
	
	/**
	 * This function helps fetch the student highestLevelPassed for displaying on dashboard
	 * @param Connection $dbConnection
	 * @param unknown $studentID
	 */
	public function fetchHighestLevelPassed(Connection $dbConnection,$studentID){
		return $this->StudentT->getStudentExamStatusInformation($dbConnection,$studentID);
	}
	
	/**
	 * This function is used to fetch the registered user complete work information
	 * 
	 * @param Connection $dbConnection        	
	 * @param unknown $email        	
	 * @param unknown $userid        	
	 * @return unknown
	 */
	public function fetchRegisteredUserTotalWorkInfo(Connection $dbConnection, $email, $userid) {
		$individualTable = $this->getIndividualReference ();
		Log::write ( 'debug', "EMAIL PASSED INTO QUERY TO FETCH REGISTERED USER TOTAL WORK INFO IS" . $email . ' and user id is ' . $userid );
		$individualWorkData = $individualTable->IndividualWorkInfoT->find()->where ( [ 
				'Individual_ID' => $userid 
		] )->order(['Individual_Work_Info_ID'=>'DESC'])->first ();		
		return $individualWorkData;
	}
	
	/**
	 * This function will retrieve the user's email addresses, both primary and work addresses
	 * 
	 * @param Connection $dbConnection        	
	 * @param unknown $email        	
	 */
	public function fetchUserCurrentWorkAddress(Connection $dbConnection, $userid) {
		$individualTable = $this->getIndividualReference();
		$workList = $individualTable->find ()->where ( [ 
				'Individual_ID' => $userid 
		] )->contain ( [ 
				'IndividualWorkInfoT' 
		] )->toArray ()[0]->workInfo;
		$workAddress = "";
		if ($workList != null) {
			for($x = 0; $x < count ( $workList ); $x ++) {
				$workObject = $workList [$x];
				
				if ($workObject ['Is_Current'] != 'Yes') {
					Log::write ( 'debug', 'Skipping work Object with id ' . $workObject ['Individual_Work_Info_Id'] . ' since IS_CURRENT value=' . $workObject ['Is_Current'] );
					continue;
				} else {
					Log::write ( 'debug', 'Found the current work address.' );
					$workAddress = $workObject ['Work_Address1'] . ' ' . $workObject ['Work_Address2'] . ',' . $workObject ['Work_City'] . ' ' . $workObject ['Work_State'] . '-' . $workObject ['Work_Postal_Code'] . ',' . $workObject ['Work_Country'];
					break;
				}
			}
		}
		return $workAddress;
	}
	
	/**
	 *
	 * @author team_syzzygy
	 * @param Connection $dbConnection        	
	 * @param unknown $email        	
	 * @param unknown $lastName        	
	 * @throws Exception @reutrn Cake Entity
	 */
	public function fetchForgotPasswordIndividual(Connection $dbConnection, $email, $lastName) {
		$individualTable = $this->getIndividualReference ();
		$query = $individualTable->find ()->where ( [ 
				'Email_Address' => $email,
				'Last_Name' => $lastName 
		] );
		Log::write ( 'debug', "EMAIL PASSED INTO QUERY OF FETCH FORGOT PASSWORD INDIVIDUAL IS" . $email );
		Log::write ( 'debug', "LAST NAME PASSED INTO QUERY IS" . $lastName );
		$total = $query->count ();
		Log::write ( 'debug', "Total count of query is=" . $total );
		if ($total > 1)
			throw new Exception ( "Multiple users found" );
		else if ($total == 0) {
			throw new Exception ( "User not found" );
		} else {
			Log::write ( 'debug', "Found user registered with Email Address=" . $email . " and Last Name" . $lastName );
			return $query->first ();
		}
	}
	
	/**
	 * This function is used to update the shipping preference when registering for exam
	 */
	public function updateShippingPreference($individualID,$prefAddress){
		$individualTable = $this->getIndividualReference ();		
		$individualTable->query()->update()->set(['Preferred_Address'=>$prefAddress])->where(['Individual_ID'=>$individualID])->execute();
	}
	
	
	/**
	 * This function updates the new user password
	 * 
	 * @param Connection $dbConnection        	
	 * @param unknown $email        	
	 * @param unknown $lastName        	
	 * @param unknown $newRandomPasswd        	
	 */
	public function updateIndividual(Connection $dbConnection, IndividualT $user,$passwdchange) {
		$individualTable = $this->getIndividualReference ();
		//this is the scenario while changing email address only from the user edit login flow and not updating the password
		if($passwdchange===false){
			$existingPassword=$this->getIndividualReference()->find()->select(['Password'])->where(['Individual_ID'=>$user->Individual_ID])->first();			
		}
		if ($individualTable->save ( $user )) {
			Log::write ( 'debug', "User with email address" . $user ['Email_Address'] . "has been updated successfully" );
			
			//restore the existing password
			if($passwdchange===false){
			$this->getIndividualReference()->query()->update()->set(['Password'=>$existingPassword->Password])->where(['Individual_ID'=>$user->Individual_ID])->execute();
			}				
		} else
			throw new Exception ( "Failed to persist updated password for user with Email Address" . $user ['Email_Address'] );
	}
	
	/**
	 * This is used to check if the email has been pre-registered
	 * @param unknown $iemail
	 * @return boolean
	 */
	public function checkIfEmailIsPreRegistered($iemail){
		$emailCount=$this->getIndividualReference()->find()->where(['Email_Address'=>$iemail])->count();
		if($emailCount>0)
			return true;
		else 
			return false;		
	}
	
	
	
	/**
	 * This function updates the entire User Profile
	 * 
	 * @param Connection $dbConnection        	
	 * @param IndividualT $user        	
	 */
	public function saveUserProfile(Connection $dbConnection, IndividualT $user) {
		
		$individualTable = $this->getIndividualReference();
		$existingPassword=$this->getIndividualReference()->find()->select(['Password'])->where(['Individual_ID'=>$user->Individual_ID])->first();
		if ($individualTable->save ( $user, [ 
				'associated' => [ 
						'IndividualWorkInfoT',
						'StudentT',
						'StudentT.StudentOrganizationTypeT' 
				] 
		] )) {
			$this->getIndividualReference()->query()->update()->set(['Password'=>$existingPassword->Password])->where(['Individual_ID'=>$user->Individual_ID])->execute();
			Log::write ( 'debug', "User with email address" . $user->Email_Address . "has been updated successfully into the database" );
		}
	}
	
	/**
	 * This function is used to create new work information entity associated with the individual
	 * 
	 * @param Connection $dbConnection        	
	 * @param IndividualWorkInfoT $userWorkInfo        	
	 */
	public function createNewWorkInformation(Connection $dbConnection, $oldWorkInfoId,IndividualWorkInfoT $userWorkInfo,$userid) {
		
		$individualTbl=$this->getIndividualReference();
		$individualWorkTbl=$individualTbl->IndividualWorkInfoT;
		$currentWorkEntity=$individualWorkTbl->get($oldWorkInfoId);
		$currentWorkEntity->Is_Current='No';
		$individualWorkTbl->save($currentWorkEntity);

		$endUser=$individualTbl->find()->where(['Individual_ID'=>$userid])->contain(['IndividualWorkInfoT'])->first();		
		$endUser->workInfo[]= $userWorkInfo;
		$endUser->dirty('workInfo', true);	
		if($individualTbl->save($endUser,['associated'=>'IndividualWorkInfoT'])){
			Log::write ( 'debug', "Work Information for user with id ".$userid. "has been inserted successfully into the database" );
			return true;
		}else{
			Log::write('debug','Something went terribly wrong while saving create new work information');
			return false;
		}
	}
	
	/**
	 * This function is used to fetch the logged in user primary email address
	 * @param unknown $individualID
	 */
	public function fetchLoggedInUserPrimaryEmailAddress($individualID){
		return $this->getIndividualReference()->find()->select(['Email_Address'])->where(['Individual_ID'=>$individualID])->first();
	}
	
	
	/**
	 *
	 * @param Connection $dbConnection        	
	 * @param array $userConfig        	
	 * @author team_syzzygy
	 */
	public function registerUser(Connection $dbConnection, array $userConfig) {
		$individualTable = $this->getIndividualReference ();
		// entity declarations
		$user = $individualTable->newEntity ();
		$userworkInfo = $individualTable->IndividualWorkInfoT->newEntity ();
		$userstudentInfo = $individualTable->StudentT->newEntity ();
		
		// filling student Information
		$userstudentInfo->Purpose_For_Enrollment = $userConfig ['Purpose_For_Enrollment'];
		$userstudentInfo->Referred_By = $userConfig ['Referred_By'];
		$userstudentInfo->Highest_Level_Passed = 0;
		$userstudentInfo->Highest_Education_Level = $userConfig ['Highest_Education_Level'];
		
		// filling student organization type information
		$studentOrgTypeArray = array ();
		if (! empty ( $userConfig ['memberoforgs'] )) {
			for($x = 0; $x < count ( $userConfig ['memberoforgs'] ); $x ++) {
				$studentOrgType = $individualTable->StudentT->StudentOrganizationTypeT->newEntity ();
				$studentOrgType->Organization_Type = $userConfig ['memberoforgs'] [$x];
				$studentOrgTypeArray [$x] = $studentOrgType;
			}
		}
		
		$userstudentInfo->studentOrgType = $studentOrgTypeArray;
		$user->studentInfo = $userstudentInfo;
		$userworkInfo->Work_Address1 = $userConfig ['Work_Address1'];
		$userworkInfo->Work_Address2 = $userConfig ['Work_Address2'];
		$userworkInfo->Work_City = $userConfig ['Work_City'];
		$userworkInfo->Work_State = $userConfig ['Work_State'];
		$userworkInfo->Work_Postal_Code = $userConfig ['Work_Postal_Code'];
		$userworkInfo->Work_Country = $userConfig ['Work_Country'];
		$userworkInfo->Work_Phone = $userConfig ['Work_Phone'];
		$userworkInfo->Work_Fax_Number = $userConfig ['Work_Fax_Number'];
		$userworkInfo->Work_Extension = $userConfig ['Work_Extension'];
		$userworkInfo->Individual_Company = $userConfig ['Individual_Company'];
		$userworkInfo->Individual_Department = $userConfig ['Individual_Department'];
		$userworkInfo->Company_Type = $userConfig ['Company_Type'];
		$userworkInfo->Individual_Title = $userConfig ['Individual_Title'];
		$userworkInfo->Is_Current = 'Yes';
		
		$user->First_Name = $userConfig ['First_Name'];
		$user->Last_Name = $userConfig ['Last_Name'];
		$user->Middle_Initial = $userConfig ['Middle_Initial'];
		$user->Email_Address = $userConfig ['Email_Address'];
		$user->Alternate_Email_Address = $userConfig ['Alternate_Email_Address'];
		$user->Address1 = $userConfig ['Address1'];
		$user->Address2 = $userConfig ['Address2'];
		$user->City = $userConfig ['City'];
		$user->State = $userConfig ['State'];
		$user->Postal_Code = $userConfig ['Postal_Code'];
		$user->Country = $userConfig ['Country'];
		$user->Home_Phone = $userConfig ['Home_Phone'];
		$user->Mobile_Phone = $userConfig ['Mobile_Phone'];
		$user->Password = $userConfig ['Password'];
		$user->Preferred_Address = 'home';
		$user->Do_Not_Mail = $userConfig ['Do_Not_Mail'];
		$user->Is_Student = 'Yes';
		$user->workInfo = [ 
				$userworkInfo 
		];
		
		if ($individualTable->save ( $user, [ 
				'associated' => [ 
						'IndividualWorkInfoT',
						'StudentT',
						'StudentT.StudentOrganizationTypeT' 
				] 
		] )) {
			Log::write ( 'debug', "User with email address" . $userConfig ['Email_Address'] . "has been inserted successfully into the database" );
			//return $user;
		}
	}
}
