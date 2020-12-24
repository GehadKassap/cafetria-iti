-- drop database cafeteria;
CREATE DATABASE cafeteria;

CREATE TABLE User(
Id int PRIMARY KEY AUTO_INCREMENT,
    user_name varchar(50) unique,
    user_email varchar(50),
    user_password varchar(50),
    user_profile_picture varchar(50),
    user_phone int,
    room_no varchar(100),
    ext int
);

CREATE TABLE Product(
    product_Id int PRIMARY KEY AUTO_INCREMENT,
    product_name varchar(50),
    product_price int,
    product_picture varchar(50),
    catagory_Id int,
    user_Id int,
    available bool 
);

CREATE TABLE Orders (
    order_Id int PRIMARY KEY AUTO_INCREMENT,
    order_date Date,
    order_action varchar(50),
    order_price int,
    user_Id int,
    status_Id int,
    notes varchar(100)
);

CREATE TABLE Catagory(
    catagory_Id int PRIMARY KEY AUTO_INCREMENT,
    catagory_name varchar(50));

CREATE TABLE productOrder(
    product_Id int,
    order_Id int,
    quantity int,
    primary key(product_Id,order_Id));

ALTER TABLE Orders ADD CONSTRAINT FK_order_user FOREIGN KEY (user_ID) REFERENCES User(Id);
-- alter table product add column user_ID int;
ALTER TABLE product ADD CONSTRAINT FK_Product_user FOREIGN KEY (user_ID) REFERENCES User(Id);

ALTER TABLE Product ADD CONSTRAINT Product_Category FOREIGN KEY (catagory_ID) REFERENCES catagory(catagory_ID);
 
ALTER TABLE productOrder ADD CONSTRAINT FK_productOrder_order FOREIGN KEY (order_ID) REFERENCES Orders(order_ID);

ALTER TABLE productOrder ADD CONSTRAINT FK_productOrder_product FOREIGN KEY (product_ID) REFERENCES Product(product_ID);


-- drop table product;

-- drop database cafeteria;