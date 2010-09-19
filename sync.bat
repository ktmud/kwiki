@echo off
title 文件同步.. 
::Start...
echo Start synchronizing...

!Title Connecting...
:: 在这里更改登录信息
:: open 主机，后面两行是用户名和密码
ftp yjc.me 
jyyjcc
chico12!

!Title Preparing...
:: 在这里更改远程和本地目录
cd wiki.ktmud.com

::把目录文件信息保存在文件
dir . ~list.txt
!

:: 关闭交互模式
prompt

!Title Processing... %FtpCommand%
%FtpCommand%

!Title Disconnecting...
disconnect
bye
