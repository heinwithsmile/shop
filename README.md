# Laravel 10 Furniture Store

Welcome to our Furniture Store, a modern and user-friendly e-commerce platform built with Laravel. Our platform offers a wide range of high-quality furniture products, making it easy for customers to browse, purchase, and enjoy stylish and functional pieces for their homes and offices.

## Features

- **Product Catalog**: Explore a diverse selection of furniture items categorized by type, style, and room.
- **User Accounts**: Create and manage user profiles for a personalized shopping experience.
- **Shopping Cart**: Add items to your cart and manage your selections before checkout.
- **Secure Payments**: Enjoy safe and secure payment processing through integrated payment gateways.
- **Order Management**: Track orders and view purchase history with ease.
- **Admin Dashboard**: Manage products, categories, orders, and customers through an intuitive admin interface.

## Installation

To set up the Furniture Store project locally, follow these steps:

1. **Clone the repository**

   ```sh
   git clone https://github.com/otechhein/Furniture-Store.git
   cd furniture-store

2. **Install dependencies**
   Make sure you have Composer installed. Then, run:
    ```sh
    composer install

3. **Set up the environment variables**
   Copy the .env.example file to .env and modify the necessary environment settings:
   ```sh
   cp .env.example .env
   
Update the .env file with your database and other configuration details.

4. **Generate an application key**
   ```sh
   php artisan key:generate

5. **Run the database migrations**
   Make sure your database is running, then run:
   ```sh
   php artisan migrate

6. **Install front-end dependencies**
   Make sure you have Node.js and NPM installed. Then, run:
    ```sh
    npm install

7. **Compile the assets**
   ```sh
   npm run dev

8. **Start the development serve**
   ```sh
   php artisan  serve

9. **Access the application**
    Open your browser and navigate to http://localhost:8000 to see your Furniture Store application in action.

## Good Luck!


