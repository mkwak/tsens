# tsens
One can use AMG8833 Grid-EYE thermal sensor to monitor an object.

For an example of operation, visit http://mkwak.org/tsens/list8833.php?no=529471

A full story of this work is available at http://dx.doi.org/10.1002/bkcs.12528.
Please cite the article if you find this code is useful: Bull. Kor. Chem. Soc. 2022. 

![output as an image](https://github.com/mkwak/tsens/blob/main/example/529471_img.png)

# Installation#1 [device]
1. Assemble parts for the thermal sensor - (https://github.com/mkwak/tsens/blob/main/device/pin_mapping.png)
2. Edit lines 16-17 of 'amg8833atMCU' with your own wi-fi setting
3. Edit line 24 of 'amg8833atMCU' with your own web address for sending T-values
4. Edit line 29 of 'amg8833atMCU' with your own recording interval (amg_time = 5000, default is 5 second)
5. Upload the code to your MCU board
6. Turning its power on will start measurement of temperature

# Installation#2 [mysql]
1. On MySQL (or MariaDB), run 'schema.sql' to create an empty table
```
$ mysql -h localhost -u USERNAME -p DBNAME < schema.sql
```

# Installation#3 [web]
1. Copy all files to a php-enabled folder with access
2. Make 'images' folder with write permission for all (chmod 777)
3. Edit 'mysql_setting.php' with your server account
4. Run 'list8833.php' to navigate recorded data


# Notes
  * Developed and tested under PHP 7 (GD enabled), MySQL 8, and Apache 2 on Ubuntu 20.04
  * For MySQL insertion through HTTP-post, we edited a PHP code from Rui Santos to make the PHP work with 8x8 IR sensor.
  : https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
  * Total number of recording less than 60 won't be visible on the list page (line 10 on 'list8833.php')  
  * Tip#1: Use imageMagick to generated animated GIF files. On command line interface: 
  ```
  $ convert -delay 20 -loop 0 529471_*.png 529471_movie.gif
  ```
  * Bug: eyes8833.php does not run on PHP 5
