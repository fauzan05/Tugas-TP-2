show databases;

create database tugas;
use tugas;
show tables;
CREATE TABLE Roles(
	id INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    modified_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP() 
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;

drop table users; 
describe Roles;
describe Users;

CREATE TABLE Users(
	id INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    roleId INT NOT NULL,
    FOREIGN KEY(roleId) REFERENCES Roles(id),
    firstname varchar(255) NOT NULL,
    lastname VARCHAR(255),
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
	created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    modified_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP() 
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;

alter table users change role_id roleId INT(11) NOT NULL;

insert into roles(name, description) values("guest","it is a user role");
select * from roles;
select * from users;
delete from users;

insert into users(role_id, firstname, lastname, email, password) values("1","andi", "hermawan", "andihermawan@gmail.com", "empty");
insert into users(role_id, firstname, lastname, email, password) values("2","susi", "anjar", "susianjar@gmail.com", "empty");
insert into users(role_id, firstname, lastname, email, password) values("2","tukimin", "aje", "tukiminaje@gmail.com", "empty");

UPDATE users SET password = "password3" WHERE id = "92";

select email, password from users where id = '90';