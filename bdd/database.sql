DROP DATABASE IF EXISTS TODOLIST;

CREATE DATABASE IF NOT EXISTS TODOLIST;

USE TODOLIST;

CREATE TABLE IF NOT EXISTS task (
   id_task SMALLINT NOT NULL AUTO_INCREMENT,
   name VARCHAR(50) NOT NULL,
   state TINYINT UNSIGNED,
   priority SMALLINT NOT NULL,
   PRIMARY KEY(Id_task)
);



INSERT INTO task (name, state, priority)
VALUES
    ('Passer le balais','0','1'),
    ('Faire la vaisselle','0','2'),
    ('Aspirer le tapis','0','3'),
    ('Faire les courses','0','4');
