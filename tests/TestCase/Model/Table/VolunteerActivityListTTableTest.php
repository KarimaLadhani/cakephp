<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VolunteerActivityListTTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VolunteerActivityListTTable Test Case
 */
class VolunteerActivityListTTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.volunteer_activity_list_t'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VolunteerActivityListT') ? [] : ['className' => 'App\Model\Table\VolunteerActivityListTTable'];
        $this->VolunteerActivityListT = TableRegistry::get('VolunteerActivityListT', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VolunteerActivityListT);

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
