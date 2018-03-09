<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
    <head>
    <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>


        </title>
    <?= $this->Html->meta('icon') ?>

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
    <?php echo $this->Html->script('/node_modules/mdbootstrap/js/jquery-3.1.1.min.js'); ?>
        <!-- Bootstrap core JavaScript -->
    <?php echo $this->Html->script('/node_modules/mdbootstrap/js/bootstrap.min.js'); ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

        <!--Navbar-->
    <nav class="navbar navbar-toggleable-md navbar-dark bg-primary">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapseEx2" aria-controls="collapseEx2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <strong><?php echo $this->fetch('title'); ?></strong>
            </a>
            <div class="collapse navbar-collapse" id="collapseEx2">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link waves-effect waves-light">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light">Pricing</a>
                    </li>
                    <li class="nav-item btn-group">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item waves-effect waves-light">Action</a>
                            <a class="dropdown-item waves-effect waves-light">Another action</a>
                            <a class="dropdown-item waves-effect waves-light">Something else here</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline waves-effect waves-light">
                    <input class="form-control" placeholder="Search" type="text">
                </form>
            </div>
        </div>
    </nav>
    <!--/.Navbar-->
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a target="_blank" href="https://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </div>
    </nav>

    <div class="container clearfix">
    <?= $this->Flash->render(); ?>
        <?= $this->fetch('content') ?>
    </div>
    
    <footer class="page-footer blue center-on-small-only">
        <!--Footer Links-->
        <div class="container-fluid">
            <div class="row">
                <!--First column-->
                <div class="col-md-6">
                    <h5 class="title">Footer Content</h5>
                    <p>Here you can use rows and columns here to organize your footer content.</p>
                </div>
                <!--/.First column-->
                <!--Second column-->
                <div class="col-md-6">
                    <h5 class="title">Links</h5>
                    <ul>
                        <li><a href="#!">Link 1</a></li>
                        <li><a href="#!">Link 2</a></li>
                        <li><a href="#!">Link 3</a></li>
                        <li><a href="#!">Link 4</a></li>
                    </ul>
                </div>
                <!--/.Second column-->
            </div>
        </div>
        <!--/.Footer Links-->
        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                © 2015 Copyright: <a href="https://mdbootstrap.com"> MDBootstrap.com </a>
            </div>
        </div>
        <!--/.Copyright-->
    </footer>

    <!-- SCRIPTS -->
    <!-- Bootstrap tooltips -->
    <?php echo $this->Html->script('/node_modules/mdbootstrap/js/tether.min.js'); ?>
    <!-- MDB core JavaScript -->
    <?php echo $this->Html->script('/node_modules/mdbootstrap/js/mdb.min.js'); ?>
    <!--toastr modern notification-->
    <?php echo $this->Html->script('/node_modules/toastr/build/toastr.min.js'); ?>
    <!--Load initial for infinite-scroll-->
    <?php echo $this->Html->script('/node_modules/infinite-scroll/dist/infinite-scroll.pkgd.min.js');?>
    <!--EEN SCRIPT SECTION-->
</body>
</html>
