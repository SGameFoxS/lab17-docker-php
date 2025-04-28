<?php include '../includes/header.php'; ?>

<main>
    <h1>Контакты</h1>
    <?php
    $success = false;
    $error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $message = trim($_POST['message'] ?? '');

        // Простая валидация
        if ($name === '' || $email === '' || $message === '') {
            $error = 'Пожалуйста, заполните все поля!';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Некорректный email!';
        } else {
            $success = true;
        }
    }
    ?>

    <?php if ($success): ?>
        <p style="color: green;">Спасибо за обращение, <?= htmlspecialchars($name) ?>! Ваше сообщение отправлено.</p>
    <?php else: ?>
        <?php if ($error): ?>
            <p style="color: red;"><?= $error ?></p>
        <?php endif; ?>
        <form method="post">
            <input type="text" name="name" placeholder="Имя" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
            <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            <textarea name="message" placeholder="Сообщение"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
            <button type="submit">Отправить</button>
        </form>
    <?php endif; ?>
</main>

<?php include '../includes/footer.php'; ?>