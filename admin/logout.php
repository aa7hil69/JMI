<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="0;url=login.php">
    <title>Logging out…</title>
</head>
<body>
    <p>Logging out… <a href="login.php">Continue</a></p>
    <script>
        document.cookie = "jmi_admin=; Path=/; Max-Age=0";
        location.href = "login.php";
    </script>
</body>
</html>
