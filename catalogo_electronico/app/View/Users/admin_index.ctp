<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <h3 class="title"><?php echo __('Listado de usuarios'); ?></h3>
    <p><?php echo $this->Html->link(__("Nuevo usuario"), array('action' => 'add')); ?></p>
    <table class="list">
        <thead>
            <tr>
                <th><?php echo __('Nombre'); ?></th>
                <th><?php echo __('Usuario'); ?></th>
                <th><?php echo __('Acciones'); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $item): ?>
        <tr>
            <td>
                <?php echo $this->Html->link($item['User']['name'], array('action' => 'view', $item['User']['id']));?>
            </td>
            <td>
                <?php echo $item['User']['username'];?>
            </td>
            <td class="actions">
                <?php echo $this->Form->postLink(
                    __('Eliminar'),
                    array('action' => 'delete', $item['User']['id']),
                    array('confirm' => __('Estas seguro?')));
                ?>
                <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $item['User']['id']));?>
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