<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recepcionista $recepcionista
 */
?>
<div class="column-responsive column-80">
    <div class="recepcionistas form content">
        <?= $this->Form->create($recepcionista) ?>
        <fieldset>
            <legend><?= __('Datos de usuario recepcionista') ?></legend>
            <?php
                echo $this->Form->control('nombre');
                echo $this->Form->control('salario');
                echo $this->Form->control('telefono');
                echo $this->Form->control('fecha_nacimiento', ['empty' => true]);
                echo "Usuario: ". $_GET['usuario']. "<br/>";
                echo "Rol: ". $lista_roles[$_GET['id_rol']];
                echo $this->Form->control('usuario', ['label'=>'', 'value' => $_GET['usuario'], 'style'=>"visibility:hidden"]);
                echo $this->Form->control('id_rol', ['label'=>'', 'value' => $_GET['id_rol'], 'style'=>"visibility:hidden"]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Enviar')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
