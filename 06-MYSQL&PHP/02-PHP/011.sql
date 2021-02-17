create table usuarios(
    user_id int unsigned primary key not null auto_increment,
    user_nickname varchar(30) not null,
    user_pass varchar(255) not null
)

insert into usuarios (user_nickname, user_pass) values
    ('jaimito', '123'),
    ('maria', '123'),
    ('eduardo', '123')