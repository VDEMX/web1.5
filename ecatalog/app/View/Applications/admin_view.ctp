<div class="content-main-left">
    <?php
    echo $this->element('menu_gestion');
//    debug($application);
    ?>
</div>
<div class="content-main-right">
    <h3 class="title"><?php echo __('Detalle de la aplicación'); ?></h3>



    <div class="content-image-application">
        <img src="<?php echo '/img/applications/' . $application['Application']['image']; ?>"  />
    </div>
    <p><span><?php echo __('Nombre'); ?>:</span> <?php echo $application['Application']['name']; ?></p>
    <p>
    <h3><?php echo __('Sectores'); ?>:</h3> 

    <?php foreach ($application['Sector'] as $item): ?>
        <p><?php echo $item['name']; ?></p>
        <div class="content-image-application">
            <img src="<?php echo '/img/sectors/' . $item['image']; ?>"  />
        </div>
        <br/>
    <?php endforeach; ?>

</p>


<p><?php echo $this->Html->link(__("Regresar al listado de aplicaciones"), array('action' => 'index')); ?></p>
</div>