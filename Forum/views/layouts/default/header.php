<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/content/styles/styles.css" />
	<meta charset="utf-8"></meta>
    <title>
        <?php if (isset($this->title)) echo htmlspecialchars($this->title) ?>
    </title>
</head>
<body>
    <header>
        <a href="/"><img src="/content/images/logo.jpg"></a>
		<?php if ($this->isLoggedIn) :?>
			<div id="user-settings">
				<p>Hello, <?php echo $_SESSION['user']; ?>!</p>
				<form action="/account/logout">
					<input type="submit" value="Logout"/>
				</form>
			</div>
		<?php endif;?>
    </header>
	<nav>
		<ul>
            <li><a href="/">Home</a></li>
            <li><a href="/categories">Categories</a></li>
            <li><a href="/tags">Tags</a></li>
            <li><a href="/questions">Questions</a></li>
            <li><a href="/users">Users</a></li>
        </ul>
	</nav>
	<main>
		<div id="messages">
			<?php include('messages.php'); ?>
		</div>