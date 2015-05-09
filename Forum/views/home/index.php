<h1>Welcome to Home!</h1>

<?php if (!$this->isLoggedIn) :?>
Please 
<a href="/account/register">Register</a>
or 
<a href="/account/login">Login</a>
<?php endif;?>