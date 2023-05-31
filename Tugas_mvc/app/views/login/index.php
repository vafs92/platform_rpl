<h3>Login</h3>
<form action="<?= BASEURL ?>/login/login" method="post">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="text" id="password" name="password" required>
    </div>
    <button type="submit">Login</button>
</form>
