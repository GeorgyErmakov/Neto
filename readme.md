Инструкция по развертыванию FAQ

1.git clone https://github.com/GeorgyErmakov/Neto faq
2.cd faq
3.composer install
4.переименовать .env.example в .env
5.php artisan key:generate
6.Настроить добашнюю папку веб-сервера на ./faq/public
7.Создать базу данных из дампа diplom.sql
8.В файле config/database.php изменить данные для соединения к базе diplom_a
9.Доступ к клиентской части http://localhost, к административной http://localhost/admin
10.Администратор: admin\admin

В разработке валидация, обработка ошибок и логирование.