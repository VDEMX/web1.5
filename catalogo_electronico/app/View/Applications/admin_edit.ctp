<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <fieldset class="form-custom">
        <legend><?php echo __('Editando aplicación'); ?></legend>
        <?php
        echo $this->Form->create('Application', array('type' => 'file'));
        echo $this->Form->input('Application.name', array('label' => __('Nombre')));
        ?>
        <div class="content-image-application">
            <img src="<?php echo '/img/applications/' . $image; ?>" />
        </div>
        <?php
        echo $this->Form->input('Application.image', array('type' => 'file', 'label' => __('Imagen')));

        echo __(' <h3 class="subtitle-admin">  Sectores </h3>');
        
        echo $this->Form->input('Application.Sector', array('type' => 'select', 'multiple' => 'checkbox', 'label' => false));
        echo $this->Form->input('Application.id', array('type' => 'hidden'));
        echo $this->Form->end(__('Guardar'));
        ?>

        <p><?php echo $this->Html->link(__("Regresar al listado de aplicaciones"), array('action' => 'index')); ?></p>
    </fieldset>
</div>