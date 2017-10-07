<?php
  //require_once('admin/Database.php');
  require_once('admin/portfolio.php');
  $portfolio=new Portfolio();
  $testimonialResult=$portfolio->getTestimonialCondition("testimonial", "*", "testimonial_status=1");
  //print_r($testimonialResult);

  if (isset($_POST['send_message'])) {
    $notification=$portfolio->message($_POST, "message");
    //print_r($_POST);
  }

  require_once('admin/AboutMe.php');
  $aboutMe=new AboutMe();
  $about=$aboutMe->getAboutinfoBycondition();
  //print_r($about);

  require_once'admin/Contact.php';

 $contact=new Contact();

$contactResult=$contact->getpublishedContact();
  

?>

<!--
Author: http://webthemez.com
Note: Donate to remove backlink/credits in the footer(webthemez.com)
Any help: webthemez@gmail.com
Licence: Creative Commons Attribution 3.0** - http://creativecommons.org/licenses/by/3.0/
-->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>Md. Saiful Islam Portfolio</title>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
<link href="css/style.css" rel="stylesheet" type="text/css"> 
<link href="css/font-awesome.css" rel="stylesheet" type="text/css"> 
<link href="css/animate.css" rel="stylesheet" type="text/css">
 
<!--[if lt IE 9]>
    <script src="js/respond-1.1.0.min.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="js/html5element.js"></script>
<![endif]-->
 
</head>
<body>
<?php echo isset($notification)?"$notification":"";?>

<!--Hero_Section-->
<section id="hero_section" class="top_cont_outer">
  <div class="hero_wrapper">
    <div class="container">
      <div class="hero_section">
        <div class="row">
          <div class="col-md-12">
		   
            <div class="top_left_cont zoomIn wow animated"> 
              <h2>Hello, This is <em>Md. Saiful Islam</em> <br> <strong>I <i class="fa fa-heart"></i> Coding</strong></h2>

                <div class="underline"></div>             
              <a href="#aboutUs" class="read_more2">Who Am I</a> </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
</section>
<!--Hero_Section--> 

<!--Header_section-->
<header id="header_wrapper">
  <div class="container">
    <div class="header_box">
      <div class="logo"><a href="#"><img src="img/logo.png" alt="logo"></a></div>
	  <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
	    <div id="main-nav" class="collapse navbar-collapse navStyle">
			<ul class="nav navbar-nav" id="mainNav">
			  <li class="active"><a href="#hero_section" class="scroll-link">Home</a></li>
			  <li><a href="#aboutUs" class="scroll-link">About Me</a></li>
			  <li><a href="#service" class="scroll-link">Skills</a></li>
			  <li><a href="#Portfolio" class="scroll-link">Projects</a></li>
			  <li><a href="#clients" class="scroll-link">Experience</a></li>
			  <li><a href="#team" class="scroll-link">Testimonial</a></li>
			  <li><a href="#contact" class="scroll-link">Contact</a></li>
			</ul>
      </div>
	 </nav>
    </div>
  </div>
</header>
<!--Header_section--> 

<section id="aboutUs"><!--Aboutus-->
<div class="inner_wrapper aboutUs-container fadeInLeft animated wow">
  <div class="container">
   <h2>Who Am I</h2>
  <?php 
  while ($aboutInfo=mysqli_fetch_assoc($about)){
   extract($aboutInfo);
    //print_r($aboutInfo)
   ?>
	<h6><?php echo $about_me;?></h6>
    <div class="inner_section"> 
	  <div class="row">
						<div class="col-lg-12 about-us">
							<div class="row">
							<div class="col-md-6"> <img class="img-responsive" src="img/about1.jpg" align=""> </div><!-- /.col-md-6 -->
								<div class="col-md-6">
									<h3><?=$title; ?></h3>
									<p>
										 <?=$content;?>
									</p>

									<ul class="about-us-list">
										<li class="points"><?=$tag_one;?></li>
										<li class="points"><?=$tag_two;?></li>
										<li class="points"><?=$tag_three;?> </li>
                    <li class="points"><?=$tag_four;?></li>
										<li class="points"><?=$tag_five;?></li>
									</ul><!-- /.about-us-list -->
								 
								</div><!-- /.col-md-6 -->
								
							</div><!-- /.row -->	
						</div><!-- /.col-lg-12 -->
					</div>
      
    </div>
    <?php } ?>
  </div> 
  </div>
