---
layout: post
title:  "Jekyll tips & tricks"
date:   2024-03-30 08:32:45 +0100
categories: jekyll
---

# Tips and Tricks to work with Jekyll

## Installing Jekyll on Fedora using rbenv
It is mandatory to install all Development tools on the Linux Distro before rbenv installation.
```shell
$ sudo dnf groupinstall "Development Tools"
$ sudo dnf install perl-core zlib-devel
```

## When you deploy an Jekyll app on GitHub Pages you need to check the supported versions
Check it out the [dependency versions page](https://pages.github.com/versions)


## You may find some errors running jekyll serve locally after some changes on your Gemfile. Messages like this: You have already activated...Consider using bundle exec.
You'll have to try some of those commands:
```shell
$ bundle clean --force
$ bundle update
$ bundle install #Remove the Gemfile.lock before
```

