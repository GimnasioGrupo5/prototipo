<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SalasFixture
 */
class SalasFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_sala' => 1,
                'nombre' => 'Lorem ipsum dolor sit amet',
                'aforo' => 1,
            ],
        ];
        parent::init();
    }
}
