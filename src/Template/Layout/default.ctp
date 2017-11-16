<!DOCTYPE html>
<html lang="en">

  <head>

        <?= $this->Html->charset('utf-8') ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            Cuponatic Search ::
            <?= $this->fetch('title') ?>
        </title>

        <?= $this->Html->meta('icon') ?>

        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('font-awesome.min.css') ?>
        <?= $this->Html->css('3-col-portfolio.css') ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">
            <?= $this->Html->image('cuponatic_logo.png', ['class' => 'img-responsive', 'style' => 'width: 9%;']);?> Cuponatic Search
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <?php echo $this->Html->link('Busqueda'.$this->Html->tag('span', '(current)', ['class' => 'sr-only']), ['controller' => 'Coupons', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]);?>
            </li>
            <li class="nav-item">
              <?php echo $this->Html->link('Estadisticas', ['controller' => 'Coupons', 'action' => 'stats'], ['class' => 'nav-link']);?>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Desarrollado por Hugo Inda Toledo para &copy; Cuponatic</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <?= $this->Html->script('jquery-3.2.1.js');?>
    <?= $this->Html->script('bootstrap.min.js') ?>


  </body>

</html>

