<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Serviciosadicionale $serviciosadicionale
 */
?>
<div class="column-responsive column-80">
    <div class="serviciosadicionales view content">
        <table>
            <tr>
                <th><?= __('Nombre') ?></th>
                <td><?= h($serviciosadicionale->nombre) ?></td>
            </tr>
            <tr>
                <th><?= __('Id Servicio') ?></th>
                <td><?= $this->Number->format($serviciosadicionale->id_servicio) ?></td>
            </tr>
            <tr>
                <th><?= __('Id Centro') ?></th>
                <td><?= h($lista_centros[$serviciosadicionale->id_centro]) ?></td>
            </tr>
            <tr>
                <th><?= __('Precio') ?></th>
                <td><?= h($serviciosadicionale->precio). "€" ?></td>
            </tr>
        </table>
        <br/><?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button float-right']) ?><br/><br/>
    </div>
</div>
