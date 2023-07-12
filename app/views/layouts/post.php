<?php

// var_dump($post['name']);
$_POST['id'] = 'input';
setcookie('login', $_POST['id'], 0, '/');
$count = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/post.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <?php $count = $count + 1; ?>
                    <div class="col-3">
                        <img src="<?= $post['image_path'] ?>" class="card-img-top col_height" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $post['name'] ?>
                            </h5>
                            <p class="card-text">
                                <?= $post['info'] ?>
                            </p>
                            <a href="#" class="btn btn-primary x"
                                ajax="<?php echo $count; ?>"> Go somewhere</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="result"></div>
            <button onclick="clickF()" class="btn btn-primary">btn</button>
        </div>
    </div>
    <script
			  src="https://code.jquery.com/jquery-3.7.0.js"
			  integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
			  crossorigin="anonymous"></script>
    <script src="/bootstrap/bootstrap.js/script.js"></script>
    <script type="text/javascript">
        function clickF(){
            window.location.href = '/main/index';
        }
        const dd = document;
        let blocks = dd.querySelectorAll('.x');
        let url = 'main/index';
        var data = [];
        // console.log(blocks.length)
        for(let i=0; i<blocks.length; i++){
            console.log(blocks[i]);
            blocks[i].onclick = () => {
            alert(blocks[i].getAttribute('ajax'));
            data.push(blocks[i].getAttribute('ajax'));
            var unique = data.filter((x, i) => data.indexOf(x) === i);
            console.log(unique);
            fetch(unique, url);
            }
        }
        function fetch (data, url){
            fetch(url, {
                "method": "POST",
                "headers": {
                    "Content-Type":"application/json: charset=utf-8"
                },
                "body": JSON.stringify(data)
            }).then(function(responce){
                return response.json();
            }).then(function(data){
                console.log(data)
            })
//             setTimeout(() => {
//                     window.location.href = '/main/index';
// }, 3000);
        }
        // console.log(data);
        // function ajax (data, url, objectClass){
        //     console.log(data);
        //     let param = 'data=' + data;
        //     let request = new XMLHttpRequest();
        //     request.open('POST', url, true);
        //     request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        //     request.send(param);
        //     request.addEventListener('readystatechange', () => {
        //         if(request.readyState === 4 && request.status === 200){
        //             console.log(request.responseText);
        //             dd.querySelector(objectClass).innerHTML = request.responseText;
        //         }
        //     })
        // }

        // for(let i=0; i<blocks.length; i++){
        //     let data = blocks[i].getAttribute('ajax');
        //     console.log(data);
        //     blocks[i].onclick = () => {
        //         ajax (data, url, '.result');
                // setTimeout(() => {
                    // window.location.href = '/main/index';
// }, 3000);

               
            // }
            // }

    </script>
</body>

</html>