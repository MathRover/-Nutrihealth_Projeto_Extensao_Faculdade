-- Script para criar a tabela de relatórios de pacientes
-- Execute este script no phpMyAdmin ou via linha de comando MySQL

USE nutrihealth;

CREATE TABLE IF NOT EXISTS `patient_report` (
  id int not null AUTO_INCREMENT,
  patient_name VARCHAR(100) NOT NULL,
  patient_age INT,
  patient_gender VARCHAR(20),
  appointment_date DATE NOT NULL,
  weight DECIMAL(5,2),
  height DECIMAL(3,2),
  bmi DECIMAL(4,2),
  body_fat_percentage DECIMAL(4,2),
  muscle_mass DECIMAL(5,2),
  blood_pressure VARCHAR(20),
  blood_glucose DECIMAL(5,2),
  cholesterol_total DECIMAL(5,2),
  cholesterol_ldl DECIMAL(5,2),
  cholesterol_hdl DECIMAL(5,2),
  triglycerides DECIMAL(5,2),
  complaints TEXT,
  dietary_assessment TEXT,
  physical_activity TEXT,
  nutritional_diagnosis TEXT,
  dietary_plan TEXT,
  recommendations TEXT,
  next_appointment DATE,
  notes TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  primary key (id)
);


