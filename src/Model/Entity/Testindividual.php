<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Testindividual Entity.
 */
class Testindividual extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'First_Name' => true,
        'Middle_Initial' => true,
        'Last_Name' => true,
        'Address1' => true,
        'Address2' => true,
        'City' => true,
        'State' => true,
        'Postal_Code' => true,
        'Country' => true,
        'Home_Phone' => true,
        'Mobile_Phone' => true,
        'Email_Address' => true,
        'Alternate_Email_Address' => true,
        'Password' => true,
        'Preferred_Address' => true,
        'Do_Not_Mail' => true,
        'Is_Student' => true,
        'Is_Volunteer' => true,
        'Is_Contact' => true,
        'Note' => true,
    ];
}
