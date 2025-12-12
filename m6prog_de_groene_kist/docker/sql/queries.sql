SELECT * FROM product WHERE naam LIKE 'appel' OR naam LIKE 'banaan' OR naam LIKE 'bes' OR naam LIKE 'sinaasappel' ORDER BY naam;

SELECT * FROM product WHERE naam LIKE 'tomaat' OR naam LIKE 'komkommer' OR naam LIKE 'sla' OR naam LIKE 'wortel' ORDER BY naam;

SELECT * FROM product WHERE naam LIKE 'appel';

SELECT p.naam, p.prijs, a.korting
FROM aanbiedingen a
JOIN product p ON a.product_idproduct = p.idproduct
GROUP BY p.naam, p.prijs, a.korting;