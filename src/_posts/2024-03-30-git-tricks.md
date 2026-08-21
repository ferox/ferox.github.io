---
title: Some git tricks to work on projects
description: A few practical Git tricks for rebasing and cleaning up ignored files that were already committed.
date: '2024-03-30T06:32:45+00:00'
author: ferox
category: Git
type: blog
---

## Rebase with fixup

The easiest way to clean up commit history is to use interactive rebase:

```bash
git rebase -i updated_main_branch
```

Then update the commit line by replacing the action with `f` for the commit you want to fold into the previous one.

## Fixing ignored files that were already committed

If files should be ignored but are already tracked, first update `.gitignore`, then run:

```bash
git rm -r --cached . && git add . && git commit -am "Remove ignored files"
```
