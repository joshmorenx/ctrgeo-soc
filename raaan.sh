echo "this sctipt will be executed each 30 seconds, this message will be showed just once"
while [ 1 ]
do
    echo "Starting process queue"
    sleep 5s
    php /var/www/html/humhub-1.8.2/protected/yii queue/run
    echo "Finished process queue"
    sleep 5s
    echo "Starting process cron"
    php /var/www/html/humhub-1.8.2/protected/yii cron/run
    echo "Finished process cron"
    echo "All processes done successfully! ... restarting processes"
    sleep 20s
done
