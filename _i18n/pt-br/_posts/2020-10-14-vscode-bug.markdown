---
layout: post
title:  "Bug no Visual Studio Code"
date:   2020-10-14 07:32:45 +0100
categories: vscode
---

# Terminal integrado não aceita caracteres especiais como á, à, é, í, ú, ü, ã, etc.

O VS Code possui um terminal integrado que roda sob o xterm.js. Quando começo a digitar muitos caracteres comuns com diacríticos e acentos, o xterm.js ignora a tecla modificadora. Então não consigo usar esse caractere especial.
O engraçado é que tudo está funcionando como esperado com o Yakuake (Plasma/KDE) e o terminal do PhpStorm.<br/>
[Dê uma olhada nesta issue aberta](https://github.com/microsoft/vscode/issues/108032)
<br>
Atualização [21/04/2022]:
Parece que o bug foi corrigido na versão 1.66.2.
Distribuições testadas: Kubuntu (20.04), Fedora 34 (Spin Plasma)
<br>
Show de bola!
Antes tarde do que nunca.