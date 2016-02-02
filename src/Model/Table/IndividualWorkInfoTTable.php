<?php

namespace App\Model\Table;

use App\Model\Entity\IndividualWorkInfoT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Database\Connection;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;
use Cake\Error\Debugger;

/**
 * IndividualWorkInfoT Model
 */
class IndividualWorkInfoTTable extends Table {
	
	/**
	 * Initialize method
	 *
	 * @param array $config
	 *        	The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config) {
		$this->table ('INDIVIDUAL_WORK_INFO_T');
		$this->displayField ( 'Individual_Work_Info_ID' );
		$this->primaryKey ( 'Individual_Work_Info_ID' );
	}
	
	/**
	 * Default validation rules.
	 *
	 * @param \Cake\Validation\Validator $validator
	 *        	Validator instance.
	 * @return \Cake\Validation\Validator
	 */
	public function validationDefault(Validator $validator) {
		$validator->add ( 'Individual_Work_Info_ID', 'valid', [ 
				'rule' => 'numeric' 
		] )->allowEmpty ( 'Individual_Work_Info_ID', 'create' );
		
		$validator->add ( 'Individual_ID', 'valid', [ 
				'rule' => 'numeric' 
		] )->requirePresence ( 'Individual_ID', 'create' )->notEmpty ( 'Individual_ID' );
		
		$validator->add ( 'Level', 'valid', [ 
				'rule' => 'numeric' 
		] )->requirePresence ( 'Level', 'create' )->notEmpty ( 'Level' );
		
		$validator->allowEmpty ( 'Work_Address1' );
		
		$validator->allowEmpty ( 'Work_Address2' );
		
		$validator->allowEmpty ( 'Work_City' );
		
		$validator->allowEmpty ( 'Work_State' );
		
		$validator->allowEmpty ( 'Work_Postal_Code' );
		
		$validator
            ->allowEmpty('Work_Country');
            
        $validator
            ->allowEmpty('Work_Phone');
            
        $validator
            ->allowEmpty('Work_Extension');
            
        $validator
            ->allowEmpty('Work_Fax_Number');
            
        $validator
            ->allowEmpty('Individual_Title');
            
        $validator
            ->allowEmpty('Individual_Department');
            
        $validator
            ->allowEmpty('Individual_Company');
            
        $validator
            ->allowEmpty('Company_Type');
            
        $validator
            ->allowEmpty('Is_Current');
            
        $validator
            ->add('Work_Start', 'valid', ['rule' => 'date'])
            ->allowEmpty('Work_Start');
            
        $validator
            ->add('Work_End', 'valid', ['rule' => 'date'])
            ->allowEmpty('Work_End');
            
        $validator
            ->allowEmpty('Work_Responsibilities');
            
        $validator
            ->allowEmpty('Note');
            
        $validator
            ->requirePresence('Last_Update', 'create')
            ->notEmpty('Last_Update');
            
        $validator
            ->allowEmpty('Release_Consent_Form');
            
        $validator
            ->add('Consent_Date', 'valid', ['rule' => 'date'])
            ->allowEmpty('Consent_Date');
            
        $validator
            ->allowEmpty('PIndividual_Company');
            
        $validator
            ->allowEmpty('PIndividual_Title');
            
        $validator
            ->add('PWork_Start', 'valid', ['rule' => 'date'])
            ->allowEmpty('PWork_Start');
            
        $validator
            ->add('PWork_End', 'valid', ['rule' => 'date'])
            ->allowEmpty('PWork_End');
            
        $validator
            ->allowEmpty('PWork_City');
            
        $validator
            ->allowEmpty('PState');
            
        $validator
            ->allowEmpty('PWork_Responsibilities');

        return $validator;
    }
    
    public function fetchWorkInformation($workInfoId){
    	$individualWorkInfoTable=$this->getIndividualWorkReference();
    	Log::write('debug','WorkInfo passed into query is '.$workInfoId);
    	$individualWorkInfoEntity=$individualWorkInfoTable->get($workInfoId);    	
    	return $individualWorkInfoEntity;
    }
    
    public function saveUpdatedWorkInfo(IndividualWorkInfoT $workInfo)
    {	
    	$individualWorkInfoTable=$this->getIndividualWorkReference();
    	if($individualWorkInfoTable->save($workInfo)){
    		Log::write('debug','Successfully updated the work information');   
    		return true; 		
    	}
    	else{
    		Log::write('debug','Something seems to have gone wrong while updating the work information');
    	return false;
    	}
    }
    
    private function getIndividualWorkReference(){
    	return TableRegistry::get('IndividualWorkInfoT');
    }
}
