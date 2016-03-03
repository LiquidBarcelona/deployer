#!/bin/bash
## More useful example:

LOG="/var/www/ci/logs/momentum.log"
NOW=$(date +"%Y-%m-%d-%H%M%S")
## Start script:

cd /var/www/momentum/
git checkout devel
## Clear untracked files:
git clean -df
git pull
