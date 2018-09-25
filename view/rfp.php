<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PJAMASC</title>
  </head>
  <body>
    <p>
      <?php
        if (isset($_GET['RFP'])) {
          echo "<div class='errorRFP'>All fields are required to be fileld in when submitting an RFP
                <br>Please fill out all fields and try again</div>";
        }
        ?>
    </p>
    <form class="rfp" action="sendRFP.php" method="POST">
      <input type="text" name="company" placeholder="Company Name">
      <label>Contact person</label>
      <input type="text" name="firstName" placeholder="First Name">
      <input type="text" name="lastName" placeholder="Last Name">
      <input type="text" name="tele" placeholder="Telephone number">
      <input type="email" name="email" placeholder="Email Address">
      <label>Summary of RFP</label>
      <input type="textarea" name="message" placeholder="Type Summary Here">
      <label>Attatched File - Only PDF format</label>
      <input type="file" name="file">
      <button type="submit" name="submit">Submit RFP</button>
    </form>
  </body>
</html>
