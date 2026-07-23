<?php
session_start();

// Remove all session variables
session_unset();

// Destroy the entire session
session_destroy();

// Clear cache headers so the user cannot go back to protected pages
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Redirect to login page
header("Location: login.php");
exit;
?>
