<?php

function emptyInputSignup($name, $email, $username, $password, $passwordRepeat){
    $result;
    if(empty($name) || empty($email) || empty($username) || empty($password) || empty($passwordRepeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/" , $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $passwordRepeat){
    $result;
    if($password !== $passwordRepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../createAccount.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function  createUser($conn, $name, $email, $username, $password){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../createAccount.php?error=stmtFailed");
        exit();
    }
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    //I added this code, this creates a database with columns "stockTicker". The database is name the same as the user name - Joe
    $sql_wlist = "CREATE TABLE $username (stockTicker varchar(10));";
    $stmt_wlist = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt_wlist, $sql_wlist)){
        header("location: ../createAccount.php?error=stmtFailed");
        exit();
    }
    mysqli_stmt_execute($stmt_wlist);
    mysqli_stmt_close($stmt_wlist);


    header("location: ../createAccount.php?error=none");
    exit();
}

function emptyInputLogin( $username, $password){
    $result;
    if( empty($username) || empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $password){
    $uidExists = uidExists($conn, $username, $username);
    
    if($uidExists === false){
        header("location ../login.php?error=loginError"); //there was no else if condition for this, i added one on the login.php page
        exit();
    }

    $passwordHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($password, $passwordHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=IncorrectPassword");
        exit();
    }
    else if ($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists['usersId'];
        $_SESSION["usersUid"] = $uidExists['usersUid'];
        $_SESSION["loggedIn"] = 1; //0 means not logged in 1 means logged in
        header("location: ../index.php");
        exit();
    }
}