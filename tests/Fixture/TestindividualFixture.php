<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TestindividualFixture
 *
 */
class TestindividualFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'testindividual';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Individual_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'First_Name' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Middle_Initial' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Last_Name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Address1' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Address2' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'City' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'State' => ['type' => 'string', 'length' => 2, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Postal_Code' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Country' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => 'United States', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Home_Phone' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Mobile_Phone' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Email_Address' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Alternate_Email_Address' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Password' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Preferred_Address' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Do_Not_Mail' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Is_Student' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => 'No', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Is_Volunteer' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => 'No', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Is_Contact' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => 'No', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Note' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['Individual_ID'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'Individual_ID' => 1,
            'First_Name' => 'Lorem ipsum dolor sit amet',
            'Middle_Initial' => 'Lorem ipsum dolor sit amet',
            'Last_Name' => 'Lorem ipsum dolor sit amet',
            'Address1' => 'Lorem ipsum dolor sit amet',
            'Address2' => 'Lorem ipsum dolor sit amet',
            'City' => 'Lorem ipsum dolor sit amet',
            'State' => '',
            'Postal_Code' => 'Lorem ip',
            'Country' => 'Lorem ipsum dolor sit amet',
            'Home_Phone' => 'Lorem ipsum dolor sit amet',
            'Mobile_Phone' => 'Lorem ipsum dolor sit amet',
            'Email_Address' => 'Lorem ipsum dolor sit amet',
            'Alternate_Email_Address' => 'Lorem ipsum dolor sit amet',
            'Password' => 'Lorem ipsum dolor sit amet',
            'Preferred_Address' => 'Lorem ipsum dolor sit amet',
            'Do_Not_Mail' => 'Lorem ipsum dolor sit amet',
            'Is_Student' => 'Lorem ip',
            'Is_Volunteer' => 'Lorem ip',
            'Is_Contact' => 'Lorem ip',
            'Note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
        ],
    ];
}
