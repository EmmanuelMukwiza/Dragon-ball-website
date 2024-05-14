Start = om de admin user te gebruiken is de gebruikersnaam = admin en
het wachtwoord = admin.

Stap 1: Registratie en Login

Registratie: Als je de Dragon Ball-website bezoekt voor de eerste keer,
maak je een account aan door je gebruikersnaam, e-mail en wachtwoord in
te vullen.

Login: Na registratie log je in met je gebruikersnaam en wachtwoord om
toegang te krijgen tot alle functies van de website.

Stap 2: Karaktercreatie

Karakter Aanmaken: Als ingelogde gebruiker maak je een nieuw personage
door de naam, kracht-niveau (ki), ras, geslacht, beschrijving en
afbeelding in te voeren.

Karakter Versturen: Nadat je alle gegevens hebt ingevuld, verstuur je
het personage ter goedkeuring. Het wacht dan op beoordeling door de
beheerder.

Stap 3: Dashboard

Beoordeling van Karakters: De beheerder kijkt naar alle aangevraagde
personages op het Dashboard. Ze kunnen personages goedkeuren of afwijzen
op basis van hoe origineel ze zijn en of ze passen bij de website.

Goedkeuring: Als de beheerder een personage goedkeurt, komt het op de
website.

Files:

connection.php: daar zie je de connectie, daar kun je je eigen
gebruikersnaam en wachtwoord invoeren om de website zelf te gebruiken.

Home folder: hier vind je 2 belangrijke bestanden: home.css voor de
styling en home.php. In home.php zie je de home directory, waar je de
inhoud van de hele website ziet. Je kunt inloggen/uitloggen en je
inschrijven.

main folder: hier zie je de hoofdpagina waar je personages kunt
bekijken. Je kunt statistieken bekijken zoals naam, kracht (ki) en hun
ras.

profile folder: dit is vergelijkbaar met main.php, maar hier zie je meer
uitgebreide informatie over de personages. Je ziet bijvoorbeeld hun
affiliatie, krachten en een paar video\'s van hun vechttechnieken.

admin folder: in de admin folder hebben we heel veel bestanden. Ten
eerste hebben we de hoofdinhoud zoals (Approved.php, characters.php,
Denied.php, Request.php_details en Requests_admin.php, users.php),
hiermee kun je allerlei dingen doen.

Requests_admin.php = hier kun je verzoeken van personages zien. Je ziet
alles wat te maken heeft met een DBZ personage en je ziet ook wie het
personage heeft aangevraagd.

Request_details = hier kom je door op \"meer\" te klikken. Als je op
deze pagina terechtkomt, zie je meer informatie over het geselecteerde
personage.

Denied/Approved = hier kun je zien welke personages zijn geaccepteerd en
welke niet.

Users = hier zie je alle gebruikers die zich hebben aangemeld op de
website. Je kunt hier gebruikers verwijderen, maar je kunt alleen
gebruikers verwijderen die geen admins zijn.

partiel sub folder: hier zie je veel bestanden binnen de folder zoals
menu\'s, leaderboards en die worden allemaal geïncludeerd in alle admin
bestanden zodat ik niet alles opnieuw hoef te schrijven. Als ik
bijvoorbeeld iets snel wil veranderen, verandert het voor alle bestanden
die dat soort includes hebben.

login/signup folder: hier kun je inloggen, maar voordat je inlogt, moet
je eerst een account aanmaken. Er zijn twee soorten accounts:
admin-gebruiker en normale gebruiker. De normale gebruiker heeft toegang
tot Request.php, main.php en home.php, maar een admin-gebruiker heeft
dezelfde toegangen en heeft ook toegang tot het admin dashboard.





Issues fixed = 

1/2. Ik heb het probleem opgelost waarbij je werd doorgestuurd naar /login/login.php in plaats van /login/login.html.

3. Ik heb het probleem opgelost waar je een account kon proberen aan te maken met een gebruikersnaam die al bestond. Nu krijg je een bericht als je probeert aan te melden met een al geregistreerde gebruikersnaam.

4. Ik heb het pad veranderd van Request/"Request"_admin.php naar /admin/"Requests"_admins.php.

5.Ik heb de naam van de tabel in het bestand Requests_admins.php veranderd naar 'approvals' in plaats van 'Approvals'.

6.Ik heb dit ook opgelost door de standaardwaarde van het veld naar null te zetten.

7.Ik heb het originele bestandspad veranderd naar profile.php in plaats van Profiel.php, omdat de hoofdlettergevoeligheid ervoor zorgde dat de gebruiker naar een niet-bestaande pagina werd gestuurd.


8.Ik heb password_hashing() en password_verify() toegevoegd aan mijn inlog- en aanmeldingsproces.

9.Ik heb de id als primaire key  gemaakt en ervoor gezorgd dat deze niet meer null kan zijn.

10.Het probleem opgelost waarbij je de waarschuwing kreeg: "Warning: session_start(): Session cannot be started after headers have already been sent", heb ik gefixed door alle PHP-code naar regel 1 te verplaatsen.
