@echo off
title 同步到github.. 

cls
echo 开始同步...

:: get date and time 
for /f "delims=" %%a in ('date/t') do @set mydate=%%a 
for /f "delims=" %%a in ('time/t') do @set mytime=%%a 
set date=%mydate%%mytime% 

:: add all new files 
call git add . 

:: 请求输入 commit 消息
Set /p cmsg=请输入Commit注释（留空则为提交时间）: 
:: bat语法实在是太戳了
call git commit -a -m "%cmsg%_%date%"
echo 开始推送到github/ktmud/kwiki/...
call git push origin
echo 开始推送到kwiki
call git push kwiki
echo 开始推送到Web
call git push web 
exit
