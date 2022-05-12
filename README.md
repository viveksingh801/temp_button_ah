## This project is intended to be used only for the purpose of assignment evaluation by Temp Button.

This is a laravel project, and exposes 2 REST endpoints 

    /api/login
    /api/users

It uses Laravel Passport for JWT generation, and automatically generates the required RSA keys, which can be found inside the storage folder. MySql for database, and Nginx for webserver w/ php-fpm. 

Copy .env.example to create a .env file at / and /temp-button

As this project is dockerized, it's required that Docker Compose and Docker Cli is installed on the host machine. 

To run this project, RUN:

    docker-compose up

And wait for the process to spin up the required infra. Upon success you should get a similar output screen on your terminal. 

```temp-button-service | Starting Laravel development server: http://127.0.0.1:8000
temp-button-service | PHP 8.1.4 Development Server (http://127.0.0.1:8000) started
```

After this, the hit the above endpoints ensuring that Header: `Accept: application/json` is being passed in the both endpoints. 

A postman collection around the endpoints can be found here [Postman Collection](https://documenter.getpostman.com/view/2494122/UyxhmmbJ) 
