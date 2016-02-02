<?php
namespace App\Model\Table;

use App\Model\Entity\ExaminationLocationT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExaminationLocationT Model
 */
class ExaminationLocationTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('EXAMINATION_LOCATION_T');
        $this->displayField('Exam_Location_ID');
        $this->primaryKey('Exam_Location_ID');
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
            ->add('Exam_Location_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Exam_Location_ID', 'create');
            
        $validator
            ->add('Exam_ID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Exam_ID', 'create')
            ->notEmpty('Exam_ID');
            
        $validator
            ->requirePresence('System_Date_Time', 'create')
            ->notEmpty('System_Date_Time');
            
        $validator
            ->requirePresence('Location_Name', 'create')
            ->notEmpty('Location_Name');

        $validator
            ->allowEmpty('Note');

        return $validator;
    }
}
