<?php
namespace App\Model\Table;
use App\Model\Entity\IndividualT;

use App\Model\Entity\CepT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CepT Model
 */
class CepTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('cep_t');
        $this->displayField('Cep_ID');
        $this->primaryKey('Cep_ID');

        $this->hasMany('IndividualT', [
                'foreignKey' => 'Student_ID',
                //'dependent' => true,
                'className' => 'IndividualT',
                'propertyName' => 'invidualInfo',
                'strategy' => 'subquery'
            ]);
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
            ->add('Cep_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Cep_ID', 'create');
            
        $validator
            ->add('Student_ID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Student_ID', 'create')
            ->notEmpty('Student_ID');
            
        $validator
            ->allowEmpty('Up_To_Date');
            
        $validator
            ->allowEmpty('Active');
            
        $validator
            ->add('Date_Received', 'valid', ['rule' => 'date'])
            ->allowEmpty('Date_Received');
            
        $validator
            ->add('Due_Date', 'valid', ['rule' => 'date'])
            ->allowEmpty('Due_Date');
            
        $validator
            ->allowEmpty('Note');
            
        $validator
            ->allowEmpty('Display_First_Name');
            
        $validator
            ->allowEmpty('Display_Last_Name');

        return $validator;
    }
}
