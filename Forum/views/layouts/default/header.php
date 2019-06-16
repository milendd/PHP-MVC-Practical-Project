<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?= BASE_HOST . CSS_PATH ?>/styles.css" />
    <meta charset="utf-8"></meta>
    <title>
        <?php if (isset($this->title)) echo htmlspecialchars($this->title) ?>
    </title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="<?= BASE_HOST ?>">Home</a></li>
            <li><a href="<?= BASE_HOST ?>/categories">Categories</a></li>
            <li><a href="<?= BASE_HOST ?>/tags">Tags</a></li>
            <li><a href="<?= BASE_HOST ?>/questions">Questions</a></li>
            <li><a href="<?= BASE_HOST ?>/users">Users</a></li>
        </ul>

        <?php if ($this->isLoggedIn) :?>
            <div id="user-settings">
                <p>Hello, <?php echo htmlspecialchars($_SESSION['user']); ?>!</p>
                <form action="<?= BASE_HOST ?>/account/logout">
                    <input type="submit" value="Logout"/>
                </form>
            </div>
        <?php endif;?>

        <div class="clearfix"></div>
    </nav>
    <main>
        <div id="messages">
            <?php include('messages.php'); ?>
        </div>