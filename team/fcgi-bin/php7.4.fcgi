#!/bin/bash
PHPRC=$PWD/../etc/php7.4
export PHPRC
umask 022
PHP_FCGI_MAX_REQUESTS=99999
export PHP_FCGI_MAX_REQUESTS
exec /bin/php-cgi7.4
