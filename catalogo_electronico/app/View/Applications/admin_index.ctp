<script type="text/javascript">
    function change_order(id,move) {		
        $.ajax({
            type: "POST",
            url: "/Applications/change_order",
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
    <h3 class="title"><?php echo __('Listado de aplicaciones'); ?></h3>
    <p><?php echo $this->Html->link(__("Nueva aplicación"), array('action' => 'add')); ?></p>
    <table class="list">
        <thead>
            <tr>
                <th><?php echo __('Nombre'); ?></th>
                <th><?php echo __('Acciones'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($applications as $item): ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link($item['Application']['name'], array('action' => 'view', $item['Application']['id'])); ?>
                    </td>
                    <td class="actions">
                        <?php
                        echo $this->Html->link(__('Subir'), 'javascript:void(0)', array('id' => $item['Application']['id'], 'class' => 'up'));
                        echo $this->Html->link(__('Bajar'), 'javascript:void(0)', array('id' => $item['Application']['id'], 'class' => 'down'));
                        echo $this->Form->postLink(
                                __('Eliminar'), array('action' => 'delete', $item['Application']['id']), array('confirm' => __('Estas seguro?')));
                        ?>
                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $item['Application']['id'])); ?>
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
