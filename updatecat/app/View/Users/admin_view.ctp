<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <h3 class="title"><?php echo __('Detalle del usuario'); ?></h3>

    <p><span><?php echo __('Nombre'); ?>:</span> <?php echo $user['User']['name']; ?></p>
    <p><span><?php echo __('Usuario'); ?>:</span> <?php echo $user['User']['username']; ?></p>
    
    <p><?php echo $this->Html->link(__("Regresar al listado de usuarios"), array('action' => 'index')); ?></p>
</div>