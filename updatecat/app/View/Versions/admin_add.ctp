<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <fieldset class="form-custom">
        <legend><?php echo __('Nueva versión'); ?></legend>
        <?php
        echo $this->Form->create('Version', array('type' => 'file'));
        echo $this->Form->input('Version.file', array('type' => 'file', 'label' => __('Archivo')));
        echo $this->Form->end(__('Guardar'));
        ?>
        <p><?php echo $this->Html->link(__("Regresar al listado de versiones"), array('action' => 'index')); ?></p>
    </fieldset>
</div>

