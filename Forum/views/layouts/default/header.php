<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/content/styles/styles.css" />
    <title>
        <?php if (isset($this->title)) echo htmlspecialchars($this->title) ?>
    </title>
</head>

<body>
    <header>
        <a href="/"><img src="/content/images/logo.jpg"></a>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/categories">Categories</a></li>
        </ul>
    </header>
	<?php if ($this->isLoggedIn) :?>
	<div id="user-settings">
		<p>Hello <?php echo $_SESSION['username']; ?></p>
		<form action="/account/logout">
			<input type="submit" value="Logout"/>
		</form>
	</div>
	
	<?php endif;?>

    <?php include('messages.php'); ?>
