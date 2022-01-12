<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Socio[]|\Cake\Collection\CollectionInterface $socios
 */
?>
<div class="socios index content">
    <h3><?= __('Socios') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('telefono') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('tipo_cuenta') ?></th>
                    <th><?= $this->Paginator->sort('usuario') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($socios as $socio): ?>
                <tr>
                    <td><?= h($socio->nombre) ?></td>
                    <td><?= h($socio->telefono) ?></td>
                    <td><?= h($socio->email) ?></td>
                    <td><?= h($socio->tipo_cuenta) ?></td>
                    <td><?= h($socio->usuario) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $socio->id_socio]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $socio->id_socio]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $socio->id_socio], ['confirm' => __('Are you sure you want to delete # {0}?', $socio->id_socio)]) ?>
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
