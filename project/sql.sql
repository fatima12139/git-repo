create database foods;
use foods;
CREATE TABLE catagory(
		catagory_id INT PRIMARY KEY AUTO_INCREMENT,
		name VARCHAR(64) NOT NULL
		);

CREATE TABLE food (
  food_id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  catagory_id int(11) DEFAULT NULL,
  name varchar(64) NOT NULL,
  ingredients varchar(128) DEFAULT NULL,
  temp_time varchar(128) DEFAULT NULL,
  description text NOT NULL,
  image varchar(128) DEFAULT NULL
		CONSTRAINT catagory_id_food FOREIGN KEY(catagory_id) REFERENCES catagory(catagory_id) ON UPDATE CASCADE ON DELETE CASCADE
		);

