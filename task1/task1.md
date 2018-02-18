CREATE TABLE `users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) DEFAULT NULL,
    `gender` INT(11) NOT NULL,
    `birth_date` DATE NOT NULL,
    PRIMARY KEY (`id`),
    INDEX idx_birth_date (birth_date)
)

CREATE TABLE `phone_numbers` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `phone` VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (user_id) REFERENCES users(id)
)

SELECT users.name, COUNT(phone_numbers.id)
FROM users
JOIN phone_numbers ON users.id = phone_numbers.user_id
WHERE users.birth_date BETWEEN '1998-02-15' AND '2000-02-15'
AND users.gender = 2
GROUP BY users.name
