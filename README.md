# CatchUp CRM

##Installation



### Clone this project into your working directory.

Example:

```
$ git clone https://github.com/altinukshini/hackerspacecrm.git
Cloning into 'hackerspacecrm'...
remote: Counting objects: 2741, done.
remote: Compressing objects: 100% (161/161), done.
remote: Total 2741 (delta 85), reused 0 (delta 0), pack-reused 2579
Receiving objects: 100% (2741/2741), 6.94 MiB | 1.26 MiB/s, done.
Resolving deltas: 100% (1423/1423), done.
Checking connectivity... done.
```


### Installing Composer Dependencies

From the project directory, run the following command. You may need to download `composer.phar` first from http://getcomposer.org

```bash
$ composer install
```


### Configure Environment

You will need to make a copy of the example environment configuration schema and enter your own details into.

Example:

```bash
$ cp .env.example .env
```

Now fill up the DB_ and MAIL_ variables with your details.

Example:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hackerspacecrm
DB_USERNAME=username
DB_PASSWORD=password

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=username@gmail.com
MAIL_PASSWORD=password
MAIL_ENCRYPTION=tls
MAIL_FROM='Hackerspace CRM'
```

### Generate application key

From the project directory, run the following command.

```bash
$ php artisan key:generate
```


### Configure application

You will need to edit the **config/hackerspacecrm.php** config file and enter your own details into. Please pay attention to the variable comments and follow the instructions in that file.

### Run Migrations

To run migrations, make sure you are in the root directory for the project and run the following:

```bash
$ php artisan migrate
```

### Run Seeds

To run database seeds, make sure you are in the root directory for the project and run the following:

```bash
$ php artisan db:seed
```
