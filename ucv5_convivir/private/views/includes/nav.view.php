<style>
	nav ul li a{
		width: 110px;
    text-align: center;
    border-left: solid thin #eee;
    border-right: solid thin #fff;
	}
  nav ul li a:hover{
    background-color: grey;
    color: white !important;
  }
  
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light p-2">
  	<a class="navbar-brand" href="#">
  		<img src="<?=ROOT?>/assets/logocasa.png" class="" style="width:50px;">
      <?=Auth::getCondominio_name()?>
	</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link active" href="<?=ROOT?>/">DASHBOARD</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/usuarios">USUARIOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/condominios">CONDOMINIOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/gastos">GASTOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/inmuebles">VIVIENDAS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">OPCION1</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">OPCION2</a>
      </li>

    </ul>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?=Auth::getUserName()?>
        </a>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?=ROOT?>/usuarios/show/<?=Auth::getId()?>">Profile</a>
          <a class="dropdown-item" href="<?=ROOT?>">Dashboard</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?=ROOT?>/logout">Logout</a>
        </div>
      </li>

    </ul>
  </div>
</nav>
