<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Citasentrenador $citasentrenador
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Citasentrenador'), ['action' => 'edit', $citasentrenador->id_registro], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Citasentrenador'), ['action' => 'delete', $citasentrenador->id_registro], ['confirm' => __('Are you sure you want to delete # {0}?', $citasentrenador->id_registro), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Citasentrenador'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Citasentrenador'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="citasentrenador view content">
            <h3><?= h($citasentrenador->id_registro) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id Registro') ?></th>
                    <td><?= $this->Number->format($citasentrenador->id_registro) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Socio') ?></th>
                    <td><?= $this->Number->format($citasentrenador->id_socio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Entrenador') ?></th>
                    <td><?= $this->Number->format($citasentrenador->id_entrenador) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($citasentrenador->fecha) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hora') ?></th>
                    <td><?= h($citasentrenador->hora) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
