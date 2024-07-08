<!-- Grey with black text -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active text text-primary" href="userHome.php"><h5>Home</h5></a>
        </li>
        <li class="nav-item">
            <a class="nav-link text text-warning" href="usertweets.php"><h5>My Tweets</h5></a>
        </li>
        </ul>
    </div>
    <div class="col-xl-1 mt-2">
        <div class="dropdown">
          <button class="btn tn-sm btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['username']; ?>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
</nav>