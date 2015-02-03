<<<<<<< HEAD
<?php

class ModeleConnexionAdmin extends DBMapper {

    function connexion ($email, $pass) {

        $pass = sha1($pass);

        $req = static::$database->prepare("select * from Admin where email like '$email'");


        $req->execute();

        $resultat = $req->fetch();

        $passConf = $resultat['password'];

        if ($passConf != $pass) {
            var_dump($pass);
            var_dump($passConf);
            header("Refresh: 0;URL=index.php?action=2&Module=ConnexionAdmin");
        } else {
            $_SESSION['Admin'] = $resultat;
            $_SESSION['Utilisateur'] = true;
            $_SESSION['idAdmin'] = $resultat["idAdmin"];
            header("Refresh: 0;URL='index.php'");
        }

    }
}

?>
=======
<?php

class ModeleConnexionAdmin extends DBMapper {

    function connexion ($email, $pass) {

        $pass = sha1($pass);

        $req = static::$database->prepare("select * from Admin where email like '$email'");


        $req->execute();

        $resultat = $req->fetch();

        $passConf = $resultat['password'];

        if ($passConf != $pass) {
            var_dump($pass);
            var_dump($passConf);
            header("Refresh: 0;URL=index.php?action=2&Module=ConnexionAdmin");
        } else {
            $_SESSION['Admin'] = $resultat;
            $_SESSION['Utilisateur'] = true;
            $_SESSION['idAdmin'] = $resultat["idAdmin"];
            header("Refresh: 0;URL='index.php'");
        }

    }
}

?>
>>>>>>> 57e8c5ec3ce809f43b687297c8e1861f29be8835
