<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recepcionista[]|\Cake\Collection\CollectionInterface $recepcionistas
 */

?>
<div class="solicitar index content">
    <?php
    if(!empty($cita))
    {
    ?>
    <label> Ya tienes un entrenador personal solictado para hoy </label>
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th><?= $this->Paginator->sort('horario') ?></th>
                    <th><?= $this->Paginator->sort('entrenador') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($cita as $cit): ?>
                <tr>
                    <td><?= $this->Time->format($cit->fecha, "dd-MM-YYYY")?></td>
                    <td><?= h($cit->hora)?></td>
                    <td><?= h($entrenador[0]['nombre'])?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
    <?php
    }else{
    ?>
        <?= $this->Html->link(__('Solicitar entrenador'), ['controller' => 'citasentrenador', 'action' => 'add'], ['class' => 'buttonp', 'confirm' => __('Se va a asignar un entrenador personal de forma aleatoria. ¿Quieres continuar?')]) ?>
    <?php
    }
    ?>          
    <br/><br/><?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'index'], ['class' => 'button float-right']) ?><br/><br/>
</div>