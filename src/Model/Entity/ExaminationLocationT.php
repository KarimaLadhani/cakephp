<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExaminationLocationT Entity.
 */
class ExaminationLocationT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Exam_ID' => true,
        'System_Date_Time' => true,
        'Location_Name' => true,
        'Note' => true,
    ];
}
