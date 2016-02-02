<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VolunteerActivityListT Entity.
 */
class VolunteerActivityListT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Title' => true,
        'Date' => true,
        'Hours' => true,
        'Note' => true,
    ];
}
