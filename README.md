# Car Value Estimation API

This project aims to develop an API for estimating the value of cars. The API allows users to manage cars, estimate prices, and authenticate securely. It also includes unit tests and a GitHub workflow for automated build, test, and deployment processes.

## Features

1. **Admin Management**
   - Create a default admin via seeder.
   - Manage users: create, modify, delete.

2. **User Authentication**
   - Authenticate users and obtain an access token for data access.

3. **Car Management**
   - Users can view cars in the database.
   - Users can estimate the price of a car.

4. **Bonus Features**
   - Improved estimation algorithm using scoring.
   - Estimate prices for similar cars if no exact match is found.
   - Rate limiting to restrict the number of requests per user.

## Technologies Used

- **Framework:** Laravel
- **Database:** MySQL
- **Testing:** PHPUnit
- **Workflow:** GitHub Actions


