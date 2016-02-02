<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VolunteerActivityTypeTTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VolunteerActivityTypeTTable Test Case
 */
class VolunteerActivityTypeTTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.volunteer_activity_type_t'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VolunteerActivityTypeT') ? [] : ['className' => 'App\Model\Table\VolunteerActivityTypeTTable'];
        $this->VolunteerActivityTypeT = TableRegistry::get('VolunteerActivityTypeT', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VolunteerActivityTypeT);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
