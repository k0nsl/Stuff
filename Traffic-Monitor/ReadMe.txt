1. Put the client.php on your server that should be monitored.
Also install the packages screen and php5-cli

2. Ad a non priviliged user

3. Run the script under this user with:
screen -adms traffic php -S ServerIP:2222 -c client.php

You should be able to access the file now under http://ServerIP:2222/client.php

4. Put the cron.php on your master server, create a database, import the MySQL file.
Edit the Login details in the header of the cron.php, also in display.php

5. Put the cron.php into your crontab
*/1 * * * * /usr/bin/wget --spider http://yourserver.com/cron.php

You can also call your file local without wget, and please leave the --spider there, you dont want 10k files from your php script downloaded to your server.
Rename the cronfile also.

6. Go into PHPMyAdmin go to servers, in your database, click on add.
Put your servername into name, and the URL of the file where is it located.
http://YOURIP:2222/client.php

Click ok.

OR:

INSERT INTO `traffic`.`servers` (`id`, `name`, `uri`) VALUES (NULL, 'Test', 'http://YourIP:2222/client.php');


Done, after some minutes data should appear, if not you broke it, i guess.
