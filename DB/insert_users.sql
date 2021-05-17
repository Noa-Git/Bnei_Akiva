USE bnei_akiva;
INSERT INTO `users` (`email`, `password`, `fname`, `lname`, `phone`, `role_id`, `profile_pic`, `city`, `street`,
                     `house_number`, `zip_code`)
VALUES ('idanmor@gmail.com', '1234', 'idan', 'mor', '0541234567', '2', NULL, 'Tel-Aviv', 'Azza', '1', '0000'),
       ('danielyam@gmail.com', '1234', 'daniel', 'yam', '054-1111111', '2', NULL,
        'Rananna', 'Ahuza', '282', '51300'),
       ('amitreshef@gmail.com', '1234', 'amit', 'reshef', '054-3333333', '2', NULL, 'Herzliya', 'Hayam', '5', '55555');
