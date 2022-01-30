    /* Users table 
    id: Auto increments by 1 everytime a user is made
    username: The onsite name the user will go by.
    email: The email address the player uses to sign up.
    password: The key used to show ownership of account.
    created_at: The time the account is made (logged on second of account signup)
    updated_at: Used to display if the user is online or offline. Everytime the user clicks on a page a function runs that updates this variable.

    */
<<<<<<< HEAD
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(254) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME
);
=======
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
>>>>>>> 36744933d07f34c104226be579c3b01d964d0c32
