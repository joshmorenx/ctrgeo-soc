# HumHub with docker running properly

This project is indeed just **HumHub** and their whole system libraries added to run the easiest way possible with **Apache2** in it.

*This pushed image is prepared to execute this latest version of HumHub 1.8.2 running in a container it also has **Apache2** preloaded in it working fine*

Take in mind that the -rwx permissions are already given to the shellscripts in the **Dockerfile**, so we do not have give permissions to them again.

# Quickstart Guide
1. pull the image
2. Set the files and the terminal at a specific dir
3. **build & up** the dir  
4. check ports and run into a browser
5. access to **Adminer** just with user and password, no DB name needed
6. DROP *develop* database and then CREATE *develop* database again
7. config the whole 0.0.0.0:8083/humhub-1.8.2
8. HumHub is ready to go

# Starting Cron Jobs manually

**WARNING** execute this *Cron Job* only and only if the HumHub configuration is already completed

Running *Cron Jobs* can be easily executed by [cron -f], but if this isn't workin...

The way to run Cron Jobs properly it's just typing and executing the following steps:

- check your containers running and their IDs, the good one should be the container named *yourfoldername_api* -
- then at the terminal *docker exec -it <container_id> bin/bash* -

At the container terminal type *./raaan.sh* this script will be executed each 30s...

**To not stop the *Cron Job* JUST CLOSE THE TERMINAL do NOT use *exit*, do NOT use *CTRL+C* because this stops the *Cron Job* and this last is that we want to avoid**

# How do i know my *Cron Job* is running?

While you stay at the container you will see this messages repeating for the eternity and this is good

1. this sctipt will be executed each 30 seconds, this message will be showed just once
2. Starting process queue
3. Finished process queue
4. Starting process cron
5. Finished process cron
6. All processes done successfully! ... restarting processes

**To not stop the *Cron Job* JUST CLOSE THE TERMINAL do NOT use *exit*, do NOT use *CTRL+C* because this stops the *Cron Job* and this last is that we want to avoid**

# You already have a modified *main.php* and wants to use it instead the original one

- change the main.php at the folder where the *docker-composer.yaml* is -
- check your containers running and their IDs, the good one should be the container named *yourfoldername_api* -
- then at the terminal *docker exec -it <container_id> bin/bash* -

***warning** ./mooove.sh modifies the content of the main.php it could cause **yii framework** crash the so you can just **skip** this step*

Then at the containte run *moooove.sh* typing *./* at the beginning, so it will be just like **./mooove.sh**.

i **only** recommend to modify manually the *main.php* **only after the whole HumHub configuration is completed, it's all at your own risk doing it, this could cause you restarting all the installation process from the beginning**
