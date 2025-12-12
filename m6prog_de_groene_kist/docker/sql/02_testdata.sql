-- -----------------------------------------------------
-- Test Data Insertion
-- -----------------------------------------------------

-- Insert logins (passwords should be hashed in a real application)
INSERT INTO `login` (`idlogin`, `username`, `password`) VALUES
(1, 'jan_smit', 'hashed_password_1'),
(2, 'piet_jansen', 'hashed_password_2'),
(3, 'anna_devries', 'hashed_password_3');

-- Insert klanten
INSERT INTO `klant` (`idklant`, `Naam`, `leeftijd`, `woonplaats`, `login_idlogin`) VALUES
(1, 'Jan Smit', 34, 'Amsterdam', 1),
(2, 'Piet Jansen', 45, 'Utrecht', 2),
(3, 'Anna de Vries', 28, 'Rotterdam', 3);

-- Insert products
INSERT INTO `product` (`idproduct`, `naam`, `prijs`) VALUES
(1, 'Biologische Tomaten', 3.50),
(2, 'Komkommers', 1.20),
(3, 'Frisse Appels', 2.50),
(4, 'Wortelen', 1.80),
(5, 'Ambachtelijke Kaas', 8.95);

-- Insert product types
INSERT INTO `product_type` (`groente`, `fruit`, `product_idproduct`) VALUES
('Biologische Tomaten', '', 1),
('Komkommers', '', 2),
('', 'Frisse Appels', 3),
('Wortelen', '', 4);

-- Insert aanbiedingen (15% korting op appels)
INSERT INTO `aanbiedingen` (`idaanbiedingen`, `korting`, `product_idproduct`) VALUES
(1, 15, 3);

-- Insert customer purchases (klant_has_product)
INSERT INTO `klant_has_product` (`klant_idklant`, `product_idproduct`) VALUES
(1, 1), -- Jan bought Tomaten
(1, 3), -- Jan bought Appels
(2, 2), -- Piet bought Komkommers
(3, 3), -- Anna bought Appels
(3, 5); -- Anna bought Kaas
