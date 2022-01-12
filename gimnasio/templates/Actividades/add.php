<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actividade $actividade
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Actividades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actividades form content">
            <?= $this->Form->create($actividade) ?>
            <fieldset>
                <legend><?= __('Add Actividade') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('fecha');
                    echo $this->Form->control('nota_evaluacion');
                    echo $this->Form->control('comentario');
                    echo $this->Form->control('reserva');
                    echo $this->Form->control('asistencia');
                    echo $this->Form->control('id_sala');
                    echo $this->Form->control('id_actividad');
                    echo $this->Form->control('id_socio');
                    echo $this->Form->control('id_monitor');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
