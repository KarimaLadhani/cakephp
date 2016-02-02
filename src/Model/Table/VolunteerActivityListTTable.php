<?php
namespace App\Model\Table;

use App\Model\Entity\VolunteerActivityListT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VolunteerActivityListT Model
 */
class VolunteerActivityListTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('volunteer_activity_list_t');
        $this->displayField('Volunteer_Activity_List_ID');
        $this->primaryKey('Volunteer_Activity_List_ID');
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
            ->add('Volunteer_Activity_List_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Volunteer_Activity_List_ID', 'create');
            
        $validator
            ->allowEmpty('Title');
            
        $validator
            ->add('Date', 'valid', ['rule' => 'date'])
            ->requirePresence('Date', 'create')
            ->notEmpty('Date');
            
        $validator
            ->add('Hours', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Hours', 'create')
            ->notEmpty('Hours');
            
        $validator
            ->allowEmpty('Note');

        return $validator;
    }
}
