<?php

include_once (dirname(__FILE__)) . '/../controllers/post_controller.php';

if (isset($_GET['id'])) {
  $post = getSinglePost($_GET['id']);
  if (empty($post)) {
    header("location: ../interactions.php");
  }
} else {
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="../css/post_style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="../css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="../css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
   <link rel="stylesheet" href="../style.css">
  <title>Blog Post</title>
</head>

<body class="main-layout">
    <!-- header -->
    <!-- <header class="header-area">
      <div class="container">
         <div class="row d_flex">
            <div class="col-sm-3 logo_sm">
               <div class="logo">
                  <a href="index.php"></a>
               </div>
            </div>
            <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-9">
               <div class="navbar-area">
                  <nav class="site-navbar">
                     <ul>
                     <li><a  href="../index.php">Home</a></li>
                        <li><a href="../about.php">About</a></li>
                        <li><a href="../staff.php" class="logo_midle">Staff</a></li>
                        <li><a href="../book_appointment.php">Schedule a meeting</a></li>
                        <li><a class="active" href="../interactions.php">Share your story</a></li>
                        <li><a href="../logout.php">Logout</a></li>
                        
                     </ul>
                     <button class="nav-toggler">
                        <span></span>
                     </button>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </header> -->
   <!-- end header -->
  <div class="container container-custom">
    <h1><?= $post['title'] ?></h1>
    <p style="mt-5"><?= $post['body'] ?></p>
    <a href="#" title="Love it" class="bt btn-counter" data-count=0 id = "like"><span>&#x2764;</span></a><br>
    <a class="btn btn-primary" href="../interactions.php">Back to Home</a>
    <a href="../functions/post_delete.php?id=<?= $post['id'] ?>" style="color: red;" class="btn btn-danger btn-custom" onclick="return confirm('Are you sure you want to delete this post?')"> Delete</a>
    <a href="./post_update.php?id=<?= $post['id'] ?>" style="color: green;" class="btn btn-secondary btn-custom"> Update</a>
  </div>
  
   <script>
      $('#like').on('click', function(event, count) {
    event.preventDefault();
    var $this = $(this),
        count = $this.attr('data-count'),
        active = $this.hasClass('active'),
        multiple = $this.hasClass('multiple-count');

    // First method, allows to add custom function
    
     if (multiple) {
       $this.attr('data-count', ++count);
     // Your code here
      } else {
     $this.attr('data-count', active ? --count : ++count).toggleClass('active');
       
      }

    // Second method, use when ... I dunno when but it looks cool and that's why it is here
    $.fn.noop = $.noop;
    print("hi");
    $this.attr('data-count', !active || multiple ? ++count : --count)[multiple ? 'noop' : 'toggleClass']('active');

});
   </script>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="></script>
    -->
    <!--<script src="../js/like.js"></script>-->
      <!--  footer -->
   <!-- <footer>
      <div class="footer">
         <div class="container">
            <div class="row">
               <div class="col-lg-2 col-md-6 col-sm-6">
                  <div class="hedingh3 text_align_left">
                     <h3>Resources</h3>
                     <ul class="menu_footer">
                        <li><a href="index.php">Home</a>
                        <li>
                        <li><a href="javascript:void(0)">What we do</a>
                        <li>
                        <li> <a href="javascript:void(0)">Testimonies</a>
                        <li>
                        <li> <a href="javascript:void(0)">How we work</a>
                        <li>
                        <li><a href="javascript:void(0)">Protection</a>
                        <li>
                        <li><a href="javascript:void(0)">Care</a>
                        <li>
                     </ul>


                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="hedingh3 text_align_left">
                     <h3>About</h3>
                     <p>Powerhouse is a mental health foundation in Accra Ghana that provides therapy to people who need it, and we also 
                        provide a platform where you can share your mental health stories and journeys with others, and hear theirs too!
                     </p>
                  </div>
               </div>



               <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="hedingh3  text_align_left">
                     <h3>Contact Us</h3>
                     <ul class="top_infomation">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>
                           Accra
                        </li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i>
                           Call : +233 1234567890
                        </li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i>
                           <a href="Javascript:void(0)">Email : powerhouse@gmail.com</a>
                        </li>
                     </ul>


                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="hedingh3 text_align_left">
                     <h3>countries</h3>
                     <div class="map">
                        <img src="images/map.png" alt="#" />
                     </div>
                  </div>
               </div>

            </div>
         </div>

      </div>
   </footer> -->
   <!-- end footer -->
</body>

</html>
