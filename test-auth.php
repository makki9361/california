<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/yiisoft/yii2/Yii.php';

// ВАЖНО: Замените эти данные на свои!
$dbConfig = [
    'dsn' => 'mysql:host=localhost;dbname=california',
    'username' => 'root',
    'password' => '',
];

$config = [
    'id' => 'test-auth',
    'basePath' => dirname(__FILE__),
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => $dbConfig['dsn'],
            'username' => $dbConfig['username'],
            'password' => $dbConfig['password'],
            'charset' => 'utf8',
        ],
        'security' => [
            'class' => 'yii\base\Security',
        ],
    ],
];

$app = new yii\web\Application($config);

echo "=== Тест авторизации ===\n\n";

// 1. Проверяем подключение к БД
try {
    Yii::$app->db->open();
    echo "✅ Подключение к БД успешно\n";
} catch (\Exception $e) {
    echo "❌ Ошибка подключения к БД: " . $e->getMessage() . "\n";
    exit;
}

// 2. Проверяем таблицу admin_users
$tableExists = Yii::$app->db->getTableSchema('admin_users');
if ($tableExists) {
    echo "✅ Таблица admin_users существует\n";
} else {
    echo "❌ Таблица admin_users не существует!\n";
    exit;
}

// 3. Проверяем есть ли пользователь admin
$admin = (new \yii\db\Query())
    ->select('*')
    ->from('admin_users')
    ->where(['username' => 'admin'])
    ->one();

if ($admin) {
    echo "✅ Пользователь 'admin' найден в БД\n";

    // 4. Выводим информацию о пользователе
    echo "\nИнформация из БД:\n";
    echo "ID: " . $admin['id'] . "\n";
    echo "Username: " . $admin['username'] . "\n";
    echo "Email: " . $admin['email'] . "\n";
    echo "Status: " . $admin['status'] . "\n";
    echo "Password hash: " . $admin['password_hash'] . "\n";
    echo "Hash length: " . strlen($admin['password_hash']) . " символов\n";

    // 5. Проверяем пароль
    $passwordToCheck = 'admin123';
    $isValid = Yii::$app->security->validatePassword($passwordToCheck, $admin['password_hash']);

    echo "\nПроверка пароля '{$passwordToCheck}': " . ($isValid ? '✅ ВЕРНО' : '❌ НЕВЕРНО') . "\n";

    // 6. Генерируем правильный хеш если нужно
    if (!$isValid) {
        echo "\n=== Генерация нового пароля ===\n";
        $newHash = Yii::$app->security->generatePasswordHash($passwordToCheck);
        echo "Новый хеш: " . $newHash . "\n";

        // Обновляем пароль в БД
        Yii::$app->db->createCommand()
            ->update('admin_users',
                ['password_hash' => $newHash],
                ['id' => $admin['id']]
            )->execute();

        echo "✅ Пароль обновлен в БД\n";

        // Проверяем снова
        $newIsValid = Yii::$app->security->validatePassword($passwordToCheck, $newHash);
        echo "Проверка нового пароля: " . ($newIsValid ? '✅ ВЕРНО' : '❌ НЕВЕРНО') . "\n";
    }

} else {
    echo "❌ Пользователь 'admin' не найден!\n";

    // Создаем нового
    echo "\n=== Создание нового администратора ===\n";

    $newHash = Yii::$app->security->generatePasswordHash('admin123');
    $authKey = Yii::$app->security->generateRandomString();

    $result = Yii::$app->db->createCommand()
        ->insert('admin_users', [
            'username' => 'admin',
            'password_hash' => $newHash,
            'email' => 'admin@example.com',
            'auth_key' => $authKey,
            'access_token' => Yii::$app->security->generateRandomString(),
            'status' => 10,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ])->execute();

    if ($result) {
        echo "✅ Администратор создан!\n";
        echo "Логин: admin\n";
        echo "Пароль: admin123\n";
        echo "Хеш: " . $newHash . "\n";
    } else {
        echo "❌ Ошибка при создании администратора\n";
    }
}

echo "\n=== Тест завершен ===\n";