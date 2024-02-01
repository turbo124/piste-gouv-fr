#!/bin/bash
./vendor/bin/phpunit \
--colors \
--testdox \
--display-incomplete \
--display-skipped \
--display-deprecations \
--display-errors \
--display-notices \
--display-warnings \
tests

