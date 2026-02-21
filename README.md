# Star Apparels – Office Management System

## Project Overview
The Star Apparels Office Management System is a web-based application designed to simplify operations across multiple branches of the leading private sector clothing company, **Star Apparels**. The system enables efficient management of employees, orders, and projects while maintaining accurate records for personnel and dependents for insurance purposes.

This project integrates a MySQL database with a PHP-powered web interface, supporting complete CRUD operations for branches, employees, orders, and dependents.


## Key Features
- Branch Management
  - Maintain details of all branches.
  
- Employee Management
  - Store employee information.
  - Track employees assigned to multiple orders/projects.
  - Record work hours for each employee per project/order (visible only to supervisors).

- Order/Project Management
  - Create and manage orders with unique IDs and client details.
  - Assign managers and supervisors to orders/projects.

- Dependent Management
  - Record dependents' information.
  - Limit dependents to a maximum of 3 per employee.

- User Roles
  - Managers and supervisors can create new orders and assign staff.
  - Employee profile pages for personnel information.

- CRUD Operations
  - Create, Read, Update, and Delete data for employees, branches, orders, and dependents.


## Project Components
- EERD (Enhanced Entity Relationship Diagram)
   - Designed using UML notation to represent entities such as Branch, Employee, Order, and Dependent with appropriate relationships and constraints.

- Database Design
   - Database normalized to 3NF for efficiency.
   - Logical schema derived from EERD.

- SQL Implementation
   - MySQL scripts to create tables, set relationships (primary/foreign keys), and enforce constraints.

- Web Application (PHP + MySQL)
   - Frontend: Simple, user-friendly interface with HTML/CSS and minimal JavaScript.
   - Backend: PHP for dynamic server-side operations and database connectivity.
   - CRUD functionalities: Fully implemented for all main entities.


## Technology Stack
- Frontend: HTML, CSS, JavaScript
- Backend: PHP (Core PHP)
- Database: MySQL
- Tools:
  - MySQL Workbench (Database Design)
  - XAMPP / WAMP (Local Server for PHP + MySQL)




