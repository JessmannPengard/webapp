<!-- Main content -->
<section class="content">
    <h1 class="form-title">Manage your account</h1>
    <form action="" method="post" class="login-form" id="registerForm">
        <div class="mb-3">
            <h3><?php echo $parameters["user_name"] ?></h3>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" autofocus placeholder="Email" value="<?php echo $parameters["user_email"] ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">New password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
        </div>
        <div class="mb-3">
            <label for="c_password" class="form-label">Repeat password</label>
            <input type="password" name="c_password" id="c-password" class="form-control" 
                placeholder="Repeat password">
        </div>
        <!-- Error message -->
        <div class="mb-3">
            <p class="error-text" id="error"></p>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
</section>
<!-- /.content -->