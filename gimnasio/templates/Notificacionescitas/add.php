<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notificacionescita $notificacionescita
 */
?>
<div class="column-responsive column-80">
    <div class="notificacionescitas form content">
        <?= $this->Form->create($notificacionescita) ?>
        <fieldset>
            <legend><?= __('Solicitud de anulación de cita') ?></legend>
            <div style="visibility: hidden; position: absolute;">
            <?php
                echo $this->Form->control('id_entrenador', ['value' => $cita[0]['id_entrenador']]);
                echo $this->Form->control('id_actividad', ['value' => $cita[0]['id_registro']]);
                echo $this->Form->control('leida');
            ?>
            </div>
            <label> Fecha: <?php echo $this->Time->format($cita[0]['fecha'],"dd-MM-YYYY");?> </label> 
            <label> Hora: <?php echo $cita[0]['hora'];?></label> 
            <?php
                echo $this->Form->control('notificacion', ['label' => 'Comentario']);
                
            ?>
        </fieldset>
        <?= $this->Form->button(__('Enviar')) ?>
        <?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'entrenadorSocios'], ['class' => 'button float-right']) ?>

        <?= $this->Form->end() ?>
    </div>
</div>

