#!/bin/bash
PHPRC=$DOCUMENT_ROOT/../etc/php7.4
export PHPRC
umask 022
if [ "$REDIRECT_URL" != "" ]; then
  SCRIPT_NAME=$REDIRECT_URL
  export SCRIPT_NAME
fi
exec /bin/php-cgi7.4
