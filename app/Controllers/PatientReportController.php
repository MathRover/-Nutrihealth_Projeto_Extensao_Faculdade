<?php
namespace App\Controllers;
use App\Config\Database;
use App\Models\PatientReport;
use App\Repositories\PatientReportRepository;

class PatientReportController {
    private PatientReportRepository $repo;
    
    public function __construct() {
        $db = new Database();
        $this->repo = new PatientReportRepository($db->getConnection());
    }
    
    public function index(): void {
        $reports = $this->repo->all();
        $this->view('reports/list', ['reports' => $reports]);
    }
    
    public function create(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $report = $this->buildReportFromPost(null);
            $this->repo->create($report);
            header('Location: /nutrihealth/public/?action=reports&msg=success');
            exit;
        }
        $this->view('reports/create');
    }
    
    public function edit(): void {
        $id = (int)($_GET['id'] ?? 0);
        $report = $this->repo->find($id);
        
        if (!$report) {
            http_response_code(404);
            echo "Relatório não encontrado.";
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $report = $this->buildReportFromPost($id);
            $this->repo->update($report);
            header('Location: /nutrihealth/public/?action=reports&msg=success');
            exit;
        }
        
        $this->view('reports/edit', ['report' => $report]);
    }
    
    public function delete(): void {
        $id = (int)($_GET['id'] ?? 0);
        if ($id > 0) {
            $this->repo->delete($id);
        }
        header('Location: /nutrihealth/public/?action=reports&msg=deleted');
        exit;
    }
    
    private function buildReportFromPost(?int $id): PatientReport {
        return new PatientReport(
            $id,
            trim($_POST['patient_name'] ?? ''),
            !empty($_POST['patient_age']) ? (int)$_POST['patient_age'] : null,
            !empty($_POST['patient_gender']) ? trim($_POST['patient_gender']) : null,
            trim($_POST['appointment_date'] ?? date('Y-m-d')),
            !empty($_POST['weight']) ? (float)$_POST['weight'] : null,
            !empty($_POST['height']) ? (float)$_POST['height'] : null,
            !empty($_POST['bmi']) ? (float)$_POST['bmi'] : null,
            !empty($_POST['body_fat_percentage']) ? (float)$_POST['body_fat_percentage'] : null,
            !empty($_POST['muscle_mass']) ? (float)$_POST['muscle_mass'] : null,
            !empty($_POST['blood_pressure']) ? trim($_POST['blood_pressure']) : null,
            !empty($_POST['blood_glucose']) ? (float)$_POST['blood_glucose'] : null,
            !empty($_POST['cholesterol_total']) ? (float)$_POST['cholesterol_total'] : null,
            !empty($_POST['cholesterol_ldl']) ? (float)$_POST['cholesterol_ldl'] : null,
            !empty($_POST['cholesterol_hdl']) ? (float)$_POST['cholesterol_hdl'] : null,
            !empty($_POST['triglycerides']) ? (float)$_POST['triglycerides'] : null,
            !empty($_POST['complaints']) ? trim($_POST['complaints']) : null,
            !empty($_POST['dietary_assessment']) ? trim($_POST['dietary_assessment']) : null,
            !empty($_POST['physical_activity']) ? trim($_POST['physical_activity']) : null,
            !empty($_POST['nutritional_diagnosis']) ? trim($_POST['nutritional_diagnosis']) : null,
            !empty($_POST['dietary_plan']) ? trim($_POST['dietary_plan']) : null,
            !empty($_POST['recommendations']) ? trim($_POST['recommendations']) : null,
            !empty($_POST['next_appointment']) ? trim($_POST['next_appointment']) : null,
            !empty($_POST['notes']) ? trim($_POST['notes']) : null
        );
    }
    
    private function view(string $path, array $data = []): void {
        extract($data);
        $base = dirname(__DIR__, 2);
        include $base . "/views/{$path}.php";
    }
}


