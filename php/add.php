<?php

require_once('connect.php');

// CREATE : Ajouter des membres d'équipage

function addname(string $name) {
    
    $db;   
    connexion($db);
    
    try {
        $query = $db->prepare("INSERT INTO members(name) VALUES(:name)");
                    
        $query->bindValue(':name',$name, PDO::PARAM_STR);
        
        $query->execute();


    } catch(PDOException $e){
        return "Erreur : " . $e->getMessage();
    }
}

// Enlève les espaces dans le formulaire et évite qu'il y aie du script dans les inputs

function valid_data($data) {

    $data = trim($data);
    $data = htmlspecialchars($data);

    return $data;
}



// On récupère les données du formulaire

if($_POST){
        if(isset($_POST['name']) && !empty($_POST['name'])){

            $db;
            connexion($db);
            
            // On nettoie les données envoyées

            $name = valid_data($_POST['name']);
           
            
            addname($name);
            
            $_SESSION['message'] = "Membre d'équipage ajouté !";
            header('Location: http://localhost/dev-tech-challenge/php/home.php');
            }else{
            $_SESSION['erreur'] = "Le formulaire est incomplet";
            }
        }   