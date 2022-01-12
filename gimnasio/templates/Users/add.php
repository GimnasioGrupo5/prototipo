<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="column-responsive column-80">
    <div class="users form content">
        <?= $this->Form->create($user) ?>
        <fieldset>
            <legend><?= __('Añadir usuario') ?></legend>
            <?php
                echo $this->Form->control('usuario', ['value' => 'Auto']);
                echo $this->Form->control('password', ['label'=>'Contraseña']);
                echo $this->Form->label('Rol');
                echo $this->Form->input('id_rol', [
                    'options' => $lista_roles,
                    'type' => 'select',   
                    'required' => 'true',                 
                ]);
                echo $this->Form->label('Centro');
                echo $this->Form->input('id_centro', [
                    'options' => $lista_centros,
                    'type' => 'select',   
                    'required' => 'true',                 
                ]);                  
            ?>
        </fieldset>
        <?= $this->Form->button(__('Enviar'), ['class' => 'button']) ?>
        <?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'gestionUsuarios'], ['class' => 'button float-right']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
