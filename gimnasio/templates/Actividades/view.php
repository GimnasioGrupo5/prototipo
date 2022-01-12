<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actividade $actividade
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Actividade'), ['action' => 'edit', $actividade->id_registro], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Actividade'), ['action' => 'delete', $actividade->id_registro], ['confirm' => __('Are you sure you want to delete # {0}?', $actividade->id_registro), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Actividades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Actividade'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actividades view content">
            <h3><?= h($actividade->id_registro) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($actividade->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Comentario') ?></th>
                    <td><?= h($actividade->comentario) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Registro') ?></th>
                    <td><?= $this->Number->format($actividade->id_registro) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nota Evaluacion') ?></th>
                    <td><?= $this->Number->format($actividade->nota_evaluacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Sala') ?></th>
                    <td><?= $this->Number->format($actividade->id_sala) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Actividad') ?></th>
                    <td><?= $this->Number->format($actividade->id_actividad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Socio') ?></th>
                    <td><?= $this->Number->format($actividade->id_socio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Monitor') ?></th>
                    <td><?= $this->Number->format($actividade->id_monitor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($actividade->fecha) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reserva') ?></th>
                    <td><?= $actividade->reserva ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Asistencia') ?></th>
                    <td><?= $actividade->asistencia ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