</section>
<!--Aboutus--> 


<!--Service-->
<section  id="service">
  <div class="container">
    <h2>Skills</h2>
	<h4>My Special Skills Area</h4>
    <div class="service_wrapper">
      <div class="row">
      <?php
      $queryResult=$portfolio->showPublishedSkills();
      while ($skillsInfo=mysqli_fetch_assoc($queryResult)) {
        extract($skillsInfo);
       ?>
      
        <div class="col-md-3">
		<div class="service_icon delay-03s animated wow  zoomIn"> <span><img src="<?php echo $skill_image;?>"  alt="" style="width: 100%; height: 100%;padding:10px;"> </span> </div>
          <div class="service_block">
            
            <h3 class="animated fadeInUp wow"><?php echo $skill_title;?></h3>
            <p class="animated fadeInDown wow"><?php echo $skill_content;?> </p>
          </div>
        </div>

       <?php }?>
		  
      </div> 
    </div>
  </div>
</section>
<!--Service-->




<!-- Portfolio -->
<section id="Portfolio" class="content"> 
  
  <!-- Container -->
  <div class="container portfolio_title"> 
    
    <!-- Title -->
    <div class="section-title">
      <h2>Projects</h2>
	<h6>Lorem ipsum dolor sit amet, consectetur Morbi sagittis, sem quisci ipsum</h6>
	  
    </div>
    <!--/Title --> 
    
  </div>
  <!-- Container -->
  
  <div class="portfolio-top"></div>
  
  <!-- Portfolio Filters -->
  <div class="container-fluid portfolio"> 
    
    <div id="filters" class="sixteen columns">
      <ul class="clearfix">
        <li><a id="all" href="#" data-filter="*" class="active">
          <h5>All</h5>
          </a></li>
        <li><a class="" href="#" data-filter=".prototype">
          <h5>Prototype</h5>
          </a></li>
        <li><a class="" href="#" data-filter=".design">
          <h5>Design</h5>
          </a></li>
        <li><a class="" href="#" data-filter=".android">
          <h5>Android</h5>
          </a></li>
        <li><a class="" href="#" data-filter=".appleIOS">
          <h5>Apple IOS</h5>
          </a></li>
        <li><a class="" href="#" data-filter=".web">
          <h5>Web App</h5>
          </a></li>
      </ul>
    </div>
    <!--/Portfolio Filters --> 
    
    <!-- Portfolio Wrapper -->
    <div class="isotope fadeInLeft animated wow grid" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper">  
      <!-- Portfolio Item -->
      <figure style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four   appleIOS isotope-item effect-oscar">
	   
        <div class="portfolio_img"> 
		<img src="img/portfolio_pic1.jpg"  alt="Portfolio 1"> </div> 
			<figcaption>		
				<div>
				  <a href="img/portfolio_pic1.jpg" class="fancybox"> 
					<h2>Warm <span>Oscar</span></h2>
							<p>Oscar is a decent man. He used to clean porches with pleasure.</p>
				  </a>
				</div>
			</figcaption>
        </figure>
      <!--/Portfolio Item --> 
      
      <!-- Portfolio Item-->
      <figure style="position: absolute; left: 0px; top: 0px; transform: translate3d(337px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four  design isotope-item effect-oscar">
        <div class="portfolio_img"> <img src="img/portfolio_pic2.jpg" alt="Portfolio 1"> </div>
        	<figcaption>		
				<div>
				  <a href="img/portfolio_pic2.jpg" class="fancybox"> 
					<h2>Warm <span>Oscar</span></h2>
							<p>Oscar is a decent man. He used to clean porches with pleasure.</p>
				  </a>
				</div>
			</figcaption>
        </figure>
      <!--/Portfolio Item --> 
      
      <!-- Portfolio Item -->
      <figure style="position: absolute; left: 0px; top: 0px; transform: translate3d(674px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four  design  isotope-item effect-oscar">
        <div class="portfolio_img"> <img src="img/portfolio_pic3.jpg" alt="Portfolio 1"> </div>
       <figcaption>		
				<div>
				  <a href="img/portfolio_pic3.jpg" class="fancybox"> 
					<h2>Warm <span>Oscar</span></h2>
							<p>Oscar is a decent man. He used to clean porches with pleasure.</p>
				  </a>
				</div>
			</figcaption>
        </figure>
      <!--/Portfolio Item--> 
      
      <!-- Portfolio Item-->
      <figure style="position: absolute; left: 0px; top: 0px; transform: translate3d(1011px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four  android  prototype web isotope-item effect-oscar">
        <div class="portfolio_img"> <img src="img/portfolio_pic4.jpg" alt="Portfolio 1"> </div>
         <figcaption>		
				<div>
				  <a href="img/portfolio_pic4.jpg" class="fancybox"> 
					<h2>Warm <span>Oscar</span></h2>
							<p>Oscar is a decent man. He used to clean porches with pleasure.</p>
				  </a>
				</div>
			</figcaption>
      </figure>
      <!-- Portfolio Item --> 
      
      <!-- Portfolio Item -->
      <figure style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 240px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four  design isotope-item effect-oscar">
        <div class="portfolio_img"> <img src="img/portfolio_pic5.jpg" alt="Portfolio 1"> </div>
       <figcaption>		
				<div>
				  <a href="img/portfolio_pic5.jpg" class="fancybox"> 
					<h2>Warm <span>Oscar</span></h2>
							<p>Oscar is a decent man. He used to clean porches with pleasure.</p>
				  </a>
				</div>
			</figcaption>
      </figure>
      <!--/Portfolio Item --> 
      
      <!-- Portfolio Item -->
      <figure style="position: absolute; left: 0px; top: 0px; transform: translate3d(337px, 240px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four  web isotope-item effect-oscar">
        <div class="portfolio_img"> <img src="img/portfolio_pic6.jpg" alt="Portfolio 1"> </div>
       <figcaption>		
				<div>
				  <a href="img/portfolio_pic6.jpg" class="fancybox"> 
					<h2>Warm <span>Oscar</span></h2>
							<p>Oscar is a decent man. He used to clean porches with pleasure.</p>
				  </a>
				</div>
			</figcaption>
      </figure>
      <!--/Portfolio Item --> 
      
      <!-- Portfolio Item  -->
      <figure style="position: absolute; left: 0px; top: 0px; transform: translate3d(674px, 240px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four  design web isotope-item effect-oscar">
        <div class="portfolio_img"> <img src="img/portfolio_pic7.jpg" alt="Portfolio 1"> </div>       
       <figcaption>		
				<div>
				  <a href="img/portfolio_pic7.jpg" class="fancybox"> 
					<h2>Warm <span>Oscar</span></h2>
							<p>Oscar is a decent man. He used to clean porches with pleasure.</p>
				  </a>
				</div>
			</figcaption>
       </figure>
      <!--/Portfolio Item --> 
      
      <!-- Portfolio Item -->
      <figure style="position: absolute; left: 0px; top: 0px; transform: translate3d(1011px, 240px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four   android isotope-item effect-oscar">
        <div class="portfolio_img"> <img src="img/portfolio_pic8.jpg" alt="Portfolio 1"> </div>       
      <figcaption>		
				<div>
				  <a href="img/portfolio_pic8.jpg" class="fancybox"> 
					<h2>Warm <span>Oscar</span></h2>
							<p>Oscar is a decent man. He used to clean porches with pleasure.</p>
				  </a>
				</div>
			</figcaption>
        </figure>
      <!--/Portfolio Item --> 
      
    </div>
    <!--/Portfolio Wrapper --> 
    
  </div>
  <!--/Portfolio Filters -->
  
  <div class="portfolio_btm"></div>
  
  
  <div id="project_container">
    <div class="clear"></div>
    <div id="project_data"></div>
  </div>
 
  
