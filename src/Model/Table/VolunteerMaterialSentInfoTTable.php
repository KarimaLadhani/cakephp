<?php
namespace App\Model\Table;

use App\Model\Entity\VolunteerMaterialSentInfoT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VolunteerMaterialSentInfoT Model
 */
class VolunteerMaterialSentInfoTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('volunteer_material_sent_info_t');
        $this->displayField('Volunteer_Material_Sent_Info_ID');
        $this->primaryKey('Volunteer_Material_Sent_Info_ID');
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
            ->add('Volunteer_Material_Sent_Info_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Volunteer_Material_Sent_Info_ID', 'create');
            
        $validator
            ->add('Volunteer_ID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Volunteer_ID', 'create')
            ->notEmpty('Volunteer_ID');
            
        $validator
            ->add('Volunteer_Material_Sent_Date', 'valid', ['rule' => 'date'])
            ->allowEmpty('Volunteer_Material_Sent_Date');
            
        $validator
            ->add('Volunteer_Application_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Volunteer_Application_ID');
            
        $validator
            ->add('Level', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Level');
            
        $validator
            ->allowEmpty('Note');

        return $validator;
    }
}
