#!/usr/bin/env bash

unlink /srv/app && ln -s /srv/$1 /srv/app
supervisorctl restart app
