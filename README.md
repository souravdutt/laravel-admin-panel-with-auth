## Template for Laravel 8 Admin Panel with SingIn and SignUp.
### give a quick start to your project.

#### Components/Libraries:
* Laravel 8
* Adminkit-3 (Open source admin panel UI)
* Bootstrap 5
* jQuery
* fontAwasome

## Getting started / Installation:
* Download and extract project on your server OR clone by running below command:
    ```
    git clone https://github.com/souravdutt/laravel-admin-panel-with-auth.git
    ```
* Create a databse (if not created yet) and make changes to .env file accordingly
* open project root directory and run following commands:

    ```
    composer install
    ```
    ```
    php artisan migrate
    ```
* Seed users (1 admin role, 9 users role) by following command:
    ```
    php artisan db:seed --class=UserSeeder
    ```
* Open project in browser and login as admin:
  - email: ```admin@panel.com```
  - password: ```password```
  
* Change MAIL Server configurations in ```.env``` file, to use Forgot Password feature:
  - ```MAIL_MAILER=smtp```
  - ```MAIL_HOST=<--->```
  - ```MAIL_PORT=<--->```
  - ```MAIL_USERNAME=<--->```
  - ```MAIL_PASSWORD=<--->```
  - ```MAIL_ENCRYPTION="ssl"```
  - ```MAIL_FROM_ADDRESS=<--->```
  - ```MAIL_FROM_NAME="${APP_NAME}"```

#### That's all, your Admin Panel with SignIn and SignUp is ready to use. 

