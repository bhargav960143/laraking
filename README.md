# 
<p align="center"><img src="http://www.trentiums.com/images/laraking/logo.png"></p>

<p align="center">
    <a href="#backers" alt="Backers of laraking">
        <img src="https://img.shields.io/badge/Sponsors-1-green.svg" /></a>
    <a href="#contributor" alt="Contributor of laraking">
        <img src="https://img.shields.io/badge/Contributor-1-green.svg" /></a>
    <a href="https://circleci.com/gh/badges/shields/tree/master">
        <img src="https://img.shields.io/teamcity/codebetter/bt428.svg"
            alt="Build status of laraking"></a>
    <a href="#license" alt="License of laraking">
            <img src="https://img.shields.io/badge/License-GPL%20V2-green.svg" /></a>
    <a href="#laravel" alt="Laravel version of laraking">
                <img src="https://img.shields.io/badge/Laravel-5.7-orange.svg" /></a>
    <a href="#contributor" alt="PHP version of laraking">
                    <img src="https://img.shields.io/badge/PHP-7.2.6-blue.svg" /></a>
</p>

<p> Laraking project aim is to create complete admin panel for beginners developer and help with real-world programming.</p>

Requirements
------------

What things you need to install the software and how to install them

|   Name     |   Condition   |   Version |
| :-----     |:-------------:|   -----:  |
| PHP        |      >=       |   7.2.*   |
| MYSQL      |      >=       |   5.7.*   |
| APACHE     |      >=       |   2.4.*   |
| LARAVEL    |      >=       |   5.7.*   |
| PHPSTROM   |      >=       |  2018.3.* |
| PHPMYADMIN |      >=       |   4.7.*   |


Instruction
------------

<p> Instruction to setup project in windows with wamp</p>

1. Go to your wamp64/www/project folder. Run below command.
    ```
    composer global require "laravel/installer"
    ```

2. Now create new laravel project. Run below command.
    ```
    laravel new
    ```

3. Prepare your .env file there with a database connection and other settings.
    ```
    Change your database credentials
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laraking
    DB_USERNAME=root
    DB_PASSWORD=
    ```
    
4. After env file update make sure clear config cache.
    ```
    php artisan config:clear
    ```    
    ```
    php artisan config:cache
    ```       

5. Run laravel in the local server.
    ```
    php artisan serve --port=8080
    ```

6. Migrate Laravel existing tables
    ```
    php artisan migrate
    ```
    
Screenshots
------------
```
Laraking Backend Login Screen

http://127.0.0.1:8080/securepanel/login
```
<p align="center"><img src="http://www.trentiums.com/images/laraking/laraking_backend.png"></p>

```
Laraking Backend Login Error

http://127.0.0.1:8080/securepanel/login
```
<p align="center"><img src="http://www.trentiums.com/images/laraking/laraking_backend_error.png"></p>
    
Package Installed
------------
- <p><a href="https://github.com/barryvdh/laravel-debugbar" title="Laravel Debugbar">Laravel Debugbar</a></p>
- <p><a href="https://github.com/spatie/laravel-permission" title="Laravel Tinker">Laravel Permission</a></p>
- <p><a href="https://github.com/antonioribeiro/tracker" title="Laravel Stats Tracker">Laravel Stats Tracker</a></p>
- <p><a href="https://github.com/maxmind/GeoIP2-php" title="GeoIP2 PHP API">GeoIP2 PHP API</a></p>

License
------------
<p>All assets and code are under the GPL V3.</p>

<p>The assets in logo/ are trademarks of their respective companies and are under their terms and license.</p>

Contributing
------------
<p>This project exists thanks to all the people who contribute.</p>

<p><a href="https://www.linkedin.com/in/bhargavpateldeveloper/" title="Bhargav Patel"><img src="https://media.licdn.com/dms/image/C5603AQGEq8eMvZ4Blw/profile-displayphoto-shrink_200_200/0?e=1542844800&v=beta&t=ffK3KX1wM49Ro5tTZwVSjLfpQYIv9daTaB5asYbeHDI" width="50px" height="50px"></a>&nbsp;<a href="#" title="Tejas Darji"><img src="http://www.trentiums.com/images/laraking/tejas.png" width="50px" height="50px"></a></p>

Sponsors
------------
<p>Support this project by becoming a sponsor. Your logo will show up here with a link to your website. </p>

<a href="http://www.trentiums.com/" title="Trentium Solution"><img src="http://www.trentiums.com/images/logo@2x.png" height="100px" width="120px"></a>

