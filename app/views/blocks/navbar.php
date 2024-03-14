<?php 
     $url = (!empty($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : '/';
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <h1>Pet Management</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo $url == '/' ? 'active' : '' ?>" aria-current="page" href=<?php echo _WEB_PATH_; ?>> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $url == '/tao-pet' ? 'active' : '' ?>" href=<?php echo _WEB_PATH_ . '/tao-pet' ?>>Pet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $url == '/breed' ? 'active' : '' ?> " href=<?php echo _WEB_PATH_ . '/breed' ?>>Breed</a>
                </li>
            </ul>
        </div>
    </div>
</nav>