<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Socio $socio
 */
?>
<div class="column-responsive column-80">
    <div class="socios view content">
        <table>
            <tr>
                <th><?= __('Nombre') ?></th>
                <td><?= h($socio->nombre) ?></td>
            </tr>
            <tr>
                <th><?= __('Email') ?></th>
                <td><?= h($socio->email) ?></td>
            </tr>
            <tr>
                <th><?= __('Tipo Cuenta') ?></th>
                <td><?= h($socio->tipo_cuenta) ?></td>
            </tr>
            <tr>
                <th><?= __('Cuenta Banco') ?></th>
                <td><?= h($socio->cuenta_banco) ?></td>
            </tr>
            <tr>
                <th><?= __('Usuario') ?></th>
                <td><?= h($socio->usuario) ?></td>
            </tr>
            <tr>
                <th><?= __('Telefono') ?></th>
                <td><?= h($socio->telefono) ?></td>
            </tr>
            <tr>
                <th><?= __('Rol') ?></th>
                <td><?= h('Socio') ?></td>
            </tr>
            <tr>
                <th><?= __('Id Entrenador') ?></th>
                <td><?= $this->Number->format($socio->id_entrenador) ?></td>
            </tr>
            <tr>
                <th><?= __('Suspendido') ?></th>
                <td><?= $socio->suspendido ? __('Yes') : __('No'); ?></td>
            </tr>
        </table>
        <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button float-right', 'style' => 'margin-top: 15px;']) ?>  

        <br/><br/>
    </div>
</div>
