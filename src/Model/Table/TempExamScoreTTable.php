<?php
namespace App\Model\Table;

use App\Model\Entity\TempExamScoreT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TempExamScoreT Model
 */
class TempExamScoreTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('temp_exam_score_t');
        $this->displayField('Student_ID');
        $this->primaryKey('Student_ID');
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
            ->add('Student_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Student_ID', 'create');
            
        $validator
            ->add('Exam_ID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Exam_ID', 'create')
            ->notEmpty('Exam_ID');
            
        $validator
            ->add('Raw_Passing_Score', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Raw_Passing_Score');

        return $validator;
    }
}
