<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StudentOrganizationTypeTFixture
 *
 */
class StudentOrganizationTypeTFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'student_organization_type_t';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Student_Organization_Type_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Student_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Organization_Type' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Note' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'Student_Organization_Type_ID_Index' => ['type' => 'index', 'columns' => ['Student_Organization_Type_ID'], 'length' => []],
            'Student_Organization_Type_fk1' => ['type' => 'index', 'columns' => ['Student_ID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['Student_Organization_Type_ID'], 'length' => []],
            'Student_Organization_Type_fk1' => ['type' => 'foreign', 'columns' => ['Student_ID'], 'references' => ['student_t', 'Student_ID'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
            'Student_Organization_Type_ID' => 1,
            'Student_ID' => 1,
            'Organization_Type' => 'Lorem ipsum dolor sit amet',
            'Note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
        ],
    ];
}
