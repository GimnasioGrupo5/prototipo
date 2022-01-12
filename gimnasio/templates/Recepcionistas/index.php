<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recepcionista[]|\Cake\Collection\CollectionInterface $recepcionistas
 */
?>
<div class="recepcionistas index content">
    <h3><?= __('Recepcionistas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('salario') ?></th>
                    <th><?= $this->Paginator->sort('telefono') ?></th>
                    <th><?= $this->Paginator->sort('fecha_nacimiento') ?></th>
                    <th><?= $this->Paginator->sort('usuario') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recepcionistas as $recepcionista): ?>
                <tr>
                    <td><?= h($recepcionista->nombre) ?></td>
                    <td><?= $this->Number->format($recepcionista->salario). "$" ?></td>
                    <td><?= h($recepcionista->telefono) ?></td>
                    <td><?= $this->Time->format($recepcionista->fecha_nacimiento, "dd-MM-YYYY") ?></td>
                    <td><?= h($recepcionista->usuario) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $recepcionista->id_recepcionista]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $recepcionista->id_recepcionista]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $recepcionista->id_recepcionista], ['confirm' => __('Are you sure you want to delete # {0}?', $recepcionista->id_recepcionista)]) ?>
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
    <br/><br/><?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'gestionUsuarios'], ['class' => 'button float-right']) ?><br/><br/>
</div>
