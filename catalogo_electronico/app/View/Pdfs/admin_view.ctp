<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <h3 class="title"><?php echo __('Detalle del pdf'); ?></h3>

    <p><span><?php echo __('Archivo'); ?>:</span> <?php echo $pdf['Pdf']['name']; ?></p>
    <p><span><?php echo __('Descripción'); ?>:</span> <?php echo $pdf['Pdf']['description']; ?></p>
    <p><span><?php echo __('Producto'); ?>:</span> <?php echo $pdf['Product']['name']; ?></p>
    
    
    <div class="content-file-pdf">
        <a href="<?php echo '/files/pdfs/'.$pdf['Pdf']['file']; ?>" target="_blank"><?php echo __('Descargar'); ?></a>
    </div>

    <p><?php echo $this->Html->link(__("Regresar al listado de pdfs"), array('action' => 'index')); ?></p>
</div>