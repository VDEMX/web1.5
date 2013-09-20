<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <h3 class="title"><?php echo __('Listado de keywords'); ?></h3>
    <p><?php echo $this->Html->link(__("Nueva keyword"), array('action' => 'add')); ?></p>
    <table class="list">
        <thead>
            <tr>
                <th><?php echo __('Nombre'); ?></th>
                <th><?php echo __('Acciones'); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($keywords as $item): ?>
        <tr>
            <td>
                <?php echo $this->Html->link($item['Keyword']['name'], array('action' => 'view', $item['Keyword']['id']));?>
            </td>
            <td class="actions">
                <?php echo $this->Form->postLink(
                    __('Eliminar'),
                    array('action' => 'delete', $item['Keyword']['id']),
                    array('confirm' => __('Estas seguro?')));
                ?>
                <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $item['Keyword']['id']));?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2"></th>
            </tr>
        </tfoot>    
    </table>
</div>