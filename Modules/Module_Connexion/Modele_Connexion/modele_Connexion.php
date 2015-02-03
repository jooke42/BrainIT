<<<<<<< HEAD
<?php

class ModeleConnexion extends DBMapper {

    function connexion ($email, $pass) {

        $pass = sha1($pass);

        $req = static::$database->prepare("select * from Client where email like '$email'");


        $req->execute();

        $resultat = $req->fetch();

        $passConf = $resultat['password'];

        if ($passConf != $pass) {

            header("Refresh: 0;URL=index.php?action=2&Module=Connexion");
        } else {
            $_SESSION['Utilisateur'] = $resultat;
            $_SESSION['idClient'] = $resultat["idClient"];
            header("Refresh: 0;URL='index.php'");
        }

    }
}

?>
=======
<?php

class ModeleConnexion extends DBMapper {

    function connexion ($email, $pass) {

        $pass = sha1($pass);

        $req = static::$database->prepare("select * from Client where email like '$email'");


        $req->execute();

        $resultat = $req->fetch();

        $passConf = $resultat['password'];

        if ($passConf != $pass) {

            header("Refresh: 0;URL=index.php?action=2&Module=Connexion");
        } else {
            $_SESSION['Utilisateur'] = $resultat;
            $_SESSION['idClient'] = $resultat["idClient"];
            header("Refresh: 0;URL='index.php'");
        }

    }
}

?>
>>>>>>> 57e8c5ec3ce809f43b687297c8e1861f29be8835
