#!/bin/bash

if [ `which setfacl` ]; then
    echo Changing permissions for app/cache and app/logs
    sudo setfacl -R -m u:www-data:rwx -m u:`whoami`:rwx app/cache app/logs
    sudo setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx app/cache app/logs
    echo Check for errors above.
    echo Done.
else
    echo Failed to find \'setfacl\' program. If on Ubuntu you can install it with \'sudo apt-get install acl\'
    echo Nothing changed.
fi

