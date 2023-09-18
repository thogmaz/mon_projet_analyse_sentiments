<?php
try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=analyse_sentiments_db', 'root', 'thomas');
    echo 'Connexion réussie';
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
?>
