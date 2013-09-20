<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <h3 class="title"><?php echo __('Detalle del sector'); ?></h3>

    <p><span><?php echo __('Nombre'); ?>:</span> <?php echo $sector['Sector']['name']; ?></p>
    
    <div class="content-image-sector">
        <img src="<?php echo '/img/sectors/'.$sector['Sector']['image']; ?>"  />
    </div>

    <p><?php echo $this->Html->link(__("Regresar al listado de sectores"), array('action' => 'index')); ?></p>
</div>