

## More useful example:

LOG="/var/www/ci/logs/deeplio.log"
NOW=$(date +"%Y-%m-%d-%H%M%S")
## Start script:
echo "
--------------------------------------------------------
NEW DEPLOYMENT: $NOW" >> $LOG
cd /var/www/mobile-shopify/

git checkout devel >> $LOG
## Clear untracked files:
git clean -df >> $LOG
## Revert local changes:
git checkout -- . >> $LOG
git pull >> $LOG

# Copy some stuff around:
#cp $DEEPLIO/index.html $DEPLOY/
#cp $DEEPLIO/CHANGELOG.md $DEPLOY/

echo "End Deploy." >> $LOG