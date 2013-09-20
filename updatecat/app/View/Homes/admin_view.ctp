<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <h3 class="title"><?php echo __('Detalle de la texto e imagen de inicio'); ?></h3>

    <p><span><?php echo __('Título'); ?>:</span> <?php echo $home['Home']['title']; ?></p>

    <div class="content-image-homes">
        <img src="<?php echo '/img/homes/' . $home['Home']['image']; ?>"  />
    </div>

    <p><span><?php echo __('Texto'); ?>:</span> <div><?php $texto = $home['Home']['text'];  echo nl2br($texto) ; ?></div> </p>
    
    <p><?php echo $this->Html->link(__("Regresar al listado de inicio"), array('action' => 'index')); ?></p>
</div>


