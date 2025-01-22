# Installation and Running the Project

## **Installation**

1. **Clone the Repository**
   ```bash
   git clone <repository-url>
   cd <repository-folder>
   ```

2. **Create the `.env` File**
   - Copy the `.env.example` file to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Update the `.env` file with your configuration, as shown below:
     ```env
     APP_NAME=Laravel
     APP_ENV=local
     APP_KEY=base64:GENERATED_KEY
     APP_DEBUG=true
     APP_URL=http://localhost

     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=database_name
     DB_USERNAME=root
     DB_PASSWORD=database_password

     BITESHIP_API_URL=https://api.biteship.com
     BITESHIP_API_KEY=your_biteship_api_key

     CORS_ALLOWED_ORIGINS=
     ```

3. **Install Dependencies**
   - Run the following command to install backend dependencies using Composer:
     ```bash
     composer install
     ```

4. **Setup the Database**
   - Run migrations to create the database tables:
     ```bash
     php artisan migrate
     ```

5. **(Optional) Seed the Database**
   - If you want to populate the database with initial data:
     ```bash
     php artisan db:seed
     ```

---

## **Running the Project**

1. **Start the Development Server**
   - Use the following command to start the local server:
     ```bash
     php artisan serve
     ```
   - The application will be available at: [http://localhost:8000](http://localhost:8000).

2. **Run Queue Worker (Optional)**
   - If using job queues, run the queue worker:
     ```bash
     php artisan queue:work
     ```

3. **Run Scheduler (Optional)**
   - Run the scheduler for scheduled tasks:
     ```bash
     php artisan schedule:work
     ```

4. **Test the Application**
   - Run unit and feature tests to ensure the application is working correctly:
     ```bash
     php artisan test
     ```

5. **Check Application Logs**
   - If errors occur, check the application logs in the `storage/logs/laravel.log` file for more details.

---

If you encounter any issues, ensure that the database and environment configurations in the `.env` file are correct.

<br/>
<br/>

# API Documentation: Blueray Order Management

## End-point: Register
### Method: POST
>```
>http://127.0.0.1:8000/api/register
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Body (**raw**)

```json
{
    "name": "admin3",
    "email": "admin3@blueray.com",
    "password": "admin3admin3",
    "password_confirmation": "admin3admin3",
    "role": "admin"
}
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Login
### Method: POST
>```
>localhost:8000/api/login
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Body (**raw**)

```json
{
    "email": "user1@blueray.com",
    "password": "user1user1"
}
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Get Users
### Method: GET
>```
>localhost:8000/api/users
>```
### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer 8|udUwPSghuuQqDlB7QynFT4G5098wwroftE2GetOsde3f8795|


### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Update User
### Method: PUT
>```
>localhost:8000/api/users/3
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer 16|UsF96mGxGYyyH5kTL0WPWCZsShvktE7NClJ8Bmyid42878c6|


### Body (**raw**)

```json
{
  "id": 3,
  "name": "admin2 hore",
  "email": "admin2@blueray.com",
  "role": "admin"
}
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Get CSRF Cookie
### Method: GET
>```
>http://localhost:8000/sanctum/csrf-cookie
>```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Get Couriers
### Method: GET
>```
>http://localhost:8000/api/couriers
>```
### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer 37|qz8cmZoyEyEHdLYCnVt76gcJE6YleD7peWuIGkXP943f8164|


### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Get Biteship Couriers
### Method: GET
>```
>https://api.biteship.com/v1/couriers
>```
### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer biteship_test.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoiYmx1ZXJheS1iYWNrZW5kIiwidXNlcklkIjoiNjc4ZmNhYjg0NTVhNjMwMDEyZmQyMzY2IiwiaWF0IjoxNzM3NDc3Mjk5fQ.t4mQ6UfY_hcCFCe58pqEOrZKYnj2abSG-M_W9QLEk7U|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Create Order
### Method: POST
>```
>http://localhost:8000/api/shipments
>```
### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer 39|MWf1ghIzCYCxeToeD4sE1FOuEKVwEMoxQLzz38ER888d3186|


### Body (**raw**)

```json
{
    "shipper_contact_name": "Zefan",
    "shipper_contact_phone": "081210222222",
    "shipper_contact_email": "zefan@email.com",
    "shipper_organization": "Zefan Org",
    "origin_contact_name": "Zefan",
    "origin_contact_phone": "081210222222",
    "origin_address": "Zefan Address",
    "origin_postal_code": "15122",
    "origin_note": null,
    "origin_coordinate": {
        "latitude": "-6.22",
        "longitude": "106.72"
    },
    "destination_contact_name": "zefan",
    "destination_contact_phone": "081210222222",
    "destination_contact_email": "zefan@gmail.com",
    "destination_address": "Address",
    "destination_postal_code": "15122",
    "destination_note": null,
    "destination_coordinate": {
        "latitude": "-7.22",
        "longitude": "106.72"
    },
    "courier_company": "jne",
    "courier_type": "reg",
    "delivery_type": "now",
    "order_note": "Test",
    "items": [
        {
            "name": "Burung",
            "description": "Berkicau",
            "category": "hobby",
            "value": "6",
            "quantity": 1,
            "height": "1",
            "length": "1",
            "weight": "1",
            "width": "1"
        }
    ]
}
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: User Dashboard
### Method: GET
>```
>http://localhost:8000/api/dashboard/user/1
>```
### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer 38|5U6EK3AwrW5I8nU0fuM8IxhMfPb4LXW91hAPhmVu6852670c|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Admin Dashboard
### Method: GET
>```
>http://localhost:8000/api/dashboard/admin
>```
### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer 38|5U6EK3AwrW5I8nU0fuM8IxhMfPb4LXW91hAPhmVu6852670c|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Get Order
### Method: GET
>```
>http://localhost:8000/api/shipments/6790dd96b8f3ee0011754067
>```
### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer 39|MWf1ghIzCYCxeToeD4sE1FOuEKVwEMoxQLzz38ER888d3186|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃
_________________________________________________
Powered By: [postman-to-markdown](https://github.com/bautistaj/postman-to-markdown/)

