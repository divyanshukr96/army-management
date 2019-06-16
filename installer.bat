@echo OFF
echo ==============================================================
echo ================ Application Initializer =====================
echo ==============================================================
@echo OFF

echo checking required composer files .............
timeout 3
if exist vendor (
echo updating required composer files .............
    composer update
)else (
echo installing required composer files .............
    composer install
)
timeout 3
echo checking .env file exist ?
if exist .env (
	echo env file exist
)else (
	copy .env.example .env
	php artisan key:generate
)

echo opening the web installer
timeout 5
start http://localhost/install

ren install.bat updater.bat

pause
