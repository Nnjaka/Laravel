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

        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href=" <?= route('news') ?>">Все новости</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= route('news.category', ['category' => 'inWorld']) ?>">В мире</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= route('news.category', ['category' => 'politics']) ?>">Политика</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= route('news.category', ['category' => 'economy']) ?>">Экономика</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= route('news.category', ['category' => 'science']) ?>">Наука</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= route('news.category', ['category' => 'sport']) ?>">Спорт</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <h3 class="px-5 mx-4">Все новости</h3>
        <div class="container pt-3">
            <div class="row g-5">
                <?php foreach ($newsList as $news) : ?>
                    <div class="col-4">
                        <div class="p-3 border bg-light">
                            <div class="card">
                                <img src="<?= $news['image'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="<?= route('news.show', ['id' => $news['id']]) ?>"><?= $news['title'] ?></a></h5>
                                    <p class="card-text"><?= $news['description'] ?></p>
                                    <p class="card-text"><small class="text-muted"><?= $news['status'] ?></small>
                                    </p>
                                    <p class="card-text"><small class="text-muted"><?= $news['author'] ?></small></p>
                                    <p class="card-text"><small class="text-muted"><?= $news['category'] ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <footer class="fixed-bottom pt-m-5 border-top bg-secondary ">
            <div class="container">
                <h6>&copy; <?php echo date("Y") ?> <h6>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>