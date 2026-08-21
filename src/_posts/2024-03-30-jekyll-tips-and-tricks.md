---
title: Jekyll tips and tricks
description: Tips and tricks to work with Jekyll, from Fedora setup to dependency and bundle issues.
date: '2024-03-30T07:32:45+00:00'
author: ferox
category: Jekyll
type: blog
---

## Installing Jekyll on Fedora with rbenv

Before installing `rbenv`, make sure the development toolchain is present on the system:

```bash
sudo dnf groupinstall "Development Tools"
sudo dnf install perl-core zlib-devel
```

## Check GitHub Pages dependency support

If you deploy a Jekyll site on GitHub Pages, always confirm which versions are supported before upgrading gems or changing configuration.

See the [GitHub Pages dependency versions page](https://pages.github.com/versions).

## Fixing local `jekyll serve` bundle issues

After changing the `Gemfile`, local runs can break with messages like:

> You have already activated... Consider using bundle exec.

When that happens, these commands usually help:

```bash
bundle clean --force
bundle update
bundle install # remove Gemfile.lock before this step
```
