=================
PoSobota Workshop
=================

1. Vytvoreni uctu na Rosti.cz
2. Vytvoreni php appky
3. Vytvoreni ruby appky

 - Navysit pamet na 1GB pro appku

4. Nainstalovat travis clienta

::

 gem install travis

5. Vytvorit klic v ruby kontejneru 

::
 
  ssh-keygen -t rsa -b 4096 -C "workshop@rosti.cz"

6. Klic dat do php kontejneru

::

  ssh-copy-id -i ~/.ssh/id_rsa.py app@alpha-node-2.rosti.cz -p 11106

7. Otestovani spojeni do php kontejneru

::

 ssh -p 11106 app@alpha-node2.rosti.cz

8. Vytvorit public repozitar na GitHubu a pridat tam klic a dat mu write (budeme commitovat z ruby kontejneru)
9. Vytvorit clone repozitare v ruby kontejneru

::

 git clone git@github.com:/rbas/kkkk.git

10. Vytvorit si ucet na travisu
11. Zapnout build listener pro novy repozitar z GitHubu
12. V ruby kontejneru

::

 travis login --auto
 travis encrypt-file ~/.ssh/id_rsa

13. Pridat do repozitare ``.travis.yml``

::

 language: php
 php:
   - 7.0
 deploy:
   provider: script
   script: ./deploy.sh
   on:
     branch: master
     repo: rbas/kkkk
 after_success:
   - chmod 600 id_rsa
   - mv id_rsa ~/.ssh/id_rsa
 before_install:
   - openssl aes-256-cbc -K $encrypted_248b4e8cf39a_key -iv $encrypted_248b4e8cf39a_iv -in id_rsa.enc -out id_rsa -d

14. Vytvorit shell script ``deploy.sh``

::

 #!/bin/sh

 BUILD_NAME=build-$(date +"%Y-%m-%d-%y-%H:%M.%N")

 mkdir $BUILD_NAME
 mv * $BUILD_NAME
 tar -czf build.tgz $BUILD_NAME

 scp -P 11106 -o 'StrictHostKeyChecking no' build.tgz app@alpha-node-2.rosti.cz:/srv/
 ssh app@alpha-node-2.rosti.cz -p 11106 -o 'StrictHostKeyChecking no' "tar xfz  /srv/build.tgz && /srv/${BUILD_NAME}/install.sh ${BUILD_NAME}"

15. Nastavit execute attribut pro `deploy.sh`

::

 chmod +x deploy.sh

16. Vytvoreni instalacniho scriptu `install.sh`

::

 #!/usr/bin/env bash

 remove_old_builds() {
	MAX_BUILDS=5
	BUILD_LIST=$(ls|grep "build-" |sort -r)

	COUNTER=0
	for f in $BUILD_LIST
	do
	  ((COUNTER = COUNTER + 1))
	  if [ $COUNTER -gt $MAX_BUILDS ]; then
		rm -rf $f 
	  fi 
 	done
 }

 unlink /srv/app && ln -s /srv/$1 /srv/app
 supervisorctl restart app

 remove_old_builds

17. Nastavit execute attribut pro `install.sh`

::

 chmod +x install.sh

