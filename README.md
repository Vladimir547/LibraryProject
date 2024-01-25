
## Установка

1.git clone https://github.com/Vladimir547/LibraryProject.git

2. cd LibraryProject

3. composer install

4. Создать .env из файла .env.example

5. npm install and npm run build and npm run dev

6. php artisan key:generate

7. sail up или bash ./vendor/laravel/sail/bin/sail up (./vendor/bin/sail up);

8. Установить в файле .env следущее: DB_CONNECTION=mysql DB_HOST=127.0.0.1 DB_PORT=3306 DB_DATABASE=laravel DB_USERNAME=sail DB_PASSWORD=password

9. php artisan migrate --seed

10. php artisan serve



## Админ

email: admin@admin.com
password: 12345678

## Инструкция

### инструкция для администратора

Нажать в меню на кнопку Log In:
![image](https://github.com/Vladimir547/LibraryProject/assets/48596087/e2a7c713-7655-49fc-9747-04db2e954ea9)

И ввести данные:


email: admin@admin.com
password: 12345678

Этот пользователь администратор

![image](https://github.com/Vladimir547/LibraryProject/assets/48596087/93a1c3fe-1ba3-4867-8afc-c54480c150e8)

Для создания нового автора переййти по пункту меню "Добавить автора"

![image](https://github.com/Vladimir547/LibraryProject/assets/48596087/ab967603-3031-451a-92c4-eaea74d0f94d)

И ввести необходимые данные нового автора. И нажать сохранить.

![image](https://github.com/Vladimir547/LibraryProject/assets/48596087/f6c21022-76bd-426c-ad15-1481cb73dec7)

Во вкладке "авторы", находятся все авторы. И с каждым авnором можно делать действия нажав на кнопки, удалить, изменить, добавить автору новую книгу и получить подробную информацию.

Удалять автора необходимо акуратно, поскольку каждый зарегестрированый пользователь, так же является автор. и если удалить от пользователь не сможет добавлять и редактировать книги.

Перейдя по кнопке "инфо" полуаешь более подробную информацию. Здесь присутствует информационное поле "Описание" и возможность увидеть все книги автора. Так же админ от сюда может изменить и добавить книгу этому автору.

Во вкладке "книги", находятся все авторы. И с каждой книгой можно делать действия нажав на кнопки, удалить, изменить и получить подробную информацию.

Каждый пользователь является автором поэтому может добавлять свои книги

Добавить свою Книгу нажав на вкладку "Добавить свою Книгу":

![image](https://github.com/Vladimir547/LibraryProject/assets/48596087/4912cadf-04d9-41c3-b227-2617116cac1a)

Во вкладке "Мои книги" можно увидеть книги которые пользователь добавли сам себе.

### инструкция для пользователей

Пользователь может создавать для себя книги на вкладку "Добавить свою Книгу"(если вы не видете эту вкладку, значит админ удалил вас как автора).

Может изменять свою информацию зайдя в профиль:

![image](https://github.com/Vladimir547/LibraryProject/assets/48596087/7f3e837e-de02-473f-92c6-be2dcf40d8a3)


В остальном инструкция такая же как и для администратора, только без возможности менять что либо за исключением своих книг и данных.

##API







The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
