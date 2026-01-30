<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set content type to HTML
header('Content-Type: text/html; charset=utf-8');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $course = htmlspecialchars(trim($_POST['course']));
    
    // Validation array
    $errors = [];
    
    // Validate name
    if(empty($name)) {
        $errors[] = "Full name is required";
    } elseif(strlen($name) < 2) {
        $errors[] = "Name must be at least 2 characters";
    }
    
    // Validate email
    if(empty($email)) {
        $errors[] = "Email address is required";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address";
    }
    
    // Validate course
    if(empty($course)) {
        $errors[] = "Please select a course";
    }
    
    // Validate phone (optional)
    if(!empty($phone) && !preg_match('/^[\d\s\-\+\(\)]{10,20}$/', $phone)) {
        $errors[] = "Please enter a valid phone number";
    }
    
    // If no errors, process the registration
    if(empty($errors)) {
        // Prepare data array
        $studentData = [
            'id' => uniqid('STU_'),
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'course' => $course,
            'registration_date' => date('Y-m-d H:i:s'),
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT']
        ];
        
        // Convert to JSON
        $jsonData = json_encode($studentData, JSON_PRETTY_PRINT);
        
        // Save to file (create if doesn't exist)
        $filename = 'registrations.json';
        $fileContent = [];
        
        if(file_exists($filename)) {
            $existingData = file_get_contents($filename);
            $fileContent = json_decode($existingData, true) ?? [];
        }
        
        // Add new registration
        $fileContent[] = $studentData;
        
        // Save back to file
        if(file_put_contents($filename, json_encode($fileContent, JSON_PRETTY_PRINT))) {
            // Send confirmation email (simulated for demo)
            $subject = "Welcome to Subbyte Programming!";
            $message = "
            <html>
            <head>
                <title>Welcome to Subbyte Programming</title>
                <style>
                    body { font-family: Arial, sans-serif; }
                    .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                    .header { background: linear-gradient(135deg, #6366F1 0%, #8B5CF6 100%); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
                    .content { background: #f8f9fa; padding: 30px; }
                    .footer { background: #e9ecef; padding: 20px; text-align: center; border-radius: 0 0 10px 10px; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h1>🎉 Welcome to Subbyte Programming!</h1>
                    </div>
                    <div class='content'>
                        <h2>Hello $name,</h2>
                        <p>Thank you for registering with <strong>Subbyte Programming & Learning Hub</strong>!</p>
                        <p><strong>Registration Details:</strong></p>
                        <ul>
                            <li><strong>Student ID:</strong> {$studentData['id']}</li>
                            <li><strong>Course:</strong> $course</li>
                            <li><strong>Registration Date:</strong> {$studentData['registration_date']}</li>
                        </ul>
                        <p>We're excited to have you join our community. Here's what's next:</p>
                        <ol>
                            <li>Check your email for course access instructions</li>
                            <li>Join our Discord community for support</li>
                            <li>Start with the beginner tutorials on our YouTube channel</li>
                        </ol>
                        <p style='text-align: center; margin: 30px 0;'>
                            <a href='https://youtube.com/@SubbyteProgramming' style='background: #FF0000; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; display: inline-block;'>Visit Our YouTube Channel</a>
                        </p>
                    </div>
                    <div class='footer'>
                        <p>Happy Coding! 🚀</p>
                        <p><strong>Subbyte Programming Team</strong></p>
                    </div>
                </div>
            </body>
            </html>
            ";
            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: Subbyte Programming <noreply@subbyte.com>" . "\r\n";
            
            // In production, uncomment to send actual email
            // mail($email, $subject, $message, $headers);
            
            // Redirect with success
            header("Location: index.php?success=1");
            exit();
            
        } else {
            $errors[] = "Unable to save registration. Please try again.";
        }
    }
    
    // If there are errors, redirect back with error message
    if(!empty($errors)) {
        $errorMessage = implode(" | ", $errors);
        header("Location: index.php?error=" . urlencode($errorMessage));
        exit();
    }
    
} else {
    // If accessed directly, redirect to index
    header("Location: index.php");
    exit();
}
?>