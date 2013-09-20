<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <h3 class="title"><?php echo __('Listado de Inicio'); ?></h3>
    <p><?php echo $this->Html->link(__("Nuevo texto e imagen de Inicio"), array('action' => 'add')); ?></p>
    <table class="list">
        <thead>
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Título'); ?></th>
                <th><?php echo __('Acciones'); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($homes as $item): ?>
        <tr>
            <td>
                <?php echo $this->Html->link($item['Home']['id'], array('action' => 'view', $item['Home']['id']));?>
            </td>
            <td>
                <?php echo $item['Home']['title']; ?>
            </td>
            <td class="actions">
                <?php echo $this->Form->postLink(
                    __('Eliminar'),
                    array('action' => 'delete', $item['Home']['id']),
                    array('confirm' => __('Estas seguro?')));
                ?>
                <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $item['Home']['id']));?>
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


