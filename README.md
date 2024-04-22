# messageBoard
Message Board made in PHP and mySQL.

MySQL setup instructions:
CREATE DATABASE messageBoard; 
USE messageBoard; 
CREATE TABLE messages (id INT AUTO_INCREMENT PRIMARY KEY, firstName VARCHAR(50) NOT NULL, lastName VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, message TEXT NOT NULL);
