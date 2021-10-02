<?php

/**
 * @author Berfan Korkmaz
 * @version 1.0.0
 */

/**
 * @param message Prints an success Bootstrap alert
 */
function print_success($message) {
    echo
    '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><i class="far fa-check-circle"></i></strong> '. $message . '
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
}

/**
 * @param message Prints an danger Bootstrap alert
 */
function print_danger($message) {
    echo
    '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="far fa-times-circle"></i></strong> '. $message . '
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
}

/**
 * This function attempts the login.
 * @param username The username entered
 * @param password The password entered
 */
function login($username, $password) {
    global $conn;

    $statement = $conn->prepare("SELECT * FROM accounts WHERE username = ?");
    $statement->bind_param("s", $username);
    $statement->execute();

    $result = $statement->get_result();
    $row = $result->fetch_assoc();

    $dbPassword = $row['password'];

    if (password_verify($password, $dbPassword)) { // Password correct!
        
        $_SESSION["logged_in"] = true;
        $_SESSION["user_id"] = $row['id'];
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $row['email'];

        print_success("Willkommen zurück <b>$username</b>! Sie werden in 3 Sekunden weitergeleitet.");

        echo 
        '
        <script>
            window.setTimeout(function() {
                window.location.href = "./";
            }, 3000);
        </script>
        ';

    } else { // Password incorrect!
        print_danger("Der Benutzername oder das Passwort ist nicht korrekt!");
    }
}

/**
 * This function creates an account.
 * @param username The username entered
 * @param email The email entered
 * @param password The password entered
 */
function register($username, $email, $password) {
    global $conn;

    if (username_exists($username)) {
        print_danger("Dieser Benutzername existiert bereits!");
        return;
    }

    if (email_exists($email)) {
        print_danger("Diese Email-Adresse existiert bereits!");
        return;
    }

    if (strlen($password) <= 8) {
        print_danger("Das Passwort muss mindestens 8 Zeichen enthalten.");
        return;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $statement = $conn->prepare("INSERT INTO accounts(username, email, password) VALUES(?, ?, ?)");
    $statement->bind_param("sss", $username, $email, $password);
    
    if ($statement->execute()) print_success("Ihr Account wurde erfolgreich erstellt. Sie können sich nun anmelden.");
    else print_danger("Ihr Account konnte nicht erstellt werden. Bitte versuchen Sie es später erneut.");
}

/**
 * Checks whether the email is existant.
 * @param email The email that should be checked
 */
function email_exists($email) {
    global $conn;

    $statement = $conn->prepare("SELECT email FROM accounts WHERE email = ?");
    $statement->bind_param("s", $email);
    $statement->execute();

    $result = $statement->get_result();
    return $result->num_rows != 0;
}

/**
 * Checks whether the username is existant.
 * @param username The username that should be checked
 */
function username_exists($username) {
    global $conn;

    $statement = $conn->prepare("SELECT username FROM accounts WHERE username = ?");
    $statement->bind_param("s", $username);
    $statement->execute();

    $result = $statement->get_result();
    return $result->num_rows != 0;
}

?>