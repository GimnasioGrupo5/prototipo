<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LimpiadoresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LimpiadoresTable Test Case
 */
class LimpiadoresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LimpiadoresTable
     */
    protected $Limpiadores;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Limpiadores',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Limpiadores') ? [] : ['className' => LimpiadoresTable::class];
        $this->Limpiadores = $this->getTableLocator()->get('Limpiadores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Limpiadores);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LimpiadoresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
