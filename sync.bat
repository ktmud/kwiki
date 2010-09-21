@echo off
title 通过 Git 同步.. 
echo Start synchronizing...

:: get date and time 
for /f "delims=" %%a in ('date/t') do @set mydate=%%a 
for /f "delims=" %%a in ('time/t') do @set mytime=%%a 
set msg=%mydate%%mytime% 

:: add all new files 
call git add . 

:: 请求输入 commit 消息

Set /p cmsg=请输入Commit注释（留空则为提交时间）: 
if not {%cmsg%}=={''} set msg=%cmsg%
call git commit -a -m "%msg% - %mydate%"

call git push origin master
