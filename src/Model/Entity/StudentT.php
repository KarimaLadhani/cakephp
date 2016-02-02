<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StudentT Entity.
 */
class StudentT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Purpose_For_Enrollment' => true,
        'Referred_By' => true,
        'Highest_Education_Level' => true,
        'Highest_Level_Passed' => true,
        'Last_Update_Date_Time' => true,
        'Note' => true,
    ];
}
