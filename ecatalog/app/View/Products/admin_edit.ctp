<script type="text/javascript">
    $(document).ready(function(){ 
        function split( val ) {
            return val.split( /,\s*/ );
        }
        function extractLast( term ) {
            return split( term ).pop();
        }
        $( ".autoc" )
        // don't navigate away from the field on tab when selecting an item
        .bind( "keydown", function( event ) {
            if ( event.keyCode === $.ui.keyCode.TAB &&
                $( this ).data( "autocomplete" ).menu.active ) {
                event.preventDefault();
            }
        })
        .autocomplete({
            source: function( request, response ) {
                $.getJSON( "/Keywords/get_keywords", {
                    term: extractLast( request.term )
                }, response );
            },
            search: function() {
                // custom minLength
                var term = extractLast( this.value );
                if ( term.length < 1 ) {
                    return false;
                }
            },
            focus: function() {
                // prevent value inserted on focus
                return false;
            },
            select: function( event, ui ) {
                var terms = split( this.value );
                // remove the current input
                terms.pop();
                // add the selected item
                terms.push( ui.item.value);
                // add placeholder to get the comma-and-space at the end
                terms.push( "" );
                this.value = terms.join( ", " );
                return false;
            }
            
        });
        
        $('.delete_keyword, .delete_image').live('click', function(){
            $(this).parent().fadeOut('slow', function(){
                $(this).remove();
            });
        });
        
        var next_image = $('.block-image').length;
        $('#add_image').click(function(){
            next_image++;
            var block = '';
            block += '  <div class="block-image">';
            block += '      <a href="javascript:void(0);" class="delete_image">-Eliminar</a>';            
            block += '      <div class="input file">';
            block += '          <label for="Image'+next_image+'Image">Imagen</label>';
            block += '          <input type="file" id="Image'+next_image+'Image" name="data[Image]['+next_image+'][image]">';
            block += '      </div>'; 
            block += '  </div>';
            
            $('.block-general-image').append(block);
        });        
    });
</script>
<div class="content-main-left">
    <?php echo $this->element('menu_gestion'); ?>
</div>
<div class="content-main-right">
    <fieldset class="form-custom">
        <legend><?php echo __('Editando producto'); ?></legend>
        <?php
        echo $this->Form->create('Product', array('type' => 'file'));
        echo $this->Form->input('Product.name', array('label' => __('Nombre')));
        echo $this->Form->input('Product.mark_id', array('type' => 'select', 'label' => __('Marca'), 'options' => $marks));
        echo __('<h3 class="subtitle-admin">Aplicaciones</h3>');
        echo $this->Form->input('Product.Application', array('type' => 'select', 'multiple' => 'checkbox','label' => false));
        echo $this->Form->input('Product.id', array('type' => 'hidden'));
        ?>
        <h3 class="subtitle-admin"><?php echo __('Keywords'); ?></h3>
        <?php
        echo $this->Form->input('Product.Keyword', array('type' => 'text', 'class' => 'autoc', 'value' => $keywords_list));
        ?>
        <?php
//        echo $this->Html->link('+Otra keyword', 'javascript:void(0);', array('id' => 'add_keyword'));
        ?>
        <h3 class="subtitle-admin"><?php echo __('Imágenes'); ?></h3>

        <?php foreach ($images_list as $key => $item): ?>    
            <div class="content-image-images">
                <img src="<?php echo '/img/images/' . $item['image']; ?>" />
                <?php
                echo $this->Form->input('DeleteImage.' . $key . '.value', array('label' => 'Eliminar imagen.', 'type' => 'checkbox', 'value' => $item['id']));
                ?>
            </div>
        <?php endforeach; ?>    

        <div class="block-general-image">
            <div class="block-image">
                <a href="javascript:void(0);" class="delete_image">-Eliminar</a>                
                <?php
                echo $this->Form->input('Image.0.image', array('type' => 'file', 'label' => 'Imagen'));
                ?>        
            </div>    
        </div>    
        <?php
        echo $this->Html->link('+Otra imagen', 'javascript:void(0);', array('id' => 'add_image'));
        echo $this->Form->end(__('Guardar'));
        ?>

        <p><?php echo $this->Html->link(__("Regresar al listado de productos"), array('action' => 'index')); ?></p>
    </fieldset>
</div>