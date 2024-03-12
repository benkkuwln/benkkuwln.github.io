<?php
/*
* based on request type, choose appropriate action
* no method (default): list
* POST & action=add:        add new OK
* POST & action=update:     update OK
* GET & action=edit:        edit OK
* GET & action=delete:      delete OK
* GET & no action:          list OK
*/
require_once("view.php");
require_once("model.php");

//$view = new View();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if(isset($_GET['action'])) {
            $action = $_GET['action'];
            if($action == 'edit') { 
                // linkki: index.php?action=edit$id=X
                $id = $_GET['id'];
                require_once("db_config.php");
                $stmt = $pdo->prepare("SELECT * FROM kayttaja WHERE kayttajaid=?");
                $stmt->execute([$id]);
                $row = $stmt->fetch(); // haetaan tietue (on vain yksi koska id)
                $kayttaja = new Kayttaja($row['kayttajaid'], $row['etunimi'], $row['sukunimi']);
                $view = new View();
                $view->editPage($kayttaja);
            } else if($action == 'delete') {
                // linkki: index.php?action=delete$id=X
                $id = $_GET['id']; // tiedetään poisettavan id numero
                require_once("db_config.php");
                $stmt = $pdo->prepare("DELETE FROM kayttaja WHERE kayttajaid=?");
                $stmt->execute([$id]);
                $deleted = $stmt->rowCount(); // montako riviä muuttui (lähti pois)
                if($deleted == 1) {
                    header("Location: index.php");
                }else {
                    echo "Error";
                }

            }else if($action == 'add'){
                $view = new View();
                $view->newPage();
            }
        }else {
            // tulostetaan kaikki
            require_once("db_config.php");
            $stmt = $pdo->query("SELECT * FROM kayttaja");
            $kayttajat = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $view = new View();
            $view->showAll($kayttajat);
        }
        break;
    case 'POST':
        if(isset($_POST['action'])) {
            $action = $_POST['action'];
            if($action == 'add') {       
                $etunimi = $_POST['fname'];
                $sukunimi = $_POST['sname'];
                require_once("db_config.php");
                $stmt = $pdo->prepare("INSERT INTO kayttaja(etunimi,sukunimi) VALUES(?,?)");
                $stmt->execute([$etunimi, $sukunimi]);
                $added = $stmt->rowCount();
                if($added == 1) {
                    header("Location: index.php");
                } else {
                    echo "error";
                }
            } else if($action == 'update') {
                $id = $_POST['id'];
                $etunimi = $_POST['fname'];
                $sukunimi = $_POST['sname'];
                require_once("db_config.php");
                $stmt = $pdo->prepare("UPDATE kayttaja SET etunimi = ?, sukunimi = ? WHERE kayttajaid = ?");
                $stmt->execute([$etunimi, $sukunimi, $id]);
                $updated = $stmt->rowCount();
                if($updated == 1) {
                    header("Location: index.php");
                } else {
                    echo "error";
                }
            }
        }
        break;
    default:
}
?>