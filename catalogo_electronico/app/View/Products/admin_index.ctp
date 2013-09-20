<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <h3 class="title"><?php echo __('Listado de productos'); ?></h3>
    <p><?php echo $this->Html->link(__("Nuevo producto"), array('action' => 'add')); ?></p>
    <table class="list">
        <thead>
            <tr>
                <th><?php echo __('Nombre'); ?></th>
                <th><?php echo __('Marca'); ?></th>
                <th><?php echo __('Acciones'); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $item): ?>
        <tr>
            <td>
                <?php echo $this->Html->link($item['Product']['name'], array('action' => 'view', $item['Product']['id']));?>
            </td>
            <td>
                <?php echo $item['Mark']['name']; ?>
            </td>
            <td class="actions">
                <?php echo $this->Form->postLink(
                    __('Eliminar'),
                    array('action' => 'delete', $item['Product']['id']),
                    array('confirm' => __('Estas seguro?')));
                ?>
                <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $item['Product']['id']));?>
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