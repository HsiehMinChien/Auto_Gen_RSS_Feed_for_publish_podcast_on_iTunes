# Auto_Gen_RSS_Feed_for_publish_podcast_on_iTunes
Auto generate RSS Feed for publish podcast on iTunes

## Introduction

An feature that can auto generate RSS feed for publish podcast on iTunes.   

## Requirements

- PHP Version 7.0.19      
- MySQL Version 5.6.35-81.0   
- Https website.    

## System feature
Auto generate RSS Feed file for pubilsh podcast on iTunes.    

## DEMO system

If you need a sample to refer, please click following url. This system is built from me.    
https://jeffhsieh.000webhostapp.com/    

## How to build this system?

After install PHP and MySQL (Or go to apply an server which support PHP+MySQL for test)   
- Modify the setting in config.php:   
  Please modify config.php file for your system.    

- Create table in your MySQL database.   

Table format    
+---------------+------------------+------+-----+-------------------+-----------------------------+       
| Field         | Type             | Null | Key | Default           | Extra                       |       
+---------------+------------------+------+-----+-------------------+-----------------------------+       
| serial        | int(10) unsigned | NO   | PRI | NULL              | auto_increment              |       
| title         | varchar(255)     | NO   |     | NULL              |                             |       
| description   | varchar(255)     | NO   |     | NULL              |                             |       
| file_location | varchar(32)      | YES  |     | NULL              |                             |       
| time          | tinyint(4)       | YES  |     | NULL              |                             |        
| type          | timestamp        | NO   |     | CURRENT_TIMESTAMP | on update CURRENT_TIMESTAMP |     
| display       | tinyint(4)       | NO   |     | NULL              |                             |   
| feed          | tinyint(4)       | NO   |     | NULL              |                             |       
+---------------+------------------+------+-----+-------------------+-----------------------------+     

