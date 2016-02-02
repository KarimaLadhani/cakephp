<?php
namespace App\Model\Table;

use App\Model\Entity\ContactT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContactT Model
 */
class ContactTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('contact_t');
        $this->displayField('Contact_ID');
        $this->primaryKey('Contact_ID');
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
            ->add('Contact_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Contact_ID', 'create');
            
        $validator
            ->allowEmpty('Region');
            
        $validator
            ->add('Last_Meeting_Date', 'valid', ['rule' => 'date'])
            ->allowEmpty('Last_Meeting_Date');
            
        $validator
            ->allowEmpty('Referred_By');
            
        $validator
            ->allowEmpty('Contact_Type');
            
        $validator
            ->add('Date_Created', 'valid', ['rule' => 'date'])
            ->allowEmpty('Date_Created');
            
        $validator
            ->allowEmpty('Note');

        return $validator;
    }
}
