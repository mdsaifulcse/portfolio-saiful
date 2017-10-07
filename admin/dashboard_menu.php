<nav>
  <ul class="clearfix">
    <li class="current"><a href="dashboard.php">Dashboard</a></li>
    <li> <a href="menu.php">Manage Menu</a></li>
    <li><a href="about-me.php">About Me</a></li>
    <li><a href="skills.php">Manage Skills</a></li>
    <li><a href="testimonials.php">Manage Testimonial</a></li>
    <li><a href="message.php">Manage Message</a></li>
    <li><a href="contact-info.php">Contact Info</a></li>
  </ul>
  <div class="wellcome"> 
    <p>WELCOME <strong><?php echo $_SESSION['name']; ?></strong> </p>
    <a href="logout.php?logout=logout"><span class="  glyphicon glyphicon-log-out"></span> Logout</a>

  </div>
</nav>