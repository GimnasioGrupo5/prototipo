<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SociosserviciosadicionalesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SociosserviciosadicionalesTable Test Case
 */
class SociosserviciosadicionalesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SociosserviciosadicionalesTable
     */
    protected $Sociosserviciosadicionales;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Sociosserviciosadicionales',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Sociosserviciosadicionales') ? [] : ['className' => SociosserviciosadicionalesTable::class];
        $this->Sociosserviciosadicionales = $this->getTableLocator()->get('Sociosserviciosadicionales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Sociosserviciosadicionales);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SociosserviciosadicionalesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
