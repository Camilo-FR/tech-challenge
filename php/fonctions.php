<?php

require_once('connect.php');

// CREATE : Ajouter des bouteilles

function addName(string $name) {
    
    $db;   
    connexion($db);
    
    try {
        $query = $db->prepare("INSERT INTO members(name)
                VALUES(:name)");
                    
        $query->bindValue(':name',$name, PDO::PARAM_STR);
        
        $query->execute();


    } catch(PDOException $e){
        return "Erreur : " . $e->getMessage();
    }
}