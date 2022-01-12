<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Serviciosadicionale[]|\Cake\Collection\CollectionInterface $serviciosadicionales
 */
?>
<div class="serviciosadicionales index content">
    <?= $this->Html->link(__('Nuevo servicio adicional'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Servicios adicionales') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                 <th><?= $this->Paginator->sort('ID Servicio') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('Centro') ?></th>
                    <th><?= $this->Paginator->sort('Precio') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($serviciosadicionales as $serviciosadicionale): ?>
                <tr>
                    <td><?= $this->Number->format($serviciosadicionale->id_servicio) ?></td>
                    <td><?= h($serviciosadicionale->nombre) ?></td>
                    <td><?= h($lista_centros[$serviciosadicionale->id_centro]) ?></td>
                    <td><?= h($serviciosadicionale->precio). " €" ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $serviciosadicionale->id_servicio]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $serviciosadicionale->id_servicio]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $serviciosadicionale->id_servicio], ['confirm' => __('Are you sure you want to delete # {0}?', $serviciosadicionale->id_servicio)]) ?>
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
    <br/><br/><?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'index'], ['class' => 'button float-right']) ?><br/><br/>

</div>
