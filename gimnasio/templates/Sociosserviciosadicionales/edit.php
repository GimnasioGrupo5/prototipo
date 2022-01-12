<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sociosserviciosadicionale $sociosserviciosadicionale
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sociosserviciosadicionale->id_registro],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sociosserviciosadicionale->id_registro), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Sociosserviciosadicionales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sociosserviciosadicionales form content">
            <?= $this->Form->create($sociosserviciosadicionale) ?>
            <fieldset>
                <legend><?= __('Edit Sociosserviciosadicionale') ?></legend>
                <?php
                    echo $this->Form->control('id_socio');
                    echo $this->Form->control('id_servicio');
                    echo $this->Form->control('fecha');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
