<?php
$VotreAdresseMail="olivier.metzinger@epitech.eu";
if(isset($_POST['envoyer'])) { 
    if(empty($_POST['email'])) {
        echo "Le champ mail est vide";
    } else {
        if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,}$#i",$_POST['email'])){
            echo "L'adresse mail entrée est incorrecte";
        }else{
            //on vérifie que le champ sujet est correctement rempli
            if(empty($_POST['_name'])) {
                echo "Le champ sujet est vide";
            }else{
                //on vérifie que le champ message n'est pas vide
                if(empty($_POST['message'])) {
                    echo "Le champ message est vide";
                }else{
                    //tout est correctement renseigné, on envoi le mail
                    //on renseigne les entêtes de la fonction mail de PHP
                    $Entetes = "MIME-Version: 1.0\r\n";
                    $Entetes .= "Content-type: text/html; charset=iso-8859-1\r\n";
                    $Entetes .= "From: Nom de votre site <".$_POST['email'].">\r\n";
                    $Entetes .= "Reply-To: Nom de votre site <".$_POST['email'].">\r\n";
                    //on sécurise les champs
                    $Mail=htmlentities($_POST['email'],ENT_QUOTES,"ISO-8859-1"); 
                    $Sujet=htmlentities($_POST['_name'],ENT_QUOTES,"ISO-8859-1");
                    $Message=htmlentities($_POST['message'],ENT_QUOTES,"ISO-8859-1");
                    //en fin, on envoi le mail
                    if(mail($VotreAdresseMail,utf8_encode($Sujet),nl2br($Message),$Entetes)) { 
                        
						echo "Le mail à été envoyé avec succès !";
                    } else {
                        echo "Une erreur est survenue, le mail n'a pas été envoyé";
                    }
                }
            }
        }
    }
}
?>