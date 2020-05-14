# docker-lamp-playground

(Repository di riferimento: https://github.com/sprintcube/docker-compose-lamp)

#### Setup
* Creare il file .env (duplicare da .env.sample)
* Creare cartella /config (duplicare da config.sample)
* Creare cartella /data
* Creare cartella /logs

#### Comandi
* Avviare i container: **make start (opzionale: opt=<options>)**
* Terminare i container: **make stop**
* Aggiornare dipendenze (composer): **make install**
* Installare un pacchetto (composer) : **make require pkg=<pacchetto_da_installare>**
* Debug Router (composer): **make routes**

