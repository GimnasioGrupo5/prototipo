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
    </div>
    <br/></br>
    <h3><?= __('Valoracion media de cada monitor') ?></h3>
    <div class="table-responsive">
        <table style="width: 50%; margin-left: 28%;">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('monitor') ?></th>
                    <th><?= $this->Paginator->sort('nota media') ?></th>                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($media as $med): ?>
                <tr>
                    <td><?= h($lista_monitores[$med->id_monitor]) ?></td>
                    <td><?= h($med->nota_evaluacion) ?></td>                    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br/><br/><?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'index'], ['class' => 'button float-right']) ?><br/><br/>
</div>