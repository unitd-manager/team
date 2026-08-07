#!/bin/bash
PHPRC=$DOCUMENT_ROOT/../etc/php5.6
export PHPRC
umask 022
if [ "$REDIRECT_URL" != "" ]; then
  SCRIPT_NAME=$REDIRECT_URL
  export SCRIPT_NAME
fi
exec /bin/php-cgi5.6
