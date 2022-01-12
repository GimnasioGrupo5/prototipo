<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Socio $socio
 */

$id_usuario = explode("-", $socio->usuario);
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Usuario'), ['controller' => 'users', 'action' => 'edit', $id_usuario[1]], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="socios form content">
            <?= $this->Form->create($socio) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('telefono');
                    echo $this->Form->control('email');
                    echo $this->Form->control('tipo_cuenta');
                    echo $this->Form->control('id_entrenador',['label'=>'', 'value' => '0', 'style'=>"visibility:hidden; height: 0.1em;"]);
                    echo $this->Form->control('suspendido');
                    echo $this->Form->control('cuenta_banco');
                    echo "Usuario: ". $socio->usuario. "<br/>";
                    echo "Rol: ". $lista_roles[$socio->id_rol];
                    echo $this->Form->control('usuario', ['label' => '', 'style'=>"visibility:hidden; height: 0.1px;"]);
                    echo $this->Form->control('id_rol', ['label' => '', 'style'=>"visibility:hidden; height: 0.1px;"]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button float-right']) ?>  
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
