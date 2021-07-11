# Q1 Answer
* a  refer to route http://127.0.0.1:{port}/insert
* b  refer to route http://127.0.0.1:{port}/insert
* c  refer to route http://127.0.0.1:{port}/update
* d  refer to route http://127.0.0.1:{port}/delete

* Q1a, Q1b
## terminal : curl --data 'data={ "first_name": "Chris", "last_name": "Stone", "score": 800, "count": 8 }'  http://localhost:11111/insert  

* Q1c
## termial : curl --data 'data={ "id":1, "score": 995, "count": 8 }'  http://localhost:11111/update 

* Q1d
## terminal : * * * * * ( sleep 10 ; /usr/bin/wget http://api.us/application/ ) 

# Q2 using crontab to run cron.script.php
* step1 -> cd to interview directory
* step2 -> terminal : sudo crontab -e
* step3 -> using vim to config crontab as below

* crontab
## * * * * * ( sleep 10 ; /usr/bin/php var/www/html/example.com/interview/cron.script.php ) 