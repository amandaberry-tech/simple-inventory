# simple-inventory

## Overview

This Inventory Management Website is a simple web application designed to manage and track inventory items. It allows users to add, update, and delete inventory items, displaying all data dynamically in an HTML table. The application uses a Microsoft SQL Server database for backend storage and is built with PHP, JavaScript, and HTML/CSS.

## Features

1. **View Inventory**: Displays the current inventory with item ID, name, quantity, and price.
2. **Add Items**: Add new inventory items through a simple form.
3. **Update Quantities**: Automatically updates quantities if an item with the same name is added.
4. **Delete Items**: Remove items from the inventory.

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: Microsoft SQL Server
- **Development Environment**: XAMPP for local hosting

## Setup and Installation

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/your-username/repository-name.git
   ```
2. **Set Up the Database**:
   - Create a database named `InventoryManagement` in Microsoft SQL Server.
   - Run the following SQL script to create the `inventory` table:
     ```sql
     CREATE TABLE inventory (
         ID INT IDENTITY(1,1) PRIMARY KEY,
         ItemName NVARCHAR(255) NOT NULL,
         Quantity INT NOT NULL,
         Price DECIMAL(10, 2) NOT NULL
     );
     ```
3. **Configure the Connection**:
   - Open the PHP files and update the database credentials in `fetch_inventory.php` and `add_item.php`:
     ```php
     $serverName = "localhost";
     $connectionOptions = [
         "Database" => "InventoryManagement",
         "Uid" => "your_username",
         "PWD" => "your_password"
     ];
     ```
4. **Start the Development Server**:
   - Launch XAMPP and start Apache.
   - Place the project folder in the XAMPP `htdocs` directory.
   - Access the website at `http://localhost/your-project-folder`.

## File Structure

```
project-folder/
|-- index.html          # Main UI for the inventory system
|-- fetch_inventory.php # Fetch inventory data from the database
|-- add_item.php        # Add new items or update quantities in the database
|-- delete_item.php     # Delete items from the database (optional future feature)
|-- styles.css          # Custom styles for the website
```

## How It Works

### Fetching Inventory

- The `fetch_inventory.php` file queries the database and returns JSON data representing the current inventory. The JavaScript function `fetchInventory` dynamically updates the HTML table using this data.

### Adding Items

- When a new item is submitted via the form, the `add_item.php` script is called via a `POST` request. If the item already exists, the quantity is updated; otherwise, a new record is created.

### Updating the Table

- After each update, the inventory table is refreshed by calling the `fetchInventory` function to reflect the latest database state.

## Known Issues and Improvements

- **Delete Functionality**: Currently, deleting items is implemented but needs further enhancements.
- **Validation**: Client-side validation could be enhanced to prevent invalid entries.
- **UX**: Adding more visual feedback (e.g., success or error messages) could improve user experience.

## License

This project is licensed under the [MIT License](LICENSE).

---



