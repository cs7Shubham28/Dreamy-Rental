# Dreamy Rental 🏠

Dreamy Rental is a web-based **property rental and management system** developed using PHP and MySQL. The platform allows users to browse, search, view, and book properties, while administrators can manage properties, users, locations, bookings, feedback, and other website content through an administrative dashboard.

The system is designed to provide a simple and user-friendly platform for connecting people with suitable rental properties.

## ✨ Features

### 👤 User Features

* User registration and login
* User profile management
* Secure session-based access
* Search properties by:

  * Purpose (Rent, Sale, Resale)
  * Property type
  * Location
* Browse available properties
* View detailed property information
* View property images
* Submit property listings
* Book properties
* View booking information
* Cancel bookings
* Submit feedback
* Contact the website
* Frequently Asked Questions (FAQ)
* View property-related stories/content

### 🛠️ Admin Features

* Admin login and authentication
* Admin dashboard
* View registered users
* Manage users
* Add new properties
* Edit property details
* Delete properties
* View property details
* Manage property locations
* Add and update locations
* Manage property bookings
* View booked and cancelled properties
* Manage user feedback
* Manage contact messages
* Mark messages as read
* Manage website/about content
* Admin profile management
* Admin logout

## 🏡 Property Management

The system stores detailed information about properties, including:

* Property name
* Price
* Deposit amount
* Address
* Offer type
* Property type
* Property status
* Furnishing status
* BHK
* Bedrooms
* Bathrooms
* Balcony
* Kitchen
* Hall
* Area
* Property age
* Number of floors
* Floor/room information
* Loan information
* Description
* Additional facilities
* Booking status
* Booking date
* Property images

## 🔎 Property Search

Users can search properties using different criteria such as:

* Rent or sale
* Property type
* Location

This helps users find properties according to their requirements.

## 🧑‍💻 Technologies Used

### Frontend

* HTML5
* CSS3
* JavaScript

### Backend

* PHP

### Database

* MySQL
* MariaDB compatible

### Development Environment

* XAMPP
* Apache
* phpMyAdmin

## 📁 Project Structure

```text
Dreamyrental/
│
├── Admin/
│   ├── dashboard.php
│   ├── index.php
│   ├── addproperty.php
│   ├── editpropertydetail.php
│   ├── viewproperty.php
│   ├── user.php
│   ├── bookproperty.php
│   ├── feedbackmsg.php
│   ├── contactmsg.php
│   └── ...
│
├── User/
│   ├── index.php
│   ├── login.php
│   ├── register.php
│   ├── property.php
│   ├── viewproperty.php
│   ├── searchresult.php
│   ├── booking.php
│   ├── viewbooking.php
│   ├── cancelbooking.php
│   ├── submitproperty.php
│   ├── profile.php
│   ├── feedback.php
│   ├── contact.php
│   ├── FAQs.php
│   └── ...
│
├── Including/
│   ├── db_connection.php
│   ├── header.php
│   ├── footer.php
│   ├── links.php
│   └── ...
│
├── Admin/Includefile/
│   ├── sidebar.php
│   ├── topheader.php
│   ├── footer.php
│   └── ...
│
├── assets/
│   ├── images/
│   └── logo/
│
├── uploadphoto/
│   ├── property/
│   ├── users/
│   ├── feedback/
│   └── admin/
│
├── css/
│   ├── styles.css
│   ├── responsive.css
│   ├── property.css
│   ├── booking.css
│   ├── dashboard.css
│   ├── admin.css
│   └── ...
│
├── JavaScripts/
│
├── database/
│   └── dreamyrental (1).sql
│
├── .gitignore
└── README.md
```

## 🗄️ Database

The project uses a MySQL database named:

```text
dreamyrental
```

The database SQL file is located at:

```text
database/dreamyrental (1).sql
```

The database contains tables for major system components such as:

* Users
* Admin
* Properties
* Bookings
* Locations
* Feedback
* Contact messages
* About content

## ⚙️ Installation and Setup

### 1. Install XAMPP

Install XAMPP and start:

* Apache
* MySQL

### 2. Clone the Repository

```bash
git clone https://github.com/cs7Shubham28/Dreamy-Rental.git
```

### 3. Move the Project

Place the project inside the XAMPP `htdocs` directory.

For example:

```text
xampp/
└── htdocs/
    └── Dreamyrental/
```

### 4. Create the Database

Open phpMyAdmin:

```text
http://localhost/phpmyadmin/
```

Create a database named:

```text
dreamyrental
```

### 5. Import the SQL File

Import:

```text
database/dreamyrental (1).sql
```

into the `dreamyrental` database.

### 6. Check Database Connection

The database connection is configured in:

```text
Including/db_connection.php
```

Default local XAMPP configuration:

```text
Host: localhost
Username: root
Password: empty
Database: dreamyrental
```

If your MySQL configuration is different, update the connection settings accordingly.

### 7. Run the Project

Open the following URL in your browser:

```text
http://localhost/Dreamyrental/User/
```

The administrative section can be accessed through:

```text
http://localhost/Dreamyrental/Admin/
```

> **Security Note:** Never publish real database passwords, administrator credentials, API keys, or other sensitive information in the repository.

## 🔐 Security

This project is intended primarily as an academic/project implementation.

For production use, additional security improvements should be implemented, including:

* Password hashing
* Input validation and sanitization
* Prepared SQL statements
* CSRF protection
* Strong session management
* Secure file upload validation
* Environment-based database credentials
* Role-based authorization improvements

## 🚀 Future Improvements

Possible future enhancements include:

* Online payment integration
* Advanced property filtering
* Property ratings and reviews
* Email/SMS booking notifications
* Map and location integration
* Improved authentication and authorization
* Password reset through email
* Property owner/landlord accounts
* Favorites/wishlist functionality
* Improved mobile responsiveness
* REST API integration
* More advanced admin analytics

## 🎓 Project Purpose

Dreamy Rental was developed as a web application project to demonstrate practical knowledge of:

* Web application development
* PHP backend programming
* MySQL database management
* CRUD operations
* Session management
* User authentication
* Property management
* Search functionality
* Booking management
* Administrative dashboards
* Responsive web design

## 👨‍💻 Developer

**Shubham**

B.Sc. CSIT Student

GitHub: https://github.com/cs7Shubham28

## 📄 License

This project is developed for educational and academic purposes.
