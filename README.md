# <b>Quiz Application</b>

> "Share your knowledge. It’s a way to achieve immortality."

---

## <b>Description</b>

This project simulates a multi-page quiz application that you can add questions, the user picks answers and at the end it shows a score for the user plus which questions he answered correctly and which he answered wrong.

The project main skeleton, all the front-end work and the main back-end logic was provided by Eng.Abdelrahman Karim [Linkedin](https://www.linkedin.com/in/abdel-rahman-karim-695771a8/)

### <b>Main idea</b>
The user navigates to different pages using $_GET superglobal array provided in PHP. His current page is saved and manipulated to be sent in the GET request using JavaScript event-listner handlers.

The answers are stored in the client-side in the sessionStorage to improve the performance and not send unneeded requests to the server using POST requests. If the answers are ought to be saved in the server then it can be changed to send the answers to the server to be recorded and saved if a database is implemented.


### <b>Technologies</b>

- PHP
- JavaScript
- Apache

---

## <b>How To Use</b>

### <b>Prerequisites</b>
You have to run a web server (e.g. Apache) and browser to localhost, most likely on port 80.
You can install any LAMP like package.<br> [XAMPP](https://www.apachefriends.org/index.html) is the most popular for example, it bundles Apache, MySQL, PHP and perl.<br><br>
Once you install XAMPP (and there is an installer, so it shouldn't be hard) open up the control panel for XAMPP and then click the "Start" button next to Apache - note that on applications that require a database, you'll also need to start MySQL (and you'll be able to interface with it through phpMyAdmin). Once you've started Apache, you can browse to http://localhost. <br><br>
Regardless of whether or not you choose XAMPP you should just have to start Apache.

---

## <b>Author Info</b>

- Omar Yehia Ahmed - [Linkedin](https://www.linkedin.com/in/omar-yehia94/)


[Back To The Top](#<b>Quiz-Application</b>)
