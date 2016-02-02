<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdministratorT Entity.
 */
class AdministratorT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'First_Name' => true,
        'Last_Name' => true,
        'Admin_Username' => true,
        'Admin_Password' => true,
        'Phone_Number' => true,
        'Email_Address' => true,
        'Time_Stamp' => true,
        'Note' => true,
        'Privileges' => true,
    ];
    
    protected function _setPassword($password)
    {
    	$hashedPass=(new LegacyPasswordHasher())->hash($password);
    	return $hashedPass;
    }
    
}
