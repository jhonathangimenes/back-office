# Start Project
- cd src
- docker-compose up -d --build
- docker-compose exec web bash
- composer install
- add .env
  [
    DB_CONNECTION=mysql
    DB_HOST=mysql-app
    DB_PORT=3306
    DB_DATABASE=back_office
    DB_USERNAME=root
    DB_PASSWORD=root
  ]
- php artisan key:generate
- php artisan migrate

- ambiente : http://localhost:8889/