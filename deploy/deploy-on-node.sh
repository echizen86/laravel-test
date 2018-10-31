#!/usr/bin/env bash
####################################################

####################################################
## Check For Repo And Clone If Needed
####################################################
if [ -d /opt/fpbxlink ]; then echo 'Exists'; else git clone git@bitbucket.org:fastpbx/fpbxlink-laradock.git /opt/fpbxlink; fi

####################################################
## Change Working Directory To Root
####################################################
cd /opt/fpbxlink

####################################################
## Get Checkout & Pull
####################################################
git pull

####################################################
## Change Working Directory To laradock
####################################################
cd /opt/fpbxlink/laradock

####################################################
## Run Docker Commands
####################################################
docker-compose -f docker-compose-prod.yml build
docker stop $(docker ps -aq)
docker-compose rm -f
docker-compose -f docker-compose-prod.yml up -d

####################################################
## Wait For Containers To Boot
####################################################
sleep 5

####################################################
## Run Dependencies Script
####################################################
docker-compose exec -T workspace bash < ../deploy/composer-install.sh