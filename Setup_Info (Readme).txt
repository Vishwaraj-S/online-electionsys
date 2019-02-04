ACCESSING ADMIN ANS USER SIDE PAGES(URLs)
*****************************************

1. ADMIN- http://localhost/se_pro/admin_login.php
2. USER- http://localhost/se_pro/


SETUP A LOCAL SERVER, PROJECT
*****************************

1. Install XAMPP local server.

2. Keep the project folder (sepro) in :
	'Installation Directory'>>htdocs>>sepro>>'All files in here'


DATABASE SETUP
**************

1. Install a local/public server 
	-XAMPP was used in the project.

2. Import the database file(sepro.sql) under database name 'sepro' (without quotes).

3. Set user and password for database in 'connect_sepro.php'.


ADMIN SETUP
***********

1. Provide Admin Login username and password in 'admin_login.php'.
	(Comments used to mark the location in admin_login.php)


ACTIVATE E-MAIL MODULE(LOCAL SERVER ONLY)
*****************************************

1. You can send mail from localhost with sendmail package , sendmail package is inbuild in XAMPP. So if you are using XAMPP then you can easily send mail from localhost.

2. In 'Installation Directory'\xampp\php\php.ini find extension=php_openssl.dll and remove the semicolon from the beginning of that line to make SSL working for gmail for localhost.

3. In php.ini file find [mail function] and change

	SMTP=smtp.gmail.com
	smtp_port=587
	sendmail_from = my-gmail-id@gmail.com
	sendmail_path = "\"'Installation Directory'\xampp\sendmail\sendmail.exe\" -t"

4. Now Open 'Installation Directory'\xampp\sendmail\sendmail.ini. Replace all the existing code in sendmail.ini with following code

	[sendmail]

	smtp_server=smtp.gmail.com
	smtp_port=587
	error_logfile=error.log
	debug_logfile=debug.log
	auth_username=my-gmail-id@gmail.com
	auth_password=my-gmail-password
	force_sender=my-gmail-id@gmail.com

	#PS: Replace my-gmail-id and my-gmail-password in above code. Also, remove duplicate keys(if any) 	
		>>For example comment following line if there is another sendmail_path : sendmail_path="C:\xampp\mailtodisk\mailtodisk.exe" in the php.ini fi

5. Restart the server using the XAMMP control panel so the changes take effect. 





