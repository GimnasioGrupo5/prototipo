<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recepcionista[]|\Cake\Collection\CollectionInterface $recepcionistas
 */

?>
<div class="recepcionistas index content">
    <h3><?= __('Actividades disponibles') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_actividad') ?></th>
                    <th><?= $this->Paginator->sort('id_sala') ?></th>
                    <th><?= $this->Paginator->sort('aforo') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th><?= $this->Paginator->sort('horario') ?></th>
                    <th><?= $this->Paginator->sort('disponible') ?></th>
                    <th><?= $this->Paginator->sort('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($actividades as $act): ?>
                <tr>
                    <td><?= h($lista_actividades[$act->id_actividad]) ?></td>
                    <td><?= h($lista_salas[$act->id_sala]) ?></td>
                    <td><?= h($aforo_salas[$act->id_sala]) ?></td>
                    <td><?= $this->Time->format($act->fecha, "dd-MM-YYYY") ?></td>
                    <td><?= h($act->horario) ?></td>
                   <?php 
                    if(($aforo_salas[$act->id_sala] - $act->ocupacion) > 0)
                    {
                        ?>
                            <td><?= h($aforo_salas[$act->id_sala]) - $this->Number->format($act->ocupacion) ?></td>
                            <td><?= $this->Html->link(__('Apuntarme'), ['action' => 'apuntarActividad', $act->id_registro], ['class' => 'button']) ?></td>
                        <?php
                    }else{
                        ?>
                             <td><?= h('Aforo superado. No disponible') ?></td>
                        <?php
                    }
                    ?>                  
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <br/><br/><?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'index'], ['class' => 'button float-right']) ?><br/><br/>
</div>