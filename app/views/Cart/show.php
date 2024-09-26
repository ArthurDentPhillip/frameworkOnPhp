<div class="container">
        <div class="row">
        <?php if (!empty($cart)): ?>
                <?php $count = 0; ?>
                <?php foreach ($cart as $cart): ?>
                  <?php $count = $count + intval($cart['price']);?>
                    <div class="col-3">
                    <form action="show" method="POST">
                        <img src="<?= $cart['image_path'] ?>" class="card-img-top col_height" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $cart['name'] ?>
                            </h5>
                            <p class="card-text">
                                <?= $cart['info'] ?>
                            </p>
                            <p class="card-text">
                                $<?= $cart['price'] ?>
                            </p>
                            <button class="btn btn-danger" name="<?php echo $cart['id'];?>" value="<?php echo $cart['id'];?>">DELETE</button>
                        </div>
                </form>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="col-12 costBlock">
              <div class="row">
              <?php if (!empty($count)): ?>
              <div class="col-2">
                  <p class="costText">Total costs: <span>$<?=$count?></span></p>
              </div>
              <?php endif; ?>
              <?php if (empty($count)): ?>
              <div class="col-2">
                  <p class="costText">Total costs: <span>$0</span></p>
              </div>
              <?php endif; ?>
              <div class="col-2">
              <button class="btn btn-primary sale">Sale</button>
                </div>
                </div>
            </div>
    </div>
</div>