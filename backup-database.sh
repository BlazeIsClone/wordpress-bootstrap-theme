#!/bin/bash

_now=$(date +"%m_%d_%Y")
_file="wp-data/data_$_now.sql"

# Export dump
echo 'exporting sql database into directory ./wp-data'

EXPORT_COMMAND='exec mysqldump "$MYSQL_DATABASE" -uroot -p"$MYSQL_ROOT_PASSWORD"'

echo docker-compose exec db sh -c "$EXPORT_COMMAND" > $_file

ls -la ./wp-data