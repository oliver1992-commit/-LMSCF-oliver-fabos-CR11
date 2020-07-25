<?php

require_once "connection.php";



$table_users = "CREATE TABLE users(
    users_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userName CHAR(40),
    e_mail CHAR(30) UNIQUE,
    password_code VARCHAR(255),
    users_type ENUM('users','admin') DEFAULT 'users')";


$query = $conn->query($table_users);





$table_adopt = "CREATE TABLE adoption(
    adopt_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    adopt_time DATE,
    fk_users_id INT,
    fk_animal_id INT)";



$query = $conn->query($table_adopt);



$table_animal = "CREATE TABLE animals(
    animal_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    animal_name CHAR(20) NOT NULL,
    age CHAR(30) NOT NULL,
    breed ENUM ('Domestic Animal','Bird', 'Mammal', 'Insect', 'Reptile', 'Sea Animal', 'Farm Animal', 'Wild Animal'),
    size ENUM ('small','large'),
    hobby TEXT,
    animal_description TEXT,
    available ENUM('yes','no'),
    age_description ENUM('young','senior'),
    available_from DATE,
    farm_name CHAR(20) NOT NULL,
    city CHAR(30) NOT NULL,
    zip_code CHAR(15) NOT NULL,
    farm_address CHAR(30) NOT NULL,
    animal_image TEXT,
    farm_image TEXT)";


$query = $conn->query($table_animal);




/*
ALTER TABLE adoption ADD FOREIGN KEY (fk_users_id) REFERENCES users(users_id) ON DELETE CASCADE;
ALTER TABLE adoption ADD FOREIGN KEY (fk_animal_id) REFERENCES animals(animal_id) ON DELETE CASCADE;
*/

/*if($count==1 && $row['password_code']==$pass)
        {
            if($row['users_type'] == 'admin')
            {
                $_SESSION['admin'] = $row['users_id'];
                header("Location: admin_index.php");
                echo "great job";
            }
            else
            {
            $_SESSION['project'] = $row['users_id'];
            header("Location: index.php");
            echo "Succces";
            }
        }
        else
        {
        $errMSG = "Incorrect credentials, Try again";
        }

*/
?>