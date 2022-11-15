# test-for-mirai

How to use

1. Create new server in nginx, whatever. Index file located in frontend/web.
2. Run composer install.
3. Add database credentials to frontend/config/database.php.
4. Add timezonedb credentials to frontend/config/source.php
5. Run php frontend/config/dbseed.php to fill table city in database.
6. Api has two methods:
a. get-local-time for local time getting.
required params city_id:string, timestamp:int
b. get-timestamp for getting utc timestamp by local time string
required params city_id:string, localtime:string