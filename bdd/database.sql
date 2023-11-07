DROP DATABASE IF EXISTS TODOLIST;

CREATE DATABASE IF NOT EXISTS TODOLIST;

USE TODOLIST;

CREATE TABLE IF NOT EXISTS task (
   id_task SMALLINT NOT NULL AUTO_INCREMENT,
   name VARCHAR(50) NOT NULL,
   description VARCHAR(50) NOT NULL,
   remind_date DATE NOT NULL,
   state TINYINT UNSIGNED,
   priority SMALLINT NOT NULL,
   PRIMARY KEY(Id_task)
);



-- INSERT INTO task (name, description, remind_date, state, priority)
-- VALUES
--     (),

