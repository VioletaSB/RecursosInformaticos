DROP DATABASE IF EXISTS recursos;
CREATE DATABASE recursos CHARACTER SET utf8mb4;
USE recursos;

--
-- Creamos la estructura de la tabla resources
--
CREATE TABLE resources (
  id INT AUTO_INCREMENT NOT NULL,
  name VARCHAR(100) NOT NULL,
  description VARCHAR(1000),
  location VARCHAR(200),
  image VARCHAR(2000),
  PRIMARY KEY (id)
);

--
-- Creamos la estructura de la tabla users
--
CREATE TABLE users (
  id INT AUTO_INCREMENT NOT NULL,
  username VARCHAR(250) NOT NULL,
  password VARCHAR(250) NOT NULL,
  realname VARCHAR(250) NOT NULL,
  type int NOT NULL,
  PRIMARY KEY (id)
);

--
-- Creamos la estructura de la tabla timeSlots
--
CREATE TABLE timeSlots (
  id INT AUTO_INCREMENT NOT NULL,
  dayOfWeek DATE NOT NULL,
  startTime TIME NOT NULL,
  endTime TIME NOT NULL,
  PRIMARY KEY (id)
);

--
-- Creamos la estructura de la tabla reservations
--
CREATE TABLE reservations (
  idResource INT NOT NULL,
  idUser INTEGER NOT NULL,
  idTimeSlot INTEGER NOT NULL,
  PRIMARY KEY (idResource, idUser, idTimeSlot),
  FOREIGN KEY (idResource) REFERENCES resources (id),
  FOREIGN KEY (idUser) REFERENCES users (id),
  FOREIGN KEY (idTimeSlot) REFERENCES timeSlots (id)
);

--
-- Introducimos los valores de la tabla users
--
INSERT INTO users VALUES (1,'Violeta', '1234', 'Violeta Sáez', 1),
                         (2,'admin', 'admin', 'admin', 1);


--
-- Introducimos valores a la tabla timeSlots
--
INSERT INTO timeSlots VALUES (1,'2021/10/29','9:00','11:00'),
                             (2, '2021/10/29','11:00','14:00'),
                             (3, '2021/10/29','16:00','18:00'),
                             (4, '2021/10/29','18:00','20:00'),
                             (5,'2021/11/01','9:00','11:00'),
                             (6, '2021/11/01','11:00','14:00'),
                             (7, '2021/11/01','16:00','18:00'),
                             (8, '2021/11/01','18:00','20:00');
                      
--
-- Introducimos valores a la tabla resources
-- 

INSERT INTO resources VALUES (1,'Ordenador HP','Ordenador portatil','Aula 3','hp.jpg'),
                             (2, 'Fotocopiadora Canon','Fotocopiadora','Secretaria','canon.jpg');

--
-- Introducimos valores a la tabla reservations
--    

INSERT INTO reservations VALUES (1, 2, 2), (2, 1, 1);                        