<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Calendarioactividade $calendarioactividade
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Calendarioactividade'), ['action' => 'edit', $calendarioactividade->id_registro], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Calendarioactividade'), ['action' => 'delete', $calendarioactividade->id_registro], ['confirm' => __('Are you sure you want to delete # {0}?', $calendarioactividade->id_registro), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Calendarioactividades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Calendarioactividade'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="calendarioactividades view content">
            <h3><?= h($calendarioactividade->id_registro) ?></h3>
            <table>
                <tr>
                    <th><?= __('Horario') ?></th>
                    <td><?= h($calendarioactividade->horario) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Registro') ?></th>
                    <td><?= $this->Number->format($calendarioactividade->id_registro) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Actividad') ?></th>
                    <td><?= $this->Number->format($calendarioactividade->id_actividad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Sala') ?></th>
                    <td><?= $this->Number->format($calendarioactividade->id_sala) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Monitor') ?></th>
                    <td><?= $this->Number->format($calendarioactividade->id_monitor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ocupacion') ?></th>
                    <td><?= $this->Number->format($calendarioactividade->ocupacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($calendarioactividade->fecha) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
