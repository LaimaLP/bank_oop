<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL ?>/main.css?v=<?= time() ?>"> 
    <script src="<?= URL ?>/main.js?v=<?= time() ?>" defer></script>
    <title><?= $title ?? 'Untitled' ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style=" background: linear-gradient(to bottom, #6c757d, #236f4b); min-height:100vh; display: flex;
      flex-direction: column; background-image: url('<?= URL ?>/img/pigMon.jpg');background-position: center; background-size: cover;">
