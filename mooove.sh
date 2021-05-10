echo "renaming the original main.php site to main-original.php"
mv /var/www/html/humhub-1.8.2/protected/humhub/views/layouts/main.php main-original.php

echo "renaming the modified main site to the humhub index"
mv /var/www/html/humhub-1.8.2/protected/humhub/views/layouts/main1.php main.php
echo "done!"

echo "moving the main.php to its original location"
mv main.php /var/www/html/humhub-1.8.2/protected/humhub/views/layouts/
echo "done"
