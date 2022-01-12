<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Entrenadore $entrenadore
 */

$id_usuario = explode("-", $entrenadore->usuario);
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Usuario'), ['controller' => 'users', 'action' => 'edit', $id_usuario[1]], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="entrenadores form content">
            <?= $this->Form->create($entrenadore) ?>
            <fieldset>
                <legend><?= __('Edit Entrenadore') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('salario');
                    echo $this->Form->control('telefono');
                    echo $this->Form->control('fecha_nacimiento', ['empty' => true]);
                    echo $this->Form->control('horas_libres');
                    echo $this->Form->control('horas_reservadas');
                    echo "Usuario: ". $entrenadore->usuario. "<br/>";
                    echo "Rol: ". $lista_roles[$entrenadore->id_rol];
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
