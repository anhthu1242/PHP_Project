-- -----------------------------------------------------
-- Schema AdmissionsManagement
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `AdmissionsManagement` ;

-- -----------------------------------------------------
-- Schema AdmissionsManagement
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `AdmissionsManagement` DEFAULT CHARACTER SET utf8 ;
USE `AdmissionsManagement` ;

-- -----------------------------------------------------
-- Table `AdmissionsManagement`.`Account`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AdmissionsManagement`.`Account` ;

CREATE TABLE IF NOT EXISTS `AdmissionsManagement`.`Account` (
  `username` NVARCHAR(20) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  `name` NVARCHAR(45) NULL,
  `phoneNumber` VARCHAR(45) NULL,
  `role` VARCHAR(45) NOT NULL,
  `status` INT NOT NULL,
  PRIMARY KEY (`username`));


-- -----------------------------------------------------
-- Table `AdmissionsManagement`.`AdmissionsYear`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AdmissionsManagement`.`AdmissionsYear` ;

CREATE TABLE IF NOT EXISTS `AdmissionsManagement`.`AdmissionsYear` (
  `idAdmissionsYear` INT NOT NULL AUTO_INCREMENT,
  `valueAdmissionsYear` INT NOT NULL,
  PRIMARY KEY (`idAdmissionsYear`));


-- -----------------------------------------------------
-- Table `AdmissionsManagement`.`Majors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AdmissionsManagement`.`Majors` ;

CREATE TABLE IF NOT EXISTS `AdmissionsManagement`.`Majors` (
  `idMajors` INT NOT NULL AUTO_INCREMENT,
  `nameMajors` NVARCHAR(50) NOT NULL,
  `descriptionMajors` NVARCHAR(500) NULL,
  `enabled` INT NOT NULL,
  PRIMARY KEY (`idMajors`));


