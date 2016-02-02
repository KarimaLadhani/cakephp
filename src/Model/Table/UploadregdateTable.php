<?php
namespace App\Model\Table;

use App\Model\Entity\Uploadregdate;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Uploadregdate Model
 */
class UploadregdateTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('uploadregdate');
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
            ->add('Check_Number', 'valid', ['rule' => 'numeric'])
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

        return $validator;
    }
}
