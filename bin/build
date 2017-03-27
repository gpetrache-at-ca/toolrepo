#!/bin/bash
# Update Box
./bin/box update

# Make the build leaner
composer install --no-dev

# Build Phar
./bin/box build -vvv

# Create Version
sha1sum ./build/iedtools.phar > ./build/iedtools.phar.version
