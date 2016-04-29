<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Quotes</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="/assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="/assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav>
    <div class="nav-wrapper">
      <h5 class="left"><?php echo $data['alias'] ?>'s Profile</h5>
      <div class="col s4 right">
        <a href="/friends">Home</a> | <a href="/logout">Logout</a>
      </div>
   </div>
  </nav>
   <div class="row">
     <div class="col s12">

       <p>
         Name: <?php echo $data['name'] ?>
       </p>
       <p>
         Email Address: <?php echo $data['email'] ?>
         </p>
       </p>
     </div>
   </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="/assets/js/materialize.js"></script>
  <script src="/assets/js/init.js"></script>

</body>
</html>
