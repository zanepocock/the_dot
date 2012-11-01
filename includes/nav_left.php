<html lang="en">

<ul class="nav">
  <li class="<?php if ($name == "home"){ echo "active"; } ?>"><a href="index.php">Home</a></li>
  <li class="<?php if ($name == "galleries"){ echo "active"; }?>"><a href="galleries.php">Galleries</a></li>
  <li class="<?php if ($name == "featured"){ echo "active"; }?>"><a href="featured.php">Featured Artists</a></li>
  <li class="<?php if ($name == "studios"){ echo "active"; }?>"><a href="studios.php">Studios</a></li>
  <li class="<?php if ($name == "library"){ echo "active"; }?>"><a href="library.php">Library</a></li>
  <li class="<?php if ($name == "learn"){ echo "active"; }?>"><a href="learn.php">Learn</a></li>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">More... <b class="caret"></b></a>
    <ul class="dropdown-menu">
      <li class="<?php if ($name == "contact"){ echo "active"; }?>"><a href="contact.php">Contact Us</a></li>
      <li class="<?php if ($name == "bugs"){ echo "active"; }?>"><a href="bugs.php">Report A Bug</a></li>
      <li class="divider"></li>
      <li class="nav-header">Directors' Blogs</li>
      <li class="<?php if ($name == "loulou"){ echo "active"; }?>"><a href="loulou.php">Loulou</a></li>
      <li class="<?php if ($name == "zane"){ echo "active"; }?>"><a href="zane.php">Zane</a></li>
    </ul>                                     
  </li>
</ul>

</html>