# E-Mail Parser command APP
## _CAESAR IAN B._

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

Technologies used developing this app

- Linux, Apache, MySQL & PHP
- DDEV, Laravel Framework
- ✨Magic ✨

Patterns used:
- SOLID, DTO, Service & Repository
- Some PHPUnit tests are demonstrated


## Tech & Requirements

This App uses a number of open source projects to work properly:

- [DDEV](https://ddev.com/) - For Laravel docker container
- [Laravel](https://laravel.com/) - back-end framework
- [Insomnia.rest](https://insomnia.rest) - Api development and documentation

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
~#: ~/email-parser-cmd
```

Open and run these in separate terminals:
```
~#: ddev artisan schedule:work // to monitor and trigger commands e.g hourly
~#: ddev artisan queue:work // to monitor and trigger jobs
```

To run the command:
```
~#: ddev artisan app:parse-email // if run on ddev container
~#: php artisan app:parse-email // if not run under ddev container
```

Running the PHP built-in server.
```
~#: cd email-parser-cmd
~#: php -S x.x.x.x:80 public/index.php // replace x.x.x.x of your server IP use port 80
```

Done! 

## Insomnia

An API documentation for the route is provided using insomnia. Import the insomnia file located path below.
```
~#: email-parser-cmd/insomnia/Insomnia_2024-07-03.json

import this file in insomia software
```

- [Insomnia.rest](https://insomnia.rest) - Api development and documentation


## License

MIT

**Free Software, Hell Yeah!**
