<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <fieldset class="form-custom">
        <legend><?php echo __('Nuevo usuario'); ?></legend>
    <?php
        echo $this->Form->create('User', array('type' => 'file'));        
        echo $this->Form->input('User.name', array('label' => __('Nombre')));
        echo $this->Form->input('User.username', array('label' => __('Usuario')));
        echo $this->Form->input('User.password', array('label' => __('Contraseña'), 'type' => 'password'));
        echo $this->Form->end(__('Guardar'));
    ?>

    <p><?php echo $this->Html->link(__("Regresar al listado de usuarios"), array('action' => 'index')); ?></p>
    </fieldset>
</div>