<!DOCTYPE html>
<html>

<head>
 <style>
 body {font-family: Arial;}
 * {box-sizing: border-box}

 /* Full-width input fields */
 input[type=text], input[type=password] {
     width: 100%;
     padding: 15px;
     margin: 5px 0 22px 0;
     display: inline-block;
     border: none;
     background: #f1f1f1;
 }

 input[type=text]:focus, input[type=password]:focus {
     background-color: #ddd;
     outline: none;
 }


 /* Set a style for all buttons */
 button {
     background-color: grey;
     color: black;
     padding: 14px 20px;
     margin: 8px 0;
     border: none;
     cursor: pointer;
     width: 100%;
     opacity: 0.9;
 }

 button:hover {
     opacity:1;
 }

 /* Extra styles for the cancel button */


 /* Float cancel and signup buttons and add an equal width */
 .cancelbtn, .signupbtn {
   float: left;
   width: 50%;
 }


 .container{
   width:70%;
   height:100%;
   border: 2px solid #ccc;

 }
 .tab {
 overflow: hidden;
 border: 1px solid #ccc;
 background-color: #f1f1f1;
 }

 /* Style the buttons inside the tab */
 .tab button {
 background-color: inherit;
 display:inline;
 float: left;
 border: none;
 outline: none;
 cursor: pointer;
 padding: 14px 16px;
 transition: 0.3s;
 font-size: 17px;
 }

 /* Change background color of buttons on hover */
 .tab button:hover {
 background-color: #ddd;
 }

 /* Create an active/current tablink class */
 .tab button.active {
 background-color: #ccc;
 }

 /* Style the tab content */
 .tabcontent {
 display: none;
 padding: 6px 12px;
 border: 1px solid #ccc;
 border-top: none;
 }

 .Admin{
   margin-left: 2px;

 }
 </style>
 </head>
<body>
 <div class="container">

 <div class="admin" id="admin">
    <p align="right" display="inline">Admin</p>
    <img align="right" src="smiley.gif" height="42" width="42">
 </div>
     <div class="tab">
         <button class="tablinks" >Home</button>
         <button class="tablinks" >Produts</button>
         <button class="tablinks">Users</button>
         <button class="tablinks">Manual</button>
         <button class="tablinks">Checks</button>
     </div>

       <form method="post" action="controllers/adminController.php" >

       <h1 align="left">Add User</h1>
       <hr>

       <label><b>Name</b></label>
       <input type="text" placeholder="Enter Name" name="name" required>
<br />
       <label><b>Email</b></label>
       <input type="email" placeholder="Enter Email" name="email" required>
<br />
       <label><b>Password</b></label>
       <input type="password" placeholder="Enter Password" name="psw" required>
<br />
       <label><b>Confirm Password</b></label>
       <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
       <span class="error">* <?php if(isset($_GET['confirmErr'])){echo $_GET['confirmErr'] ;} else {echo "";}?></span>


<br />
       <label><b>Room No.</b></label>
       <input type="text" placeholder="Enter Room No." name="roomNo" required>
<br />
       <label><b>Ext.</b></label>
       <input type="text" placeholder="Enter Ext." name="Ext" required>
<br />
       <label><b>Profile Picture</b></label>
       <input type="text" placeholder="Browse" name="file" required>
<br />

       <div class="clearfix">
         <button type="submit" class="cancelbtn">Save</button>
         <button type="reset" class="signupbtn">Reset</button>
       </div>
     </div>
 </form>
</div>

</body>
</html>
