<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookInfosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookInfosTable Test Case
 */
class BookInfosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BookInfosTable
     */
    public $BookInfos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.BookInfos',
        'app.Favorites',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BookInfos') ? [] : ['className' => BookInfosTable::class];
        $this->BookInfos = TableRegistry::getTableLocator()->get('BookInfos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BookInfos);

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
