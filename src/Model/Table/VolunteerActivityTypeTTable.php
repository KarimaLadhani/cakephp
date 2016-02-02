<?php
namespace App\Model\Table;

use App\Model\Entity\VolunteerActivityTypeT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VolunteerActivityTypeT Model
 */
class VolunteerActivityTypeTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('volunteer_activity_type_t');
        $this->displayField('Volunteer_Activity_Type_ID');
        $this->primaryKey('Volunteer_Activity_Type_ID');
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
            ->add('Volunteer_Activity_Type_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Volunteer_Activity_Type_ID', 'create');
            
        $validator
            ->add('Volunteer_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Volunteer_ID');
            
        $validator
            ->add('Volunteer_Application_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Volunteer_Application_ID');
            
        $validator
            ->allowEmpty('Activity_Type');
            
        $validator
            ->add('Start_Particitpation_Date', 'valid', ['rule' => 'date'])
            ->allowEmpty('Start_Particitpation_Date');
            
        $validator
            ->add('End_Participation_Date', 'valid', ['rule' => 'date'])
            ->allowEmpty('End_Participation_Date');
            
        $validator
            ->allowEmpty('Note');

        return $validator;
    }
}
