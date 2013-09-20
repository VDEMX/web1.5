<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <fieldset class="form-custom">
        <legend><?php echo __('Editando marca'); ?></legend>
    <?php
        echo $this->Form->create('Mark', array('type' => 'file'));
        echo $this->Form->input('Mark.name', array('label' => __('Nombre')));
//        echo $this->Form->input('Mark.application_id', array('type' => 'select', 'label' => __('Aplicación'), 'options' => $applications));
    ?>
        <div class="content-image-mark">
            <img src="<?php echo '/img/marks/'.$image; ?>" />
        </div>
    <?php           
        echo $this->Form->input('Mark.image', array('type' => 'file', 'label' => __('Imagen')));
        echo $this->Form->input('Mark.id', array('type' => 'hidden'));
        echo $this->Form->end(__('Guardar'));
    ?>

    <p><?php echo $this->Html->link(__("Regresar al listado de marcas"), array('action' => 'index')); ?></p>
    </fieldset>
</div>