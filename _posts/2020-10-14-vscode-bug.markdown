---
layout: post
title:  "Visual Studio Code bug"
date:   2020-10-14 07:32:45 +0100
categories: vscode
---

# Integrated terminal does not accept special characters like á, à, é, í, ú, ü, ã, etc

VS Code has an integrated terminal that runs under the xterm.js. When I start to type many common diacritics and accent marks [xterm.js](https://xtermjs.org/) ignores the modifier key. So I can't use that special character.<br/>
The funny thing is that everything is working as expected with Yakuake (Plasma/KDE) and PHPStorm's terminal.<br/>
[Take a look at this opened issue](https://github.com/microsoft/vscode/issues/108032)
<br>
Update [2022/04/21]
Seems that the bug was fixed on the 1.66.2 version.
Tested distros: Kubuntu (20.04), Fedora 34 (Spin Plamas)
<br>
That's great!