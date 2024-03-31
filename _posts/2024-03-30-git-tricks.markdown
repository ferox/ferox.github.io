---
layout: post
title:  "Git tricks"
date:   2024-03-30 07:32:45 +0100
categories: git
---

# Some git tricks to work on projects

## Rebase with fixture
The best way is to use the interactive mode.
```shell
$ git rebase -i updated_main_branch 
```
Then you just need to update the commit line setting the f before the message.

## How to fix ignored files that were committed 
The easiest way is to update the .gitignore file and then run the following commands:
```shell
$ git rm -r --cached . && git add . && git commit -am "Remove ignored files"
```
