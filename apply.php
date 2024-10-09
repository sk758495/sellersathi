<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php'; // Ensure the path to autoload.php is correct

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    $program = htmlspecialchars(trim($_POST['program']));
    $field = htmlspecialchars(trim($_POST['field']));
    $qualification = htmlspecialchars(trim($_POST['qualification']));
    $schoolCollege = htmlspecialchars(trim($_POST['schoolCollege']));
    $percentage = htmlspecialchars(trim($_POST['percentage']));
    $cgpa = htmlspecialchars(trim($_POST['cgpa']));
    $expectedSalary = htmlspecialchars(trim($_POST['expectedSalary']));
    $workExperience = htmlspecialchars(trim($_POST['workExperience']));
    $lastCompany = htmlspecialchars(trim($_POST['lastCompany']));
    $yearsWorked = htmlspecialchars(trim($_POST['yearsWorked']));
    $lastSalary = htmlspecialchars(trim($_POST['lastSalary']));
    $motivation = htmlspecialchars(trim($_POST['motivation']));

    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sk758495@gmail.com'; // Your SMTP username
        $mail->Password = 'xzixmftqmolatbqc'; // Use your App Password here
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // Use 587 for TLS

        // Recipients
        $mail->setFrom('sk758495@gmail.com', 'Job Application');
        $mail->addAddress('skvarma758495@gmail.com', 'Recipient');

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'New Job Application Submission';
        $mail->Body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; }
                table { border-collapse: collapse; width: 100%; }
                th, td { border: 1px solid #ddd; padding: 8px; }
                th { background-color: #f2f2f2; }
            </style>
        </head>
        <body>
            <h2>New Job Application Submission</h2>
            <table>
                <tr><th>Program</th><td>$program</td></tr>
                <tr><th>Field</th><td>$field</td></tr>
                <tr><th>Qualification</th><td>$qualification</td></tr>
                <tr><th>School/College</th><td>$schoolCollege</td></tr>
                <tr><th>Percentage</th><td>$percentage</td></tr>
                <tr><th>CGPA</th><td>$cgpa</td></tr>
                <tr><th>Expected Salary</th><td>$expectedSalary</td></tr>
                <tr><th>Work Experience</th><td>$workExperience</td></tr>
                <tr><th>Last Company</th><td>$lastCompany</td></tr>
                <tr><th>Years Worked</th><td>$yearsWorked</td></tr>
                <tr><th>Last Salary</th><td>$lastSalary</td></tr>
                <tr><th>Motivation</th><td>$motivation</td></tr>
            </table>
        </body>
        </html>
        ";

        // Send the email
        $mail->send();
        $message = 'Application submitted successfully.';
    } catch (Exception $e) {
        $message = "Application could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<section class="apply-section py-5">
    <div class="container">
        <?php if (isset($message)): ?>
            <div class="alert alert-info text-center"><?php echo $message; ?></div>
        <?php endif; ?>
    </div>
</section>



