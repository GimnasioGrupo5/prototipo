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
            <?= $this->Html->link(__('Edit Sociosserviciosadicionale'), ['action' => 'edit', $sociosserviciosadicionale->id_registro], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sociosserviciosadicionale'), ['action' => 'delete', $sociosserviciosadicionale->id_registro], ['confirm' => __('Are you sure you want to delete # {0}?', $sociosserviciosadicionale->id_registro), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sociosserviciosadicionales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sociosserviciosadicionale'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sociosserviciosadicionales view content">
            <h3><?= h($sociosserviciosadicionale->id_registro) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id Registro') ?></th>
                    <td><?= $this->Number->format($sociosserviciosadicionale->id_registro) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Socio') ?></th>
                    <td><?= $this->Number->format($sociosserviciosadicionale->id_socio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Servicio') ?></th>
                    <td><?= $this->Number->format($sociosserviciosadicionale->id_servicio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($sociosserviciosadicionale->fecha) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
