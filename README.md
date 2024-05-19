# Проект &laquo;Сайт аренды жилья&raquo;

### Используемый стек технологий:
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![Redis](https://img.shields.io/badge/redis-%23DD0031.svg?style=for-the-badge&logo=redis&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)

#### Настройка перед запуском
Проект развернут на Laravel Sail
- Устанавливаем бэкенд зависимости командой `bash vendor/bin/sail composer install` набрав ее находясь в корневой директории проекта
- Устанавливаем фронтенд зависимости командой `yarn install` или `npm install` в зависимости от вашего пакетного менеджера (потребуется установленная nodejs)
- Собираем бандл из фронтенд зависимостей командой `yarn build` или `npm run build` в зависимости от вашего пакетного менеджера и ждем окончания сборки
Запуск проекта осуществляется при помощи командного интерпретатора для `shell script`
Который не поставляется с ОС Windows по умолчанию. Но он необходим для запуска проекта
Можно установить в windows [WSL](https://learn.microsoft.com/ru-ru/windows/wsl/install) или же воспользоваться установкой отдельных интерпритаторов таких как [Git Bash](https://git-scm.com/downloads) идущий в официальной поставке при установке git
#### Список комманд для установки WSL 2 версии и OS Ubuntu для Windows
```shell
wsl --install # Устанавливает подсистему WSL в вашу OS
wsl --set-default-version 2 # Устанавливает версию по умолчанию для WSL
wsl --update # Обновляет подсистему WSL если это необходимо
wsl --install Ubuntu # Устанавливает в WSL OS Ubuntu
```
После установки необходимо будет ввести логин и пароль пользователя для Ubuntu

В дальнейшем с WSL можно будет работать практически как с полноценной *nix системой.

Если у вас есть еще wsl контейнеры в вашей хостовой OC, то имеет смысл установить для WSL операционной системой по умолчанию Ubuntu командой: 

`wsl --set-default Ubuntu`

WSL запускается командой `wsl` из консоли Windows

В случае если у вас *nix система, все будет работать по умолчанию как и должно

### Непосредственно запуск приложения

- Находясь в корневой директории проекта запустить все необходимые для работы Docker Контейнеры командой 

`bash ./vendor/bin/sail up -d`

или можно настроить алиас для части комманды 'bash ./vendor/bin/sail' добавив в файл `.bashrc` в директории вашего пользователя, в нашем примере в Ubuntu следующую строку `alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'`
и перезапустить wsl (выйти, а потом снова войти), послле этого проект можно будет запустить командой
`sail up -d`
 В обоих случаях sail подменяет собой php интерпретатор соответственно:
- `php composer install` == `sail composer install`
- `php artisan make:model ModelName.php` === `sail artisan make:model ModelName.php`

** Приведено с учетом настроенного alias и справедливо после первой установки зависимостей командой `php composer install` так как sail сам является composer зависимостью
