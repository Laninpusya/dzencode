<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://t.me/dmt_lanin"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Telegram_logo.svg/50px-Telegram_logo.svg.png" alt="Build Status">telegram</a>
</p>

## Требования

Для запуска проекта вам понадобятся:

- Composer
- MySQL или другая поддерживаемая СУБД
###### Или
- docker
## Установка

1. Клонировать репозиторий:
   ```
   git clone https://github.com/Laninpusya/dzencode
2. Установить зависимости PHP:
    ```
    composer install
3. Обновить зависимости
    ```
   composer update
4. Установить фронтенд зависимости:
    ```
    npm install
    npm run dev
## Запуск
#### Для локального запуска
1. Запустить встроенный сервер Laravel:
    ```
   php artisan serve
2. Запустить локальный сервер с базой данных (xamp, mamp, openserver)
3. Выполнить миграции для создания базы данных и таблиц:
    ```
    php artisan migrate
4. Подключитесь к вашей бд в файле `.env`
    ````
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=dzencode
    DB_USERNAME=root
    DB_PASSWORD=
5. Для фронтендной части, собрать сборку:
    ```
    npm run bild
6. Открыть приложение в браузере по адресу http://127.0.0.1:8000/

#### Запуск с докера
1. Подключитесь к вашей бд в файле `.env`
    ````
    DB_CONNECTION=mysql
    DB_HOST=db
    DB_PORT=3306
    DB_DATABASE=dzencode
    DB_USERNAME=root
    DB_PASSWORD=root
2. Выполнить миграции для создания базы данных и таблиц:
    ```
    php artisan migrate
Для выполнения миграции входим в контейнер project_app командой `docker exec -it project_app bash` и выполняем миграцию php artisan migrate с этого же контейнера выполняем запуск cидера `php artisan db:seed`
3. Поднимите контейнеры
    ```
    docker-compose up
4. Открыть приложение в браузере по адресу http://localhost:8876/
### Дополнительная информация
В таблицах «model_has_roles» реализована система ролей для «users» но на даном задании права администратора не дают никаких преимуществ
При наведении на текст на главной станице срабатывают предпросмотр сообщения.
Стили и скрипты подключены в layout.blade.php, и хранятся там же.
Странички с сообщениями кэшируются.





