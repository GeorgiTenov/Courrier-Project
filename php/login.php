<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../styles/login.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div id="wrongLogin" style="display:none">
      <p><b>Your password or username does not meet the requirments</b></p>
    </div>

    <div class="form-container">
    <form id="form" action="index.php" method="get">
      <b>Username:</b><input type="text" placeholder="Username..." name="username" value="" class="logInfo" id="username"/>
      <br>
        <b>Password:</b><input type="password" placeholder="Password..." name="password" value="" class="logInfo" id="password"/>
        <br>
        <input type="submit"  value="Log In" id="loginBtn"/>
      </form>
      </div>
    <script src="../jsFiles/login.js" type="module"></script>


  </body>
</html>
