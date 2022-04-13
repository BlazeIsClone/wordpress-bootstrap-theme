#!/bin/bash

_now=$(date +"%m_%d_%Y")
_file="wp-uploads/uploads_$_now.zip"

echo 'exporting wordpress uploads folder to ./wp-uploads'
sleep 2

cp -r ./wp-app/wp-content/uploads/* ./wp-uploads/

echo 'Creating zip file'
sleep 2

zip -r $_file wp-uploads -x wp-uploads/.gitkeep
