<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sociosserviciosadicionale $sociosserviciosadicionale
 */

?>
<div class="column-responsive column-80">
    <div class="sociosserviciosadicionales form content">
        <?= $this->Form->create($sociosserviciosadicionale) ?>   
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('precio') ?></th>
                </tr>
            </thead>
            <tbody>           
                <tr>
                    <td><?= h($servicio['nombre']) ?></td>
                    <td><?= h($servicio['precio']). " €/mes" ?></td>
                </tr>
            </tbody>
        </table>         
            <fieldset>
                <div style="visibility: hidden; position: absolute">                    
                    <?php
                        echo $this->Form->control('id_socio', ['value' => $id_socio]);
                        echo $this->Form->control('id_servicio', ['value' => $servicio['id_servicio']]);
                        echo $this->Form->control('fecha', ['value'=>date("dd-mm-YYYY")]);
                    ?>
                    </div>
            </fieldset>        
        <?= $this->Form->button(__('Confirmar')) ?>
        <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button float-right']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
