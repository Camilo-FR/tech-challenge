<?php 

// On se connecte à la base de données

function connexion(&$db) {
    try {
        
        $db = new PDO('mysql:host=localhost:3307;dbname=my_crew_db', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec('SET NAMES "UTF8"');
        
    } catch (PDOException $e) {
        echo 'Erreur : '. $e->getMessage();
        die();
    }
}