@echo off 

cd scripts

start /min npm_start.bat
start /min artisan_serve.bat
start localhost.bat