-- -----------------------------------------------------
-- Table `AdmissionsManagement`.`ExamResult`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AdmissionsManagement`.`ExamResult` ;

CREATE TABLE IF NOT EXISTS `AdmissionsManagement`.`ExamResult` (
  `idExamResult` INT NOT NULL AUTO_INCREMENT,
  `nguVan` FLOAT NULL,
  `toan` FLOAT NULL,
  `ngoaiNgu` FLOAT NULL,
  `vatLy` FLOAT NULL,
  `hoaHoc` FLOAT NULL,
  `sinhHoc` FLOAT NULL,
  `lichSu` FLOAT NULL,
  `diaLy` FLOAT NULL,
  `gdcd` FLOAT NULL,
  `diemCong` FLOAT NULL,
  PRIMARY KEY (`idExamResult`));


-- -----------------------------------------------------
-- Table `AdmissionsManagement`.`AdmissionsMajor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AdmissionsManagement`.`AdmissionsMajor` ;

CREATE TABLE IF NOT EXISTS `AdmissionsManagement`.`AdmissionsMajor` (
  `idAdmissionsYear` INT NOT NULL,
  `idMajors` INT NOT NULL,
  `numberOf` INT NOT NULL COMMENT 'Chỉ tiêu',
  `groups` VARCHAR(45) NOT NULL COMMENT 'tổ hợp xét tuyển',
  `condition` INT NOT NULL COMMENT 'điểm điều kiện',
  INDEX `fk_AdmissionsMajor_AdmissionsYear1_idx` (`idAdmissionsYear` ASC),
  INDEX `fk_AdmissionsMajor_Majors1_idx` (`idMajors` ASC),
  PRIMARY KEY (`idAdmissionsYear`, `idMajors`),
  CONSTRAINT `fk_AdmissionsMajor_AdmissionsYear1`
    FOREIGN KEY (`idAdmissionsYear`)
    REFERENCES `AdmissionsManagement`.`AdmissionsYear` (`idAdmissionsYear`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_AdmissionsMajor_Majors1`
    FOREIGN KEY (`idMajors`)
    REFERENCES `AdmissionsManagement`.`Majors` (`idMajors`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `AdmissionsManagement`.`Application`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AdmissionsManagement`.`Application` ;

CREATE TABLE IF NOT EXISTS `AdmissionsManagement`.`Application` (
  `idApplication` INT NOT NULL AUTO_INCREMENT,
  `avatar` LONGTEXT NULL,
  `name` NVARCHAR(50) NOT NULL,
  `gender` INT NOT NULL,
  `birthday` DATE NOT NULL,
  `birthplace` VARCHAR(100) NOT NULL,
  `ethnic` VARCHAR(20) NOT NULL COMMENT 'Dân tộc',
  `identification` VARCHAR(45) NOT NULL COMMENT 'Số CMND',
  `expiration` DATE NOT NULL COMMENT 'Ngày hết hạn',
  `phoneNumber` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NULL,
  `address` VARCHAR(100) NOT NULL,
  `idExamResult` INT NULL,
  `idAdmissionsYear` INT NOT NULL,
  `idMajors` INT NOT NULL,
  PRIMARY KEY (`idApplication`),
  INDEX `fk_Application_ResultExam1_idx` (`idExamResult` ASC),
  INDEX `fk_Application_AdmissionsMajor1_idx` (`idAdmissionsYear` ASC, `idMajors` ASC),
  CONSTRAINT `fk_Application_ResultExam1`
    FOREIGN KEY (`idExamResult`)
    REFERENCES `AdmissionsManagement`.`ExamResult` (`idExamResult`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Application_AdmissionsMajor1`
    FOREIGN KEY (`idAdmissionsYear` , `idMajors`)
    REFERENCES `AdmissionsManagement`.`AdmissionsMajor` (`idAdmissionsYear` , `idMajors`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

    -- 
-- Dumping data for table Majors
--
USE AdmissionsManagement;

INSERT INTO Majors VALUES
(00216, 'Lupita4', 'A alias est voluptatum velit qui sint quia voluptas. Iure unde itaque veniam voluptas nemo voluptatem laudantium error. Consequatur voluptas perspiciatis et est culpa consequuntur vitae nam.', 1),
(03317, 'Cleary6', 'Necessitatibus qui veniam quasi est cupiditate rerum. Cumque quis ut magnam nisi ut molestiae non? Dolores dolorum dolor voluptatem. Iste veniam quasi voluptatem. Illo et repudiandae velit necessitatibus sed non omnis! Quidem iure sed velit neque voluptates? Dolores ipsa repellendus nulla delectus nesciunt quam omnis recusandae. Quidem ab iste porro!', 1),
(04959, 'Jovan494', 'Velit aut enim fugit excepturi eligendi quidem fugit. Iusto quasi laborum eius veniam. Sit aut est ducimus? Esse et unde debitis illo minus et sit quia. Officiis molestiae quis atque error ut velit voluptas numquam! Possimus at voluptas alias sed quia sed omnis unde...', 1),
(08394, 'Quintin42', 'Perspiciatis totam tempora et ipsum non in qui cupiditate. Tempore dolore dolor officiis quos blanditiis odit iste labore.', 1);

-- 
-- Dumping data for table AdmissionsYear
--
INSERT INTO AdmissionsYear VALUES
(25568, 2020),
(64850, 2021),
(67407, 2022);

-- 
-- Dumping data for table ExamResult
--
INSERT INTO ExamResult VALUES
(01752, 7, 6, 4, 6, 6, 4, 2, 4, 10, 0),
(05933, 8, 3, 6, 9, 8, 9, 10, 3, 4, 3),
(06712, 10, 7, 5, 10, 10, 1, 5, 8, 5, 1),
(06826, 7, 10, 3, 10, 8, 4, 6, 8, 5, 2),
(07607, 1, 6, 5, 2, 3, 10, 1, 9, 6, 1),
(09807, 3, 2, 2, 1, 6, 10, 5, 3, 9, 0),
(13550, 4, 1, 8, 10, 2, 1, 10, 3, 8, 2),
(17667, 3, 4, 9, 8, 2, 6, 6, 3, 5, 2),
(19425, 6, 5, 2, 9, 7, 4, 6, 8, 9, 1),
(23214, 0, 9, 8, 3, 9, 3, 3, 1, 8, 3),
(25376, 2, 0, 3, 5, 1, 9, 2, 8, 7, 3),
(25813, 0, 0, 8, 6, 10, 6, 8, 6, 10, 3),
(26634, 4, 0, 9, 8, 5, 8, 4, 10, 8, 0),
(27014, 9, 1, 2, 2, 5, 3, 2, 7, 4, 0),
(28477, 5, 9, 9, 5, 10, 4, 5, 6, 9, 1),
(30090, 10, 3, 9, 8, 7, 8, 8, 6, 2, 0),
(30971, 5, 2, 4, 7, 9, 8, 8, 5, 3, 3),
(31862, 4, 1, 7, 3, 2, 3, 7, 6, 10, 2),
(36971, 1, 9, 8, 2, 3, 2, 10, 2, 10, 3),
(42721, 4, 10, 6, 9, 6, 3, 6, 3, 9, 0),
(45302, 8, 0, 1, 6, 6, 1, 10, 9, 2, 2),
(48208, 9, 6, 4, 2, 7, 3, 8, 2, 10, 1),
(49037, 1, 5, 6, 10, 8, 7, 3, 9, 8, 3),
(50590, 5, 6, 1, 2, 4, 8, 1, 2, 9, 1),
(50730, 9, 0, 4, 7, 10, 2, 2, 10, 9, 3),
(51343, 3, 8, 7, 5, 5, 7, 7, 7, 9, 1),
(54030, 2, 3, 6, 2, 9, 6, 3, 6, 4, 2),
(54518, 5, 6, 4, 6, 6, 2, 9, 5, 10, 1),
(54828, 6, 5, 5, 8, 3, 5, 9, 10, 3, 3),
(56631, 4, 1, 4, 9, 8, 4, 5, 9, 9, 0),
(57077, 3, 10, 3, 10, 9, 9, 2, 4, 7, 2),
(58852, 9, 1, 8, 6, 6, 8, 5, 3, 7, 1),
(64166, 3, 8, 10, 1, 4, 2, 9, 10, 1, 1),
(68440, 4, 1, 7, 6, 1, 8, 2, 4, 6, 3),
(70235, 3, 5, 5, 3, 4, 3, 10, 5, 8, 0),
(73759, 10, 0, 2, 5, 2, 9, 3, 10, 10, 1),
(75446, 3, 3, 7, 4, 5, 6, 2, 4, 7, 3),
(75541, 4, 8, 6, 5, 8, 3, 3, 1, 9, 3),
(75699, 2, 9, 3, 10, 5, 4, 2, 6, 5, 2),
(80185, 0, 9, 2, 10, 6, 5, 9, 10, 5, 3),
(82415, 8, 8, 7, 2, 6, 9, 7, 10, 10, 2),
(82506, 0, 4, 1, 6, 6, 8, 3, 2, 8, 3),
(86989, 0, 5, 7, 9, 8, 4, 4, 8, 3, 0),
(87437, 5, 5, 6, 8, 4, 4, 3, 7, 1, 2),
(88184, 5, 7, 7, 9, 3, 10, 8, 6, 3, 0),
(89303, 8, 3, 4, 8, 5, 5, 7, 9, 3, 0),
(90287, 7, 0, 2, 8, 1, 8, 9, 2, 2, 2),
(91066, 5, 1, 9, 3, 5, 5, 3, 4, 2, 0),
(92422, 3, 2, 10, 6, 5, 6, 1, 10, 2, 3),
(96555, 2, 7, 6, 5, 2, 8, 8, 8, 3, 1);

-- 
-- Dumping data for table AdmissionsMajor
--
INSERT INTO AdmissionsMajor VALUES
(25568, 00216, 51, 'D8,C4,A5,D5,B9', 23),
(67407, 00216, 30, 'A3', 40);

-- 
-- Dumping data for table Application
--
INSERT INTO Application VALUES
(04010, 'H8YXFWD3SZFW43G', 'Xuân Ninh', 0, '2014-07-30', 'Tỉnh Đắk Nông', 'Swedes', '49031', '1972-10-20', '(180) 991-7881', 'Montoya@nowhere.com', '591 E Chapel Hill Way, Des Moines, IA, 80172', 30090, 25568, 00216);
-- 
-- Dumping data for table Account
--
INSERT INTO Account VALUES
('Admin', md5('admin'), 'Florida343', '(465) 454-8347', 'admin', 1),
('Emp1', md5('emp'), 'Ada2005', '(282) 510-9326', 'user', 1),
('Emp2', md5('emp'), 'Carmela778', '(157) 934-3116', 'user', 0);


