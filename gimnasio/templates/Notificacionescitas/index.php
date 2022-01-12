<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notificacionescita[]|\Cake\Collection\CollectionInterface $notificacionescitas
 */
?>
<div class="notificacionescitas index content">
    <h3><?= __('Solicitudes de anulación de citas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_entrenador') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th><?= $this->Paginator->sort('hora') ?></th>
                    <th><?= $this->Paginator->sort('comentario') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notificacionescitas as $notificacionescita):                     
                if($notificacionescita->leida == 0)
                {
                ?>                
                <tr>
                    <td><?= h($lista_entrenadores[$notificacionescita->id_entrenador]) ?></td>
                    <td><?= $this->Time->format($fechas[$notificacionescita->id_actividad], "dd-MM-YYYY") ?></td>
                    <td><?= $this->Number->format($horas[$notificacionescita->id_actividad]) ?></td>
                    <td><?= h($notificacionescita->notificacion) ?></td>
                    <td>
                        <?= $this->Html->link(__('Asignar sustituto'), ['action' => 'asignarSustituto', $notificacionescita['id_notificacion']], ['class' => 'button']) ?>
                </tr>
                <?php 
                }else{
                ?>
                <tr>
                    <td colspan="5">No hay solicitudes pendientes</td>
                </tr>
                <?php
                }
                endforeach; 
                ?>
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
