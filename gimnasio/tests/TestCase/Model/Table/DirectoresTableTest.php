<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DirectoresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DirectoresTable Test Case
 */
class DirectoresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DirectoresTable
     */
    protected $Directores;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Directores',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Directores') ? [] : ['className' => DirectoresTable::class];
        $this->Directores = $this->getTableLocator()->get('Directores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Directores);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DirectoresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
