// CLASS CON DB

<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'mysite');
    
    $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($mysqli->connect_errno) exit('Ошибка соед.');
    $mysqli->set_charset('utf8');
    
    
    if (isset($_POST['reg'])) {
        $name = $mysqli->real_escape_string(htmlspecialchars($_POST['name']));
        $email = $mysqli->real_escape_string(htmlspecialchars($_POST['email']));
        $password = $mysqli->real_escape_string(htmlspecialchars($_POST['password']));
        $ip_reg = ip2long($_SERVER['REMOTE_ADDR']);
        $query = "INSERT INTO `secret_users`
        (`name`, `email`, `password`, `ip_reg`, `date_reg`)
        VALUES ('$name', '$email', MD5('$password'), '$ip_reg', UNIX_TIMESTAMP())";
        $result = $mysqli->query($query);
    }
    
    $mysqli->close();
?>
	<?php if (isset($result)) { ?>
    <?php if ($result) { ?>
        <p>Регистрация прошла успешно!</p>
    <?php } else { ?>
        <p>Ошибка при регистрации!</p>
    <?php } ?>
<?php } ?>
	<form name='reg' action='index.php' method='post'>
	<div class="form-group">
		<label for="exampleInputEmail1">Name</label>
		<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name='name'>
	</div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name='email'>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name='password'>
  </div>
  <button type="submit" class="btn btn-primary" name='reg'>Submit</button>
</form>
</form>
