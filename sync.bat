@echo off
title 通过 Git 同步.. 
::Start...
echo Start synchronizing...

echo Commit changes...

:: get date and time 
for /f "delims=" %%a in ('date/t') do @set mydate=%%a 
for /f "delims=" %%a in ('time/t') do @set mytime=%%a 
set fvar=%mydate%%mytime% 

:: add all new files 
call git add . 
call git commit -a -m "Automated commit on %fvar%"

:: check if ssh-agent is running
tasklist|find /i "ssh-egent.exe" || cmd /c ""C:\Program Files\Git\bin\sh.exe" --login -i" && exit
call git push origin master
