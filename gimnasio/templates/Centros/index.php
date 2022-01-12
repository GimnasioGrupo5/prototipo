<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Centro[]|\Cake\Collection\CollectionInterface $centros
 */
?>
<div class="centros index content">
    <?= $this->Html->link(__('New Centro'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Centros') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_centro') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('telefono') ?></th>
                    <th><?= $this->Paginator->sort('direccion') ?></th>
                    <th><?= $this->Paginator->sort('id_sede') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($centros as $centro): ?>
                <tr>
                    <td><?= $this->Number->format($centro->id_centro) ?></td>
                    <td><?= h($centro->nombre) ?></td>
                    <td><?= h($centro->telefono) ?></td>
                    <td><?= h($centro->direccion) ?></td>
                    <td><?= $this->Number->format($centro->id_sede) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $centro->id_centro]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $centro->id_centro]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $centro->id_centro], ['confirm' => __('Are you sure you want to delete # {0}?', $centro->id_centro)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
