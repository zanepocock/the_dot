

<div class="row">

 <a data-toggle="modal" href="#SignIn" class="btn btn-primary">Sign In</a>
 
 <div id="SignIn" class="modal hide fade" style="display: none; ">
             <div class="modal-header">
               <button class="close" data-dismiss="modal">×</button>
               <h3>Sign In To The Dot!</h3>
             </div>
             <div class="modal-body">
               <p><a href="#SignInFacebook" class="btn btn-primary">Sign In With Facebook</a></p>
               <p><a href="#SignInTwitter" class="btn btn-primary">Sign In With Twitter</a></p>                              
 
               <h4>Sign In With Username</h4>
               <form class="form-horizontal" action="login.php" method="post">
                 <div class="control-group">
                   <label class="control-label" for="inputEmail">Email</label>
                   <div class="controls">
                     <input type="text" id="inputEmail" placeholder="Email" name="email">
                   </div>
                 </div>
                 <div class="control-group">
                   <label class="control-label" for="inputPassword">Password</label>
                   <div class="controls">
                     <input type="password" id="inputPassword" placeholder="Password" name="password">
                   </div>
                 </div>
                 <div class="control-group">
                   <div class="controls">
                     <label class="checkbox">
                       <input type="checkbox"> Remember me
                     </label>
                     <button type="submit" class="btn">Sign in</button>
                   </div>
                 </div>
               </form>
 
               <hr>
 
               <h4>Don't Have An Account Yet? Sign Up Here!</h4>
               <p><a href="#CreateAccount" class="btn btn-primary">Create An Account</a></p>
             </div>
             <div class="modal-footer">
               <a href="#" class="btn" data-dismiss="modal">Close</a>
             </div>
           </div>​  
           
           <a data-toggle="modal" href="#SignUp" class="btn btn-primary">Sign Up</a>
     
           <div id="SignUp" class="modal hide fade" style="display: none; ">
                       <div class="modal-header">
                         <button class="close" data-dismiss="modal">×</button>
                         <h3>Sign Up To The Dot!</h3>
                       </div>
                       <div class="modal-body">
                         <p><a href="#SignUpFacebook" class="btn btn-primary">Sign Up With Facebook</a></p>
                         <p><a href="#SignUpTwitter" class="btn btn-primary">Sign Up With Twitter</a></p>                              
           
                         <h4>Sign Up With Username</h4>
                         <p><form class="form-horizontal" action="register.php" method="post">
                         
                           <div class="control-group">
                             <label class="control-label" for="inputUsername">Username*:</label>
                             <div class="controls">
                               <input type="text" id="inputUsername" placeholder="Username" name="username">
                             </div>
                           </div>
                           
                           <div class="control-group">
                             <label class="control-label" for="inputPassword">Password*:</label>
                             <div class="controls">
                               <input type="password" id="inputPassword" placeholder="Password" name="password">
                             </div>
                           </div>
                           
                           <div class="control-group">
                             <label class="control-label" for="inputPasswordAgain">Please Confirm Password*:</label>
                             <div class="controls">
                               <input type="password" id="inputPasswordAgain" placeholder="Password" name="password_again">
                             </div>
                           </div>
                           
                           <div class="control-group">
                             <label class="control-label" for="inputFirstName">First Name*:</label>
                             <div class="controls">
                               <input type="text" id="inputFirstName" placeholder="First Name" name="first_name">
                             </div>
                           </div>
                           
                           <div class="control-group">
                             <label class="control-label" for="inputLastName">Last Name:</label>
                             <div class="controls">
                               <input type="text" id="inputLastName" placeholder="Last Name" name="last_name">
                             </div>
                           </div>
                           
                           <div class="control-group">
                             <label class="control-label" for="inputEmail">Email*</label>
                             <div class="controls">
                               <input type="text" id="inputEmail" placeholder="Email" name="email">
                             </div>
                           </div>
                           
                           
                           <div class="control-group">
                             <div class="controls">
                               <label class="checkbox">
                                 <input type="checkbox"> Remember me
                               </label>
                               <button type="submit" class="btn">Sign Up</button>
                             </div>
                           </div>
                           
                         </form></p>
           
                         <hr>
           
                         <h4>Already Have An Account? Sign In Here!</h4>
                         <p><a href="#CreateAccount" class="btn btn-primary">Sign In!</a></p>
                       </div>
                       <div class="modal-footer">
                         <a href="#" class="btn" data-dismiss="modal">Close</a>
                       </div>
                     </div>​
           
           </div><!--button row -->

</html>