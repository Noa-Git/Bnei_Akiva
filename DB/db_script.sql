CREATE
DATABASE bnei_akiva;
USE
bnei_akiva;

CREATE TABLE role
(
    id   INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(32) NOT NULL
);

CREATE TABLE user
(
    email       VARCHAR(32) PRIMARY KEY,
    password    VARCHAR(32),
    fname       VARCHAR(32),
    lname       VARCHAR(32),
    phone       VARCHAR(32),
    role_id     INT,
    profile_pic LONGBLOB,
    city         VARCHAR(32),
    street       VARCHAR(32),
    house_number INT,
    zip_code     INT,
    FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE
);


CREATE TABLE ageGrade
(
    id    INT AUTO_INCREMENT PRIMARY KEY,
    grade VARCHAR(8),
    name  VARCHAR(8)
);

CREATE TABLE guide
(
    user_email  VARCHAR(32),
    ageGrade_id INT,
    FOREIGN KEY (user_email) REFERENCES user (email) ON DELETE CASCADE,
    FOREIGN KEY (ageGrade_id) REFERENCES ageGrade (id) ON DELETE CASCADE
);

CREATE TABLE parent
(
    user_email VARCHAR(32),
    FOREIGN KEY (user_email) REFERENCES user (email) ON DELETE CASCADE
);


CREATE TABLE member
(
    user_email   VARCHAR(32),
    parent_email VARCHAR(32),
    insurance    BOOLEAN,
    trips        BOOLEAN,
    membership   BOOLEAN,
    ageGrade_id  INT,
    notes        VARCHAR(100),
    pending      BOOLEAN,
    FOREIGN KEY (user_email) REFERENCES user (email) ON DELETE CASCADE,
    FOREIGN KEY (parent_email) REFERENCES parent (user_email) ON DELETE CASCADE,
    FOREIGN KEY (ageGrade_id) REFERENCES ageGrade (id) ON DELETE CASCADE
);


CREATE TABLE activity
(
    id            INT AUTO_INCREMENT PRIMARY KEY,
    name          VARCHAR(32),
    description   VARCHAR(100),
    time          DATETIME,
    after_summary VARCHAR(100),
    ageGrade_id   INT,
    guide_email   VARCHAR(32),
    FOREIGN KEY (ageGrade_id) REFERENCES ageGrade (id) ON DELETE CASCADE,
    FOREIGN KEY (guide_email) REFERENCES guide (user_email) ON DELETE CASCADE
);

CREATE TABLE health_declare
(
    activity_id  INT,
    member_email VARCHAR(32),
    FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE,
    FOREIGN KEY (member_email) REFERENCES member (user_email) ON DELETE CASCADE
);

CREATE TABLE rate
(
    rate        INT,
    activity_id INT,
    FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE
);

CREATE TABLE substitute
(
    activity_id INT,
    guide_email VARCHAR(32),
    FOREIGN KEY (guide_email) REFERENCES guide (user_email) ON DELETE CASCADE,
    FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE
);


CREATE TABLE message
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    user_email  VARCHAR(32),
    sent_from   VARCHAR(32),
    subject     VARCHAR(32),
    content     VARCHAR(100),
    date_sent   DATETIME,
    is_read     BOOLEAN,
    guide_email VARCHAR(32),
    FOREIGN KEY (guide_email) REFERENCES guide (user_email) ON DELETE CASCADE,
    FOREIGN KEY (user_email) REFERENCES user (email) ON DELETE CASCADE
);

CREATE TABLE meeting
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    booker_email VARCHAR(32),
    subject      VARCHAR(32),
    date         DATETIME,
    booked       BOOLEAN,
    FOREIGN KEY (booker_email) REFERENCES user (email) ON DELETE CASCADE
);


-- CREATE TABLE trip
-- (
--     id        INT AUTO_INCREMENT PRIMARY KEY,
--     trip_name VARCHAR(32),
--     out_date  DATE,
--     back_date DATE
-- );
--
-- CREATE TABLE users_in_trip
-- (
--     trip_id    INT,
--     user_email VARCHAR(32),
--     FOREIGN KEY (user_email) REFERENCES user (email) ON DELETE CASCADE
-- );

CREATE TABLE price_list
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(32) NOT NULL UNIQUE,
    description VARCHAR(100),
    price       DOUBLE
);

CREATE TABLE payment
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    pdate        DATETIME,
    payment_name VARCHAR(32),
    parent_email VARCHAR(32),
    paid         BOOLEAN,
    FOREIGN KEY (payment_name) REFERENCES price_list (name) ON DELETE CASCADE,
    FOREIGN KEY (parent_email) REFERENCES parent (user_email) ON DELETE CASCADE
);

-- CREATE TABLE transactions_paypal
-- (
--     id         INT AUTO_INCREMENT PRIMARY KEY,
--     payment_id INT,
--     parent_id  INT,
--     HASH       VARCHAR(16),
--     complete   INT DEFAULT 0,
--     FOREIGN KEY (payment_id) REFERENCES payment (id) ON DELETE CASCADE,
--     FOREIGN KEY (parent_id) REFERENCES parent (id) ON DELETE CASCADE
-- );


CREATE TABLE expanse
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    edate       DATE,
    ename       VARCHAR(32),
    price       DOUBLE,
    pic         LONGBLOB,
    guide_email VARCHAR(32),
    description VARCHAR(32),
    FOREIGN KEY (guide_email) REFERENCES guide (user_email) ON DELETE CASCADE
);
