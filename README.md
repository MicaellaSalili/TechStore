# TechStore

A simple e-commerce web application built with PHP and MySQL, styled with Bootstrap. This project is designed to run locally using XAMPP.

## Features
- Product listing with category filter
- Product details modal
- Responsive design using Bootstrap
- MySQL database integration

## Getting Started

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) (or any local Apache + MySQL server)
- [Git](https://git-scm.com/)

### Installation
1. Clone this repository into your XAMPP `htdocs` directory:
   ```bash
   git clone https://github.com/MicaellaSalili/TechStore.git e-commerce
   ```
2. Start Apache and MySQL from the XAMPP control panel.
3. Import the database:
   - Open phpMyAdmin at [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
   - Create a database named `techstore`.
   - Import your `products` table and data (create the table and insert sample data as needed).
4. Access the site at [http://localhost/e-commerce/index.php](http://localhost/e-commerce/index.php)

## Project Structure
- `index.php` - Main product listing page
- `details.php` - Product details page
- `css/` - Bootstrap CSS files
- `js/` - Bootstrap JS files
- `images/` - Product images

## Customization
- Update the `products` table in your MySQL database to add or edit products.
- Place product images in the `images/` folder and update the image path in the database.

## License
This project is for educational purposes only.
