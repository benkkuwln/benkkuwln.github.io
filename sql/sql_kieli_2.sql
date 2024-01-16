SELECT * FROM country WHERE Name="Finland";

SELECT Name FROM country
WHERE Continent="Europe";

SELECT Name FROM country
WHERE Population > 1000000;

SELECT Name, CountryCode FROM city
WHERE District="Aichi";

SELECT Name FROM country
WHERE IndepYear IS NULL;

SELECT Name FROM country
WHERE Continent="North America", "South America";

SELECT Name FROM city
WHERE Population > 100000 OR Population < 200000;

SELECT Name FROM city
WHERE Name LIKE "K%";

SELECT Language FROM countrylanguage
WHERE CountryCode="FIN";

SELECT country.Name FROM country, countrylanguage
WHERE countrylanguage.Language="Swedish" AND country.Code=countrylanguage.CountryCode;

INSERT INTO Kosovo (Continent, Region, SurfaceArea)
VALUES ("Europe", "Southern Europe", "10887");

DELETE FROM country
WHERE NAME="Bermuda";

UPDATE country
SET Population="5388417"
WHERE Name="Finland";