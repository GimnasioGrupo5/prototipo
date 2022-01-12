<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tipoactividade $tipoactividade
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tipoactividade'), ['action' => 'edit', $tipoactividade->id_actividad], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tipoactividade'), ['action' => 'delete', $tipoactividade->id_actividad], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoactividade->id_actividad), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tipoactividades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tipoactividade'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tipoactividades view content">
            <h3><?= h($tipoactividade->id_actividad) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($tipoactividade->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tipo') ?></th>
                    <td><?= h($tipoactividade->tipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Actividad') ?></th>
                    <td><?= $this->Number->format($tipoactividade->id_actividad) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
