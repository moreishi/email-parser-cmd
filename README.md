# EMail Parser command APP
## _CAESAR IAN B._

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

Technologies used developing this app

- Linux, Apache, MySQL & PHP
- DDEV, Laravel Framework
- ✨Magic ✨

Patterns used:
- SOLID, DTO, Serivice & Repository
- Some PHPUnit tests are demonstrated


## Tech & Requirements

This App uses a number of open source projects to work properly:

- [DDEV](https://ddev.com/) - For Laravel docker container
- [Quasar Framework](https://quasar.dev/start/quick-start) - awesome Vue Framework components
- [Laravel](https://laravel.com/) - back-end framework

## Installation

Install the dependencies and devDependencies and start the server.

- [DDEV](https://ddev.com/) - Refer to the official website for the full installation guide.

Note: install DDEV on your local... first before doing steps below..

```sh
git clone git@gitlab.com:moreishi/email-parser-cmd
git checkout develop
```

Let's install setup laravel evironent first.

```sh
~# ddev config  
```
- complete the config setup
- select 'laravel' preconfig for the setup configuration
- make sure to use "./public" folder as webroot

```sh
~# ddev start
~# ddef launch 
```
- When configure is done run the above command
- when up and running take note on the web URL address proved from the terminal e.g http://127.0.0.1:56324 you will use it in the dotenv setup later.

## Continue
```sh
~# ddev import-db --file=locate_your_db.sql
~# ddev artisan migrarte
~# ddev artisan db:seed
~# ddev artisan storage:link
~# ddev artisan key:generate
```

Server file location -ls
```
~#: ls // type ls to show the file clone in the server named e.g email-parser-cmd
```

To run the command:
```
~#: ddev artisan app:parse-email // if run on ddev container
~#: php artisan app:paarse-email // if not run under ddev container
```

Done! 

## License

MIT

**Free Software, Hell Yeah!**
