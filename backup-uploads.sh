#!/bin/bash

_now=$(date +"%m_%d_%Y")
_file="src/uploads/uploads_$_now.zip"

echo 'exporting wordpress uploads folder to ./src/uploads'
sleep 2

cp -r ./src/app/wp-content/uploads/* ./src/uploads/

echo 'Creating zip file'
sleep 2

zip -r $_file src/uploads -x src/uploads/.gitkeep

exit 0;