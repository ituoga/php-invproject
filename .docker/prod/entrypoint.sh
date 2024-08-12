#!/bin/sh

/wft.sh db:3306 -t 60

mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/framework/cache
chmod -R 777 /var/www/html/storage
rm -rf /var/www/html/storage/framework/views/*

php artisan storage:link
php artisan migrate --force -q
echo "${REVERB_HOST}"

for f in $(ls /var/www/html/public/build/assets/*.js); do
    echo "replacing... $f"
    perl -i -pe "s/RVITE_RHOST/${REVERB_HOST}/g;"  $f
    perl -i -pe "s/RVITE_REVERB_APP_KEY/${VITE_REVERB_APP_KEY}/g;"  $f
    perl -i -pe "s/RVITE_REVERB_HOST/${VITE_REVERB_HOST}/g;"  $f
    perl -i -pe "s/RVITE_REVERB_PORT/${VITE_REVERB_PORT}/g;"  $f
    perl -i -pe "s/RVITE_REVERB_SCHEME/${VITE_REVERB_SCHEME}/g;"  $f
done

apache2ctl -D FOREGROUND
