<?php
namespace App\Model\Table;

use App\Model\Entity\StudentOrganizationTypeT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StudentOrganizationTypeT Model
 */
class StudentOrganizationTypeTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('STUDENT_ORGANIZATION_TYPE_T');
        $this->displayField('Student_Organization_Type_ID');
        $this->primaryKey('Student_Organization_Type_ID');
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
            ->add('Student_Organization_Type_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Student_Organization_Type_ID', 'create');
            
        $validator
            ->add('Student_ID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Student_ID', 'create')
            ->notEmpty('Student_ID');
            
        $validator
            ->allowEmpty('Organization_Type');
            
        $validator
            ->allowEmpty('Note');

        return $validator;
    }
}
