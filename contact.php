<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Raleway', sans-serif;
}
body, html {
  color: #333;
  display: grid;
  max-width: 100%;
  place-items: center;
}

h2 {
  margin: 0;
  color: #ff4d30;
  font-size: 2.5em;
  font-weight: 600;
  margin-top: 5rem;
}

form{
  width: 50%;
}

form label{
  font-size: 1.2rem;
}

input, textarea, button {
  width: 100%;
  padding: 0.5em;
  border: none;
  font-size: 1.2rem;
}
input[type="text"], input[type="email"], textarea {
  margin: 0 0 1em;
  border: 1px solid #ccc;
  outline: none;
}

textarea {
  height: 6em;
}
input[type="submit"], button {
  background: #ff4d30;
  color: #fff;
  cursor: pointer;
}
input[type="submit"]:hover, button:hover {
  background: #6E65F4;
}

    </style>
</head>
<body>
<button type="button" onclick="goToPreviousPage()">Previous</button>
<h2>Contact Us</h2>

<form action="mail.php" method="post" autocomplete="off">
    
    <label for="name">Your Name</label>
    <input type="text" name="name" placeholder="Your Name">

    <label for="email">Email</label>
    <input type="email" name="email" placeholder="Email">

    <label for="message">Message</label>
    <textarea name="message" placeholder="Message"></textarea>

    <input type="submit" value="Submit">
   

</form>
           
         

<script>
    function goToPreviousPage() {
        window.history.back();
    }

    document.getElementsByTagName("h1")[0].style.fontSize = "6vw";
</script>

</body>
</html>
