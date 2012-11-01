<?php 
    
    include('core/init.php');
    
    $name = "home";
    
    include('includes/header.php');
    
    ?>
        
        <div style="padding-bottom: 50px;">
        
        	<div class="row">
        
        		<div class="span9">
        
        			<div id="myCarousel" class="carousel slide" data-interval="5000">
                        <div class="carousel-inner">
                          <div class="item active">
                            <img src="assets/img/8.jpg" alt="">
                            <div class="carousel-caption">
                              <h4>Helping The New Zealand Art Scene Connect The Dots</h4><br />
                              <p><a data-toggle="modal" href="#Notifications" class="btn btn-primary">Keep Me Updated!</a>
                              
                              <div id="Notifications" class="modal hide fade" style="display: none;">
                                          <div class="modal-header">
                                            <button class="close" data-dismiss="modal">×</button>
                                            <h3>Sign Up For Notifications</h3>
                                          </div><!--modal header-->
                                          <div class="modal-body">
                                            
                                            <form>
                                              <label>Email Address</label>
                                              <input type="text" placeholder="Email Address">
                                              <span class="help-block">The Dot isn't quite finished yet, but sign up here to stay in the loop.</span>
                                              <button type="submit" class="btn">Keep Me Updated!</button>
                                            </form>
                              
                                          </div><!--modal body-->
                                          
                                          <div class="modal-footer">
                                            <a href="#" class="btn" data-dismiss="modal">Close</a>
                                          </div><!--modal footer-->
                                        </div>​  <!--modal--></p>
                            </div>
                          </div>
                          <div class="item">
                            <img src="assets/img/DSC_0056.jpg" alt="">
                            <div class="carousel-caption">
                              <h4>Featured Artist</h4>
                              <p>Kit Baker is a Kiwi photographer.</p>
                            </div>
                          </div>
                          <div class="item">
                            <img src="assets/img/gallery-Blue-Oyster-alleywa.jpg" alt="">
                            <div class="carousel-caption">
                              <h4>Featured Gallery</h4>
                              <p>Blue Oyster Art Project Space in Dunedin.</p>
                            </div>
                          </div>
                        </div>
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
                      </div>
                      
                  </div><!--carousel-->
                  
              <div class="span3"><?php 
              include 'includes/widgets/user_count.php'; ?></div>
        
        </div><!--row-->
    
       </div>
       
          <!-- Second hero unit (currently market research survey) for a primary marketing message or call to action -->
          <div class="hero-unit">
            <h1>Market Research Survey</h1>
            <br />
            <p>The Dot is a website where emerging artists can create profiles and have examples of their work displayed. Galleries, art organisations and other creative/interested sorts can also create profiles and make a collection of artists and galleries they enjoy. The Dot will have a gallery of artists and display one featured artist every month. It will have a page with a collection of current zines, exhibition invites and art publications for those interested in design and print media. Another aspect will be regular posts of people in their studios or creative spaces with an aim to create a more personal relationship between artists and website users.</p>
            
            <p>This survey is to ask you, whether you be an artist, gallery owner, volunteer, collector or interested sort, if The Dot sounds useful and what you would like to see on a website like this.</p>
            
            <p>Please forward this address to others you know who would be interested in The Dot.</p>
            
            <br /><br />
            <p><a class="btn btn-primary btn-large" href="http://www.surveymonkey.com/s/CCVZPHB" target="_blank">Fill In The Survey &raquo;</a></p>
            
          </div><!--hero-->
          
    <div style="padding-bottom: 140px; padding-top: 50px;"><!--who we're for div-->
    	<h1 align="center">Who We're For</h1>
    
          <!-- Row of columns -->
          <div class="row">
          <div class="span2" align="center"><img src="assets/img/who/greyPaintbrush.png" alt="" /></div>
            <div class="span4">
              <h2>Artists</h2>
              <h5>All artists deserve accessibility</h5>
              <p>Art revolves around artists. Which is why it's important to support and foster their creativity. The Dot allows artists to reach out to all corners of the art world, networking not only to galleries and consumers but to other artists. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div>
            <div class="span2" align="center"><img src="assets/img/who/galleries.jpeg" alt="" /></div>
            <div class="span4">
              <h2>Galleries</h2>
              <h5>Public or independent, nation-wide</h5>
              <p>Galleries, Dealers and Project Spaces are as integral to the art world as coffe is to The Dot's production. Which is why they're an integral part of The Dot, too. Collectors, enthusiasts and artists can follow their favourite galleries and discover new ones, while galleries can reach out to a wider audience and discover artists. Sweet deal.</p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
           </div>
           <div class="span2" align="center"><img src="assets/img/who/enthusiast.jpeg" alt="" /></div>
            <div class="span4">
              <h2>Enthusiasts</h2>
              <h5>Anyone can be involved in the art world</h5>
              <p>Whether it's visiting exhibitions of your favourite artists, or volunteering at a project space, the New Zeland art world should be open and accessible to all. Follow your favourites, find new ones, and keep up to date with all that's happening in New Zealand art.</p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div>
            <div class="span2" align="center"><img src="assets/img/who/shepard-fairey-art-collection-500x370.jpeg" alt="" /></div>
            <div class="span4">
              <h2>Collectors</h2>
              <h5>Your home, your collection</h5>
              <p>While we're not an art sale site, The Dot offers an invaluable opportunity for dealers and collectors to follow and connect with emerging talent. So get in touch!</p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div>
          </div><!--end row-->
          </div><!--who we're for div-->
          
          <div style="background-color: #eeeeee;
          -webkit-border-radius: 6px;
             -moz-border-radius: 6px;
                  border-radius: 6px; padding-top: 20px; padding-bottom: 140px;"><!--talking div-->
          <h1 align="center">Who's Talking About Us</h1>
          <h5 align="center"><i>plus inspiration and who we're working with</i></h5>
          <div align="center"><iframe width="640" height="360" src="http://www.youtube.com/embed/eU7V4GyEuXA" frameborder="0" allowfullscreen></iframe></div><br />
                <!-- Row of columns -->
                <div class="row">
                  <div class="span12"  align="center">
                    <a href="http://moodietuesday.com/"><img src="assets/img/mt.png" alt="" /></a>
                    <a href="http://www.motionsicknessstudio.com/"><img src="assets/img/mst.png" alt="" /></a>
                  </div>
                  
                </div><!--end row-->
          </div><!--talking div-->
          
          <div style="padding-bottom: 140px; padding-top: 50px;"><!--social media div-->
            <h1 align="center">You + Social Media = Social Impact</h1>
            <h3 align="center">You're Awesome. Let's Talk</h3>
            <br />
            
            <div class="row">
              <div class="span4" align="center">
                <h3>Facebook</h3>
                <img src="assets/img/sm/fb-icon.png" alt="" />
                <p><a href="http://www.facebook.com/pages/The-Dot/103297716439982?fref=ts" target="_blank">The Dot</a></p>
              </div>
              <div class="span4" align="center">
                <h3>Twitter</h3>
                <img src="assets/img/sm/twitter-icon.png" alt="" />
                <p><a href="https://twitter.com/TheDotNZ" target="_blank">@TheDotNZ</a></p>
             </div>
              <div class="span4" align="center">
                <h3>Email</h3>
                <img src="assets/img/sm/email-icon.png" alt="" />
                <p><a href="mailto:info@thedot.co.nz" target="_blank">info@thedot.co.nz</a></p>
              </div>
            </div><!--end row-->
            
        </div><!--social media div-->
    
          <?php 
          
          include('includes/footer.php');
          
          ?>
    
    </html>