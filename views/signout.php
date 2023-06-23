<?php
session_start();

// Destruction de la session
session_destroy();

// Rediriger vers login après la destruction(logout)
header("location: signin.php");
