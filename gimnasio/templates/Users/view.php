<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id_usuario], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id_usuario], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id_usuario), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->id_usuario) ?></h3>
            <table>
                <tr>
                    <th><?= __('Usuario') ?></th>
                    <td><?= h($user->usuario) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Usuario') ?></th>
                    <td><?= $this->Number->format($user->id_usuario) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Rol') ?></th>
                    <td><?= $this->Number->format($user->id_rol) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Centro') ?></th>
                    <td><?= $this->Number->format($user->id_centro) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
