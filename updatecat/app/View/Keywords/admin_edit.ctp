<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <fieldset class="form-custom">
        <legend><?php echo __('Editando keyword'); ?></legend>
    <?php
        echo $this->Form->create('Keyword', array('type' => 'file'));
        echo $this->Form->input('Keyword.name', array('label' => __('Nombre')));    
        echo $this->Form->input('Keyword.id', array('type' => 'hidden'));
        echo $this->Form->end(__('Guardar'));
    ?>

    <p><?php echo $this->Html->link(__("Regresar al listado de keywords"), array('action' => 'index')); ?></p>
    </fieldset>
</div>