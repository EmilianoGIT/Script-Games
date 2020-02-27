*XAMPP platform*

1)Move php.ini to the xampp folder 'xampp/php'
2)Move sendemail.ini to the xampp folder 'xampp/sendmail'
note: In sendmail.ini override 'auth_username' with your email sender and 'auth_password' with its password.

3) From phpmyadmin create a database named 'progetto' and create a user with name 'utenteprogetto' and password 'password'

4)Run these SQL queries from the db 'progetto' to define the users and games tables:


CREATE TABLE `users` (
  `Nome` char(30) NOT NULL,
  `Password` char(30) NOT NULL,
  `Email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `users`
  ADD PRIMARY KEY (`Nome`);  
  
  
  
CREATE TABLE `giochi` (
  `NomeGioco` char(30) NOT NULL,
  `Uploader` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `giochi`
  ADD PRIMARY KEY (`NomeGioco`),
  ADD KEY `Uploader` (`Uploader`);
  
  
5) When a user is signed, it can start uploading javascript game folders. You can find 2 examples on the archive 'JavaScriptGames.7z'
 
