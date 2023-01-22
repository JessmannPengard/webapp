<!-- Main content -->
<section class="content">
    <h1 class="form-title">Create new account</h1>
    <form action="./register/form" method="post" class="login-form" id="registerForm">
        <div class="mb-3">
            <label for="user" class="form-label">Username</label>
            <input type="text" name="user" class="form-control" required placeholder="Username" autofocus>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required placeholder="Password">
        </div>
        <div class="mb-3">
            <label for="c_password" class="form-label">Repeat password</label>
            <input type="password" name="c_password" id="c-password" class="form-control" required
                placeholder="Repeat password">
        </div>
        <!-- Error message -->
        <div class="mb-3">
            <p class="error-text" id="error"></p>
        </div>
        <div class="mb-3">
            <button type="submit" value="Login" class="btn btn-primary">Register</button>
        </div>
        <div class="mb-3">
            <span class="form-text">Already registered? </span><a href="<?= URL_PATH ?>/login" class="form-link">Login
                here</a>
        </div>
    </form>
</section>
<!-- /.content -->