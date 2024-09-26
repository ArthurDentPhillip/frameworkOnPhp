<div class="container">
        <div class="row">

            <div class="col-3">
                <form action="show" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="number" class="form-control" id="category" name="category">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="info" class="form-label">Info</label>
                        <input type="text" class="form-control" id="info" name="info">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" id="formFile" type="file" name="file-1">
                    </div>
                    <button name="one" type="submit" class="btn btn-primary">Submit</button>
                </form>


            </div>
            <div class="col-3">
            <form action="show" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <select name="products" class="form-select" aria-label="Default select example" style="margin-bottom: 2% !important;margin-top: 12% !important;">
                        <?php if (!empty($cart)): ?>
                            <?php foreach ($cart as $cart): ?>
                                <option value="<?= $cart['id'] ?>"><?= $cart['name'] ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                        <label for="formFile" class="form-label">Image</label>
                        <input name="fileImage[]" type="file" multiple="true" class="form-control" id="formFile">
                    </div>
                    <button type="submit" class="btn btn-primary" value="Upload">Submit</button>
                </form>
                <!-- <form action="show" method="GET"> -->
                
                <!-- <button>ADD</button> -->
            <!-- </form> -->
            </div>
        </div>