<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sala $sala
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sala'), ['action' => 'edit', $sala->id_sala], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sala'), ['action' => 'delete', $sala->id_sala], ['confirm' => __('Are you sure you want to delete # {0}?', $sala->id_sala), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Salas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sala'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="salas view content">
            <h3><?= h($sala->id_sala) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($sala->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Sala') ?></th>
                    <td><?= $this->Number->format($sala->id_sala) ?></td>
                </tr>
                <tr>
                    <th><?= __('Aforo') ?></th>
                    <td><?= $this->Number->format($sala->aforo) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
