<?php
require_once 'config/database.php';

header('Content-Type: application/json');

try {
    // First ensure database exists
    if (!ensureDatabaseExists()) {
        throw new Exception('Failed to create database');
    }

    // Get connection to the database
    $pdo = getDBConnection();
    
    // Read and execute the database creation script
    $createScript = file_get_contents('scripts/01_create_database.sql');
    if ($createScript === false) {
        throw new Exception('Could not read database creation script');
    }

    // Split the script into individual statements
    $statements = array_filter(array_map('trim', explode(';', $createScript)));
    
    foreach ($statements as $statement) {
        if (!empty($statement) && !preg_match('/^(CREATE DATABASE|USE)/i', $statement)) {
            $pdo->exec($statement);
        }
    }

    // Read and execute the seed data script
    $seedScript = file_get_contents('scripts/02_seed_data.sql');
    if ($seedScript !== false) {
        $statements = array_filter(array_map('trim', explode(';', $seedScript)));
        
        foreach ($statements as $statement) {
            if (!empty($statement)) {
                try {
                    $pdo->exec($statement);
                } catch (PDOException $e) {
                    // Ignore duplicate entry errors for seed data
                    if (strpos($e->getMessage(), 'Duplicate entry') === false) {
                        throw $e;
                    }
                }
            }
        }
    }

    echo json_encode([
        'success' => true,
        'message' => 'Database initialized successfully'
    ]);

} catch (Exception $e) {
    error_log('Database setup error: ' . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Database setup failed: ' . $e->getMessage()
    ]);
}
?>
