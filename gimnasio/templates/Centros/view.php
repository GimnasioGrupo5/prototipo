<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Centro $centro
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Centro'), ['action' => 'edit', $centro->id_centro], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Centro'), ['action' => 'delete', $centro->id_centro], ['confirm' => __('Are you sure you want to delete # {0}?', $centro->id_centro), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Centros'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Centro'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="centros view content">
            <h3><?= h($centro->id_centro) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($centro->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefono') ?></th>
                    <td><?= h($centro->telefono) ?></td>
                </tr>
                <tr>
                    <th><?= __('Direccion') ?></th>
                    <td><?= h($centro->direccion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Centro') ?></th>
                    <td><?= $this->Number->format($centro->id_centro) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Sede') ?></th>
                    <td><?= $this->Number->format($centro->id_sede) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