</section>
<!--/Portfolio --> 

<section class="page_section" id="clients"><!--page_section-->
  <h2>Worked For</h2>
<!--page_section-->
<div class="client_logos"><!--client_logos-->
  <div class="container">
    <ul class="fadeInRight animated wow">
      <li><a href="javascript:void(0)"><img src="img/client_logo1.png" alt=""></a></li>
      <li><a href="javascript:void(0)"><img src="img/client_logo2.png" alt=""></a></li>
      <li><a href="javascript:void(0)"><img src="img/client_logo3.png" alt=""></a></li>
      <li><a href="javascript:void(0)"><img src="img/client_logo5.png" alt=""></a></li>
    </ul>
  </div>
</div>
</section>
<!--client_logos-->

<section class="page_section team" id="team"><!--main-section team-start-->
  <div class="container">
    <h2>Testimonial</h2>
    <h6>Lorem ipsum dolor sit amet, consectetur adipiscing.</h6>
	  	
		<div id="team" name="team">
  <div class="container">
    <div class="row centered">
      
	    <?php
      foreach ($testimonialResult as $testimonail) {
        extract($testimonail);
        ?>
       <div class="col-md-3 centered"> <img class="img img-circle lt-box" src="<?php echo $testimonial_image;?>" height="120px" width="120px" alt="">
      <div class="rt-box"><h4><strong><?php echo $testimonial_title;?></strong></h4>
      <p><?php echo $testimonial_content;?></p><br/>
      </div>
    </div>

      <?php }
      ?>  
   
    </div>
  </div>
  <!-- row --> 
