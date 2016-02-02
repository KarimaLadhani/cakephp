<?php
namespace App\Model\Table;

use App\Model\Entity\VolunteerActivityT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VolunteerActivityT Model
 */
class VolunteerActivityTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('volunteer_activity_t');
        $this->displayField('Volunteer_Activity_ID');
        $this->primaryKey('Volunteer_Activity_ID');
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
            ->add('Volunteer_Activity_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Volunteer_Activity_ID', 'create');
            
        $validator
            ->add('Volunteer_ID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Volunteer_ID', 'create')
            ->notEmpty('Volunteer_ID');
            
        $validator
            ->add('Volunteer_Activity_List_ID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Volunteer_Activity_List_ID', 'create')
            ->notEmpty('Volunteer_Activity_List_ID');
            
        $validator
            ->add('CE_Application_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('CE_Application_ID');

        return $validator;
    }
}
