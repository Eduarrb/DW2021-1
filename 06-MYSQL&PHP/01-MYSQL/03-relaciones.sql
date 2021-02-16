ALTER TABLE peliculas DROP COLUMN peli_dire_id

ALTER TABLE peliculas ADD COLUMN peli_dire_id INT(10) UNSIGNED

-- 🔥🔥RESTRICCIONES
-- RESTRICT
    -- POR DEFECTO, INPIDE REALIZAR MODIFICACIONES QUE ATENTEN LA INTEGRIDAD REFERENCIAL DE LAS TABLAS, NO PERMITE BORRAR
-- CASCADE:
    -- AL ACTUALIZAR O BORRAR LOS DATOS REFERENCIADOS, TAMBIEN SE ACTUALIZAN O SE BORRAN LOS DATOS DE LA TABLA DEPENDIENTE
-- SET NULL: SE ESTABLECE CAAMPOS NULL A LA TABLA DEPENDIENTE AL MOMENTO DE CAMBAIR O BORRAR
-- NO ACTION: NO HACE NADA

ALTER TABLE peliculas
    ADD CONSTRAINT fk_direId FOREIGN KEY (peli_dire_id)
    REFERENCES directores (dire_id)
    ON DELETE CASCADE ON UPDATE CASCADE

DELETE FROM directores WHERE dire_id = 1 