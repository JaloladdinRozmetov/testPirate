
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

### добовления ключа в .env
```bash
$ php artisan key:generate
```
### устоновления npm
```bash
$ npm install
```
### устоновления npm
```bash
$ npm run dev
```
### настройте сервер

### логин : admin@email.com
### парол : password
