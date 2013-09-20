<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <h3 class="title"><?php echo __('Detalle de la marca'); ?></h3>

    <p><span><?php echo __('Nombre'); ?>:</span> <?php echo $mark['Mark']['name']; ?></p>
<!--    <p><span><?php echo __('Aplicación'); ?>:</span> <?php echo $mark['Application']['name']; ?></p>-->
    
    <div class="content-image-marks">
        <img src="<?php echo '/img/marks/'.$mark['Mark']['image']; ?>"  />
    </div>

    <p><?php echo $this->Html->link(__("Regresar al listado de marcas"), array('action' => 'index')); ?></p>
</div>