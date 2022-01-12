<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recepcionista[]|\Cake\Collection\CollectionInterface $recepcionistas
 */
?>
<div class="recepcionistas index content">
    <h3><?= __('Socios asignados') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th><?= $this->Paginator->sort('hora') ?></th>
                    <th><?= $this->Paginator->sort('usuario') ?></th>
                    <th><?= $this->Paginator->sort('acciones') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(!empty($citas))
            {
                 foreach ($citas as $cita): ?>
                <tr>
                    <td><?= $this->Time->format($cita['fecha'], "dd-MM-YYYY") ?></td>
                    <td><?= h($cita['hora']) ?></td>
                    <td><?= h($socio[0]['nombre']) ?></td>
                    <td style="width: 16%;">
                        <?= $this->Html->link(__('Anular Cita'), ['controller' => 'notificacionescitas', 'action' => 'add', $cita['id_registro']], ['class' => 'button']) ?>
                    </td>                
                </tr>
                <?php endforeach;
            }else{
            ?>
                <td colspan="4" style="text-align: center;"><?= h('No tienes citas concertadas') ?></td>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>    
    <br/><br/><?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'index'], ['class' => 'button float-right']) ?><br/><br/>
</div>