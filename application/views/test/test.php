<html>

<head>
    <title>My Form</title>
</head>

<body>

    <?php echo validation_errors(); ?>

    <?php echo form_open('test'); ?>

    <h5>Username</h5>
    <input type="text" name="username" value="" size="50" />
    <small><?= form_error('email') ?></small>

    <h5>Password</h5>
    <input type="text" name="password" value="" size="50" />

    <h5>Password Confirm</h5>
    <input type="text" name="passconf" value="" size="50" />

    <h5>Email Address</h5>
    <input type="text" name="email" value="" size="50" />

    <div><input type="submit" value="Submit" /></div>

    </form>

    <?= password_hash('admin', PASSWORD_DEFAULT) ?>

</body>

</html>