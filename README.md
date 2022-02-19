# tsens
uses AMG8833 Grid-EYE thermal sensor to monitor an object

for an example, visit http://mkwak.org/tsens/list8833.php?no=529471

# installation [device]
1. assemble parts for the thermal sensor - put published article's DOI here
2. edit line 16-17 of 'amg8833atMCU' with your own wi-fi setting
3. edit line 24 of 'amg8833atMCU' with your own web address for sending T-values
4. edit line 29 of 'amg8833atMCU' with your own recording interval (amg_time = 5000, default is 5 second)
5. upload the code to your MCU board
6. turning its power on will start measurement of temperature

# installation [mysql]
1. on MySQL (or MariaDB), run 'schema.sql' to create table

# installation [web]
1. copy all files to a php-enabled folder with access
2. make 'images' folder with write permission for all (chmod 777)
3. edit 'mysql_setting.php' with your server account
4. run 'list8833.php' to navigate recorded data

# further notes
  * total number of recording less than 60 won't be visible on the list page (line 10 on 'list8833.php')  

# etc
One can use imageMagick to generated animated GIF files. 

$ convert -delay 20 -loop 0 717736_*.png 717736_movie.gif
