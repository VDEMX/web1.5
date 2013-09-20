<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <h3 class="title"><?php echo __('Detalle del producto'); ?></h3>

    <p><span><?php echo __('Nombre'); ?>:</span> <?php echo $product['Product']['name']; ?></p>
    <p><span><?php echo __('Marca'); ?>:</span> <?php echo $product['Mark']['name']; ?></p>
    <h3><?php echo __('Aplicaciones'); ?>:</h3> 
    <?php foreach ($product['Application'] as $item): ?>
        <p><?php echo $item['name']; ?></p>
        <div class="content-image-application">
            <img src="<?php echo '/img/applications/' . $item['image']; ?>"  />
        </div>
        <br/>
    <?php endforeach; ?>
    
    <p><span>Keywords:</span></p>
    <ul class="list-keywords">
        <?php foreach($product['Keyword'] as $item): ?>
            <li><?php echo $item['name']; ?></li>
        <?php endforeach; ?>
    </ul>
    
    <p><span>Pdfs:</span></p>
    <ul class="list-keywords">
        <?php foreach($product['Pdf'] as $item): ?>
            <li><a href="<?php echo '/files/pdfs/'.$item['file']; ?>" target="_blank"><?php echo $item['name']; ?></a></li>
        <?php endforeach; ?>
    </ul>
    
    <p><span>Im&aacute;genes:</span></p>
    <?php foreach($product['Image'] as $item): ?>
        <div class="content-image-images">
            <img src="<?php echo '/img/images/'.$item['image']; ?>" />
        </div>
    <?php endforeach; ?>
    
    <div class="clear"></div>
    <p><?php echo $this->Html->link(__("Regresar al listado de productos"), array('action' => 'index')); ?></p>
</div>