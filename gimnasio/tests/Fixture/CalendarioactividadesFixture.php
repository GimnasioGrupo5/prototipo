<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CalendarioactividadesFixture
 */
class CalendarioactividadesFixture extends TestFixture
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
                'id_registro' => 1,
                'id_actividad' => 1,
                'id_sala' => 1,
                'id_monitor' => 1,
                'fecha' => '2021-12-31',
                'horario' => 'Lorem ipsum dolor sit amet',
                'ocupacion' => 1,
            ],
        ];
        parent::init();
    }
}
