<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## О проекте

Это сайт-каталог, сделанный на Laravel 9 + PHP 8. 
Сейчас там реализованы:
1. Каталог
2. Новости (Их может изменять только админ)
3. Регистрация/Авторизация
4. Добавление/изменение/удаление товаров через API

## Установка проекта

1. Склонировать репозиторий
2. Настроить файл `.env` из `.env.example' (Задать базу данных)
3. `Composer install` для установки необходимых библиотек
4. `php artisan migrate:fresh --seed` для создания таблиц в БД и наполнения тестовыми данными
5. `php artisan key:generate` для генерации уникального ключа
6. `npm install` + `npm run dev` для разрешения фронт зависимостей
7. Сайт готов к работе!
