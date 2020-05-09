<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LendingStatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LendingStatusesTable Test Case
 */
class LendingStatusesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LendingStatusesTable
     */
    public $LendingStatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.LendingStatuses',
        'app.Books',
        'app.Employees',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('LendingStatuses') ? [] : ['className' => LendingStatusesTable::class];
        $this->LendingStatuses = TableRegistry::getTableLocator()->get('LendingStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LendingStatuses);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
