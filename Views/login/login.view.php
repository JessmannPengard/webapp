<!-- Main content -->
<section class="content">
    <h1 class="form-title">Sign into your account</h1>
    <form action="./login/form" method="post" class="login-form">
        <div class="mb-3">
            <label for="user" class="form-label">Username</label>
            <input type="text" class="form-control" name="user" placeholder="Username" required autofocus>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <!-- Error message -->
        <div class="mb-3">
            <p class='error-text'>
                <?php
                if (isset($error)) {
                    echo $error;
                }
                ?>
            </p>
        </div>
        <div class="mb-3">
            <button type="submit" value="Login" class="btn btn-primary">Login</button>
        </div>
        <div class="mb-3">
            <span class="form-text">Don't you have an account? </span><a href="<?= URL_PATH ?>/login/register"
                class="form-link">Register here</a>
        </div>
    </form>
</section>
<!-- /.content -->