</div>
	</div>
</section>
<!--/Team-->
<!--Footer-->
<footer class="footer_wrapper" id="contact">
  <div class="container">
    <section class="page_section contact" id="contact">
      <div class="contact_section">
        <h2>Get In Touch</h2>
	<h6>Lorem ipsum dolor sit amet, consectetur Morbi sagittis, sem quisci ipsum</h6>
     
      </div>
      <div class="row">
        <div class="col-lg-4 wow fadeInLeft">	
		 <div class="contact_info">

      <?php 
        $contactInfo=mysqli_fetch_assoc($contactResult);
        extract($contactInfo);
      ?>

          <div class="detail">
              <h4>Call Me By</h4>
              <p><?php echo $cell_no;?></p>
          </div>

          <div class="detail">
              <h4>My Email</h4>
              <p><?php echo $email_address;?></p>
          </div> 

          <div class="detail">
              <h4>My Skype Address</h4>
              <p><?php echo $skype_address;?></p>
          </div> 
          <div class="detail">
              <h4>Web Address</h4>
              <p><?php echo $web_address;?></p>
          </div> 

          <div class="detail">
              <h4>Address</h4>
              <p><?php echo $address;?></p>
          </div>
      </div>
       		  
			  
          
          <ul class="social_links">
            <li class="twitter animated bounceIn wow delay-02s"><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
            <li class="facebook animated bounceIn wow delay-03s"><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
            <li class="pinterest animated bounceIn wow delay-04s"><a href="javascript:void(0)"><i class="fa fa-pinterest"></i></a></li>
            <li class="gplus animated bounceIn wow delay-05s"><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li> 
          </ul>
        </div>
        <div class="col-lg-8 wow fadeInLeft delay-06s">
          <form action="" method="POST">
            <div class="form">
              <input class="input-text" type="text" name="name" value="Your Name *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
              <input class="input-text" type="email" name="email" value="Your E-mail *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
              <textarea class="input-text text-area" cols="0" rows="0" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;" name="message">Your Message *</textarea>
              <input class="input-btn" type="submit" name="send_message" value="send message">
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <div class="container">
    <div class="footer_bottom"><span>Copyright © <?php echo date('Y-m-d')?> <a href="http://bitm.org.bd/"> BITM</a></span> </div>
    <div><a href="admin" target="blank" class="adminlogin">Admin Login</a> </div>
  </div>
</footer>

<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="js/jquery.nav.js"></script> 
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.isotope.js"></script>
<script src="js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script> 
<script type="text/javascript" src="js/wow.js"></script> 
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>