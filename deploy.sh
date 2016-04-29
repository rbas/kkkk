#!/bin/sh

mkdir build
mv * build
tar -czf build.tgz build

ls -alh ~/.ssh/

ssh app@alpha-node-2.rosti.cz -p 11106 -o 'StrictHostKeyChecking no' 'echo "blah" >> /srv/app/deploy.log'


ls -alh ../

ls -alh /

echo $(which ssh)

