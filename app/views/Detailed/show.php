<div class="container">
        <div class="row">
            <?php if (!empty($cart)): ?>
                <?php foreach ($cart as $cart): ?>
                    <div class="col-12">
                        <form action="show" method="POST" class="form" style="margin-left: 26% !important;">
                            <div id="carouselExample" class="carousel slide">
                                <div class="carousel-inner" style="background-color: gray !important; width: 120%">
                                    <div class="carousel-item active">
                                        <img src="<?= $cart['image_path'] ?>" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?= $cart['i1'] ?>" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?= $cart['i2'] ?>" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?= $cart['i3'] ?>" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                               
                                <button class="carousel-control-prev btn" style="margin-left: -20% !important;" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="prev">
                                    <span aria-hidden="true">
                                    <div class="btn btn-outline-secondary btn-sm">&#10094;</div>
                                    </span>
                                    <!-- <span class="visually-hidden">Previous</span> -->
                                </button>
                               
                               
                                <button class="carousel-control-next" type="button"  style="margin-right: -40% !important;" data-bs-target="#carouselExample"
                                    data-bs-slide="next">
                                    <span aria-hidden="true">
                                    <div  class="btn btn-outline-secondary btn-sm">&#10095;</div>
                                    </span>
                                    <!-- <span class="visually-hidden">Next</span> -->
                                </button>
                            
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    Сharacteristics
                                </h5>
                                <p class="card-text">
                                   Name: <?= $cart['name'] ?>
                                </p>
                                <p class="card-text">
                                    Description: <?= $cart['info'] ?>
                                </p>

                                <p class="card-text">
                                  Price:  $<?= $cart['price'] ?>
                                </p>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
