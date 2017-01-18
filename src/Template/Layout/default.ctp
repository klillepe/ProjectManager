<?php
$cakeDescription = 'ProjectManager';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      <?= $cakeDescription ?>:
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('custom.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid">
      <div class="header clearfix">
        <nav role="navigation" class="navbar">
          <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <h3 class="navbar-brand text-muted">ProjectManager</h3>

          </div>
          <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
            <?php if($this->request->session()->read('Auth.User')) {
              echo '<li>'.$this->Html->link(__('Projects'), ['controller' => 'Projects', 'action' => 'list']).'</li>';
              echo '<li>'.$this->Html->link(__('New Project'), ['action' => 'add']). '</li>';
              echo '<li>'.$this->Html->link(__('Log out'), ['controller' => 'Users', 'action' => 'logout']).'</li>';
              } else { ?>
              <li><?= $this->Html->link(__('Projects'), ['controller' => 'Projects', 'action' => 'index']); ?></li>
              <li><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']); ?></li>
              <?php } ?>
            </ul>
          </div>
        </nav>
        <hr>
      </div> <!-- /header -->
      <?= $this->Flash->render() ?>
      <div class="row">
        <?= $this->fetch('content') ?>
      </div>
      <footer class="footer">
        <hr>
        <p>&copy; 2017 / Kert Lillepea / Project Manager </p>
      </footer>
    </div> <!-- /container -->
  </body>
</html>