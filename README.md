# docker-lamp-playground

(Repository di riferimento: https://github.com/sprintcube/docker-compose-lamp)

#### Setup
* Creare il file .env (duplicare da .env.sample)
* Creare cartella /config (duplicare da config.sample)
* Creare cartella /data
* Creare cartella /logs
* Eseguire il comando: **make setupdev**

#### API Test
* Ping: http://localhost/api/ping
* Elenco soggetti (lettura da db): http://localhost/api/soggetti
* Lettura valore di esempio dalla cache (Redis): http://localhost/cache/getsample
* Scrittura valore di esempio dalla cache (Redis): http://localhost/cache/putsample

#### Tool
* phpMyAdmin: http://localhost:8080

#### Comandi di utilità
* Setup: **make setup**
* Avviare i container: **make start (opzionale: opt=<options>)**
* Terminare i container: **make stop**
* Aggiornare dipendenze (composer): **make install**
* Installare un pacchetto (composer) : **make require pkg=<pacchetto_da_installare>**
* Debug Router (composer): **make routes**
* Esegue tutti i test (phpunit): **make test**
* Esegue migration (Doctrine): **make migrate**

#### Comandi specifici per lo sviluppo
* Setup: **make setupdev**
* Creazione/Modifica entità (Doctrine): **make entity**
* Creazione migration (Doctrine): **make migration**
* Popolamento iniziale db (Doctrine Fixtures): **make fixtures**
