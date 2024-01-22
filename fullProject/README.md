
## Инструкция для исползования

### Клонирование проекта и копирование env

```bash
$ git clone https://github.com/JaloladdinRozmetov/testPirate.git
$ cd testPirate
$ cd fullProject
$ cp .env.example .env
```

### Установления composer
```bash
$ composer install
```

### Настройте .env файл для вашего базы данных


### запустите миграций и сидер для заполнения данных
```bash
$ php artisan migrate:fresh --seed
```

### настройте сервер если нету запустите эту команду
```bash
$ php artisan serve
```
### Заходите по ссылке http://127.0.0.1:8000
### логин : admin@email.com
### парол : password
