

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

1 + создать модель / миграцию / фабрику / сидер для Тегов
php artisan make:model Tag -mfs

2 + для транслита буду использовать помощника 
php composer.phar require laravel/helpers

3 + создать модель / миграцию / фабрику / сидер для Записей
php artisan make:model Record -mfs

4 + для связки многих тегов (несколько) с одной записью, в ларавель нужны отношения ( связывающая моделька и доп таблица в бд ) 
// Отношения Многие ко многим
php artisan make:migration record_tag

5 + миграции и наполнение фейками
php artisan migrate:refresh --seed 

6 + подключение vue3

7 + добавил фейк данных в связки теги и записи ... чтобы одинаковые теги могли быть у разных записей
php artisan make:seeder RecordTagSeeder

8 + подготовка компонентов для работы с 2 типами данных записи / теги 
старт / записи / теги

9 + подготовка api получения тегов

10 + подготовка vue компонента для работы с тегами
концепция следующая, вся инфа и функции в /use/tags.js 
в шаблонах только показ и возможность изменить номер страницы в дата файле ... если номер страницы поменялся ... то грузим данные с апи по новой странице .. и она везде обновляется так как загрузили в истоничке




vue + axios 
для генерации постраничного вывода данных в апи .. используем collection ( для разбивки на страницы ) и resources (если нужно в 1 итеме что нить изменить)

ограничение размера файла и прочие проверки с помощью валидации в ларавель