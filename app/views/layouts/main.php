<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="/css/main.css" rel="stylesheet"> -->
</head>
<body>
     <!-- <img src="/images/img.png" alt="Lord of rings"> -->
     <!-- <button class="btn btn-primary" id='send'>btn</button> -->
    <?php if(!empty($posts)): ?>
        <?php foreach($posts as $post):?>
            <p><?= $post['make']?></p>
            <p><?= $post['price']?></p>
        <?php endforeach; ?>
    <?php endif;?>
    <script src="/bootstrap/bootstrap.js/script.js"></script>
</body>
</html>