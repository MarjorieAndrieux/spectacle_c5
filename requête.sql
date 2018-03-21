
    /*Afficher tous les clients.*/
        SELECT * 
        FROM clients

    /*Afficher tous les types de spectacles possibles.*/
        SELECT type 
        FROM showTypes

    /*Afficher les 20 premiers clients selon leur identifiant.*/
        SELECT * 
        FROM clients 
        LIMIT 20 

    /*N’afficher que les clients possédant une carte de fidélité.*/
        SELECT lastname, firstName 
        FROM cards 
        INNER JOIN cardTypes ON cards.cardTypesId=cardTypes.id 
        INNER JOIN clients ON cards.cardNumber=clients.cardNumber 
        WHERE clients.cardNumber IS NOT null AND type= 'Fidélité' 

    /*Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M". Les afficher comme ceci : Nom : Nom du client Prénom : Prénom du client (Trier les noms par ordre alphabétique.)*/
        SELECT lastname, firstname 
        FROM clients 
        WHERE lastname 
        LIKE 'M%' 
        ORDER BY lastName ASC 

    /*Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique. Afficher les résultat comme ceci : Spectacle par artiste, le date à heure.*/
        SELECT title, performer, date, starttime 
        FROM shows 
        ORDER BY title ASC 

    /*Afficher tous les clients comme ceci : Nom : Nom de famille du client Prénom : Prénom du client Date de naissance : Date de naissance du client Carte de fidélité : Oui (Si le client en possède une) ou Non (s'il n'en possède pas) Numéro de carte : Numéro de la carte fidélité du client s il en possède une.*/
        SELECT lastname, firstname, birthdate, card, cardnumber 
        FROM clients