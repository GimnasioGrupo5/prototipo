<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SociosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SociosTable Test Case
 */
class SociosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SociosTable
     */
    protected $Socios;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Socios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Socios') ? [] : ['className' => SociosTable::class];
        $this->Socios = $this->getTableLocator()->get('Socios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Socios);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SociosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
