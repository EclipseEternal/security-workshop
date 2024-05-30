# Secure Coding Workshop

## Overview

This repository contains exercises to help you practice securing web applications against common vulnerabilities such as
SQL Injection, Cross-Site Scripting (XSS), and Cross-Site Request Forgery (CSRF).

## Setup Instructions

### Prerequisites

- Docker
- Docker Compose

### Running the Exercises

1. Clone the repository:
   ```bash
   git clone https://github.com/EclipseEternal/security-workshop.git
   cd security-workshop
2. Start the Docker containers:
   ```bash
   docker compose up --build -d
3. Access the exercises:
    * PHP (Exercise 1): http://localhost:8080/Exercise1
    * JavaScript (Exercise 2): http://localhost:8081/Exercise2/
    * PHP (Exercise 3): http://localhost:8080/Exercise3/form.php
4. Create a new branch
   ```bash
   git checkout -b your_name   
5. Follow the instructions below
6. Push your code changes
   ```bash
   git add .
   git commit -m "Completed security exercises"
   git push origin your_name
7. Create a pull request from your branch to the main repository.
## Exercises

### Exercise 1 - Secure a PHP Form Handling Script Against SQL Injection

File to modify: php/src/Exercise1/index.php line 31 -> 40

Modify the code to use prepared statements and parameterized queries.
#### How to test
* Type `anything` in the first input and `anything' OR '1'='1` in the input and you will discover the username of the first user in the DB!!!

### Exercise 2: Secure a JavaScript Application Against XSS

File to modify: js/src/Exercise2/index.html line 20 -> 21

Modify the code to sanitize user input to prevent XSS attacks.

#### How to test
* Type
   ```html
   <img src="https://cdn.sstatic.net/Sites/stackoverflow/img/sprites.svg?v=1b3cdae197be" onload="alert(1)">
* and see the alert executing

### Exercise 3: Implement CSRF Protection in a PHP Form

Files to modify: php/src/Exercise3/form.php line 12 -> 19, php/src/Exercise3/change_email.php line 7 -> 16

Implement CSRF protection by adding a CSRF token to the form and validating it in the processing script.

#### How to test
* What should work:
  * Go on http://localhost:8080/Exercise3/form.php
  * Complete the form
  * See user email changed
* What should not work:
  * Go to http://localhost:8080/Exercise3/attack.html (this simulates the logged in user who clicked on a fake website)
  * Fill in the form
  * Notice that the email is changed