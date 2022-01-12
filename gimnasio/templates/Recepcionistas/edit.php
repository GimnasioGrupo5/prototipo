<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recepcionista $recepcionista
 */
$id_usuario = explode("-", $recepcionista->usuario);
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Usuario'), ['controller' => 'users', 'action' => 'edit', $id_usuario[1]], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
<div class="column-responsive column-80">
    <div class="recepcionistas form content">
        <?= $this->Form->create($recepcionista) ?>
        <fieldset>
            <?php
                echo $this->Form->control('nombre');
                echo $this->Form->control('salario');
                echo $this->Form->control('telefono');
                echo $this->Form->control('fecha_nacimiento', ['empty' => true]);
                echo "Usuario: ". $recepcionista->usuario. "<br/>";
                echo "Rol: ". $lista_roles[$recepcionista->id_rol];
                echo $this->Form->control('usuario', ['label' => '', 'style'=>"visibility:hidden; height: 1px;;"]);
                echo $this->Form->control('id_rol', ['label' => '', 'style'=>"visibility:hidden; height: 1px;;"]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Enviar')) ?>
        <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button float-right']) ?>  
        <?= $this->Form->end() ?>
    </div>
</div>
