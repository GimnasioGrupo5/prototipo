<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recepcionista[]|\Cake\Collection\CollectionInterface $recepcionistas
 */
?>
<div class="recepcionistas index content">
    <h3><?= __($titulo) ?></h3>
    <div class="table-responsive">
    <?php
        echo $this->Html->image('correo.png', array('alt' => 'Imagen', 'border' => '1', 'height' => '35', 'width' => '50', 'style' => 'float: right;'));
        echo $this->Html->image('excell.png', array('alt' => 'Imagen', 'border' => '1', 'height' => '35', 'width' => '50', 'style' => 'float: right;')); 
    ?>
    <?php
    if($informe == 1)
    {
    ?>
    <br/>
    <h3> Actividades </h3>
    <table>
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Nombre actividad') ?></th>
                <th><?= $this->Paginator->sort('Fecha') ?></th>
                <th><?= $this->Paginator->sort('Horario') ?></th>
                <th><?= $this->Paginator->sort('Sala') ?></th>
                <th><?= $this->Paginator->sort('Monitor') ?></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($actividades as $act): ?>
            <tr>
                <td><?php echo $act['nombre']; ?></td>
                <td><?php echo $act['fecha']; ?></td>
                <td><?php echo $horarios[$act['id_registro']]; ?></td>
                <td><?php echo $lista_salas[$act['id_sala']]; ?></td>
                <td><?php echo $lista_monitores[$act['id_monitor']]; ?></td>                    
            </tr>
        </tbody>      
        <?php endforeach;?>
    </table>
    <br/><br/>
    <h3><?= __('Servicios adicionales') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('socio') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($servicios as $serv): ?>
                <tr>
                    <td><?= h($lista_servicios[$serv['id_servicio']]) ?></td>
                    <td><?= h($lista_socios[$serv['id_socio']]) ?></td>
                    <td><?= h($serv['fecha']) ?></td></tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
    }
    else if($informe == 2)
    {
    ?>
    <h4><?= __('Valoraciones negativas') ?></h4>
    <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th><?= $this->Paginator->sort('nota') ?></th>
                    <th><?= $this->Paginator->sort('comentario') ?></th>
                    <th><?= $this->Paginator->sort('monitor') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($valoraciones as $val): ?>
                <tr>
                    <td><?= h($val->nombre) ?></td>
                    <td><?= $this->Time->format($val->fecha, ("dd-mm-YYYY")) ?></td>
                    <td><?= h($val->nota_evaluacion) ?></td>
                    <td><?= h($val->comentario) ?></td>
                    <td><?= h($lista_monitores[$val->id_monitor]) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php
    }
    ?>
    
    </div>
    <br/></br>
    </div>
    <br/><br/><?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'index'], ['class' => 'button float-right']) ?><br/><br/>
</div>