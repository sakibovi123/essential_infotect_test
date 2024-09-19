To run the project locally:

1. create a database from phpmyadmin
2. edit .env and connect database
3. run "composer install" && "npm install"
4. run "php artisan migrate"
5. run php artisan db:seed
6. after running db:seed it will create some dummy users and one admin
   - admin creds: email: admin@gmail.com, pass: admin123123
7. then run "php artisan serve" and "npm run dev"


Used technologies:
- Laravel
- Tailwind css
