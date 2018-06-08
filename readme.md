Инструкция по развертыванию FAQ
<ul>
<li>1.git clone https://github.com/GeorgyErmakov/Neto faq</li>
<li>2.cd faq</li>
<li>3.composer install</li>
<li>4.переименовать .env.example в .env</li>
<li>5.php artisan key:generate</li>
<li>6.Настроить добашнюю папку веб-сервера на ./faq/public</li>
<li>7.Создать базу данных из дампа diplom.sql</li>
<li>8.В файле config/database.php изменить данные для соединения к базе diplom_a</li>
<li>9.Доступ к клиентской части http://localhost, к административной http://localhost/admin</li>
<li>10.Администратор: admin\admin</li>
</ul>
В разработке валидация, обработка ошибок и логирование.