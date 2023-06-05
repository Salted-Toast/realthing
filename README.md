# Occupational Specialism Submission

## Table of Contents

- [Scenario](#scenario)
- [How to View](#how-to-view)
- [Miscellaneous](#miscellaneous)

## Scenario

Health Advice Group is a charitable organisation that provides health advice to people living in extreme weather conditions and I have been tasked with develeoping a digital solution to assist them extending their reach and breaking into the digital sector.

## How to View

- If you have no interest in being able to edit it yourself you can visit [where I have hosted it](https://feedback.remote.ac) otherwise follow the steps below.
- Download xampp by running `winget install ApacheFriends.Xampp.8.2`.
- Remove content from htdocs folder with command `Remove-Item C:\xampp\htdocs\* -Recurse`. (assuming you installed it on the C drive)
- Clone this repository into the same directory using this `git clone https://github.com/morrison-page/realthing.git C:\xampp\htdocs\`.
- Launch xampps control panel and start the 'Apache' and 'MySQL' Modules.
- Open PhpMyAdmin by clicking the 'Admin' button for MySQL.
- Create a new database called 'occupational_specialism' and import the SQL file found in the database directory.
- Now open the 'Admin' tab for Apache and voila.

## Miscellaneous

Made with:

- [PHP](https://www.php.net)
- [Bootstrap](https://getbootstrap.com)
- [MySQL](https://www.mysql.com) [(PhpMyAdmin)](https://www.phpmyadmin.net)
- [Google Charts](https://developers.google.com/chart)
- [Openweathermap APIs](https://openweathermap.org)
- JavaScript
- HTML
- CSS

> .htaccess file is for appache web servers for nice address-bar links (wont work without)
