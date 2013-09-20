<script type="text/javascript">
    function change_order(pdfid,product ,move) {		
        $.ajax({
            type: "POST",
            url: "/Pdfs/change_order",
            data: { pdf_id: pdfid, product: product, move: move},
            success: function(msg){
//                console.info(msg);
                window.location.reload();
            }
        });
    }
    $(document).ready(function(){
        $(".up").click(function(){
            change_order($(this).attr('id'),$(this).attr('name'), 'up');
        })
    });
    
    $(document).ready(function(){
        $(".down").click(function(){
            change_order($(this).attr('id'),$(this).attr('name'), 'down');
        })
    });


</script>

<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <h3 class="title"><?php echo __('Listado de pdfs'); ?></h3>
    <p><?php echo $this->Html->link(__("Nuevo pdf"), array('action' => 'add')); ?></p>
    <table class="list">
        <thead>
            <tr>
                <th><?php echo __('Archivo'); ?></th>
                <th><?php echo __('Producto'); ?></th>
                <th><?php echo __('Acciones'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pdfs as $item): ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link($item['Pdf']['name'], array('action' => 'view', $item['Pdf']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $item['Product']['name']?>
                    </td>
                    <td class="actions">
                        <?php
                        echo $this->Html->link(__('Subir'), 'javascript:void(0)', array('id' => $item['Pdf']['id'], 'class' => 'up', 'name' => $item['Product']['id']));
                        echo $this->Html->link(__('Bajar'), 'javascript:void(0)', array('id' => $item['Pdf']['id'], 'class' => 'down', 'name' => $item['Product']['id']));
                        echo $this->Form->postLink(
                                __('Eliminar'), array('action' => 'delete', $item['Pdf']['id']), array('confirm' => __('Estas seguro?')));
                        ?>
                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $item['Pdf']['id'])); ?>
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
