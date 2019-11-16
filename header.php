<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="inventory.php">Inventory</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="uploadform.php">Upload Form</a>
      </li>
      
    </ul>
    <ul class="nav navbar-nav ml-auto" id="nav-right">
      <li><a href="#" data-toggle="modal" data-target="#modalRegisterForm"><i class="fas fa-user"></i> Sign Up</a></li>
      <li class="mx-4"><a href="#" data-toggle="modal" data-target="#modalLoginForm"><i class="fas fa-sign-in-alt"></i> Login</a></li>
    </ul>
  </div>
</nav>

<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
  	<form method="POST">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fa fa-envelope prefix grey-text"></i>
          <input type="text" id="defaultForm-email" class="form-control validate" name="username1">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Your username</label>
        </div>

        <div class="md-form mb-4">
          <i class="fa fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" class="form-control validate" name="pass">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" class="btn btn-default" value="Login">
      </div>
    </div>
    </form>
  </div>
</div>

<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalRegister"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
  	<?php 

  	include 'register.php';
  	 ?>
  	<form method="POST">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
      	<div class="md-form mb-5">
          <i class="fas fa-user"></i>
          <input type="text" id="username" class="form-control validate" name="username">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Username</label>
        </div>
        <div class="md-form mb-5">
          <i class="fa fa-envelope prefix grey-text"></i>
          <input type="email" id="email" class="form-control validate" name="email">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fa fa-lock prefix grey-text"></i>
          <input type="password" id="password" class="form-control validate" name="password">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
        </div>
		<div class="md-form mb-4">
          <i class="fa fa-lock prefix grey-text"></i>
          <input type="password" id="passwordc" class="form-control validate" name="passwordc">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Confirm Your password</label>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" class="btn btn-default">
      </div>
    </div>
    </form>
  </div>
</div>

<div class="fluid-container">
    <div class="row">
      <div class="col-lg-12" id="hero">
        <div  class="col-lg-4" id="header">
          <h1>Books library</h1>
        </div>
      </div>
    </div>
  </div>
	
