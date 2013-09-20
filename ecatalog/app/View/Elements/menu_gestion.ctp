<div class="menu-gestion">                        
    <h3>Gestionar</h3>
    <ul>
        <li>
            <?php 
                echo $this->Html->link(__("Aplicaciones"), array(
                    'controller'    => 'Applications',
                    'action'        => 'index'
                )); 
             ?>
        </li>
         <li>
            <?php 
                echo $this->Html->link(__("Inicio"), array(
                    'controller'    => 'Homes',
                    'action'        => 'index'
                )); 
             ?>
        </li>
        <li>
            <?php 
                echo $this->Html->link(__("Keywords"), array(
                    'controller'    => 'Keywords',
                    'action'        => 'index'
                )); 
             ?>
        </li>
        <li>
            <?php 
                echo $this->Html->link(__("Marcas"), array(
                    'controller'    => 'Marks',
                    'action'        => 'index'
                )); 
             ?>
        </li>
        <li>
            <?php 
                echo $this->Html->link(__("Pdfs"), array(
                    'controller'    => 'Pdfs',
                    'action'        => 'index'
                )); 
             ?>
        </li>
        <li>
            <?php 
                echo $this->Html->link(__("Productos"), array(
                    'controller'    => 'Products',
                    'action'        => 'index'
                )); 
             ?>
        </li>
        <li>
            <?php 
                echo $this->Html->link(__("Sectores"), array(
                    'controller'    => 'Sectors',
                    'action'        => 'index'
                )); 
             ?>
        </li>
       
        <li>
            <?php 
                echo $this->Html->link(__("Usuarios"), array(
                    'controller'    => 'Users',
                    'action'        => 'index'
                )); 
             ?>
        </li>
         <li>
            <?php 
                echo $this->Html->link(__("Versiones"), array(
                    'controller'    => 'Versions',
                    'action'        => 'index'
                )); 
             ?>
        </li>
    </ul>     
</div> 