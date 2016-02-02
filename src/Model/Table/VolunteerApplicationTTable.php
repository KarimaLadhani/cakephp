<?php
namespace App\Model\Table;

use App\Model\Entity\VolunteerApplicationT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VolunteerApplicationT Model
 */
class VolunteerApplicationTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('volunteer_application_t');
        $this->displayField('Volunteer_Application_ID');
        $this->primaryKey('Volunteer_Application_ID');
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
            ->add('Volunteer_Application_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Volunteer_Application_ID', 'create');
            
        $validator
            ->add('Volunteer_ID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Volunteer_ID', 'create')
            ->notEmpty('Volunteer_ID');
            
        $validator
            ->add('Application_Date', 'valid', ['rule' => 'date'])
            ->allowEmpty('Application_Date');
            
        $validator
            ->allowEmpty('Application_Approval_Flag');
            
        $validator
            ->add('Application_Approval_Date', 'valid', ['rule' => 'date'])
            ->allowEmpty('Application_Approval_Date');
            
        $validator
            ->add('Performance_Scale', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Performance_Scale');
            
        $validator
            ->allowEmpty('Note');
            
        $validator
            ->allowEmpty('Rejection_Reason');

        return $validator;
    }
}
