<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="./reg.css">
</head>
<body>
    <main>
        <article class="registration">
            <h1 class="titleReg">Регистрация</h1>
            <form class="formBlock" action="index.php" method="POST" id="reg-form">
                <section class="inputForm">
                    <input type="text" name="username" placeholder="Имя" required id="inp-username">
                    <input type="email" name="email" placeholder="Почта" required id="inp-email">
                    <input type="password" name="password" placeholder="Пароль" required id="inp-pwd">
                    <input type="password" name="repit_password" placeholder="Подтвердите пароль" required id="inp-repeatpwd">
                    <input type="tel" name="phone_number" placeholder="Номер телефона" id="inp-phone">
                    <input type="date" name="date_birth" placeholder="Дата рождения" required id="inp-birthday">
                </section>
                <button class="btnReg" type="submit" id="registration_button">Зарегистрироваться</button>
            </form>
        </article>
    </main>
</body>
</html>
<?php
$data = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'repit_password' => $_POST['repit_password'],
    'phone_number' => $_POST['phone_number'] ?? null,
    'username' => $_POST['username'],
    'came_from' => $_POST['came_from'] ?? null,
    'date_birth' => $_POST['date_birth'],
];
echo json_encode(validation_check($data), JSON_UNESCAPED_UNICODE);
function validation_check($data) {
    global $data;
    $errors = [];
    switch ($data) {
        case (!isset($data['username']) || !preg_match('/^[a-zA-Zа-яА-Я]+$/u', $data['username'])):
            $errors[] = "Имя пользователя состоит не из букв";
            break;
        case (!isset($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL) || strlen($data['email']) <= 5):
            $errors[] = "Почта не указана или указана не верно";
            break;
        case (!isset($data['password']) || strlen($data['password']) <= 8):
            $errors[] = "Пароль должен быть больше 8 символов";
            break;
        case (!preg_match('/[A-Za-z]/', $data['password']) || !preg_match('/[^0-9]+/', $data['password'])):
            $errors[] = 'Пароль должен состоять из символов A-Z, a-z и цифр 0-9';
            break;
        case (!isset($data['repit_password']) || ($data['password'] !== $data['repit_password'])):
            $errors[] = "Пароли не совпадают";
            break;
        case (!isset($data['phone_number']) || strlen($data['phone_number']) <= 5):
            $errors[] = "Номер телефона введен не верно";
            break;
        case (isset($data['date_birth'])):
            $birthday = new DateTime($data['date_birth']); 
            $today = new DateTime(); 
            $age = $today->diff($birthday)->y;
                switch (true) {
                    case ($age <= 16 && $age >= 68):
                        $errors[] = "Вы не соответсвуете допустимому возрасту";
                        break;
                };
            break;
    };
    if (!empty($listOfErrors)) {
        return [
            'status' => false,
            'message' => implode('; ', $listOfErrors)
        ];
    } else {
        return [
            'status' => true,
            'message' => 'выполнено'
        ];
    };
};