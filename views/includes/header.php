<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container ">
    <a class="navbar-brand " href="#">Fly
<img src="https://img.icons8.com/wired/50/000000/airplane-take-off.png"/>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php BASE_URL;?>home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php BASE_URL;?>myreservations">My Reservations</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php BASE_URL;?>logout">Logout</a>
        </li>
        
      </ul>
      <form method="post" action="<?php BASE_URL;?>search" class="d-flex">
        <input class="form-control me-2" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      
    </div>
  </div>
</nav>