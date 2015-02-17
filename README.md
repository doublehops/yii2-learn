Yii2 advanced project environment
================================

This repository is made available for people to easily setup dev environments to start playing around with Yii2. By running a Vagrant VM and provisioned with Ansible, it is pretty trivial to get a professional dev environment setup.

SOFTWARE
--------

You will need Vagrant, Ansible and virtual machine software such as VirtualBox installed.
The virtual machine runs Debian 7 with Nginx, MariaDB and PHP5.5.


INSTALLATION
------------

1. Clone repo: **git clone git@github.com:doublehops/yii2-advanced-dev-environment.git .** (include trailing .)
2. Create project's web path: **mkdir app**
3. Type **vagrant up** to install and startup the virtual machine. This will take some time.
4. Type **vagrant ssh** to ssh into the vm and change to path /var/www. **cd /var/www**
5. Run **composer global require "fxp/composer-asset-plugin:1.0.0"**
6. Run **composer create-project --prefer-dist yiisoft/yii2-app-advanirtuced .**
7. Run **php init** and select Development.
8. Update file common/config/main-local.php with database parameters: **database-name=yii2, user=dev and password=secret**.
9. Run migration script to install user table: **yii-application/yii migrate**
10. Exit back out to your host machine.
11. Add domains to your hosts file: **echo "192.168.33.13 frontend backend" | sudo tee --append /etc/hosts > /dev/null**
12. Point you browser to both **http://frontend/** and **http://backend/** to test that it's working.
