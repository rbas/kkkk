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
