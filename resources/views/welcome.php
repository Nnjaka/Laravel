<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, xinitial-scale=1">
    <title>News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <nav class="navbar navbar-light bg-secondary text-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= route('welcome') ?>">News</a>
                <h6><?php echo date("j F, Y") ?><h6>
            </div>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Все новости</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">В мире</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Политика</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Экономика</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Наука</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Спорт</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main role="main" class="inner cover p-5">
            <h1 class="cover-heading">Добро пожаловать в News</h1>
            <p class="lead">Это новостной портал, где вас ждут только правдивые и актуальные новости со всего мира</p>
            <p class="lead">
                <a href=" <?= route('news') ?>" class="btn btn-lg btn-secondary">К новостям</a>
            </p>
        </main>

        <footer class="fixed-bottom pt-m-5 border-top bg-secondary ">
            <div class="container">
                <h6>&copy; <?php echo date("Y") ?> <h6>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>