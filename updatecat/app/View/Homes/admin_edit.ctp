<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <fieldset class="form-custom">
        <legend><?php echo __('Editando texto e imagen de inicio'); ?></legend>
    <?php
        echo $this->Form->create('Home', array('type' => 'file'));
        echo $this->Form->input('Home.title', array('label' => __('Título')));
    ?>
        <div class="content-image-homes">
            <img src="<?php echo '/img/homes/'.$image; ?>" />
        </div>
    <?php           
        echo $this->Form->input('Home.image', array('type' => 'file', 'label' => __('Imagen')));
         echo $this->Form->input('Home.text', array('label' => __('Texto')));
        echo $this->Form->input('Home.id', array('type' => 'hidden'));
        echo $this->Form->end(__('Guardar'));
    ?>

    <p><?php echo $this->Html->link(__("Regresar al listado de inicio"), array('action' => 'index')); ?></p>
    </fieldset>
</div>
