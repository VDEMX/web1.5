<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <h3 class="title"><?php echo __('Detalle de la keyword'); ?></h3>

    <p><span><?php echo __('Nombre'); ?>:</span> <?php echo $keyword['Keyword']['name']; ?></p>
    
    <p><?php echo $this->Html->link(__("Regresar al listado de keywords"), array('action' => 'index')); ?></p>
</div>