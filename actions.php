<?php
include('db.php');

if (isset($_POST['submit'])) {
    $titolo = mysqli_real_escape_string($conn, $_POST['titolo']);
    $autore = mysqli_real_escape_string($conn, $_POST['autore']);
    $anno_pubblicazione = mysqli_real_escape_string($conn, $_POST['anno_pubblicazione']);
    $immagine = mysqli_real_escape_string($conn, $_POST['immagine_url']);

    $errors = array();

    if (empty($titolo)) {
        $errors[] = "Il titolo è obbligatorio.";
    }
    if (empty($autore)) {
        $errors[] = "L'autore è obbligatorio.";
    }
    if (empty($anno_pubblicazione)) {
        $errors[] = "L'anno di pubblicazione è obbligatorio.";
    } elseif (!is_numeric($anno_pubblicazione)) {
        $errors[] = "L'anno di pubblicazione deve essere un numero.";
    }
    if (empty($immagine)) {
        $errors[] = "L'URL dell'immagine è obbligatorio.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    } else {

        $query = "INSERT INTO libri (titolo, autore, anno_pubblicazione, immagine) VALUES ('$titolo', '$autore', '$anno_pubblicazione', '$immagine')";
        mysqli_query($conn, $query);
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $titolo = mysqli_real_escape_string($conn, $_POST['titolo']);
    $autore = mysqli_real_escape_string($conn, $_POST['autore']);
    $anno_pubblicazione = mysqli_real_escape_string($conn, $_POST['anno_pubblicazione']);
    $immagine = mysqli_real_escape_string($conn, $_POST['immagine_url']);

    $errors = array();

    if (empty($titolo)) {
        $errors[] = "Il titolo è obbligatorio.";
    }
    if (empty($autore)) {
        $errors[] = "L'autore è obbligatorio.";
    }
    if (empty($anno_pubblicazione)) {
        $errors[] = "L'anno di pubblicazione è obbligatorio.";
    } elseif (!is_numeric($anno_pubblicazione)) {
        $errors[] = "L'anno di pubblicazione deve essere un numero.";
    }
    if (empty($immagine)) {
        $errors[] = "L'URL dell'immagine è obbligatorio.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    } else {
     
        $query = "UPDATE libri SET titolo='$titolo', autore='$autore', anno_pubblicazione='$anno_pubblicazione', immagine='$immagine' WHERE id=$id";
        mysqli_query($conn, $query);
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM libri WHERE id=$id";
    mysqli_query($conn, $query);
}

$query = "SELECT * FROM libri";
if (isset($_POST['search'])) {
    $search_term = mysqli_real_escape_string($conn, $_POST['search_term']);
    $query .= " WHERE titolo LIKE '%{$search_term}%' OR autore LIKE '%{$search_term}%'";
}
$result = mysqli_query($conn, $query);
?>
