# HELLO MY NAME IS @basterrz
#10
import sys, os
import asyncio
import telethon
from telethon import TelegramClient
import logging
import time
import random

import socks


useproxy = False
api_id = "14724388"
api_hash = '73fd5df6b087960bfd1f8d421ec29ec7'



delay = int(sys.argv[1])
time_to_work = int(sys.argv[2])
chat = str(sys.argv[3])
message = str(sys.argv[4])

# delay = 1000
# time_to_work = 10
# chat = '@Basterrz'
# message = 'тест акков на основной машине'

delay = delay/1000




logging.basicConfig(format='[%(levelname) 5s/%(asctime)s] %(name)s: %(message)s',
level=logging.WARNING)

path = os.listdir('sessions') #папка с сессиями

accounts = []
sessions = accounts
sessionfiles = []

for filename in path:
    if filename.endswith(".session-journal.session") != True and filename.endswith(".session-journal") != True and filename.endswith(".session"):
        sessionfiles.append(filename)



def get_random_proxy():
    data = open('proxies.txt','r').read()
    text_data = str(data).split('\n')[:-1]
    print(text_data)
    
    pr = str(random.choice(text_data)).split(':')
    print(f'Host: {pr[0]} \nPort: {pr[1]}')
    host = pr[0]
    port = int(pr[1])
    proxy = (socks.SOCKS5, host, port)
    return proxy

print(f'Кол-во файлов сессий: {len(sessionfiles)}')


async def startaccs(file):
    print(f"Запуск сессии [{file}]")
    try:
        if useproxy:
            client = TelegramClient(f"sessions/{file}", api_id, api_hash, proxy=get_random_proxy())
        else:
            client = TelegramClient(f"sessions/{file}", api_id, api_hash)

        await client.connect()
        if await client.is_user_authorized():
            me = await client.get_me()
            print(f'[+] Session [{file}] valid!')
            accounts.append(client)
        else:
            await client.disconnect()
            print(f'[X] Session [{file}] not valid!')
            try:
                os.remove(f'sessions/{file}')
                print(f'[!] Removed {file}...')
                pass
            except Exception as e:
                print(e)
        # await client.disconnect()
    except:
        pass

print(f'Валидных сессий: {accounts}')

'''
asyncio.get_event_loop().run_until_complete(
            asyncio.gather(*[
                startaccs(i) 
                for i in sessionfiles
                ])
            )
'''


for i in sessionfiles:
    asyncio.get_event_loop().run_until_complete(startaccs(i))

async def worker(account, chat, message):
    try:
        await account.connect()
        me = await account.get_me()
        await account.send_message(chat, message)
        print(f'[+] [{me.first_name}] message sent!')
    except Exception as error:
        print(f'[X] Error: {error}')

async def func():

    await asyncio.wait(task)


tasks = []
async def main():
    tasks = []
    start_time = time.time()
    while (time.time() - start_time) <= time_to_work:
        session_tasks = [asyncio.create_task(worker(session, chat, message)) for session in sessions]
        await asyncio.gather(*tasks, return_exceptions=True)
        print(f"Sleep {delay} seconds")
        await asyncio.sleep(delay)
    print('done!')


if __name__ == "__main__":
    asyncio.get_event_loop().run_until_complete(main())
