<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password</title>
</head>
<body>
<div class="container" style="padding-top: 70px">
    <form action="/wp-admin/admin-post.php" class="" method="post">
        <div class="form-group">
			<?php if ( ! empty( $_GET['failed'] ) ): ?>
                <div class="alert alert-danger">
                    <p>Password incorret! Please try again.</p>
                </div>
			<?php endif; ?>
            <label for="">Enter Password to Proceed to Link:</label>
            <input type="hidden" name="action" value="check_link_password">
            <input type="hidden" name="link_id" value="<?php echo esc_attr( $link_id ) ?>">
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group mt-4">
            <button class="btn btn-primary btn-block">Go To Link</button>
        </div>
    </form>
</div>
</body>
</html>