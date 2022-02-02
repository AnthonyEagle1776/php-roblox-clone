    /* Users table 
    id: Auto increments by 1 everytime a user is made
    username: The onsite name the user will go by. (Social)
    email: The email address the player uses to sign up.
    password: The key used to show ownership of account.
    created_at: The time the account is made (logged on second of account signup)
    updated_at: Used to display if the user is online or offline. Everytime the user clicks on a page a function runs that updates this variable.
    status: The status of how the user is doing. (Social)
    admin: The user's admin status. (0 = not admin; 1 = admin; 2 = superadmin)

    */
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `admin` tinyint(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
