<?php
namespace App\Model\Table;

use App\Model\Entity\ContactTypeT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContactTypeT Model
 */
class ContactTypeTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('contact_type_t');
        $this->displayField('Contact_Type_ID');
        $this->primaryKey('Contact_Type_ID');
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
            ->add('Contact_Type_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Contact_Type_ID', 'create');
            
        $validator
            ->allowEmpty('Contact_Type');
            
        $validator
            ->allowEmpty('Note');

        return $validator;
    }
}
