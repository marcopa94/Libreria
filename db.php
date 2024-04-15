<?php
$conn = mysqli_connect("localhost", "root", "", "gestione_libreria");

if (!$conn) {
    die("Connessione al database fallita: " . mysqli_connect_error());
}
?>
