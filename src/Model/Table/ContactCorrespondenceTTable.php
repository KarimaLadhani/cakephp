<?php
namespace App\Model\Table;

use App\Model\Entity\ContactCorrespondenceT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContactCorrespondenceT Model
 */
class ContactCorrespondenceTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('contact_correspondence_t');
        $this->displayField('Contact_Correspondence_ID');
        $this->primaryKey('Contact_Correspondence_ID');
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
            ->add('Contact_Correspondence_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Contact_Correspondence_ID', 'create');
            
        $validator
            ->add('Contact_ID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Contact_ID', 'create')
            ->notEmpty('Contact_ID');
            
        $validator
            ->allowEmpty('Correspondence_Type');
            
        $validator
            ->add('Correspondence_Date', 'valid', ['rule' => 'date'])
            ->allowEmpty('Correspondence_Date');
            
        $validator
            ->requirePresence('Correspondence_Time', 'create')
            ->notEmpty('Correspondence_Time');
            
        $validator
            ->allowEmpty('Subject');
            
        $validator
            ->allowEmpty('Note');

        return $validator;
    }
}
