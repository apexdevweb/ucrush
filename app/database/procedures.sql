DELIMITER $$

CREATE PROCEDURE signup_user(IN p_ip VARCHAR(45),IN p_name VARCHAR(255),IN p_gender VARCHAR(50),IN p_location VARCHAR(255),IN p_age INT, IN p_mail VARCHAR(255),
IN p_pass VARCHAR(255), IN p_key INT, IN p_dateRegister DATETIME)
BEGIN
  INSERT INTO users (user_ip ,user_name, user_gender, user_location, user_age, user_mail, user_password, user_key, user_dte_register) VALUES (INET6_ATON(p_ip), p_name, p_gender, p_location, p_age, p_mail, p_pass, p_key, p_dateRegister);
END $$

CREATE PROCEDURE userMailVerif(IN p_mail VARCHAR(255))
BEGIN
    SELECT COUNT(*) FROM users WHERE user_mail = p_mail;
END $$

CREATE PROCEDURE login_user(IN p_mail VARCHAR(255))
 BEGIN
   SELECT * FROM users WHERE "user_mail = p_mail";
 END $$

CREATE PROCEDURE get_all_mens()
BEGIN
  SELECT "user_id, user_name, user_gender, user_location, user_description, user_age, user_avatar" FROM "users" WHERE "user_gender" = "M";
END $$

CREATE PROCEDURE get_all_womens()
BEGIN
  SELECT "user_id, user_name, user_gender, user_location, user_description, user_age, user_avatar" FROM "users" WHERE "user_gender" = "F";
END $$

CREATE PROCEDURE update_profil(IN p_id INT,IN p_location VARCHAR(255))
BEGIN
    UPDATE users SET user_avatar = 1, user_location = p_location WHERE user_id = p_id;
END $$
DELIMITER;