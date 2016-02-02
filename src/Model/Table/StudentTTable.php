<?php
namespace App\Model\Table;

use App\Model\Entity\StudentT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Database\Connection;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;
use Cake\Error\Debugger;
/**
 * StudentT Model
 */
class StudentTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('STUDENT_T');
        $this->displayField('Student_ID');
        $this->primaryKey('Student_ID');        
        $this->hasMany('StudentOrganizationTypeT', [
        		'foreignKey' => 'Student_ID',
        		'dependent' => true,
        		'className' => 'StudentOrganizationTypeT',
        		'propertyName' => 'studentOrgType',
        		'strategy'=>'subquery',
        		'bindingKey'=>'Student_ID',	
        ]);        
        $this->hasMany('RegistrationT', [
        		'foreignKey' => 'Student_ID',
        		'dependent' => true,
        		'className' => 'RegistrationT',
        		'propertyName' => 'registrationInfo',
        		'strategy'=>'subquery',
        		'bindingKey'=>'Student_ID',
        ]);
        
        
        
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
            ->add('Student_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Student_ID', 'create');
            
        $validator
            ->allowEmpty('Purpose_For_Enrollment');
            
        $validator
            ->allowEmpty('Referred_By');
            
        $validator
            ->allowEmpty('Highest_Education_Level');
            
        $validator
            ->add('Highest_Level_Passed', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Highest_Level_Passed');
            
        $validator
            ->requirePresence('Last_Update_Date_Time', 'create')
            ->notEmpty('Last_Update_Date_Time');
            
        $validator
            ->allowEmpty('Note');

        return $validator;
    }
    
    
    
    /**
     * @author team_syzzygy
     */
    private function getStudentReference(){
    	return TableRegistry::get('StudentT');
    }
    
    /**
     * @author team_syzzygy
     * @param Connection $dbConnection
     * @param unknown $studentId
     * Fetch student organizations based on the studentId provided
     */
    public function fetchStudentOrganizations(Connection $dbConnection,$studentId){
    	$studentTable=$this->getStudentReference();
    	Log::write('debug',"Student Id passed into fetchStudentOrganizations method is ".$studentId);
    	$temp= $studentTable->find()->where(['Student_ID' => $studentId])->contain(['StudentOrganizationTypeT'])->first();
    	return $temp;    
    }
    
    
    public function getStudentExamStatusInformation(Connection $dbConnection,$studentId){
    	$studentTable=$this->getStudentReference();
    	$result=$studentTable->find()->select(['Highest_Level_Passed'])->where(['Student_ID'=>$studentId])->first();
    	return $result;
    }
    
}
