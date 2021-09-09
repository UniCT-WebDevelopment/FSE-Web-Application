# FSE web application

In questo progetto è stata creata una web application per la gestione del Fascicolo Sanitario Elettronico per la Sicilia.

## Installation Mock Server
Per l'istallazzione del Mock Server è necessario utilizzare il software SoapUI. Aperto il software, dal tasto in alto a destra seguire il percorso: <br> File -> Import Project e caricare il file " *MockServer-FSE-soapui-project.xml* " che si trova nella cartella "Mock server". <br>Successivamente aprire il progetto e poi il primo file della cartella dove si aprirà un'iterfaccia e cliccando sul play verde si avvierà il server alla porta 8888 di localhost.

## Installation Database
Per l'istallazione del database è necessario utilizzare il software PhpMyAdmin. Aperto il software creare un progetto vuoto dal titolo " *login_fse_tesi* " e successivamente andare su Import nel menu orizzalante e caricare il file "*login_fse_tesi .sql* " che si trova nella cartella DB.

## Start web application
Il progetto è stato creato con il framework Laravel v.8, PHP v.8.0.2. Effettuato il download del progetto, aprire la cartella fse-front-end-LOGIN con un editor di testo come Visul Studio Code, aprire il terminale e digitare il comando:

```bash
php artisan serve
```
per avviare il progetto.
L'applicazione sarà esposta alla porta 8000 di locahost.

### Web Application come funziona
Le credenziali per effettuare il login sono: Email = testonitrento@gmail.com , Password = prova123 .
Non è stato previsto form per la registrazione perchè si presuppone si utilizzino credenziali SPID non attivabili dal sito.
Dal menu a sinistra è possibile accedere:
  - dalla sezione **Stato Consensi** ai consensi espressi;
  - dalla sezione **Ricerca Documenti** visionare i documenti sanitari;
  - dalla sezione **Recupero Informativa** visionare l'informativa;
  - dalla sezione **Recupero Modulistica** visionare la modulilstica.

<br>
Dalle box a destra è possibile visionare informazioni sul Fascicolo Sanitario Elettronico.