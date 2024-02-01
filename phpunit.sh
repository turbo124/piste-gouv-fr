#!/bin/bash
XDEBUG_MODE=coverage ./vendor/bin/phpunit \
--colors \
--testdox \
--display-incomplete \
--display-skipped \
--display-deprecations \
--display-errors \
--display-notices \
--display-warnings \
-c tests/phpunit.xml
#tests

