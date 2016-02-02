<?php
namespace App\Model\Table;

use App\Model\Entity\Testindividual;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Testindividual Model
 */
class TestindividualTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('testindividual');
        $this->displayField('Individual_ID');
        $this->primaryKey('Individual_ID');
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
            ->add('Individual_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Individual_ID', 'create');
            
        $validator
            ->allowEmpty('First_Name');
            
        $validator
            ->allowEmpty('Middle_Initial');
            
        $validator
            ->requirePresence('Last_Name', 'create')
            ->notEmpty('Last_Name');
            
        $validator
            ->allowEmpty('Address1');
            
        $validator
            ->allowEmpty('Address2');
            
        $validator
            ->allowEmpty('City');
            
        $validator
            ->allowEmpty('State');
            
        $validator
            ->allowEmpty('Postal_Code');
            
        $validator
            ->allowEmpty('Country');
            
        $validator
            ->allowEmpty('Home_Phone');
            
        $validator
            ->allowEmpty('Mobile_Phone');
            
        $validator
            ->allowEmpty('Email_Address');
            
        $validator
            ->allowEmpty('Alternate_Email_Address');
            
        $validator
            ->allowEmpty('Password');
            
        $validator
            ->allowEmpty('Preferred_Address');
            
        $validator
            ->allowEmpty('Do_Not_Mail');
            
        $validator
            ->allowEmpty('Is_Student');
            
        $validator
            ->allowEmpty('Is_Volunteer');
            
        $validator
            ->allowEmpty('Is_Contact');
            
        $validator
            ->allowEmpty('Note');

        return $validator;
    }
}
