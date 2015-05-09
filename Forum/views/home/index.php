<h1 class="center">Welcome to Home!</h1>

<div class="center">
<?php if (!$this->isLoggedIn) :?>
Please 
<a href="/account/register">Register</a>
or 
<a href="/account/login">Login</a>
<?php endif;?>
</div>