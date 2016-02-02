<?php
namespace App\Model\Table;

use App\Model\Entity\AdministratorT;
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
 * AdministratorT Model
 */
class AdministratorTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('ADMINISTRATOR_T');
        $this->displayField('Admin_ID');
        $this->primaryKey('Admin_ID');
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
            ->add('Admin_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Admin_ID', 'create');
            
        $validator
            ->allowEmpty('First_Name');
            
        $validator
            ->allowEmpty('Last_Name');
            
        $validator
            ->requirePresence('Admin_Username', 'create')
            ->notEmpty('Admin_Username');
            
        $validator
            ->requirePresence('Admin_Password', 'create')
            ->notEmpty('Admin_Password');
            
        $validator
            ->allowEmpty('Phone_Number');
            
        $validator
            ->requirePresence('Email_Address', 'create')
            ->notEmpty('Email_Address');
            
        $validator
            ->requirePresence('Time_Stamp', 'create')
            ->notEmpty('Time_Stamp');
            
        $validator
            ->allowEmpty('Note');
            
        $validator
            ->add('Privileges', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Privileges');

        return $validator;
    }
    
    
    private function getIndividualReference(){
    	return TableRegistry::get('AdministratorT');
    }
    
    
    public function fetchRegisteredUser(Connection $dbConnection,$username){
    	$AdministratorTable=$this->getIndividualReference();
    	Log::write('debug',"Username PASSED INTO QUERY IS".$username);
    	return $AdministratorTable->find()->where(['Admin_Username' => $username])->first();    	
    }
    
}
