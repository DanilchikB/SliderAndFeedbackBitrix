---
#### Слайдер slick для демо-сайта bitrix
---
Измененные файлы для формы
- в local\components\my_components\my.feedback хранится компонент:
    + в .parameters.php настройки
    + в component.php подготовка переменных
- в local\templates\eshop_bootstrap_blue\components\my_components\my.feedback\feedback_ajax хранится шаблон компонента:
    + в папке ajax хранится файл-обработчик
    + в script.js проверка и вызов ajax
    + в template.php сама форма
- в local\templates\eshop_bootstrap_blue\header.php подключен компонент и fancybox
- в local\templates\eshop_bootstrap_blue\js\plugins лежит fancybox

----
Измененные файлы для слайдера:
- в bitrix.project/index.php - добавлен баннер

- в папке bitrix.project/local/templates - лежит шаблон сайта:

    + eshop_bootstrap_blue/header.php - подкдючен jQuery  и прилагающиеся к slick стили

    + eshop_bootstrap_blue/components/bitrix/new.list/slider/template.php - чуть-чуть измененный компонент "Список Новостей"(Подключение и выхов скрипта slick)

    + в папке eshop_bootstrap_blue/slider - сам slick слайдер