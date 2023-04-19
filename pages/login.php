<?php
  error_reporting(0);
  session_start();
  
  if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){

?>
<?php
if(isset($_POST['daftar'])) {
	include "daftar.php";
	  }
	  else {
		  ?>
   <hr/>
      <div role="main" class="container checkout">
        <div class="row">
          <div class="span9 checkout-list">
           
            <div class="row">
              <div class="span9 content-wrapper clearfix">
                <div class="right-col">
                      
                  <h6>LOGIN USER</h6>
                  <p>
                    Silahkan diisi dengan benar
                  </p>
                      
                  <form action="cek_login.php" method="post" id="form-2">
                    
                      
						<label>Username </label>
                          <input type="text" name="user" placeholder="username anda..." size="30"/>
                      
                    
                     
						  <label>Password </label>
                          <input type="password" name="pass" placeholder="Password..." size="30"/>
                       
                      
                
                        
                        
                        
                      <p><span class="gradient">
                      <input type="submit" class="btn btn-success" value="Login">
                      </span>
                        </a></p>
                    <span class="left-col">
                    <p>Apakah anda sudah mendaftar..? apabila belum silahkan klik <br><a href="daftar.php" class="btn btn-success">DAFTAR</a></span></p>
                   </span>
                  </form>
                      
                </div>  
              </div>                      
            </div>
          </div>
        
        </div>
      </div>    
      
 <?php
  } }
  else
  {
   echo "<script>window.alert('anda sudah melakukan login')</script>";
   echo "<meta http-equiv='refresh' content='0; url=../index.php'>";

  }
 ?>     