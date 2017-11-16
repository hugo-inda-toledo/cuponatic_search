<br>
<h1 class="my-4">Estadisticas<br>
    <small>Los 20 cupones mas buscados</small>
</h1>

<br><br>

<div class="row">
  <?php if(count($coupons) > 0):?>
    <?php foreach($coupons as $coupon):?>
      <div class="col-lg-4 col-sm-6 portfolio-item" id="coupon-<?php echo $coupon->id;?>">
        <div class="card h-100">
          <a href="#">
            <?php echo $this->Html->image( ($coupon->image_url != '') ? $coupon->image_url : 'sin-imagen.jpg', ['class' => 'card-img-top']);?>
          </a>
          <div class="card-body">
            <h4 class="card-title">
              <?php echo $this->Html->link($coupon->coupon_title, '#');?>
            </h4>
            <span class="badge badge-success">

              <h3><?php echo ($coupon->count_search_total == 1) ? $coupon->count_search_total.' busqueda en total' : $coupon->count_search_total.' busquedas en total';?></h3>
            </span>

            <?php if(count($coupon->search_stats) > 0):?>
              <br>
              <strong class="text-warning">las 5 palabras mas buscadas son:</strong>
              <dl class="list-inline">
                <?php for($x=0; $x < count($coupon->search_stats); $x++):?>

                  <?php 
                    if($x == 5)
                    {
                      break;
                    }
                  ?>

                  <li>
                    <span class="badge badge-secondary">
                      <?php echo $coupon->search_stats[$x]->search_keyword.' ('.$coupon->search_stats[$x]->count_total.' '; ?>
                      <?php echo ($coupon->search_stats[$x]->count_total == 1) ? 'busqueda)' : 'busquedas)';?>                    
                    </span>
                  </li>
                <?php endfor;?>
              </dl>
            <?php endif;?>
            <p class="card-text">
              <?php echo $coupon->coupon_description;?>
            </p>
          </div>
        </div>
      </div>
    <?php endforeach;?>
  <?php else:?>
    <div class="col-sm-12">
      <strong class="text-center text-danger"> No hay datos</strong>
      <br><br><br><br><br><br>
      <br><br><br><br><br><br>
      <br><br><br><br><br><br>
    </div>
  <?php endif;?>
</div>