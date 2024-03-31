---
layout: post
title:  "Lando tips & issues"
date:   2024-03-30 10:32:45 +0100
categories: lando
---

# Lando tips and issues (how to fix those)
## Lando is the best development tool for PHP developers, but sometimes you will face issues related to the traefik reversed proxy. Traefik is a container that will generate a very nice and friendly URL like drupal9-app.lndo.site
There are commands that wil fix the problem, like so:
```bash
$ lando poweroff
$ lando start
$ lando rebuild -y
```
But there will be some cases that running those commands won't fix the problem. What you need to do:
```bash
$ lando poweroff
$ docker rm 64451b59f5ef # the container id of the traefik container to be removed.
$ docker network prune # will remove all network created.
# use with caution it will provide some side effects on other projects networks.
# if you run this command is best to remove the .lando directory from you home dir.
$ docker destroy -y # will remove all containers related to the project.
# create an database backup first, you will loose all data.
$ rm -Rf ~/.lando # erase all plugins and configuration from lando config directory.
# sometimes will fix the problem for you. don't forget to run the lando poweroff first.
$ docker system prune -a # will erase all containers, images, networks from the whole system, will be the last option for you.
# if you are runnung docker desktop on MacOSX with Apple Silicon processor (M1 and M2) that will be the only option you have to fix some issues.
```
## XDebug is the most essential PHP tool for developers
### I can't live without Lando, so this will be the step-by-step tutorial to set everything in lando to debug an app with XDebug
First thing first, adjust the .lando.yml file:
```yml
name: drupal-module-development-book
recipe: drupal10
config:
  webroot: web
  php: 8.1
  database: mariadb
  xdebug: true
  config:
    php: scripts/php.ini

services:
  appserver:
    overrides:
      extra_hosts:
        - "host.docker.internal:host-gateway"
```
Now you have to create the php.ini file inside scripts' directory on top of the root project's directory:
```ini
[PHP]
memory_limit = -1

[XDEBUG]
xdebug.mode=develop,debug,coverage
xdebug.start_with_request=on
xdebug.client_port=9003
xdebug.log_level=0
xdebug.idekey=PHPSTORM
xdebug.client_host=host.docker.internal
xdebug.log=/dev/stdout
```
OK, almost finished. We've set the container gateway (docker) to access our host ip address and also set the client's port to be listen on 9003 (XDebug > 3) with the PHPSTORM idekey (change if need it). Now install the browser extension called Xdebug helper [click here](https://github.com/briangilbert/xdebug-helper-for-firefox), I'm a Firefox user, so if you are a Chrome user, search on the web and you will find it.
The last is to set up your IDE (Integrated Development Environment) or Text Editor to run the debugger.
Here is a screenshot example using the PhpStorm IDE. Go to Main Menu -> Run -> Edit Configurations...
<br>
<!-- <img src=“assets/images/run-debug-configuration-phpstorm.png”
srcset=“assets/images/run-debug-configuration-phpstorm.png 100w”
sizes="100vw"
alt="Run/Debug Configurations window on PhpStorm IDE"> -->

![Run/Debug Configurations window on PhpStorm IDE](/assets/images/run-debug-configuration-phpstorm.png)

And that is it!
Happy hacking!