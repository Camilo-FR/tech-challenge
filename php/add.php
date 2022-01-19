<?php

require_once('connect.php');

// CREATE : Ajouter des membres d'équipage

function addname(string $name) {
    
    $db;   
    connexion($db);
    
    try {
        $query = $db->prepare("INSERT INTO members(name) VALUES(:name)");
                    
        $query->bindValue(':name',$name, PDO::PARAM_STR);
        
        return $query->execute();

    } catch(PDOException $e){
        return "Erreur : " . $e->getMessage();
    }
}

// Enlève les espaces dans le formulaire et évite qu'il y ait du script dans les inputs

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
           
            $result = addname($name);
            
            $last_url = $_SERVER['HTTP_REFERER'];

            if(strpos($last_url, '?') !== FALSE) {
                $req_get = strrchr($last_url, '?');
                $last_url = str_replace($req_get, '', $last_url);
            }

            if($result) {
                
                $msg = "Membre d'équipage ajouté !";

                header("Location: $last_url?msg=$msg");
            }else{
                
                $msg = "Une erreur est survenue";

                header("Location: $last_url?error-msg=$msg");
            }
        }else{
            $msg = "Le formulaire est incomplet";

            header("Location: $last_url?error-msg=$msg");
            }
    }   