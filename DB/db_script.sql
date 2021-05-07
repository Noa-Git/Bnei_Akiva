CREATE DATABASE bnei_akiva;
USE bnei_akiva;

CREATE TABLE unit(
    id INT AUTO_INCREMENT PRIMARY KEY,
    uname VARCHAR(32),
    phone VARCHAR(11),
    email VARCHAR(30) NOT NULL UNIQUE,
    city VARCHAR(30),
    street VARCHAR(30),
    house_number INT,
    zip_code INT
); 


CREATE TABLE manager(
    id VARCHAR(9) PRIMARY KEY,
    fname VARCHAR(30),
    lname VARCHAR(30),
    phone VARCHAR(11),
    email VARCHAR(30) NOT NULL UNIQUE,
    ppassword VARCHAR(32),
    city VARCHAR(30),
    street VARCHAR(30),
    house_number INT,
    zip_code INT,
    birth_date DATE,
    unit_id INT,
    FOREIGN KEY(unit_id) REFERENCES unit(id) ON DELETE CASCADE
); 

CREATE TABLE ageGrade(
    id INT AUTO_INCREMENT PRIMARY KEY,
    grade VARCHAR(30),
    age INT
); 

CREATE TABLE guide(
    id VARCHAR(9) PRIMARY KEY,
    fname VARCHAR(30),
    lname VARCHAR(30),
    phone VARCHAR(11),
    email VARCHAR(30) NOT NULL UNIQUE,
    ppassword VARCHAR(32),
    city VARCHAR(30),
    street VARCHAR(30),
    house_number INT,
    zip_code INT,
    birth_date DATE,
    unit_id INT,
    ageGrade_id INT,
    FOREIGN KEY(ageGrade_id) REFERENCES ageGrade(id) ON DELETE CASCADE,
    FOREIGN KEY(unit_id) REFERENCES unit(id) ON DELETE CASCADE
); 

CREATE TABLE member(
    id VARCHAR(9) PRIMARY KEY,
    fname VARCHAR(30),
    lname VARCHAR(30),
    phone VARCHAR(11),
    email VARCHAR(30),
    ppassword VARCHAR(32),
    gender VARCHAR(1),
    birth_day date,
    insurance VARCHAR(2) DEFAULT 'N',
    unit_id INT,
    guide_id VARCHAR(9),
    ageGrade_id INT,
    FOREIGN KEY(ageGrade_id) REFERENCES ageGrade(id) ON DELETE CASCADE,
    FOREIGN KEY(unit_id) REFERENCES unit(id) ON DELETE CASCADE,
    FOREIGN KEY(guide_id) REFERENCES guide(id) ON DELETE CASCADE
); 

CREATE TABLE parent(
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(30),
    lname VARCHAR(30),
    phone VARCHAR(11),
    email VARCHAR(30) NOT NULL UNIQUE,
    ppassword VARCHAR(32),
    city VARCHAR(30),
    street VARCHAR(30),
    house INT,
    apartment INT,
    member_id VARCHAR(9),
    unit_id INT,
    FOREIGN KEY(member_id) REFERENCES member(id) ON DELETE CASCADE,
    FOREIGN KEY(unit_id) REFERENCES unit(id) ON DELETE CASCADE
); 


CREATE TABLE pending_member(
    id VARCHAR(9) PRIMARY KEY,
    fname VARCHAR(30),
    lname VARCHAR(30),
    phone VARCHAR(11),
    email VARCHAR(30) NOT NULL UNIQUE,
    ppassword VARCHAR(32),
    gender VARCHAR(1),
    insurance VARCHAR(2) DEFAULT 'N',
    unit_id INT,
    guide_id VARCHAR(9),
    ageGrade_id INT,
    FOREIGN KEY(ageGrade_id) REFERENCES ageGrade(id) ON DELETE CASCADE,
    FOREIGN KEY(unit_id) REFERENCES unit(id) ON DELETE CASCADE,
    FOREIGN KEY(guide_id) REFERENCES guide(id) ON DELETE CASCADE
);

CREATE TABLE activity(
    ttime DATETIME,
    street VARCHAR(10),
    street_num INT,
    guide_id VARCHAR(9),
    FOREIGN KEY(guide_id) REFERENCES guide(id) ON DELETE CASCADE
);


-- CREATE TABLE meeting(
--     ttime DATETIME,
--     latitude FLOAT,
--     longitude FLOAT,
--     guide_id VARCHAR(9),
--     parent_id INT,
--     member_id VARCHAR(9),
--     manager_id VARCHAR(9),
--     FOREIGN KEY(guide_id) REFERENCES guide(id) ON DELETE CASCADE,
--     FOREIGN KEY(parent_id) REFERENCES parent(id) ON DELETE CASCADE,
--     FOREIGN KEY(member_id) REFERENCES member(id) ON DELETE CASCADE,
--     FOREIGN KEY(manager_id) REFERENCES manager(id) ON DELETE CASCADE
-- );

CREATE TABLE trip(
    id INT AUTO_INCREMENT PRIMARY KEY,
    trip_name VARCHAR(20),
    out_date DATE,
    back_date DATE,
    latitude FLOAT,
    longitude FLOAT
); 

CREATE TABLE users_in_trip(
    trip_id INT,
    manager_id VARCHAR(9),
    parent_id INT,
    guide_id VARCHAR(9),
    member_id VARCHAR(9),
    FOREIGN KEY(trip_id) REFERENCES trip(id) ON DELETE CASCADE,
    FOREIGN KEY(manager_id) REFERENCES manager(id) ON DELETE CASCADE,
    FOREIGN KEY(guide_id) REFERENCES guide(id) ON DELETE CASCADE,
    FOREIGN KEY(parent_id) REFERENCES parent(id) ON DELETE CASCADE,
    FOREIGN KEY(member_id) REFERENCES member(id) ON DELETE CASCADE
); 

CREATE TABLE price_list(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nname VARCHAR(20) NOT NULL UNIQUE,
    description VARCHAR(20),
    price DOUBLE
);

CREATE TABLE payment(
    id INT AUTO_INCREMENT PRIMARY KEY,
    pdate DATETIME,
    payment_nname VARCHAR(20),
    parent_id INT,
    paid INT DEFAULT 0,
    FOREIGN KEY(payment_nname) REFERENCES price_list(nname) ON DELETE CASCADE,
    FOREIGN KEY(parent_id) REFERENCES parent(id) ON DELETE CASCADE
); 

CREATE TABLE transactions_paypal(
    id INT AUTO_INCREMENT PRIMARY KEY,
    payment_id INT,
    parent_id INT,
    HASH VARCHAR(16),
    complete INT DEFAULT 0,
    FOREIGN KEY(payment_id) REFERENCES payment(id) ON DELETE CASCADE,
    FOREIGN KEY(parent_id) REFERENCES parent(id) ON DELETE CASCADE
); 


CREATE TABLE expanse(
    id INT AUTO_INCREMENT PRIMARY KEY,
    edate DATE,
    ename VARCHAR(10),
    price DOUBLE,
    guide_id VARCHAR(9),
    description VARCHAR(30),
    FOREIGN KEY(guide_id) REFERENCES guide(id) ON DELETE CASCADE
);
