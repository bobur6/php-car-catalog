<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            include 'users.php';
            for($i = 0; $i<count($user); $i++){
                if($_POST['email'] == $user[$i]['email'] && $_POST['password'] == $user[$i]['password']){
                    header('location: autokz.php');
                    break;
                }
                else{
                    header('location: loginPage.php');
                }
            }
        }
        else{
            header('location: loginPage.php');
        }
    }
    else{
        echo "<h1>error 405</h1>біз тек POST запрос қабылдаймыз!, GET запрос қабылдамаймыз, себебі GET запроста email мен пароль көрініп қалады, бұл қауіпті!!! АРТҚА ҚАЙТЫҢЫЗ";
    }    
?>