<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExaminationT Entity.
 */
class ExaminationT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Exam_Level' => true,
        'Exam_Date' => true,
        'Exam_Year' => true,
        'Enabled' => true,
        'Registration_Deadline' => true,
        'Deferment_Deadline' => true,
        'US_Enrollment_Fee' => true,
        'International_Enrollment_Fee' => true,
        'US_Retest_Fee_Current_Year' => true,
        'US_Retest_Fee_Next_Year' => true,
        'US_Deferment_Fee_Before_Deadline' => true,
        'US_Deferment_Fee_After_Deadline' => true,
        'International_Retest_Fee_Current_Year' => true,
        'International_Retest_Fee_Next_Year' => true,
        'International_Deferment_Fee_Before_Deadline' => true,
        'International_Deferment_Fee_After_Deadline' => true,
        'Deferment_Fee_Past_Due_Date' => true,
        'Sample' => true,
        'Exam_Passing_Score' => true,
        'Location_For_Private_Exam' => true,
        'Note' => true,
    ];
}
