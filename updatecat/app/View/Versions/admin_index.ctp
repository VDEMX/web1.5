<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <h3 class="title"><?php echo __('Listado de Versiones'); ?></h3>
    <p><?php echo $this->Html->link(__("Nueva versión"), array('action' => 'add')); ?></p>
    <table class="list">
        <thead>
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('String'); ?></th>
                <th><?php echo __('Acciones'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($versions as $item): ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link($item['Version']['id'], array('action' => 'view', $item['Version']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $item['Version']['file'] ?>
                    </td>
                    <td class="actions">
                        <?php
                        echo $this->Form->postLink(
                                __('Eliminar'), array('action' => 'delete', $item['Version']['id']), array('confirm' => __('Estas seguro?')));
                        ?>
                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $item['Version']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3"></th>
            </tr>
        </tfoot>    
    </table>
</div>

