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
<?= self::getPart('inc/headerPost');?>
    <?=$content?>
    <script
			  src="https://code.jquery.com/jquery-3.7.0.js"
			  integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
			  crossorigin="anonymous"></script>
    <script src="/bootstrap/bootstrap.js/script.js"></script>
    <script>
        let blocks = document.querySelectorAll('.card-img-top');
        for(let i = 0; i<blocks.length; i++){
            blocks[i].addEventListener("click", myFunction);
        }

function myFunction(event) {
let id = event.target.id;
  var getParameters = "?id=" + id;
  history.pushState(null, null, document.location.origin + document.location.pathname + getParameters);
  location.reload();
}
    </script>
</body>

</html>