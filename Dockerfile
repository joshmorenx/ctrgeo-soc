FROM cuchio/ctgeo-soc:1.0

MAINTAINER josh joshuamoreno21@gmail.com

#copies the script to move directories and files
COPY mooove.sh /mooove.sh

#copies the cron script to the container
COPY raaan.sh /raaan.sh

#gives exec permission to mooove.sh
RUN chmod -R 777 mooove.sh

#gives exec permission to raaan.sh
RUN chmod -R 777 raaan.sh

#copies the compressed theme to the container
COPY ctgeo.zip /ctgeo.zip

#copies the modified main site of humhub to the container
COPY main.php /main1.php

#decompresses the Centro Geo theme 
RUN unzip ctgeo.zip

#moves the Centro Geo theme folder to the HumHub theme folder 
RUN mv /ctgeo /var/www/html/humhub-1.8.2/themes/

#moves the modified main site to the container
RUN mv main1.php /var/www/html/humhub-1.8.2/protected/humhub/views/layouts

EXPOSE 80
CMD /usr/sbin/apache2ctl -D FOREGROUND
