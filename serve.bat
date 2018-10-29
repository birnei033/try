@echo off && title %cd% && color 0a && cls
:q1 
cls
echo Select Task.
echo 1) Start Server
echo 2) Start CMD on current directory.
set /p q1="Choose:"
cls
if %q1% == 1 goto serve
if %q1% == 2 goto manual
if %q1% == exit goto exit
goto q1
:serve
:manual
start "C:\Program Files\Git\git-cmd.exe" /t:0a /k "@echo off && title p5 && cd "
goto q1


:exit
exit