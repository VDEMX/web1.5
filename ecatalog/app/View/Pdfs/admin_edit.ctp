<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <fieldset class="form-custom">
        <legend><?php echo __('Editando pdf'); ?></legend>
    <?php
        echo $this->Form->create('Pdf', array('type' => 'file'));
        echo $this->Form->input('Pdf.name', array('label' => __('Nombre')));
        echo $this->Form->input('Pdf.description', array('label' => __('Descripción')));
        echo $this->Form->input('Pdf.product_id', array('type' => 'select', 'label' => __('Producto'), 'options' => $products));
    ?>
        <div class="content-file-pdf">
            <a href="<?php echo '/files/pdfs/'.$file; ?>" target="_blank"><?php echo __('Descargar'); ?></a>
        </div>
    <?php           
        echo $this->Form->input('Pdf.file', array('type' => 'file', 'label' => __('Archivo')));
        echo $this->Form->input('Pdf.id', array('type' => 'hidden'));
        echo $this->Form->end(__('Guardar'));
    ?>

    <p><?php echo $this->Html->link(__("Regresar al listado de pdfs"), array('action' => 'index')); ?></p>
    </fieldset>
</div>