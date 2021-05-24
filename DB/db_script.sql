CREATE
DATABASE bnei_akiva;
USE
bnei_akiva;

CREATE TABLE role
(
    id   INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(32) NOT NULL
);

CREATE TABLE users
(
    email        VARCHAR(32) PRIMARY KEY,
    password     VARCHAR(32),
    fname        VARCHAR(32),
    lname        VARCHAR(32),
    phone        VARCHAR(32),
    role_id      INT,
    profile_pic  LONGBLOB,
    city         VARCHAR(32),
    street       VARCHAR(32),
    house_number INT,
    zip_code     INT,
    FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE
);


CREATE TABLE agegrade
(
    id    INT AUTO_INCREMENT PRIMARY KEY,
    grade VARCHAR(8),
    name  VARCHAR(15)
);

CREATE TABLE guide
(
    users_email VARCHAR(32),
    agegrade_id INT,
    FOREIGN KEY (users_email) REFERENCES users (email) ON DELETE CASCADE,
    FOREIGN KEY (agegrade_id) REFERENCES agegrade (id) ON DELETE CASCADE
);

CREATE TABLE parent
(
    users_email VARCHAR(32),
    FOREIGN KEY (users_email) REFERENCES users (email) ON DELETE CASCADE
);


CREATE TABLE member
(
    users_email  VARCHAR(32),
    parent_email VARCHAR(32),
    insurance    BOOLEAN default 0,
    trips        BOOLEAN default 0,
    membership   BOOLEAN default 0,
    agegrade_id  INT,
    notes        VARCHAR(300),
    pending      BOOLEAN default 1,
    FOREIGN KEY (users_email) REFERENCES users (email) ON DELETE CASCADE,
    FOREIGN KEY (parent_email) REFERENCES parent (users_email) ON DELETE CASCADE,
    FOREIGN KEY (agegrade_id) REFERENCES agegrade (id) ON DELETE CASCADE
);


CREATE TABLE activity
(
    id               INT AUTO_INCREMENT PRIMARY KEY,
    name             VARCHAR(32),
    description      VARCHAR(100),
    time             DATETIME,
    after_summary    VARCHAR(100),
    agegrade_id      INT,
    guide_email      VARCHAR(32),
    num_participants INT,
    FOREIGN KEY (agegrade_id) REFERENCES agegrade (id) ON DELETE CASCADE,
    FOREIGN KEY (guide_email) REFERENCES guide (users_email) ON DELETE CASCADE
);

CREATE TABLE health_declare
(
    activity_id  INT,
    member_email VARCHAR(32),
    FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE,
    FOREIGN KEY (member_email) REFERENCES member (users_email) ON DELETE CASCADE
);

CREATE TABLE rate
(
    rate        INT,
    activity_id INT,
    FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE
);

CREATE TABLE substitute
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    activity_id INT,
    guide_email VARCHAR(32),
    agegrade_id INT,
    FOREIGN KEY (agegrade_id) REFERENCES agegrade (id) ON DELETE CASCADE,
    FOREIGN KEY (guide_email) REFERENCES guide (users_email) ON DELETE CASCADE,
    FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE
);


CREATE TABLE message
(
    id             INT AUTO_INCREMENT PRIMARY KEY,
    recipient_email VARCHAR(32),
    sent_from      VARCHAR(32),
    subject        VARCHAR(32),
    content        VARCHAR(100),
    date_sent      DATETIME DEFAULT NOW(),
    is_read        BOOLEAN default 0,
    FOREIGN KEY (recipient_email) REFERENCES users (email) ON DELETE CASCADE
);

CREATE TABLE meeting
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    booker_email VARCHAR(32),
    guide_email  VARCHAR(32),
    subject      VARCHAR(32),
    date         DATETIME,
    booked       BOOLEAN default 0,
    FOREIGN KEY (guide_email) REFERENCES guide (users_email) ON DELETE CASCADE,
    FOREIGN KEY (booker_email) REFERENCES users (email) ON DELETE CASCADE
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
--     users_email VARCHAR(32),
--     FOREIGN KEY (users_email) REFERENCES users (email) ON DELETE CASCADE
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
    pdate        DATETIME DEFAULT NOW(),
    payment_name VARCHAR(32),
    parent_email VARCHAR(32),
    member_email VARCHAR(32),
    paid         BOOLEAN default 0,
    FOREIGN KEY (member_email) REFERENCES member (users_email) ON DELETE CASCADE,
    FOREIGN KEY (payment_name) REFERENCES price_list (name) ON DELETE CASCADE,
    FOREIGN KEY (parent_email) REFERENCES parent (users_email) ON DELETE CASCADE
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
    FOREIGN KEY (guide_email) REFERENCES guide (users_email) ON DELETE CASCADE
);
