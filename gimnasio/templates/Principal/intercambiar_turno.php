<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recepcionista[]|\Cake\Collection\CollectionInterface $recepcionistas
 */
switch($limpiador[0]['zona'])
{
    case 1: $zona = "Servicios y duchas"; break; 
    case 2: $zona = "Salas de actividades"; break; 
    case 3: $zona = "Sala principal"; break; 
}
switch($limpiador[0]['turno'])
{
    case 1: $turno = "Mañana";  break; 
    case 2: $turno = "Tarde";break; 
}
?>
<div class="recepcionistas index content">
    <h3><?= __('Mis datos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('zona') ?></th>
                    <th><?= $this->Paginator->sort('turno') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($limpiador as $lim): ?>
                <tr>
                    <td><?= h($limpiador[0]['nombre']) ?></td>
                    <td><?= h($zona) ?></td>
                    <td><?= h($turno) ?></td>               
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br/><br/>
    <div class="table-responsive">
    <h3><?= __('Compañeros') ?></h3>
    <?php
    switch($otros[0]['zona'])
    {
        case 1: $zona_otros = "Servicios y duchas"; break; 
        case 2: $zona_otros = "Salas de actividades"; break; 
        case 3: $zona_otros = "Sala principal"; break; 
    }
    switch($otros[0]['turno'])
    {
        case 1: $turno_otros = "Mañana";  break; 
        case 2: $turno_otros = "Tarde";break; 
    }
    ?>
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('zona') ?></th>
                    <th><?= $this->Paginator->sort('turno') ?></th>
                    <th><?= $this->Paginator->sort('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($otros as $otro): ?>
                <tr>
                    <td><?= h($otro['nombre']) ?></td>
                    <td><?= h($zona_otros) ?></td>
                    <td><?= h($turno_otros) ?></td>     
                    <td><?= $this->Html->link(__('Cambiar turno'), ['action' => 'solicitudCambio', $otro->id_limpiador], ['class' => 'button']) ?></td>                        
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <br/><br/><?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'index'], ['class' => 'button float-right']) ?><br/><br/>
</div>