<?php
include('db.php');
include('actions.php');
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Sa libreria</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300..700&family=Whisper&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url("./img/pexels-pixabay-235985.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .card {
            margin-bottom: 20px;
        }
        #titolo {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 20px;
            background-color: aliceblue;
            padding: 10px;
            margin-top: 30px;
            padding-bottom: 10px;
        }
        .card-img-top {
            height: 300px;
            object-fit: cover;
        }
        #title {
            font-family: "Whisper", cursive;
            font-weight: 400;
            font-style: normal;
            font-size: 80px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Sa Libreria</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="POST">
                <input class="form-control mr-sm-2" type="search" placeholder="Cerca" aria-label="Search" name="search_term">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Cerca</button>
            </form>
        </div>
    </div>
</nav>

<div class="container">
    <div id="titolo">
        <h2 class="mt-4 mb-4" id="title">Sa libreria</h2>
        <p>Sentiti libero di <b>AGGIUNGERE</b> o <b>CERCARE</b> il tuo libro dei sogni</p>

        <h3>Aggiungi Nuovo Libro</h3>
        <button class="btn btn-success" data-toggle="modal" data-target="#modalAdd">Aggiungi Libro</button>
    </div><hr>
    <br>
    <br>

    <!--------------------------------------------- Modal pro aggiung ------------------------------------------------------->
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalAddLabel">Aggiungi Libro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="titolo">Titolo</label>
                            <input type="text" class="form-control" id="titolo" name="titolo" required>
                        </div>
                        <div class="form-group">
                            <label for="autore">Autore</label>
                            <input type="text" class="form-control" id="autore" name="autore" required>
                        </div>
                        <div class="form-group">
                            <label for="anno">Anno Pubblicazione</label>
                            <input type="text" class="form-control" id="anno" name="anno_pubblicazione" required>
                        </div>
                        <div class="form-group">
                            <label for="immagine_url">URL Immagine</label>
                            <input type="url" class="form-control" id="immagine_url" name="immagine_url" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success" name="submit">Aggiungi Libro</button>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="col-md-4">
                <div class="card">
                  
                    <img src="<?= $row['immagine'] ?>" class="card-img-top" alt="<?= $row['titolo'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['titolo'] ?></h5>
                        <p class="card-text">Autore: <?= $row['autore'] ?></p>
                        <p class="card-text">Anno Pubblicazione: <?= $row['anno_pubblicazione'] ?></p>
                    
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate<?= $row['id'] ?>">Modifica</button>
                
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" class="btn btn-danger" name="delete">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>

            <!------------------------------------- Modale pro modificare ------------------------------------------------------>
            <div class="modal fade" id="modalUpdate<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdateLabel<?= $row['id'] ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="modalUpdateLabel<?= $row['id'] ?>">Modifica Libro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <div class="form-group">
                                    <label for="titolo<?= $row['id'] ?>">Titolo</label>
                                    <input type="text" class="form-control" id="titolo<?= $row['id'] ?>" name="titolo" value="<?= $row['titolo'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="autore<?= $row['id'] ?>">Autore</label>
                                    <input type="text" class="form-control" id="autore<?= $row['id'] ?>" name="autore" value="<?= $row['autore'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="anno<?= $row['id'] ?>">Anno Pubblicazione</label>
                                    <input type="text" class="form-control" id="anno<?= $row['id'] ?>" name="anno_pubblicazione" value="<?= $row['anno_pubblicazione'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="immagine_url<?= $row['id'] ?>">URL Immagine</label>
                                    <input type="url" class="form-control" id="immagine_url<?= $row['id'] ?>" name="immagine_url" value="<?= $row['immagine'] ?>">
                                </div>
                                <button type="submit" class="btn btn-primary" name="update">Salva Modifiche</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
</body>
</html>

<?php
mysqli_close($conn);
?>
