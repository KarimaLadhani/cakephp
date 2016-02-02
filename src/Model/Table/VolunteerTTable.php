<?php
namespace App\Model\Table;

use App\Model\Entity\VolunteerT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VolunteerT Model
 */
class VolunteerTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('VOLUNTEER_T');
        $this->displayField('Volunteer_ID');
        $this->primaryKey('Volunteer_ID');
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
            ->add('Volunteer_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Volunteer_ID', 'create');
            
        $validator
            ->add('Cep_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Cep_ID');
            
        $validator
            ->allowEmpty('College1');
            
        $validator
            ->allowEmpty('Degree1');
            
        $validator
            ->allowEmpty('Major1');
            
        $validator
            ->allowEmpty('College2');
            
        $validator
            ->allowEmpty('Degree2');
            
        $validator
            ->allowEmpty('Major2');
            
        $validator
            ->allowEmpty('Volunteer_Interest');
            
        $validator
            ->allowEmpty('Sample_Item');
            
        $validator
            ->allowEmpty('Approval_Flag');
            
        $validator
            ->allowEmpty('Note');

        return $validator;
    }
}
