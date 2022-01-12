<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Limpiadore[]|\Cake\Collection\CollectionInterface $limpiadores
 */
?>
<div class="limpiadores index content">
    <h3><?= __('Limpiadores') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('salario') ?></th>
                    <th><?= $this->Paginator->sort('telefono') ?></th>
                    <th><?= $this->Paginator->sort('fecha_nacimiento') ?></th>
                    <th><?= $this->Paginator->sort('usuario') ?></th>
                    <th><?= $this->Paginator->sort('turno') ?></th>
                    <th><?= $this->Paginator->sort('zona') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($limpiadores as $limpiadore): ?>
                <tr>
                    <td><?= h($limpiadore->nombre) ?></td>
                    <td><?= $this->Number->format($limpiadore->salario) ?></td>
                    <td><?= h($limpiadore->telefono) ?></td>
                    <td><?= $this->Time->format($limpiadore->fecha_nacimiento, "dd-MM-YYYY") ?></td>
                    <td><?= h($limpiadore->usuario) ?></td>
                    <?php if($limpiadore->turno == 1){
                        $turno = "Mañana";
                    }else{
                        $turno = "Tarde";
                    }
                    ?>
                    <td><?= h($turno) ?></td>
                    <?php if($limpiadore->zona == 1){
                        $zona = "Servicios";
                    }else if($limpiadore->zona == 2){
                        $zona = "Salas de actividades";
                    }else{
                        $zona = "Sala principal";
                    }
                    ?>
                    <td><?= h($zona) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $limpiadore->id_limpiador]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $limpiadore->id_limpiador]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $limpiadore->id_limpiador], ['confirm' => __('Are you sure you want to delete # {0}?', $limpiadore->id_limpiador)]) ?>
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
