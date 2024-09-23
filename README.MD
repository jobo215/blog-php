# Blog Application

This is a simple web-based application for managing blog posts. Users can create, edit, view, and delete posts with categories, as well as navigate through the application with responsive design.

## Features

- Create new posts with title, content, and category.
- Edit existing posts with a pre-filled form.
- Delete posts with confirmation dialogs.
- Responsive UI with mobile support.
- Categories filter to sort posts.
- Comments section for each post.

## Technologies Used

- HTML
- CSS
- JavaScript/Jquery
- PHP

## Prerequisites

To set up and run this project, ensure you have the following installed:

- **PHP** (>= 5.6)
- **MySQL** or MariaDB (for database)
- **Apache** or any PHP-capable web server
- A modern web browser (e.g., Chrome, Firefox)
- A database client (e.g., phpMyAdmin, MySQL Workbench)

## Getting Started

Follow the steps below to set up the project:

### 1. Clone the Repository

```bash
git clone https://github.com/jobo215/blog-php.git
cd post-management-app
```

### 2. Database Setup

1. Create a new database in MySQL (or MariaDB):

```sql
CREATE DATABASE blog-php;
```

2. Import the database schema (blog-php.sql)
3. Create .env file in `/scripts/db` folder
4. In .env file create variables `DB_NAME`, `DB_USER`, `DB_PASS`, `DB_HOST` to match your environment database name, username, password and host

### 3. Running the Project

Visit the homepage by navigating to e.g.:
`http://localhost/blog-php/index`

## Application Routes

Here are the main routes in the application:

1. #### Login (/public/login.php)

This page allows registered users to log into the application.

- Form Fields:

  - Username: Users must enter their registered username.
  - Password: The password associated with their account.

- Links:

  - No Account?: A link to the registration page (register.php) is displayed below the login form for new users.

- Errors:
  - If login credentials are incorrect, an error message will be displayed in the form of a alert.

2. #### Register (/public/register.php)

This page allows new users to create an account.

- Form Fields:

  - Username: A unique username that the user will use to log in.
  - Password: The user is required to create a password (minimum 8 characters).
  - Confirm Password: To ensure password accuracy, users need to enter the password again.
  - First Name: The user's first name.
  - Last Name: The user's last name.
  - Email: A valid email address for account verification.

- Links:

  - Already have an account?: A link to the login page (login.php) is displayed below the registration form.

- Validation:
  - Form validation checks for empty fields, valid email format, and password confirmation match.
  - Any errors are displayed below the respective form fields.

3. #### Main Page (/posts/posts.php)

Displays a list of all posts.
Users can filter posts by category.
Cards show the title, truncated content, author, and category.

4. #### Create Post (/posts/create.php)

Form for creating a new post with title, content, and category.
Form submission is handled with PHP and stored in the database.

5. #### Edit Post (/posts/edit.php?id={post_id})

Pre-filled form for editing an existing post.
Changes are saved to the database.

6. #### Post Preview (/posts/post.php?id={post_id})

Displays a single post with its full content, category, and author.
Includes a comments section.
Options to edit or delete the post.

## CSS Styling

The project uses custom CSS for layout and responsiveness, with some Bootstrap components for consistency.

### Key Classes:

- `.form-group`: Wraps form elements like labels and inputs.
- `.container`: Centers content on the page.
- `.footer`: Responsive sticky footer.
- `.card`: Used for displaying post information on the homepage.

## JavaScript Functionality

Basic JavaScript is used for the following:

- #### Content Truncation:
  Post content is truncated to 100 characters for display purposes on the homepage.
- #### Category Filter:
  A dropdown allows users to filter posts by category dynamically.

## PHP Functionality

- #### Post Management:
  Posts are stored in a MySQL database, with PHP handling create, update, and delete operations.
- #### Database Connection:
  Handled through a simple mysqli connection in the `/scripts/db/database.php` file

## Database structure

### Tables:

- post
  - `id`: Primary key
  - `title`: Post title
  - `content`: Full content of the post
  - `created_date`: Timestamp for when the post was created
  - `updated_date`: Timestamp for when the post was last updated
  - `category`: Id of post category
  - `creator`: Id of user who created post
- comment
  - `id`: Primary key
  - `content`: Comment content
  - `created_date`: Timestamp of when the post was created
  - `commenter`: Id of user who commented
  - `post`: Id of post which is commented
- category
  - `id`: Primary key
  - `category_title`: Title of category
- users
  - `id`: Primary key
  - `first_name`: User first name
  - `last_name`: User last name
  - `username`: Users username
  - `email`: Users email
  - `password`: Hashed value for users password

### Steps Included:

- **Getting Started**: Setting up the environment.
- **Database Setup**: How to create the database and import the schema.
- **Configuration**: Where to update your database credentials.
- **Application Routes**: Key PHP files and their routes.
- **Technology Stack**: PHP, MySQL, HTML, CSS, and JavaScript details.
