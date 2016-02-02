<?php
namespace App\Model\Table;

use App\Model\Entity\VolunteerInterestT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VolunteerInterestT Model
 */
class VolunteerInterestTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('volunteer_interest_t');
        $this->displayField('Volunteer_Interest_ID');
        $this->primaryKey('Volunteer_Interest_ID');
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
            ->add('Volunteer_Interest_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Volunteer_Interest_ID', 'create');
            
        $validator
            ->add('Volunteer_ID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Volunteer_ID', 'create')
            ->notEmpty('Volunteer_ID');
            
        $validator
            ->allowEmpty('Interest_Type');
            
        $validator
            ->allowEmpty('Note');

        return $validator;
    }
}
