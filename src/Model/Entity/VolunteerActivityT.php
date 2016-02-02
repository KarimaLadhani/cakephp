<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VolunteerActivityT Entity.
 */
class VolunteerActivityT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Volunteer_ID' => true,
        'Volunteer_Activity_List_ID' => true,
        'CE_Application_ID' => true,
    ];
}
