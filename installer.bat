@echo OFF

echo ==============================================================

echo ================ Application Initializer =====================

echo ==============================================================

@echo OFF


php artisan key:generate

echo opening the web installer

timeout 5

start http://localhost/install


ren install.bat updater.bat

pause
