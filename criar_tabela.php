<?php
/**
 * Script para criar a tabela patient_report automaticamente
 * Acesse este arquivo pelo navegador: http://localhost/nutrihealth/criar_tabela.php
 */

require __DIR__ . '/app/Config/Database.php';

use App\Config\Database;

try {
    $db = new Database();
    $conn = $db->getConnection();
    
    $sql = "CREATE TABLE IF NOT EXISTS `patient_report` (
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
    )";
    
    $conn->exec($sql);
    
    echo "<!DOCTYPE html>
    <html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Tabela Criada - NutriHealth</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                max-width: 600px;
                margin: 50px auto;
                padding: 20px;
                background: #f5f5f5;
            }
            .success {
                background: #d4edda;
                border: 1px solid #c3e6cb;
                color: #155724;
                padding: 20px;
                border-radius: 8px;
                margin-bottom: 20px;
            }
            .info {
                background: #d1ecf1;
                border: 1px solid #bee5eb;
                color: #0c5460;
                padding: 15px;
                border-radius: 8px;
                margin-bottom: 20px;
            }
            .btn {
                display: inline-block;
                padding: 10px 20px;
                background: #22c55e;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                margin-top: 10px;
            }
            .btn:hover {
                background: #16a34a;
            }
        </style>
    </head>
    <body>
        <div class='success'>
            <h2>✅ Sucesso!</h2>
            <p>A tabela <strong>patient_report</strong> foi criada com sucesso no banco de dados!</p>
        </div>
        
        <div class='info'>
            <p><strong>Próximos passos:</strong></p>
            <ol>
                <li>Agora você pode acessar a página de relatórios normalmente</li>
                <li>Clique no botão abaixo para ir para a página de relatórios</li>
                <li>Ou acesse pelo menu: 'Relatórios de Pacientes'</li>
            </ol>
        </div>
        
        <a href='/nutrihealth/public/?action=reports' class='btn'>Ir para Relatórios de Pacientes</a>
        
        <p style='margin-top: 30px; font-size: 12px; color: #666;'>
            <strong>Nota:</strong> Você pode deletar este arquivo (criar_tabela.php) após usar, 
            ele não é mais necessário.
        </p>
    </body>
    </html>";
    
} catch (PDOException $e) {
    echo "<!DOCTYPE html>
    <html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Erro - NutriHealth</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                max-width: 600px;
                margin: 50px auto;
                padding: 20px;
                background: #f5f5f5;
            }
            .error {
                background: #f8d7da;
                border: 1px solid #f5c6cb;
                color: #721c24;
                padding: 20px;
                border-radius: 8px;
            }
            .code {
                background: #f1f1f1;
                padding: 10px;
                border-radius: 5px;
                margin-top: 10px;
                font-family: monospace;
                font-size: 12px;
            }
        </style>
    </head>
    <body>
        <div class='error'>
            <h2>❌ Erro ao criar tabela</h2>
            <p>Ocorreu um erro ao tentar criar a tabela:</p>
            <div class='code'>" . htmlspecialchars($e->getMessage()) . "</div>
            <p style='margin-top: 15px;'><strong>Possíveis causas:</strong></p>
            <ul>
                <li>O banco de dados 'nutrihealth' não existe</li>
                <li>Problemas de permissão no MySQL</li>
                <li>Servidor MySQL não está rodando</li>
            </ul>
            <p style='margin-top: 15px;'>
                <strong>Solução:</strong> Execute o arquivo database.sql completo primeiro, 
                ou crie o banco de dados manualmente.
            </p>
        </div>
    </body>
    </html>";
}


