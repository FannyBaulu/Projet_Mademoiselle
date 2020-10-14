# Mademoiselle website guide

This website is made for the company mademoiselle based in Porto who sells bakery and delicatessen products. They also have a restaurant.
This website presents all those services and will give the possibility to make a reservation or order products online by making a shopping cart.
It allows the admin to manage their products, orders and their reservations.
## Features

<b>Products Features</b>

| Feature  |  Coded?       | Description  |
|----------|:-------------:|:-------------|
| Add a Product | &#10004; | Ability of Add a Product on the System |
| List Products | &#10004; | Ability of List Products |
| Edit a Product | &#10004; | Ability of Edit a Product |
| Delete a Product | &#10004; | Ability of Delete a Product |

<b>User Management Features</b>

| Feature  |  Coded?       | Description  |
|----------|:-------------:|:-------------|
| List Users | &#10004; | Ability of List Users |
| Edit a User | &#10004; | Ability of Edit a User |
| Delete a User | &#10004; | Ability of Delete a User |

<b>Purchase Features</b> 

| Feature  |  Coded?       | Description  |
|----------|:-------------:|:-------------|
| Create a Cart |  &#10004; | Ability of Create a new Cart |
| See Cart |  &#10004; | Ability to see the Cart and it items |
| Remove a Cart |  &#10004; | Ability of Remove a Cart |
| Add Item |  &#10004; | Ability of add a new Item on the Cart |
| Remove a Item |  &#10004; | Ability of Remove a Item from the Cart |
| Checkout |  &#10004; | Ability to Checkout |

## Requirements:

In order to use this software, you will need to following programs:

- Visual Studio Code
- MySQL Workbench
- Laravel 7.0
- Bootstrap 4.4
- PHP 7.3.14

## Installation

### Database

Into your workbench,once you enter as connected, run each scripts you got in the "scripts" file.

### Visual Studio Code/Laravel/Launching

First, open Visual Studio Code and open the file "mademoiselle_projet" obtained from the clone URL.

####Install PHP:

Download this:
[](url)https://windows.php.net/downloads/releases/php-7.3.16-nts-Win32-VC15-x64.zip

Unzip it in the program files.


Add in to the path in the environment variables the path to the folder.

####Install Composer:
[](url)https://getcomposer.org/doc/00-intro.md

Then you need to install Laravel if you don't have it already:


 Use this command :
` composer global require laravel/installer`


For authentication process
`composer require laravel/ui` 

####Link to Workbench:

After this, you need to link your workbench with the program.

In order to do so, open the .env file and in the method "private Database" change the username and the password according to your Workbench access informations.

 ![Screenshot](env_changement.PNG)

####Launching Server:

Once you are done, you should be able to launch the app.


 Use this command:
` php artisan serve`



## Software Guidance

To use the interface, you will have three different usage:
-As a simple visitor

-As a user: For this you need to register and then log in to access to different view.

-As an admin: For this you need to check the UsersTableSeeder to get the necessary information to log as an admin. But before to do so you need to use this command:

`php artisan migrate:refresh --seed`

Once it's done you can log in and get access to the products and user managements.


[![forthebadge](http://forthebadge.com/images/badges/built-with-love.svg)](http://forthebadge.com) 

## Technology Used
PHP language for the source code, SQL Workbench for the database and Bootstrap/CSS for the front-end.
