# bookshop
Bookshop for WIE18, with PHP and API
Enskild uppgift
Bokkomplettering
Uppgiften går ut på att skapa en sida som mot betalning tillhandahåller komplettering av bokinformation. Användaren ska kunna ladda upp en CSV-fil som innehåller ISBN-nummer. Applikationen ska sedan anropa ett API och hämta information om varje bok med hjälp av dess ISBN. Applikationen ska skapa en ny CSV-fil som innehåller all tillgänglig information om böckerna och tillhandahålla en länk till filen för användaren.

Användaren A går in på din site och laddar upp sin fil. Filen innehåller ett par rader med ISBN-nummer. För varje nummer ska din applikation kontakta API:et du har blivit tilldelad och be om information för det ISBN:et. Den informationen du får tillbaka ska du lägga till i en ny csv-fil så att den nya filen innehåller ISBN, boktitel, författare osv. Den filen ska du sedan tillhandahålla användare A genom en nerladdninglänk eller liknande.

Mockups: https://github.com/emmio-micke/wies18-integration/tree/master/enskild%20uppgift

Ni måste inte följa dem slaviskt, men för att ni ska få en idé om vad jag är ute efter iaf.

G
Använda git. Committa varje dag, helst flera gånger och för varje "del" ni jobbar med. Vill inte ha en stor commit sista dagen och sörskilt inte en commit som består av en zip-fil som är uppladdad via github.
Koden ska vara objektorienterad.
Kommenterad kod.
Prepared statements.
Sanering av input, filtrera input-data, validera input-data.
Genomföra betalning.
Uppfylla kraven.
VG
Generell kod.
Följ kodstandard PSR2.
Deploya på en domän.
Genomtänkt gränssnitt med responsiv design.
Spara kunderna ni skapar i Stripe i databasen så ni kan använda dem igen nästa gång.
Leverans
Git-repo (zippa även ihop och ladda upp).
