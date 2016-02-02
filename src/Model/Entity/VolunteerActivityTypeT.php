<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VolunteerActivityTypeT Entity.
 */
class VolunteerActivityTypeT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Volunteer_ID' => true,
        'Volunteer_Application_ID' => true,
        'Activity_Type' => true,
        'Start_Particitpation_Date' => true,
        'End_Participation_Date' => true,
        'Note' => true,
    ];
}
