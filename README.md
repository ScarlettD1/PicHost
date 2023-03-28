Необходима база данных, в mysql с названием yii2basic
Также нужен pdo_mysql

Применение миграций
php yii migrate

Запуск
php yii serve --port=8088

Команды Api:
   /api/total
   /api/view?id=[id картинки]
   /api/list?page=[номер страницы] //1 страница содержит информацию 10 картинок

Страницы:
   /file/upload - загрузка картинок
   /file/index - список картинок
