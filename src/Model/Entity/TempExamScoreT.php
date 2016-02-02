<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TempExamScoreT Entity.
 */
class TempExamScoreT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Exam_ID' => true,
        'Raw_Passing_Score' => true,
    ];
}
