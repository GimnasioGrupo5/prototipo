<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sociosserviciosadicionale[]|\Cake\Collection\CollectionInterface $sociosserviciosadicionales
 */
?>
<div class="sociosserviciosadicionales index content">
    <?= $this->Html->link(__('New Sociosserviciosadicionale'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sociosserviciosadicionales') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_registro') ?></th>
                    <th><?= $this->Paginator->sort('id_socio') ?></th>
                    <th><?= $this->Paginator->sort('id_servicio') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sociosserviciosadicionales as $sociosserviciosadicionale): ?>
                <tr>
                    <td><?= $this->Number->format($sociosserviciosadicionale->id_registro) ?></td>
                    <td><?= $this->Number->format($sociosserviciosadicionale->id_socio) ?></td>
                    <td><?= $this->Number->format($sociosserviciosadicionale->id_servicio) ?></td>
                    <td><?= h($sociosserviciosadicionale->fecha) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $sociosserviciosadicionale->id_registro]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sociosserviciosadicionale->id_registro]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sociosserviciosadicionale->id_registro], ['confirm' => __('Are you sure you want to delete # {0}?', $sociosserviciosadicionale->id_registro)]) ?>
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
