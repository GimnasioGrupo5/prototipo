<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Directore $directore
 */
?>
<div class="column-responsive column-80">
    <div class="directores form content">
        <?= $this->Form->create($directore) ?>
        <fieldset>
            <?php
                echo $this->Form->control('nombre');
                echo $this->Form->control('salario');
                echo $this->Form->control('telefono');
                echo $this->Form->control('fecha_nacimiento', ['empty' => true]);
                echo "Usuario: ". $directore->usuario. "<br/>";
                echo "Rol: ". $lista_roles[$directore->id_rol];
            ?>
        </fieldset>
        <?= $this->Form->button(__('Enviar')) ?>
        <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button float-right']) ?> 
        <?= $this->Form->end() ?>
    </div>
</div>
