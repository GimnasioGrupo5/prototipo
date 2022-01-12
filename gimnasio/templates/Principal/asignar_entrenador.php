<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recepcionista[]|\Cake\Collection\CollectionInterface $recepcionistas
 */

?>
<div class="solicitar index content">
    <div class="entrenadores form content">            
    </div>
    <?=  $this->Html->link(__('Solicitar entrenador'), ['action' => 'asignarEntrenador'], ['class' => 'button', 'confirm' => __('Se va a asignar un entrenador personal de forma aleatoria. ¿Quieres continuar?')]) ?>
                   
    <br/><br/><?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'index'], ['class' => 'button float-right']) ?><br/><br/>
</div>