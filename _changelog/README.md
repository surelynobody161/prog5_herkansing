# change log

# 7 oktober
>in web.php een home route gemaakt.

> in web.php een about-us route gemaakt.

> de about-us route vervangen met een AboutUsController

> AboutUsController gevuld met een string.

# 10 oktokber
> eindproject opgezet 

> nieuwe ProductController gemaakt.

> links gemaakt die hen en terug kunnen linken van producten pagina naar contact.

> nieuwe manier om een route aan te roepen in een blade met een href.


# 14 oktokber
> afwezig

 # 15 oktober
> database rij aangemaakt in phpstorm

> migration aangemaakt

> breeze opnieuw geinstalleerd

# 17 oktober
> ERD bijgewerkt

> models aangemaakt en een form werkend gekregen met de database

> comments model aangemaakt

# 19 oktober
> database beter gemaakt.

> nieuwe validaties toegevoegd aan formulieren.

> rollen ingesteld voor admin en user rechten.

> homepagina layout verbeterd .

# 23 oktober
> tests uitgevoerd voor de registratie- en inlogfunctionaliteiten.

> beveiliging toegevoegd tegen brute-force aanvallen bij login.

# 28 oktober
> contactformulier uitgebreid met validatie voor verplichte velden.

> blade-template updates gedaan voor een betere look.


# 1 november
> nieuwe migraties toegevoegd voor extra kunstwerken.

> foutmeldingen bij formulierinvoer duidelijker gemaakt voor gebruikers.

> zoekfunctie uitgebreid met filteropties voor categorie.


> user stories aangemaakt
# Userstories 


**Registratie en Inloggen User Story:**
: Als gebruiker wil ik me kunnen registreren en inloggen, zodat ik mijn profiel en mijn kunstwerken kan beheren.
: **taken:**
: maak een registratieform met velden die verplicht ingevult moeten worden zoals email gebruikersnaam en wachtwoord.
: maak een wachtwoordvalidatie systeem, bijvoorbeeld wat een wachtwoord een bepaalde lengte moet zijn met verschillende tekens enzovoort.
: inlogpagina functioneel maken zodat er bijvoorbeeld een melding word gegeven als je inloggegevens niet correct zijn.
: **MoSCoW: must have**

**Gebruikers en Adminrechten User Story:**
: Als admin wil ik toegang hebben tot een admin dashboard waar ik de content van gebruikers kan beoordelen zodat de website netjes blijft.
: **taken:**
: Maak een admin dashboard waar alle kunstprojecten/gebruikers zichtbaar zijn.
: Admins moeten kunstwerken en/of gebruikers kunnen verwijderen 
: een autorisatie systeem maken zodat alleen ingelogde gebruikers kunstwerken kunnen toevoegen 
 : **MoSCoW: must have**

**Kunststukken Uploaden User Story:**
: Als gebruiker wil ik mijn kunst kunnen uploaden en een beschrijving kunnen toevoegen zodat andere mensen mijn werk kunnen zien en hierop kunnen reageren.
: **taken:**
: maak een form voor het uploaden van afbeeldingen/video's.
: Voeg velden toe zoals "Titel", "Beschrijving", en "Categorie"
: Sla een kunstwerk op zodat hij correct is gekoppeld aan de gebruiker.
: **MoSCoW: must have**

**Zoeken en Filteren van Kunstwerken User Story:**
: Als gebruiker wil ik kunstwerken kunnen zoeken en filteren op kunstvorm en bijvoorbeeld thema, zodat ik snel content kan vinden waar ik naar zoek.
: **taken:**
: Voeg een zoekbalk toe die zoekt op titel en beschrijving van kunstwerken.
: Maak een dropdown-lijst voor het filteren op categorieën.
: **MoSCoW: could have**

**Reacties en Feedback Systeem User story:**
: Als gebruiker wil ik reacties kunnen geven op de kunst van anderen zodat ik mijn mening kan delen.
: **taken:**
: maak een reactiesectie onder elke kunstpost.
: Voeg validatie toe aan de reactiesectie (zoals maximale lengte aan characters).
: Maak het zodat alleen ingelogde gebruikers kunnen reageren.
: **MoSCoW: should have**


**Beveiliging en Validatie User Story:**
: Als admin wil ik dat de website goed beveiligd is zodat gebruikers veilig kunnen inloggen en content kunnen uploaden, zonder het risico van misbruik.
:**taken:**
: Voeg validatie toe aan alle formulieren, zelfs bij het uploaden van bestanden.
: Voeg beveiliging toe aan de website tegen xxscripting en sql injecties.
: **MoSCoW: must have**

![ERD.png](images/ERD.png)

:
:ggdfgdfg

 
wachtwoord: 12345@gmail.com drumles2004
