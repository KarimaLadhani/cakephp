<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VolunteerMaterialSentInfoT Entity.
 */
class VolunteerMaterialSentInfoT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Volunteer_ID' => true,
        'Volunteer_Material_Sent_Date' => true,
        'Volunteer_Application_ID' => true,
        'Level' => true,
        'Note' => true,
    ];
}
