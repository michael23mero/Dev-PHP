<!--Archivos PHP--><?php include '../template/cabecera.php';?>
<!--Estilos css--> <link rel="stylesheet" href="../css/cabecera.css">

<!--Bootstrap-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<br><h1 class="text-center">Bienvenidos al ahorro...!</h1><br>
<div class="container">
    <div class="row">
        <div class=col-sm-12>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://cdn.computerhoy.com/sites/navi.axelspringer.es/public/styles/950/public/media/image/2021/02/cesta-compra-supermercado-2225625.jpg?itok=0hxeDTM0" class="d-block w-100" alt="" width="200" height="450">
                </div>
                <div class="carousel-item">
                    <img src="https://www.supermaxi.com/wp-content/uploads/2015/05/img-miercoles.jpg" class="d-block w-100" alt="" width="200" height="450">
                </div>
                <div class="carousel-item">
                    <img src="https://www.supermaxi.com/wp-content/uploads/2015/05/img-viernes.jpg" class="d-block w-100" alt="" width="200" height="450">
                </div>
            </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div><br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<?php include '../template/pie.php';?>