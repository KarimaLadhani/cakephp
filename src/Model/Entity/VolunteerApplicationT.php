<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VolunteerApplicationT Entity.
 */
class VolunteerApplicationT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Volunteer_ID' => true,
        'Application_Date' => true,
        'Application_Approval_Flag' => true,
        'Application_Approval_Date' => true,
        'Performance_Scale' => true,
        'Note' => true,
        'Rejection_Reason' => true,
    ];
}
