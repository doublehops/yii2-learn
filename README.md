Yii2 advanced project environment
================================

This project is a simple way to get a virtual machine up and running for a Yii2 environment. Running Vagrant and Ansible this is a pretty easy and straight forward way to get Yii2 installed and ready to play with.

SOFTWARE
========

The virtual machine runs Debian 7 with Nginx, MariaDB and PHP5.5.


INSTALLATION
------------

First, clone the project to a directory on your system:

~~~
git@github.com:doublehops/yii2-advanced-dev-environment.git yii2-dev
~~~

If you want to use the supplied virtual machine option you will need to install Vagrant and Ansible and follow these steps:

1. Change into the project's directory: **cd yii2-dev**
2. Type **vagrant up** to install and startup the virtual machine. This will take some time.
3. Type **vagrant ssh** to ssh into the vm and change to path /var/www. **cd /var/www**
4. Run **composer global require "fxp/composer-asset-plugin:1.0.0"**
5. Run **composer create-project --prefer-dist yiisoft/yii2-app-advanced yii-application**
6. Run **php yii-application/init** and select Development.
7. Update file common/config/main-local.php with database parameters: database-name=yii2, user=dev and password=secret.
8. Run migration script to install user table: **yii-application/yii migrate**
9. Add domains to your hosts file: **echo "192.168.33.13 frontend backend" | sudo tee --append /etc/hosts > /dev/null**
10. Point you browser to both http://frontend/ and http://backend/ to test that it's working.
