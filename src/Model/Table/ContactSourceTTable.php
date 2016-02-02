<?php
namespace App\Model\Table;

use App\Model\Entity\ContactSourceT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContactSourceT Model
 */
class ContactSourceTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('contact_source_t');
        $this->displayField('Contact_Source_ID');
        $this->primaryKey('Contact_Source_ID');
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
            ->add('Contact_Source_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Contact_Source_ID', 'create');
            
        $validator
            ->add('Contact_ID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Contact_ID', 'create')
            ->notEmpty('Contact_ID');
            
        $validator
            ->allowEmpty('Contact_Source_Where');
            
        $validator
            ->add('Contact_Source_When', 'valid', ['rule' => 'date'])
            ->allowEmpty('Contact_Source_When');
            
        $validator
            ->allowEmpty('Note');

        return $validator;
    }
}
