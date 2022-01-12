<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$id_usuario = explode("-", $user->usuario);
?>
<div class="column-responsive column-80">
    <div class="users form content">
        <?= $this->Form->create($user) ?>
        <fieldset>
            <?php
                echo $this->Form->control('usuario', ['disabled' => 'true']);
                echo $this->Form->label('Rol');
                echo $this->Form->input('id_rol', [
                    'options' => $lista_roles,
                    'type' => 'select',   
                    'disabled' => 'disabled', 
                    'selected' => $user['id_rol'],              
                ]);
                echo $this->Form->label('Centro');
                echo $this->Form->input('id_centro', [
                    'options' => $lista_centros,
                    'type' => 'select',   
                    'required' => 'true',      
                    'selected' => $user['id_centro'],             
                ]);                  
                echo $this->Form->control('password');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Enviar')) ?>

        
        <?php     
        switch($user['id_rol'])
                {
                    case 1: echo $this->Html->link(__('Volver'), ['controller' => 'directores', 'action' => 'index'], ['class' => 'button float-right'])
                    ; break;
                    case 2: echo $this->Html->link(__('Volver'), ['controller' => 'monitores', 'action' => 'index'], ['class' => 'button float-right'])
                    ; break;
                    case 3: echo $this->Html->link(__('Volver'), ['controller' => 'entrenadores', 'action' => 'index'],  ['class' => 'button float-right'])
                    ; break;
                    case 4: echo $this->Html->link(__('Volver'), ['controller' => 'recepcionistas', 'action' => 'index'],  ['class' => 'button float-right'])
                    ; break;
                    case 5: echo $this->Html->link(__('Volver'), ['controller' => 'limpiadores', 'action' => 'index'],  ['class' => 'button float-right'])
                    ; break;
                    case 6: echo $this->Html->link(__('Volver'), ['controller' => 'socios', 'action' => 'index'], ['class' => 'button float-right'])
                    ; break;
                }
        ?>
        <?= $this->Form->end() ?>
    </div>
</div>
