<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    <header>
        <div class="titlecontainer">
        <h1 class="title">Contact Us</h1>
        </div>
    </header>
    <section class="contact">
        <div class="container">
            <div class="contact-info">
                <h2>Get in Touch</h2>
                <p>If you have any questions, feel free to reach out to us. We're here to help!</p>
                <ul>
                    <li><strong>Phone:</strong> <a href="tel:+916280155616">+91 6280155616</a></li>
                    <li><strong>Email:</strong> <a href="mailto:dineshsudha2003@gmail.com"></a></li>
                </ul>
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="https://www.linkedin.com/in/dinesh-sudha-353a32252?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><img src="https://upload.wikimedia.org/wikipedia/commons/e/e8/Linkedin-logo-blue-In-square-40px.png" alt="LinkedIn"></a>
                    <a href="https://x.com/Dinesh_Sudha3?t=FP08jWq-JKkyTAukmv5vYg&s=08"><img src="images/twitter.png" alt="Twitter"></a>
                    <a href="https://www.instagram.com/jonty_sudha?igsh=N2F3dHhhM3Noa2Vk"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/900px-Instagram_icon.png?20200512141346" alt="Instagram"></a>
                </div>
            </div>
            <div class="contact-form">
                <h2>Contact Form</h2>
                <form action="contact-form.php" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" required>
                    
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                    
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </section>
   
  
</body>
</html>

<?php
include('footer.php');
?>