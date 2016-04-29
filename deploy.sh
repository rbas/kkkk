#!/bin/sh

BUILD_NAME=$(date +"%Y-%m-%d-%y-%H:%I.%N")

mkdir $BUILD_NAME
mv * $BUILD_NAME
tar -czf build.tgz $BUILD_NAME

#ssh app@alpha-node-2.rosti.cz -p 11106 -o 'StrictHostKeyChecking no' 'echo "blah" >> /srv/app/deploy.log'
scp -P 11106 -o 'StrictHostKeyChecking no' build.tgz app@alpha-node-2.rosti.cz:/srv/
ssh app@alpha-node-2.rosti.cz -p 11106 -o 'StrictHostKeyChecking no' 'tar xfz /srv/build.tgz && /srv/$(BUILD_NAME)/install.sh $(BUILD_NAME)'

