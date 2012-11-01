<html lang="en">

<div class="row">

 <a data-toggle="modal" href="#SignOut" class="btn btn-primary">Sign Out</a>
 
 <div id="SignOut" class="modal hide fade" style="display: none; ">
             <div class="modal-header">
               <button class="close" data-dismiss="modal">×</button>
               <h3>Are You Sure You Want To Sign Out Of The Dot?</h3>
             </div><!--modal header-->
             <div class="modal-body">
             
               <a href="logout.php" class="btn btn-primary">Yes, Please Sign Me Out.</a>
 
               <hr>
               
             </div><!--modal body-->
             
             <div class="modal-footer">
               <a href="#" class="btn" data-dismiss="modal">Close</a>
             </div><!--modal footer-->
             
           </div>​<!--modal-->  
 
 <a data-toggle="modal" href="#Profile" class="btn btn-primary">Profile</a>
 
 <div id="Profile" class="modal hide fade" style="display: none; ">
             <div class="modal-header">
               <button class="close" data-dismiss="modal">×</button>
               <h3>Hello, <?php echo $user_data['first_name']; ?>!</h3>
             </div><!--modal header-->
             <div class="modal-body">
             
               <h4>Email Address</h4>
               
               <p><?php echo $user_data['email']; ?></p>
               
               <h4>Name</h4>
               
               <p><?php echo $user_data['first_name']; echo $user_data['last_name']; ?></p>
               
               <a href="changepassword.php" class="btn btn-primary">Change Password</a>
 
               <hr>
               
             </div><!--modal body-->
             
             <div class="modal-footer">
               <a href="#" class="btn" data-dismiss="modal">Close</a>
             </div><!--modal footer-->
             
           </div>​<!--modal-->  
           
</div><!--button row -->

</html>