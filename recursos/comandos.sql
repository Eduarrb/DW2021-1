CREATE TABLE personal (
    per_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    per_nombre VARCHAR(250) NOT NULL,
    per_apellido VARCHAR(250) NOT NULL,
    per_dni VARCHAR(8),
    per_hi_id INT,
    per_hs_id INT
)
CREATE TABLE hora_ingreso (
    hi_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    hi_fecha DATE NOT NULL

)
CREATE TABLE hora_salida (
    hs_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    hs_fecha DATE NOT NULL
)
INSERT INTO personal (per_nombre,per_apellido,per_dni) VALUES ("CARLOS","DEL CASTILLO","71273563")




SELECT per_id,per_nombre,per_apellido,per_dni,hi_fecha,hs_fecha FROM personal,hora_ingreso,hora_salida WHERE per_id=hi_id_per AND per_id=hs_id_per AND per_id=1