Framework
1. Laravel 8 
2. Requirement 
   - Apache 2.4 ++
   - MySQL 8
   - PHP 7.4 ++ / 8.1 ++
   - Docker Desktop 
   - WSL 2 

Cloning Repo 
1. Clone repo into xampp htdocs directory 
2. Open project using visual studio code

## Local Machine
Enable Laravel Dependencies 
3. Run command in project directory 
   - cp .env.example .env
   - composer update
   - php artisan key:generate
   - update .env file
   - npm install & npm run dev (optional)
   ENV file
    - Database name : offgamers
    - username and password using default xampp setting
Database Creation
3. Run command to create database and seed the data of user
   - php artisan migrate:fresh
   - php artisan db:seed (data will added into all tables)

## Docker
Laravel Docker Sail
1. You can use laravel sail to up inside container
2. ./vendor/bin/sail up
3. ./vendor/bin/sail artisan migrate:fresh
4. ./vendor/bin/sail artisan db:seed

# How to Access System
1. Run this link using browser http://localhost/offgamers
1. There are two (2) users to login
   - Micheal
   - Sarah
3. Login into http://localhost/offgamers
   - email : micheal@mail.com password : micheal123
   - email : sarah@mail.com password : sarah123

## Workflow
NEW User
1. Create new orders (user first time make an order)
2. Order created
3. Proceed with checkout/payment
4. Checking if user/customer have previous order completion
5. Payment success
6. Reward points added based on 1usd = 1point

SAME User
1. Create new orders (Same user make an order)
2. Order created
3. Proceed with checkout/payment
4. Previous order completion exists
5. Payment success (reward point applied)
6. Previous reward point set to USED and cannot be used anymore


To run scheduler to check expired reward afer 1 year (365 days and above)

Run this link using using internet browser 
- http://localhost/offgamers/rewards/findExpired

Run using command in laravel app
- php artisan command:rewardexpired