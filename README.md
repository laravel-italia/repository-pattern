# Repository Patter in Laravel

## Dominio dell'applicazione "PijaStoGioco.com"

PijaStoGioco.com (come suggerisce il nome) è un ecommerce che opera su prodotti videoludici retró.

Tutti i prodotti sono digitali e caricati da alcuni brand che hanno acquistato i diritti dei videogame.

Il punto di forza di PijaStoGioco.com sono le recensioni grazie alle quali gli utenti sono sicuri di scaricare e pagare per videogiochi perfettamente e testati sui funzionanti sui principali emulatori.

L'ecommerce offre funzioni di login/registrazione degli utenti e dei brand i quali utilizzeranno il famosissimo gateway di pagamenti "DammeLiSordi.com" che da la possibilità di scambiare denaro tramite l'id di un cliente ed un codice che verifica e permette la transazione.

Gli utenti durante la registrazione dovranno inserire:

- Username (deve essere unico)
- Email (deve essere unico)
- Password 
- Immagine profilo (opzionale).

I brand invece necessitano di: 
- Nome (deve essere unico)
- Email (deve essere unico)
- Password
- Immagine profilo 
- Client id del gateway di pagamenti

I Brand sono in grado di inserire videogiochi nella propria libreria elencandone:

- Titolo
- Anno di uscita
- Brand d'appartenenza
- Lista di emulatori sui quali il gioco è stato testato e perfettamente funzionante

Per poter inserire un recenzione l'utente deve aver acquistato il videogame tramite PijaStoGioco.com e dare un voto da 1 a 10 ed una descrizione di massimo 100 caratteri.