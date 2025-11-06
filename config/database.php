<?php
// Load .env file for local development
if (file_exists(__DIR__ . '/../.env')) {
    $env = parse_ini_file(__DIR__ . '/../.env');
    foreach ($env as $key => $value) {
        $_ENV[$key] = $value;
        putenv("$key=$value");
    }
}

class Database {
    public $conn;

    public function getConnection() {
        $this->conn = null;
        
        try {
            // Now these work in both local and Railway environments
            $host = $_ENV['MYSQLHOST'] ?? 'mysql.railway.internal';
            $port = $_ENV['MYSQLPORT'] ?? '3306';
            $database = $_ENV['MYSQLDATABASE'] ?? 'db_real_estate';
            $username = $_ENV['MYSQLUSER'] ?? 'root';
            $password = $_ENV['MYSQLPASSWORD'] ?? 'TopjJThFOXjwZnpEATjRgOQfgXdqLRLN';

            $dsn = "mysql:host={$host};port={$port};dbname={$database};charset=utf8mb4";
            
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ];

            $this->conn = new PDO($dsn, $username, $password, $options);
            
        } catch(PDOException $exception) {
            error_log("Database connection error: " . $exception->getMessage());
            throw new Exception("Database connection failed");
        }
        
        return $this->conn;
    }
}

?>
