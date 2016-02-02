<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StudentOrganizationTypeT Entity.
 */
class StudentOrganizationTypeT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Student_ID' => true,
        'Organization_Type' => true,
        'Note' => true,
    ];
}
