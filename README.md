File changed for Coding Task
app/
 ├── Console/
 │    └── Commands/FetchRandomUsers.php
 ├── Http/
 │    └── Controllers/UserController.php
 ├── Models/
 │    ├── User.php
 │    ├── UserDetail.php
 │    └── UserLocation.php
database/
 └── migrations/
      ├── create_users_table.php
      ├── create_user_details_table.php
      └── create_user_locations_table.php
routes/
 └── api.php
 └──console.php


- Database Design
    - users: Core user info (name, email).
    - user_details: Gender (linked via user_id).
    - locations: City & country (linked via user_id).
- Scheduled Task
    - Runs every 5 minutes using Laravel Scheduler.
    - Fetches 5 random users from https://randomuser.me/api/.
    - Saves them into the three tables.
- API Endpoint
    - /api/users supports filters: gender, city, country.
    - Supports limit to control number of records.
    - Optional fields parameter to return only selected fields.
- Enhancement
    - Flexible response fields allow lightweight queries.
    - Example: /api/users?gender=female&fields=name,email


