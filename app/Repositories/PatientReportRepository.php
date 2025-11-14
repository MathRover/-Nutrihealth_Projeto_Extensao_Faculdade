<?php
namespace App\Repositories;
use App\Models\PatientReport;
use PDO;
class PatientReportRepository {
    public function __construct(private PDO $pdo){}
    
    public function all(): array {
        $st = $this->pdo->query("SELECT * FROM `patient_report` ORDER BY appointment_date DESC, id DESC");
        return array_map(fn($r) => PatientReport::fromArray($r), $st->fetchAll());
    }
    
    public function find(int $id): ?PatientReport {
        $st = $this->pdo->prepare("SELECT * FROM `patient_report` WHERE id=?");
        $st->execute([$id]);
        $r = $st->fetch();
        return $r ? PatientReport::fromArray($r) : null;
    }
    
    public function create(PatientReport $pr): int {
        $st = $this->pdo->prepare("INSERT INTO `patient_report` (
            patient_name, patient_age, patient_gender, appointment_date,
            weight, height, bmi, body_fat_percentage, muscle_mass,
            blood_pressure, blood_glucose, cholesterol_total, cholesterol_ldl,
            cholesterol_hdl, triglycerides, complaints, dietary_assessment,
            physical_activity, nutritional_diagnosis, dietary_plan,
            recommendations, next_appointment, notes
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        
        $st->execute([
            $pr->patientName,
            $pr->patientAge,
            $pr->patientGender,
            $pr->appointmentDate,
            $pr->weight,
            $pr->height,
            $pr->bmi,
            $pr->bodyFatPercentage,
            $pr->muscleMass,
            $pr->bloodPressure,
            $pr->bloodGlucose,
            $pr->cholesterolTotal,
            $pr->cholesterolLdl,
            $pr->cholesterolHdl,
            $pr->triglycerides,
            $pr->complaints,
            $pr->dietaryAssessment,
            $pr->physicalActivity,
            $pr->nutritionalDiagnosis,
            $pr->dietaryPlan,
            $pr->recommendations,
            $pr->nextAppointment,
            $pr->notes
        ]);
        
        return (int)$this->pdo->lastInsertId();
    }
    
    public function update(PatientReport $pr): void {
        $st = $this->pdo->prepare("UPDATE `patient_report` SET
            patient_name=?, patient_age=?, patient_gender=?, appointment_date=?,
            weight=?, height=?, bmi=?, body_fat_percentage=?, muscle_mass=?,
            blood_pressure=?, blood_glucose=?, cholesterol_total=?, cholesterol_ldl=?,
            cholesterol_hdl=?, triglycerides=?, complaints=?, dietary_assessment=?,
            physical_activity=?, nutritional_diagnosis=?, dietary_plan=?,
            recommendations=?, next_appointment=?, notes=?
            WHERE id=?");
        
        $st->execute([
            $pr->patientName,
            $pr->patientAge,
            $pr->patientGender,
            $pr->appointmentDate,
            $pr->weight,
            $pr->height,
            $pr->bmi,
            $pr->bodyFatPercentage,
            $pr->muscleMass,
            $pr->bloodPressure,
            $pr->bloodGlucose,
            $pr->cholesterolTotal,
            $pr->cholesterolLdl,
            $pr->cholesterolHdl,
            $pr->triglycerides,
            $pr->complaints,
            $pr->dietaryAssessment,
            $pr->physicalActivity,
            $pr->nutritionalDiagnosis,
            $pr->dietaryPlan,
            $pr->recommendations,
            $pr->nextAppointment,
            $pr->notes,
            $pr->id
        ]);
    }
    
    public function delete(int $id): void {
        $st = $this->pdo->prepare("DELETE FROM `patient_report` WHERE id=?");
        $st->execute([$id]);
    }
}


