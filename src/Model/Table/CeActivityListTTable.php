<?php
namespace App\Model\Table;

use App\Model\Entity\CeActivityListT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CeActivityListT Model
 */
class CeActivityListTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('ce_activity_list_t');
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
            ->add('Course_Date', 'valid', ['rule' => 'date'])
            ->allowEmpty('Course_Date');
            
        $validator
            ->requirePresence('Provider_Name', 'create')
            ->notEmpty('Provider_Name');
            
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
            ->allowEmpty('Is_Active');
            
        $validator
            ->requirePresence('Event', 'create')
            ->notEmpty('Event');

        return $validator;
    }
}
