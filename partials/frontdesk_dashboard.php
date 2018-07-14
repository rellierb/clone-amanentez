<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Amanenetez</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">

      <?php
      
      if(isset($_SESSION['username']) && isset($_SESSION['account_type'])) {
        echo '<a class="nav-link" href="#">Sign out</a>';
      }
      
      ?>
      
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather=""></span>
              Reservations
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather=""></span>
              Rooms Status
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather=""></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather=""></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather=""></span>
              Transaction
            </a>
          </li>
        </ul>
      </div>
    </nav>