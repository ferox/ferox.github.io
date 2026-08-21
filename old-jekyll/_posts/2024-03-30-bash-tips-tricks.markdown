---
layout: post
title:  "Bash tips & tricks"
date:   2024-03-30 09:32:45 +0100
categories: bash
---

# Tips and Tricks for Bash (alias and other stuffs)

## Bash alias
Unlike Ubuntu and other distros Fedora does not have the bash_alias file. To keep all alias separated and organized it is a goog practice to create bash_alias file. The following block code needs to be placed in .bashrc file.
```bash
if [ -f ~/.bash_aliases ]; then
    . ~/.bash_aliases
fi
```
Now create the bash_alias file inside your home directory like /home/username/. Here is an example:
```bash
alias composer='php81 ~/.composer/composer.phar'
alias phpcbf-drupal='phpcbf --standard=Drupal --extensions=php,module,inc,install,test,profile,theme,css,info,txt,md,yml'
alias phpcs-drupal='phpcs --standard=Drupal --extensions=php,module,inc,install,test,profile,theme,css,info,txt,md,yml'
```