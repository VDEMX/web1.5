<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <fieldset class="form-custom">
        <legend><?php echo __('Nuevo texto e imagen de Inicio'); ?></legend>
    <?php
        echo $this->Form->create('Home', array('type' => 'file'));        
        echo $this->Form->input('Home.title', array('label' => __('Título')));
        echo $this->Form->input('Home.image', array('type' => 'file', 'label' => __('Imagen')));
        echo $this->Form->input('Home.text', array('label' => __('Texto')));
        echo $this->Form->end(__('Guardar'));
    ?>

    <p><?php echo $this->Html->link(__("Regresar al listado de inicio"), array('action' => 'index')); ?></p>
    </fieldset>
</div>


