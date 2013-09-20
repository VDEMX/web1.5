<script type="text/javascript">
    function change_order(id,move) {		
        $.ajax({
            type: "POST",
            url: "/Sectors/change_order",
            data: { id: id, move: move},
            success: function(msg){
                window.location.reload();
            }
        });
    }
    $(document).ready(function(){
        $(".up").click(function(){
            change_order($(this).attr('id'), 'up');
        })
    });
    
    $(document).ready(function(){
        $(".down").click(function(){
            change_order($(this).attr('id'),'down');
        })
    });
</script>
<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <h3 class="title"><?php echo __('Listado de sectores'); ?></h3>
    <p><?php echo $this->Html->link(__("Nuevo sector"), array('action' => 'add')); ?></p>
    <table class="list">
        <thead>
            <tr>
                <th><?php echo __('Nombre'); ?></th>
                <th><?php echo __('Acciones'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sectors as $item): ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link($item['Sector']['name'], array('action' => 'view', $item['Sector']['id'])); ?>
                    </td>
                    <td class="actions">
                        <?php
                        echo $this->Html->link(__('Subir'), 'javascript:void(0)', array('id' => $item['Sector']['id'], 'class' => 'up'));
                        echo $this->Html->link(__('Bajar'), 'javascript:void(0)', array('id' => $item['Sector']['id'], 'class' => 'down'));
                        echo $this->Form->postLink(
                                __('Eliminar'), array('action' => 'delete', $item['Sector']['id']), array('confirm' => __('Estas seguro?')));
                        ?>
                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $item['Sector']['id'])); ?>
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