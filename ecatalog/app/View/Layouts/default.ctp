<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css(array(
//            'cake.generic', 
            '/js/jquery-ui-1.8.23/themes/base/jquery.ui.all',
            'style',
        ));

        echo $this->Html->script(array(
            'jquery-1.7.1.min',
            'jquery-ui-1.8.23/ui/minified/jquery-ui.min',
            'jquery-ui-1.8.23/ui/minified/jquery.ui.core.min',
            'jquery-ui-1.8.23/ui/minified/jquery.ui.widget.min',
            'jquery-ui-1.8.23/ui/minified/jquery.ui.position.min',
            'jquery-ui-1.8.23/ui/minified/jquery.ui.autocomplete.min',
        ));

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>

        <script type="text/javascript">
            $(document).ready(function(){
                window.addEventListener("load",function() {
                    // Set a timeout...
                    setTimeout(function(){
                        // Hide the falsh messages!
                        $('#flashMessage').slideUp('Slow');
                    }, 10000);
                });
            });
        </script> 

    </head>
    <body>
        <div id="container">
            <div id="header">
                <?php if (AuthComponent::user()): ?>
                    <a href="/admin"><img class="icon-home" src="/img/default/icon-home.png" /></a>
                <?php endif; ?>
                <div class="info">
                    <?php if (AuthComponent::user()): ?>
                        Bienvenido <span><?php echo AuthComponent::user('name'); ?></span> | <a href="/users/logout">Cerrar sessi&oacute;n</a>
                    <?php endif; ?>
                </div>
            </div>
            <div id="content">
                <?php echo $this->Session->flash(); ?>

                <?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer">

            </div>
        </div>
    </body>
</html>
