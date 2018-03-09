<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!DOCTYPE html>
<html>
    <head>
        <!--<meta charset="UTF-8">-->
        <?php echo $this->Html->charset(); ?>
        <meta name = "viewport" cintent = "width = device-width, initial-scale = 1, shrink-to-fit = no">
        <title><?php // echo $cakeDescription;?>:
                        <?php echo $this->fetch('title');?></title>
                <?php echo $this->Html->meta('icon');?>

        <!-- Font Awesome -->
                <?php echo $this->Html->css('/node_modules/font-awesome/css/font-awesome.min.css');?>
        <!-- Bootstrap core CSS -->
                <?php echo $this->Html->css('/node_modules/mdbootstrap/css/bootstrap.min.css'); ?>
        <!-- Material Design Bootstrap -->
                <?php echo $this->Html->css('/node_modules/mdbootstrap/css/mdb.min.css'); ?>
        <!-- Your custom styles (optional) -->
                <?php echo $this->Html->css('/node_modules/mdbootstrap/css/style.css'); ?>
        <!-- Toastr Modern Notification for MDB -->
                <?php echo $this->Html->css('/node_modules/toastr/build/toastr.min.css'); ?>
        <!-- JQuery -->
                <?php echo $this->Html->script('/node_modules/mdbootstrap/js/jquery-3.2.1.min.js'); ?>
        <!-- Bootstrap core JavaScript -->
                <?php echo $this->Html->script('/node_modules/mdbootstrap/js/bootstrap.min.js'); ?>
                <?php echo $this->fetch('meta'); ?>
                <?php echo $this->fetch('css'); ?>
                <?php echo $this->fetch('script'); ?>
    </head>
    <body>
        <main>
            <?php 
            echo $this->Flash->render();
            echo $this->fetch('content');
            ?>


            <?php echo $this->Html->script('/node_modules/mdbootstrap/js/tether.min.js'); ?>

            <?php echo $this->Html->script('/node_modules/mdbootstrap/js/mdb.min.js'); ?>

            <?php echo $this->Html->script('/node_modules/toastr/build/toastr.min.js'); ?>

            <?php echo $this->Html->script('/node_modules/infinite-scroll/dist/infinite-scroll.pkgd.min.js');?>

        </main>
    </body>
</html>
