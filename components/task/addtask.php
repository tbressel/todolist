<?php
include '../../includes/_functions.php';
getIdentification("../../.env");
include '../../includes/_dbconnect.php';
session_start();


// CSRF Verification
if (isset($_POST['token']) && isset($_SESSION['token']) && hash_equals($_SESSION['token'], $_POST['token'])) {
    // XSS protection
    $task_name = htmlspecialchars($_POST['task_name']);
    
    // check the length of the data
    if (strlen($task_name) > 0) {
        $connexion->beginTransaction();

        $max_order = getMaxOrder($connexion);
                
        $task_date = new DateTime();
        $task_date = $task_date->format('Y-m-d');
        // query preparation with PDO datas
        $query = $connexion->prepare('INSERT INTO task (task_name, task_state, task_order, task_date)
                                        VALUES (:task_name,0,:max_order,:task_date)');
        // alias variables with PDO syntax against SQL injection code
        $query->bindValue(':task_name', $task_name, PDO::PARAM_STR);
        $query->bindValue(':max_order', $max_order, PDO::PARAM_INT);
        $query->bindValue(':task_date', $task_date, PDO::PARAM_STR);
        // query execution get into antoher variable for check into getMessages function
        $isQueryOK = $query->execute();

        $connexion->commit();

        showMessages("add");

    } else {
        $_SESSION['error'] = 'Il faut saisire un texte';
    }
}

header('Location:../../index.php');
