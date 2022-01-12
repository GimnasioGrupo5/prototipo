<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recepcionista[]|\Cake\Collection\CollectionInterface $recepcionistas
 */
?>
<div class="recepcionistas index content">
    <h3><?= __('Servicios adicionales disponibles en tu centro') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('precio') ?></th>
                    <th><?= $this->Paginator->sort('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($servicios as $serv): ?>
                <tr>
                    <td><?= h($serv->nombre) ?></td>
                    <td><?= h($serv->precio). " €/mes" ?></td>
                    <td><?= $this->Html->link(__('Apuntarme'), ['controller' => 'sociosserviciosadicionales', 'action' => 'add', $serv->id_servicio], ['class' => 'button']) ?></td>               
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>    
    <br/><br/><br/><br/><br/>
    <h3><?= __('Mis servicios contratados') ?></h3>
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('precio') ?></th>
                    <th><?= $this->Paginator->sort('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($servicios_socio as $ssocio): ?>
                <?php foreach ($servicios as $serv): 
                if($ssocio['id_servicio'] == $serv['id_servicio']){
                    ?>
                    <tr>
                        <td><?= h($serv->nombre) ?></td>
                        <td><?= h($serv->precio). " €/mes" ?></td>
                        <td><?= $this->Form->postLink(__('Dar de baja'), ['controller' => 'sociosserviciosadicionales', 'action' => 'delete',  $ssocio['id_registro']], ['class' => 'button', 'confirm' => __('¿Quieres dar de baja el servicio?')]) ?></td>
                    </tr>
                    <?php
                }    
                ?>
                
                <?php endforeach; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <br/><br/><?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'index'], ['class' => 'button float-right']) ?><br/><br/>
</div>