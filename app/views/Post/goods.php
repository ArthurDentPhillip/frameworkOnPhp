<div class="container">
        <div class="row">
            <form action="goods" method="POST" style="margin-bottom: 2%; margin-top: 2%;">
                <div class="row">
                <div class="col-3">
                <select name="products" class="form-select" aria-label="Default select example">
                    <option value="Ноутбук">Ноутбуки</option>
                    <option value="Холодильник">Холодильники</option>
                </select>
                </div>
                <div class="col-9" style="margin-left: -1%; margin-top: 1%;">
                <button class="btn btn-outline-primary">Filter</button>
                </div>
</div>
            </form>
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <div class="col-3">
                    <form action="goods" method="POST">
                        <img src="<?= $post['image_path'] ?>" class="card-img-top col_height" alt="<?= $post['id'] ?>" id="<?= $post['id'] ?>">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $post['name'] ?>
                            </h5>
                            <p class="card-text">
                                <?= $post['info'] ?>
                            </p>
                            <button class="btn btn-primary" name="<?php echo $post['id']?>" value="<?php echo $post['id']?>">Add to Cart</button>
                        </div>
                </form>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>