# Book project by FuelPHP framework

## Setup

We need to set up database first before starting application.

Run this script in MySQL console or workbench to create database name `book_db` and its tables `book`, `users`, `sessions`:

```mysql
create database if not exists `book_db`;
use `book_db`;
create table if not exists `books` (
                                       `id` INT PRIMARY KEY AUTO_INCREMENT,
                                       `title` VARCHAR(80) NOT NULL,
                                       `author` VARCHAR(80) NOT NULL,
                                       `price` DECIMAL(10, 2) NOT NULL
);
create table if not exists `users`(
                                      `id` int primary key auto_increment,
                                      `username` varchar(255) not null,
                                      `password` varchar(255) not null,
                                      `email` varchar(255) not null,
                                      `profile_fields` text not null,
                                      `group` int not null,
                                      `last_login` int(20) not null,
                                      `login_hash` varchar(255) not null,
                                      `created_at` int not null default '0',
                                      `updated_at` int not null default '0'
);
create table if not exists `sessions` (
                                          `session_id` varchar(40) primary key not null,
                                          `previous_id` varchar(40) not null,
                                          `user_agent` text not null,
                                          `ip_hash` char(32) not null default '',
                                          `created` int(10) unsigned not null default '0',
                                          `updated` int(10) unsigned not null default '0',
                                          `payload` longtext not null,
                                          unique key `PREVIOUS`(`previous_id`)
);
INSERT
INTO
    books(title,
          author,
          price)
VALUES(
          'The C Programming Language',
          'Dennie Ritchie',
          25.00
      ),(
          'The C++ Programming Language',
          'Bjarne Stroustrup',
          80.00
      ),(
          'C Primer Plus (5th Edition)',
          'Stephen Prata',
          45.00
      ),('Modern PHP', 'Josh Lockhart', 10.00),(
          'Learning PHP, MySQL & JavaScript, 4th Edition',
          'Robin Nixon',
          30.00
      );

```

Install WAMP Server to run application on local.

Copy all project folder into `www` folder of WAMP Server.

Access application at `http://localhost`

## More information

### Versions

This is the current version of all main libraries that project is using:

* FuelPHP - V.1.8.2
* MySQL - V.8.0.21
* PHP - V.7.3.21
* Apache - V2.4.46
