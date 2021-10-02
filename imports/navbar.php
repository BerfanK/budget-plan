<?php

$path = substr($_SERVER['SCRIPT_NAME'], 1);
$file = basename($path, ".php");

$loggedIn = false;
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) $loggedIn = true;

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item" style="margin: 0 !important">
                    <a class="nav-link ps-n5 <?php if ($file == 'index') echo 'current'; ?>" href="./">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($file == 'projects' || $file == 'plan') echo 'current'; ?>" href="./plan">Plan verwalten</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php 

                $currentLogin = "current";
                if ($file !== 'login') $currentLogin = "";
                if (!$loggedIn) {
                    echo 
                    '
                    <li class="nav-item">
                        <a class="nav-link ' . $currentLogin . '" href="./login">Anmelden</a>
                    </li>
                    ';
                } else {
                    echo 
                    '
                    <li class="nav-item">
                        <a class="nav-link" href="./logout">Abmelden</a>
                    </li>
                    ';
                }

                ?>
                <li class="nav-item">
                    <a href="" class="nav-link"><i class="far fa-user-circle"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>