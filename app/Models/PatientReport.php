<?php
namespace App\Models;
class PatientReport {
    public ?int $id;
    public string $patientName;
    public ?int $patientAge;
    public ?string $patientGender;
    public string $appointmentDate;
    public ?float $weight;
    public ?float $height;
    public ?float $bmi;
    public ?float $bodyFatPercentage;
    public ?float $muscleMass;
    public ?string $bloodPressure;
    public ?float $bloodGlucose;
    public ?float $cholesterolTotal;
    public ?float $cholesterolLdl;
    public ?float $cholesterolHdl;
    public ?float $triglycerides;
    public ?string $complaints;
    public ?string $dietaryAssessment;
    public ?string $physicalActivity;
    public ?string $nutritionalDiagnosis;
    public ?string $dietaryPlan;
    public ?string $recommendations;
    public ?string $nextAppointment;
    public ?string $notes;
    
    public function __construct(
        ?int $id,
        string $patientName,
        ?int $patientAge = null,
        ?string $patientGender = null,
        string $appointmentDate = '',
        ?float $weight = null,
        ?float $height = null,
        ?float $bmi = null,
        ?float $bodyFatPercentage = null,
        ?float $muscleMass = null,
        ?string $bloodPressure = null,
        ?float $bloodGlucose = null,
        ?float $cholesterolTotal = null,
        ?float $cholesterolLdl = null,
        ?float $cholesterolHdl = null,
        ?float $triglycerides = null,
        ?string $complaints = null,
        ?string $dietaryAssessment = null,
        ?string $physicalActivity = null,
        ?string $nutritionalDiagnosis = null,
        ?string $dietaryPlan = null,
        ?string $recommendations = null,
        ?string $nextAppointment = null,
        ?string $notes = null
    ) {
        $this->id = $id;
        $this->patientName = $patientName;
        $this->patientAge = $patientAge;
        $this->patientGender = $patientGender;
        $this->appointmentDate = $appointmentDate;
        $this->weight = $weight;
        $this->height = $height;
        $this->bmi = $bmi;
        $this->bodyFatPercentage = $bodyFatPercentage;
        $this->muscleMass = $muscleMass;
        $this->bloodPressure = $bloodPressure;
        $this->bloodGlucose = $bloodGlucose;
        $this->cholesterolTotal = $cholesterolTotal;
        $this->cholesterolLdl = $cholesterolLdl;
        $this->cholesterolHdl = $cholesterolHdl;
        $this->triglycerides = $triglycerides;
        $this->complaints = $complaints;
        $this->dietaryAssessment = $dietaryAssessment;
        $this->physicalActivity = $physicalActivity;
        $this->nutritionalDiagnosis = $nutritionalDiagnosis;
        $this->dietaryPlan = $dietaryPlan;
        $this->recommendations = $recommendations;
        $this->nextAppointment = $nextAppointment;
        $this->notes = $notes;
    }
    
    public static function fromArray(array $d): self {
        return new self(
            $d['id'] ?? null,
            $d['patient_name'] ?? '',
            isset($d['patient_age']) ? (int)$d['patient_age'] : null,
            $d['patient_gender'] ?? null,
            $d['appointment_date'] ?? date('Y-m-d'),
            isset($d['weight']) ? (float)$d['weight'] : null,
            isset($d['height']) ? (float)$d['height'] : null,
            isset($d['bmi']) ? (float)$d['bmi'] : null,
            isset($d['body_fat_percentage']) ? (float)$d['body_fat_percentage'] : null,
            isset($d['muscle_mass']) ? (float)$d['muscle_mass'] : null,
            $d['blood_pressure'] ?? null,
            isset($d['blood_glucose']) ? (float)$d['blood_glucose'] : null,
            isset($d['cholesterol_total']) ? (float)$d['cholesterol_total'] : null,
            isset($d['cholesterol_ldl']) ? (float)$d['cholesterol_ldl'] : null,
            isset($d['cholesterol_hdl']) ? (float)$d['cholesterol_hdl'] : null,
            isset($d['triglycerides']) ? (float)$d['triglycerides'] : null,
            $d['complaints'] ?? null,
            $d['dietary_assessment'] ?? null,
            $d['physical_activity'] ?? null,
            $d['nutritional_diagnosis'] ?? null,
            $d['dietary_plan'] ?? null,
            $d['recommendations'] ?? null,
            $d['next_appointment'] ?? null,
            $d['notes'] ?? null
        );
    }
}


