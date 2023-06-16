# Symfony Project

This is a Symfony project for managing invoices and invoice lines.

## Prerequisites

- PHP 8.x
- Symfony 5.4.x
- Composer

## Installation

1. Clone the repository:

   ```bash
   git clone git@github.com:BagzieGracious/symfony-app.git

2. Install the dependencies:
    ```bash
    composer install

3. Configure the Database
    - Rename the .env.example file to .env.
    - Update the DATABASE_URL parameter in the .env file with your database configuration.

4. Create the Database
    ```bash
    bin/console doctrine:database:create

5. Apply Migrations
    ```bash
    bin/console doctrine:migrations:migrate

6. symfony server:start
    ```bash
    symfony serve

## Usage
    - Create an Invoice:
        - Visit http://localhost:8000/invoice/new to create a new invoice.
        - Fill in the required details and submit the form.
    - View Invoices:
        - Visit http://localhost:8000/invoice to view a list of all invoices.
    - Create an Invoice Line:
        - Visit http://localhost:8000/invoice/{id}/line/new to create a new invoice line for a specific invoice.
        - Fill in the details and submit the form.
    - View Invoice Details:
        - Visit http://localhost:8000/invoice/{id} to view the details of a specific invoice.
