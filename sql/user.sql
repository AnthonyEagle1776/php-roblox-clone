CREATE TABLE users (
    /* Users table 
    id: Auto increments by 1 everytime a user is made
    username: The onsite name the user will go by.
    email: The email address the player uses to sign up.
    password: The key used to show ownership of account.
    created_at: The time the account is made (logged on second of account signup)

    */
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(254) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);