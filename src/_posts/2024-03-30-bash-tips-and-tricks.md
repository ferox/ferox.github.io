---
title: Bash tips and tricks
description: Tips and tricks for Bash, focused on using aliases and keeping shell customizations organized.
date: '2024-03-30T08:32:45+00:00'
author: ferox
category: Bash
type: blog
---

## Bash aliases on Fedora

Unlike Ubuntu and some other distros, Fedora does not ship with a `bash_aliases` file by default.

To keep aliases separated and easier to maintain, I like to load a dedicated aliases file from `.bashrc`:

```bash
if [ -f ~/.bash_aliases ]; then
    . ~/.bash_aliases
fi
```

Then create the `~/.bash_aliases` file in your home directory. For example:

```bash
alias composer='php81 ~/.composer/composer.phar'
alias phpcbf-drupal='phpcbf --standard=Drupal --extensions=php,module,inc,install,test,profile,theme,css,info,txt,md,yml'
alias phpcs-drupal='phpcs --standard=Drupal --extensions=php,module,inc,install,test,profile,theme,css,info,txt,md,yml'
```

It is a small change, but it keeps shell customizations much cleaner over time.
