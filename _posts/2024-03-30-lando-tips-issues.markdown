---
layout: post
title:  "Lando tips & issues"
date:   2024-03-30 10:32:45 +0100
categories: lando
---

# Lando tips and issues (how to fix those)
## Lando is the best development tool for PHP developers, but something you will face some issues related to the traefik reversed proxy. Trafik is a container that will generate very nice and friendly URL like drupal9-app.lndo.site
There are some commands that wil fix the problem, like so:
```bash
$ lando poweroff
$ lando start
$ lando rebuild -y
```
But there will be some cases that running those commands won't fix the problem. What you need to do:
```bash
$ lando poweroff
$ docker rm 64451b59f5ef # the container id of the traefik container
$ docker network prune # will remove all network created.
# use for caution it will provide some side effects on other projects networks.
# if you run this command is best to remove the .lando directory from you home dir.
$ docker destroy -y # will remove all containers related to the project.
# create an database backup first, you will loose all data.
$ rm -Rf ~/.lando # erase all plugins and configuration from lando.
# sometimes will fix the problem for you. don't forget to run the lando poweroff first.
$ docker system prune -a # will erase all containers, images, networks from the whole system. that will be the last option for you.
# if you are runnung docker desktop on MacOSX with Apple Silicon processor (M1 and M2) maybe that is the only option you have.
```