<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SociosserviciosadicionalesFixture
 */
class SociosserviciosadicionalesFixture extends TestFixture
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
                'id_socio' => 1,
                'id_servicio' => 1,
                'fecha' => '2022-01-05',
            ],
        ];
        parent::init();
    }
}
