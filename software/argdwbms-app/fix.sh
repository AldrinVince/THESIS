#!/usr/bin/env bash

# By juchipilo
# Configure these two variables
MYUSER="admin"
APACHEGROUP="www-data"

SCRIPTPATH=$(pwd -P)
BOOTSTRAP="${SCRIPTPATH}/bootstrap/"
BOOTSTRAPCACHE="${SCRIPTPATH}/bootstrap/cache/"
STORAGE="${SCRIPTPATH}/storage"
LOGS="${STORAGE}/logs"

# Add my user to the web server group
sudo usermod -a -G "${APACHEGROUP}" "${MYUSER}"

# Make www-data own everything in the directory
sudo chown -R "${MYUSER}:${APACHEGROUP}" "${SCRIPTPATH}"

# Change permissions on files to 644
sudo find "${SCRIPTPATH}" -type f -exec chmod 0644 {} \;

# Change permissions on directories to 755
sudo find "${SCRIPTPATH}" -type d -exec chmod 0755 {} \;

# If there are any bash scripts, make them executable
sudo find "${SCRIPTPATH}" -type f -iname "*.sh" -exec chmod +x {} \;

# Create bootstrap/cache directory if not exists
if [ ! -d "${BOOTSTRAPCACHE}" ]; then
    mkdir -p "${BOOTSTRAPCACHE}"
fi

# Set ownership and permissions for bootstrap/cache
chown "${MYUSER}:${APACHEGROUP}" "${BOOTSTRAP}" "${BOOTSTRAPCACHE}"
chmod 0775 "${BOOTSTRAPCACHE}"

# If services.php exists, set its permissions
if [ -f "${SCRIPTPATH}/bootstrap/cache/services.php" ]; then
    chmod 0664 "${SCRIPTPATH}/bootstrap/cache/services.php"
fi

# Create storage directory if not exists
if [ ! -d "${SCRIPTPATH}/storage" ]; then
    mkdir -p "${SCRIPTPATH}/storage"
fi

# Set ownership and permissions for storage
chown -R "${MYUSER}:${APACHEGROUP}" "${SCRIPTPATH}/storage"
chmod -R 0775 "${STORAGE}"

echo 'Success'
