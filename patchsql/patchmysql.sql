SET SQL_SAFE_UPDATES=0;

delete from individual_work_info_t
where individual_id in
(select * from (select individual_id from individual_work_info_t
where individual_id not in (select individual_id from individual_t)) temp)

delete from student_organization_type_t
where student_id in
(select * from(	select student_id from student_organization_type_t where student_id not in ( select student_id from student_t ))temp)

ALTER TABLE `cepLive`.`INDIVIDUAL_WORK_INFO_T` 
ADD CONSTRAINT `INDIVIDUAL_FK`
  FOREIGN KEY (`Individual_ID`)
  REFERENCES `cepLive`.`INDIVIDUAL_T` (`Individual_ID`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
  
ALTER TABLE `cepLive`.`STUDENT_ORGANIZATION_TYPE_T` 
DROP FOREIGN KEY `Student_Organization_Type_fk1`;

ALTER TABLE `cepLive`.`STUDENT_ORGANIZATION_TYPE_T` 
ADD CONSTRAINT `Student_Organization_Type_fk1`
  FOREIGN KEY (`Student_ID`)
  REFERENCES `cepLive`.`STUDENT_T` (`Student_ID`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
  
delete from 
student_organization_type_t
where note IS NULL and student_organization_type_id IN
(
select student_organization_type_id from 
(
select student_organization_type_id,count(*) c
from student_organization_type_t
group by (student_organization_type_id)
)temp
where temp.c>=2
);

ALTER TABLE `cepLive`.`STUDENT_ORGANIZATION_TYPE_T` 
ADD PRIMARY KEY (`Student_Organization_Type_ID`);
  
ALTER TABLE REGISTRATION_T ENGINE='InnoDB'  
  
ALTER TABLE `cepLive`.`REGISTRATION_T` 
ADD CONSTRAINT `StudentID_fk1`
  FOREIGN KEY (`Student_ID`)
  REFERENCES `cepLive`.`STUDENT_T` (`Student_ID`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;   

ALTER TABLE `cepLive`.`REGISTRATION_T` 
ADD CONSTRAINT `ExamID_fk1`
  FOREIGN KEY (`Exam_ID`)
  REFERENCES `cepLive`.`EXAMINATION_T` (`Exam_ID`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;   
    
 ALTER TABLE `cepLive`.`INDIVIDUAL_WORK_INFO_T` 
CHANGE COLUMN `Work_State` `Work_State` VARCHAR(50) NULL DEFAULT NULL ;   
           
SET SQL_SAFE_UPDATES=1;