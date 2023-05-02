<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme=dark>
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php">
            <img src="https://img.icons8.com/laces/256/paint-palette.png" alt="" width="50" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= echoActiveClassIfRequestMatches("register") ?>" href="register.php">Sign-up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= echoActiveClassIfRequestMatches("login") ?>" href="login.php" id="login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home.php" id="logout">Logout</a>
                </li>
            </ul>
            <span class="navbar-text h4 px-3">
                <?= isset($_SESSION['first_name']) ? 'Welcome, ' . $_SESSION['first_name'] : '' ?>
            </span>
        </div>
    </div>
</nav>