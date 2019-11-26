LAB CAVE SKILL TEST
=======================

- [LAB CAVE SKILL TEST](#lab-cave-skill-test)
  - [Main description](#main-description)
  - [Installing Symfony](#installing-symfony)
  - [Details](#details)

## Main description
Create and develop a catalog with the characters from the Star Wars movies using an external API Swapi.co ( https://swapi.co/documentation )

## Installing Symfony
1. Make sure you have installed
    - PHP 7.2.9 or higher and these PHP extensions (which are installed and enabled by default in most PHP 7 installations): Ctype, iconv, JSON, PCRE, Session, SimpleXML, and Tokenizer;
    - Install [Composer](http://getcomposer.org), which is used to install PHP packages;
    - Install [Symfony](https://symfony.com/download)

2. Download this repository.

3. Run the following command in the root of the repository:
```bash
composer install
```

4. Run the application locallg using:
```bash
symfony server:start
```
The local server must be running now in 
```
http://127.0.0.1:8000/
```

## Details

The "front" view of the application is accesible though the following route:

```
http://127.0.0.1:8000/character/viewer
```

It is a simple HTML built with TWIG which uses the [JQuery] (https://jquery.com/) framework to make requests via AJAX 
to the "backend" and then processing the data and displaying it in a table constructed with [DataTables](https://datatables.net/) and [Bootstrap 4](https://getbootstrap.com/)

This AJAX request is retrieving info via POST from the following route:
```
http://127.0.0.1:8000/get/characters
```
Which admits the following parameters
- page [int]: number of page you want to retrieve (default 1)
- noCache [boolean]: determines if cached data is being used or not (default false)

Using cache, each request will be cached for 5 minutes.
This value can be modified changing the variable
```
const MINS_TO_EXPIRE_CACHE = 5 @ src\StarWarsService.php
```
