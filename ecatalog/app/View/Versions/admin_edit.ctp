<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <fieldset class="form-custom">
        <legend><?php echo __('Editando versión'); ?></legend>
        <?php
        echo $this->Form->create('Version', array('type' => 'file'));
        ?>
        <p><span><?php echo __('Versión'); ?>:</span> <?php echo $version['Version']['id']; ?></p>
        <div class="content-file-pdf">

            <a href="<?php echo '/files/versions/' . $file; ?>" target="_blank"><?php echo __('Descargar'); ?></a>
        </div>
        <?php
        echo $this->Form->input('Version.file', array('type' => 'file', 'label' => __('Archivo')));
        echo $this->Form->input('Version.id', array('type' => 'hidden'));
        echo $this->Form->end(__('Guardar'));
        ?>

        <p><?php echo $this->Html->link(__("Regresar al listado de versiones"), array('action' => 'index')); ?></p>
    </fieldset>
</div>


