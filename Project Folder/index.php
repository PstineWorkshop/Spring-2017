<?php # Script 3.4 - index.php
include ('includes/session.php');

$page_title = 'Welcome to this Site!';

?>
<!-- SLIDESHOW -->
  <!-- Full Page Image Background Carousel Header -->
    <div class="container">
     <header id="myCarousel" class="carousel slide">
        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active" > <!--First IMAGES-->
                 <div class="fill" style="background-image:url('images/yooka.jpg');"></div>
        <!--CAPTIONS FOR IMAGES-->
         <div class="container">
          <div class="carousel-caption">
            <div class="message">
            <div class="message-bg"> </div>
            <h1>Yooka Layleee</h1>
            <p></p>
            <p><a class="btn btn-large btn-primary" href="gameData.php?game_info=<?php echo 'Yooka Laylee'?>">Learn More</a>
            </p>
            </div>
            </div>
          </div>
            </div> <!--END OF FIRST IMAGES-->
      
      
       <div class="item" > <!--SECOND IMAGES-->
                <div class="fill" style="background-image:url('images/overwatch.png');"></div>
        <!--CAPTIONS FOR IMAGES-->
         <div class="container">
          <div class="carousel-caption">
            <div class="message">
            <div class="message-bg"> </div>
            <h1>OVERWATCH</h1>
            <p>Overwatch is multiple player game</p>
            <p><a class="btn btn-large btn-primary" href="gameData.php?game_info=<?php echo 'OVERWATCH'?>">Learn More</a>
            </p>
            </div>
            </div>
          </div>
            </div> <!--END OF SECOND IMAGES-->
      
       <div class="item" > <!--3rd IMAGES-->
                <div class="fill" style="background-image:url('images/skyrim.jpg');"></div>
        <!--CAPTIONS FOR IMAGES-->
         <div class="container">
          <div class="carousel-caption">
            <div class="message">
            <div class="message-bg"> </div>
            <h1>Skyrim</h1>
            <p>Skyrim is a massive open world role playing adventure where you play the role of the dragon born</p>
            <p><a class="btn btn-large btn-primary" href="gameData.php?game_info=<?php echo 'Skyrim'?>">Learn More</a>
            </p>
            </div>
            </div>
          </div>
            </div> <!--END OF 3rd IMAGES-->
      
      <div class="item" > <!--4rdrd IMAGES-->
                <div class="fill" style="background-image:url('images/doom.jpg');"></div>
        <!--CAPTIONS FOR IMAGES-->
         <div class="container">
          <div class="carousel-caption">
            <div class="message">
            <div class="message-bg"> </div>
            <h1>Doom</h1>
            <p>Doom is a first person shooter created by bethesda studio that captures the heart of the genre while staying true to its roots</p>
            <p><a class="btn btn-large btn-primary" href="gameData.php?game_info=<?php echo 'Doom'?>">Learn More</a>
            </p>
            </div>
            </div>
          </div>
            </div> <!--END OF 4rd IMAGES-->
      
      </div>
      
      
    
    <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    
  
    </header> 
</div>
<!-- END OF SLIDESHOW -->


 
 <?php include ('./includes/header.php');?>


<!--<div class="well">

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed diam eget risus varius blandit sit amet non magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Aenean lacinia bibendum nulla sed consectetur.</p>
</div>-->
<?php
include ('./includes/footer.html');
?>
