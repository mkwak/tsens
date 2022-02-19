# tsens
uses AMG8833 Grid-EYE thermal sensor to monitor an object

# installation [device]
1. assemble parts for the thermal sensor - put published article's DOI here
2. edit 'amg8833atMCU' with your own wi-fi setting
3. upload the code to your MCU borad
4. turning power on will start measurement of temperature

# installation [database]
1. on MySQL of MariaDB, run schema.sql to create table

# installation [interface]
1. copy all files to a php-enabled folder with access
2. make 'images' folder with write permission for all (chmod 777)
3. edit 'mysql_setting.php' with your server account
4. run 'list8833.php' to navigate recorded data

# etc
One can use imageMagick to generated animated GIF files. 

$ convert -delay 20 -loop 0 717736_*.png 717736_movie.gif
