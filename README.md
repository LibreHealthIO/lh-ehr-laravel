<p align="center">
    <a href="#" target="_blank">
        <img src="https://librehealth.io/img/logo.png" height="100px"/>
    </a>
    <h1 align="center">LibreHealth EHR</h1>
    <br/>
</p>

LibreHealth EHR is a free and open-source electronic health records and medical practice management application.

The mission of LibreHealth is to help provide high quality medical care to all people, regardless of race, socioeconomic status, or geographic location, by providing medical practices and clinics across the globe access to free of charge medical software. That same software is designed to save clinics both time and money, which gives practitioners more time to spend with individual patients, thereby supplying patients with higher quality care.

We are current and former contributors to OpenEMR and thank that community for years of hard work. We intend to honor that legacy by allowing this new community to leverage the good things in OpenEMR, share what we create and not be afraid to break backward compatibility in the name of forward progress and modern development models.

We are collaborating closely with the [LibreHealth Project](http://librehealth.io), an umbrella organization for health IT projects with similar goals.


## Table of Contents

1. [Requirements](#requirements)
3. [Installation](#installation)
4. [Usage](#usage)
5. [Documentation](#documentation)
6. [Change log](#change-log)
7. [Testing](#testing)
8. [Contributing](#contributing)
9. [Security](#security)
10. [Credits](#credits) 
11. [License](#license)


## Requirements
Make sure your server meets the following requirements.

-   Apache 2.2+ or nginx
-   MySQL Server 5.7.8+ , Mariadb 10.3.2+ or PostgreSQL
-   Composer installed 1.9+
-   PHP Version 7.2.x+

### PHP extensions 

Make sure you have the following php extensions enabled 
```
bz2, curl, date, dom, exif, gd, gettext, grpc,
imagick, intl, json, libxml, mbstring, mysqli, mysqlnd, openssl, PDO,
pdo_mysql, posix, protobuf, soap, sqlite3, xml, xmlreader, xmlrpc, xmlwriter
xsl, zip, zlib
```


## Code Quality/Tools
Make sure your server meets the following requirements.

-   [Php CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) 


## Installation

Install composer with the help of the instructions given [here](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos) 
``` bash  
$ wget https://getcomposer.org/composer.phar
$ chmod +x composer.phar
$ mv composer.phar /usr/local/bin/composer
```  

Install Node.js/NPM with the help of the instructions given [here](https://nodejs.org/en/download/package-manager/)

Linux/Unix `yum install npm` OR using MacOs `brew install node`

Fork and/or clone this project by running the following command
``` bash  
$ git clone https://github.com/LibreHealthIO/lh-ehr-laravel.git 
```

Navigate into the project's directory
``` bash  
$ cd lh-ehr-laravel
```

Copy .env.example for .env and modify according to your credentials
```bash
cp .env.example .env
```

Run this command to install dependencies
```bash
composer insatall --prefer-dist
```
This command will install all dependencies needed by the Akivas platform to run successfully!

Generate application key
```bash
 php artisan key:generate
```

Install npm/yarn dependencies  (Preference is using **Yarn**)
```bash
npm install or yarn install 
```


This command will help migrate the database and populate the database!
```bash
php artisan migrate --seed
```

Or if for any reason, you wish to reset the database later, you can run
```bash
php artisan migrate:fresh --seed
```


## Usage

Run yarn/npm in dev mode
`npm run dev` OR `yarn run dev`
 
For live building of components while developing, you can run

`npm run watch` OR `npm run watch-poll`
 

Run the default laravel server
```bash
php artisan serve
```

If you want to serve to another port for example (3000), Run the following
```bash
php artisan serve --host=<your_ip_address> --port=8000
```

To view LibreaHealth's EHR Platform, go to:
```php
http://localhost:8000/
```

## Change log  
  
Please see the [changelog](changelog.md) for more information on what has changed recently.  
  
## Testing  

Testing is very essential as this helps us to avoid bad practices and breaking code.
To test the application, ensure to have the test env variables in the `.env.testing` file, if not create one using the
`cp .env.example .env.testing`

```
TEST_DB_HOST=127.0.0.1
TEST_DB_DATABASE=lh_ehr_testing
TEST_DB_USERNAME=root
TEST_DB_PASSWORD=
```

Create a database for testing. Here, we will be using mysql for our db test since it supports column dropping etc, 
You can use **pgsql**, if you like by changing the default connection `lh_ehr_testing` driver pgsql in the `config/database.php`.

By default, the test connection is added to the `phpunit.xml` file. Feel free to edit this if needed to suit your custom 
database connection by changing the `<env name="DB_CONNECTION" value="lh_ehr_testing"/>` to 
`<env name="DB_CONNECTION" value="custom_connection"/>`

Create the test database **(lh_ehr_test)** and re-migrate your data and seed using the following command
` php artisan migrate --database=lh_ehr_testing  `
` php artisan db:seed --database=lh_ehr_testing  `
    
Or fresh install `php artisan migrate:fresh --database=lh_ehr_test --seed`

  
Run the tests using:
``` bash  
$ composer test  
```  

## Documentation
Official documentation is available [Here](https://docs.librehealth.io/projects/ehr/index.html).


## Troubleshooting

Before opening an issue, please refer to the [troubleshoot guide](troubleshooting.md)
  
## Contributing  
  
Please see [contributing.md](contributing.md) for details and a todolist.  

## Security  
  
If you discover any security related issues, please email infra@libreahealth.io 
instead of using the issue tracker.  
  
## Credits  
  
- [Priyanshu Sinha](https://github.com/pri2si17-1997)
- [Mua Rachmann](https://github.com/muarachmann)

  
## License  
  
LibreHealth EHR is primarily licensed under Mozilla Public License Version 2. 
The code inherited from OpenEMR is licensed under GPL 2 or higher. This project is a part of the 
[Software Freedom Conservancy](http://sfconservancy.org/) family.

Thank you for your support!
