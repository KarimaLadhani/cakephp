<?php
namespace App\Model\Table;

use App\Model\Entity\VolunteerKnowledgeT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VolunteerKnowledgeT Model
 */
class VolunteerKnowledgeTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('volunteer_knowledge_t');
        $this->displayField('Volunteer_Knowledge_ID');
        $this->primaryKey('Volunteer_Knowledge_ID');
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
            ->add('Volunteer_Knowledge_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Volunteer_Knowledge_ID', 'create');
            
        $validator
            ->add('Volunteer_ID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Volunteer_ID', 'create')
            ->notEmpty('Volunteer_ID');
            
        $validator
            ->allowEmpty('Knowledge_Area');
            
        $validator
            ->allowEmpty('Knowledge_Level');
            
        $validator
            ->add('Volunteer_Application_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Volunteer_Application_ID');
            
        $validator
            ->allowEmpty('Note');

        return $validator;
    }
}
