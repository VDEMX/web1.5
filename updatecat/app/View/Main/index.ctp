<div id="container" class="login">
    <div id="container-form-login">
        <div class="container-logo">
            <img src="/img/default/logo.png" />
        </div>
        
        <?php echo $this->Form->create('User', array('action' => '/login')); ?>
        <div id="form-login">
        <?php
            echo $this->Form->input('User.username', array('label' => 'Usuario'));
            echo $this->Form->input('User.password', array('label' => 'Contraseña'));
            echo $this->Form->end(__('Autenticar'));
        ?>
        </div>
    </div>
</div>