<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>WishList</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="/assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="/assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="/assets/js/materialize.js"></script>
  <script src="/assets/js/init.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(".button-collapse").sideNav();
    })
  </script>
</head>
<body>
  <?php
    $alias = $this->session->userdata('alias');

    $active_id = $this->session->userdata('active_id');
   ?>
   <nav>
     <div class="nav-wrapper">
       <h4 class = "left">Hello, <?php echo $alias; ?>!</h4>
       <div class="col s4 right">
         <a href="/logout">Logout</a>
       </div>
    </div>
   </nav>
   <div class="row">
     <div class="col s12">
       <div class="row">
         <div class="col s12">
           <h5>
             Here is a list of your friends:
           </h5>
          <table>
            <thead>
              <tr>
                <th>
                  Alias
                </th>
                <th>
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
            <?php
              foreach ($data['friends'] as $friend) {
                ?>
                <tr>
                  <td><?php echo $friend['alias'] ?></td>
                  <td><a href="/user/<?php echo $friend['friend_id'] ?>">View Profile</a>  <a href="/remove_friend/<?php echo $friend['friend_id'] ?>">Remove as Friend</a></td>
                </tr>
                <?php
                }
                 ?>
            </tbody>
          </table>
           <h5>
             Other users not on your friends list
           </h5>
           <table>
             <thead>
               <tr>
                 <th>
                   Alias
                 </th>
                 <th>
                   Action
                 </th>
               </tr>
             </thead>
             <tbody>
             <?php
               foreach ($data['not_friends'] as $non_friend) {
                 ?>
                 <tr>
                   <td><a href="/user/<?php echo $non_friend['friend_id'] ?>"><?php echo $non_friend['alias'] ?></a></td>
                   <td>  <a class="btn" href="/add_friend/<?php echo $non_friend['friend_id'] ?>">Add as a Friend</a></td>
                 </tr>
                 <?php
                 }
                  ?>
             </tbody>
           </table>

         </div>

       </div>
     </div>
   </div>


  <!--  Scripts-->


</body>
</html>
