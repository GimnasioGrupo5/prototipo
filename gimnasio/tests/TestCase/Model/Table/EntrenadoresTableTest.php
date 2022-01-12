<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EntrenadoresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EntrenadoresTable Test Case
 */
class EntrenadoresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EntrenadoresTable
     */
    protected $Entrenadores;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Entrenadores',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Entrenadores') ? [] : ['className' => EntrenadoresTable::class];
        $this->Entrenadores = $this->getTableLocator()->get('Entrenadores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Entrenadores);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EntrenadoresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
