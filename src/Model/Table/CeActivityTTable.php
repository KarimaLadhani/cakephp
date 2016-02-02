<?php
namespace App\Model\Table;

use App\Model\Entity\CeActivityT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CeActivityT Model
 */
class CeActivityTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('ce_activity_t');
        $this->displayField('Ce_Activity_ID');
        $this->primaryKey('Ce_Activity_ID');
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
            ->add('Ce_Activity_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Ce_Activity_ID', 'create');
            
        $validator
            ->add('Ce_Application_ID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Ce_Application_ID', 'create')
            ->notEmpty('Ce_Application_ID');
            
        $validator
            ->add('Cep_ID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Cep_ID', 'create')
            ->notEmpty('Cep_ID');
            
        $validator
            ->add('Course_Date', 'valid', ['rule' => 'date'])
            ->allowEmpty('Course_Date');
            
        $validator
            ->allowEmpty('Provider_Name');
            
        $validator
            ->allowEmpty('Course_Title');
            
        $validator
            ->allowEmpty('Discipline');
            
        $validator
            ->allowEmpty('Others');
            
        $validator
            ->add('Number_of_Credit_Hours', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('Number_of_Credit_Hours');
            
        $validator
            ->allowEmpty('Note');
            
        $validator
            ->allowEmpty('Pre_Approved');

        return $validator;
    }
}
