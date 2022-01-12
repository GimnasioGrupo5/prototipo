<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Citasentrenador Entity
 *
 * @property int $id_registro
 * @property int $id_socio
 * @property int $id_entrenador
 * @property \Cake\I18n\FrozenDate $fecha
 * @property \Cake\I18n\Time $hora
 */
class Citasentrenador extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'id_socio' => true,
        'id_entrenador' => true,
        'fecha' => true,
        'hora' => true,
    ];
}
