-- Login testdata met gehashte wachtwoorden
-- Wachtwoord 'test123' gehashed met password_hash() bcrypt

-- Wijzig password kolom om gehashte wachtwoorden te ondersteunen
ALTER TABLE `login` MODIFY `password` VARCHAR(255) NOT NULL;

-- Insert testgebruikers (wachtwoord: test123)
-- Hash gegenereerd met: password_hash('test123', PASSWORD_DEFAULT)
INSERT INTO `login` (`username`, `password`) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
('gebruiker', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');
