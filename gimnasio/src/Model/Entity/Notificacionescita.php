<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notificacionescita Entity
 *
 * @property int $id_notificacion
 * @property string $id_entrenador
 * @property int $id_actividad
 * @property string $notificacion
 * @property bool $leida
 */
class Notificacionescita extends Entity
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
        'id_entrenador' => true,
        'id_actividad' => true,
        'notificacion' => true,
        'leida' => true,
    ];
}
