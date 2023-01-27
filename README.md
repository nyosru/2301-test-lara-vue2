

Тестовое задание 


Краткое описание ТЗ: 
Реализовать админ панель, с возможностью добавления тегов и записей с указанием тегов.
ВСЕ ДЕЙСТВИЯ РЕАЛИЗОВАТЬ БЕЗ ПЕРЕЗАГРУЗКИ СТРАНИЦЫ, ПО ПРИНЦИПУ SPA.
Сущности: 

Тэг (tag)
id - number
title - string - max length 50 - valid
slug - string (автоматический транслит title)

Запись (record)
id - number
file - string (путь к файлу)
title - string - max length 150 - valid
slug - string (автоматический транслит title)
description - text - max length 3000
tags - array сущности Tag
view_all - boolean

Подробное описание ТЗ:

+ Регистрация пользователя: 
Должна проходить с помощью указания почты и пароля.
Вход и выход пользователя:
2.1 Вход пользователя осуществляется с помощью ввода почты и пароля, указанных при регистрации.
2.2 Выход пользователя осуществляется нажатием на кнопку “Выход” и возвращением пользователя на страницу авторизации (кнопка должна быть на видном месте :-) ).

Создание, редактирование, удаление, отображение тегов:
3.1. Создание и редактирование тегов должно происходить с указанием полей описанных выше, с валидацией полей. 
3.2 При удалении и редактировании осуществлять проверку на доступ к записи.
3.3 Отображать записи в таблице с использованием пагинации. Минимальное кол-во видимых записей 5.

Создание, редактирование, удаление, отображение записей:
4.1 Создание записей с указанием тегов, а также с указанием полей описанных выше.
4.2 Документ не должен превышать размер 20 мб. 
4.3 Поле view_all указывает на область видимости (виден ли данный объект всем пользователям системы или только тому, кто его создал)

Результат:
Предоставить доступ в репозиторий для проверки.


----- реализация ------

+ создать модель / миграцию / фабрику / сидер для Тегов
php artisan make:model Tag -mfs

+ для транслита буду использовать помощника 
php composer.phar require laravel/helpers

+ создать модель / миграцию / фабрику / сидер для Записей
php artisan make:model Record -mfs

для связки многих тегов (несколько) с одной записью, в ларавель нужны отношения ( связывающая моделька и доп таблица в бд ) 

+ миграции и наполнение фейками
php artisan migrate:refresh --seed 

+ подключение vue3

vue + axios 
для генерации постраничного вывода данных в апи .. используем collection и resources (если нужно в 1 итеме что нить изменить)