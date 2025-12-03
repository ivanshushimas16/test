<?php
// Simple PHP test file
header('Content-Type: text/plain');
echo "PHP is working correctly!\n";
echo "PHP Version: " . phpversion() . "\n";
echo "Server Time: " . date('Y-m-d H:i:s') . "\n";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "\n";
?>
