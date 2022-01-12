<div class="users form content">
<?php echo $this->Html->image('logo_final.png', array('alt' => 'Imagen', 'border' => '1', 'height' => '90', 'width' => '130', 'style' => 'float:right; margin-left: 80%; position: absolute;')); ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Introduce tu usuario y contraseña') ?></legend>
        <?= $this->Form->control('usuario') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Login'), ['class' => 'button']); ?>
    <?= $this->Form->end() ?>
    <br/>
</div>