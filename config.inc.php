<?php
// Generate a unique secret key
$cfg['blowfish_secret'] = 'your-unique-secret-key-here-make-it-very-long';

$i = 0;
$i++;

// Server configuration using Railway environment variables
$cfg['Servers'][$i]['auth_type'] = 'cookie';
$cfg['Servers'][$i]['host'] = $_ENV['MYSQLHOST'];
$cfg['Servers'][$i]['port'] = $_ENV['MYSQLPORT'];
$cfg['Servers'][$i]['user'] = $_ENV['MYSQLUSER'];
$cfg['Servers'][$i]['password'] = $_ENV['MYSQLPASSWORD'];
$cfg['Servers'][$i]['ssl'] = true;
$cfg['Servers'][$i]['ssl_verify'] = false;

// Optional security settings
$cfg['Servers'][$i]['AllowNoPassword'] = false;
$cfg['LoginCookieValidity'] = 14400; // 4 hours

// Hide system databases
$cfg['Servers'][$i]['hide_db'] = '^(information_schema|mysql|performance_schema|sys)$';

// Basic setup
$cfg['UploadDir'] = '';
$cfg['SaveDir'] = '';
$cfg['TempDir'] = '/tmp';

// Security
$cfg['ForceSSL'] = true;
?>