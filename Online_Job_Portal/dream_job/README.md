# Job-Portal

The online job portal application allows job seekers and recruiters to connect.The application provides the ability for job seekers to create their accounts, upload their profile and resume, search for Portal, apply for Portal, view different job openings. The application provides the ability for companies to create their accounts, search candidates, create job postings, and view candidates applications.

# Website Testing

Download the latest database.sql file.


```php
//Your db.php Mysql Config
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobportal";
```

Step2: Now you login as candidate with following details

```php
Email: oleg@test.com
Password: 123456
//Note1: There are 100 candadates users all with same password-123456
//Note2: All Password are encrpyted through code so you CANNOT change password directly from database.
```

Step3: Now you login as Company with following details

```php
Email: lobortis@a.ca
Password: 123456
//Note1: There are 100 Companies account all with same password-123456
//Note2: All Password are encrpyted through code so you CANNOT change password directly from database.
```

Step4: Now you login as Admin with following details

```php
Username: admin
Password: 123456
//Note: Password is not encrpyted from code so you CAN change directly from database.
```

Candidates Email Confirmation:
>You CANNOT send emails from localhost server. So when you create a new candidate account it will not send any emails. So you must go to database, find that user and set ```active=1``` in order to make that account login. 

>If you are testing on real server then you can uncomment the following code from ```adduser.php```

```php
// Send Email
$to = {CANDIDATE_EMAIL ADDRESS};
$subject = "Job Portal - Confirm Your Email Address";
$message = '
    <html>
    	 <head>
		    <title>Confirm Your Email</title>
		</head>
		<body>
		    <p>Click Link To Confirm</p>
		    <a href="{YOUR_REAL_DOMAIL}/verify.php?token='.$hash.'&email='.$email.'">Verify Email</a>
		</body>
	</html>
';
$headers[] = 'MIME-VERSION: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'To: '.$to;
$headers[] = 'From: hello@yourdomain.com';
// You can add more headers like Cc, Bcc;
$result = mail($to, $subject, $message, implode("\r\n", $headers)); // \r\n will return new line. 
if($result === TRUE) {
//If email sent successfully then Set some session variables and redirect to login page
	$_SESSION['registerCompleted'] = true;
	header("Location: login.php");
	exit();
}
```

