<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <fieldset class="form-custom">
        <legend><?php echo __('Editando sector'); ?></legend>
    <?php
        echo $this->Form->create('Sector', array('type' => 'file'));
        echo $this->Form->input('Sector.name', array('label' => __('Nombre')));
    ?>
        <div class="content-image-sector">
            <img src="<?php echo '/img/sectors/'.$image; ?>" />
        </div>
    <?php           
        echo $this->Form->input('Sector.image', array('type' => 'file', 'label' => __('Imagen')));
        echo $this->Form->input('Sector.id', array('type' => 'hidden'));
        echo $this->Form->end(__('Guardar'));
    ?>

    <p><?php echo $this->Html->link(__("Regresar al listado de sectores"), array('action' => 'index')); ?></p>
    </fieldset>
</div>