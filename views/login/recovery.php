<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5">Establece tu nueva contraseña</h2>
        <div class="text-center mb-5 text-dark">Para Administradores</div>
        <div class="card my-5">

          <form action="login.php?action=recovery&token=<?php echo $token;?>"method="post" class="card-body cardbody-color p-lg-5">

            <div class="text-center">
              <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="contrasena" placeholder="Contraseña" name="contrasena">
            </div>
            <div class="text-center">
            <button type="submit" input="submit" class="btn btn-color px-5 mb-5 w-100">Confirmar</button></div>
          </form> 
        </div>

      </div>
    </div>
  </div>