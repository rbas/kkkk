#!/bin/bash

#openssl aes-256-cbc -K $encrypted_248b4e8cf39a_key -iv $encrypted_248b4e8cf39a_iv -in id_rsa.enc -out ~\/.ssh/id_rsa -d

ssh app@alpha-node-2.rosti.cz -p 11106 -o 'StrictHostKeyChecking no' -i id_rsa 'echo "blah" >> /srv/app/deploy.log'

