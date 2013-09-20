<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <h3 class="title"><?php echo __('Detalle de la versión'); ?></h3>

    <p><span><?php echo __('Versión'); ?>:</span> <?php echo $version['Version']['id']; ?></p>
    <p><span><?php echo __('Archivo'); ?>:</span> <?php echo $version['Version']['file']; ?></p>
    
    <div class="content-file-pdf">
        <a href="<?php echo '/files/versions/'.$version['Version']['file']; ?>" target="_blank"><?php echo __('Descargar'); ?></a>
    </div>

    <p><?php echo $this->Html->link(__("Regresar al listado de versiones"), array('action' => 'index')); ?></p>
</div>