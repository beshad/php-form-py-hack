import requests
import os
import random
import string
import json

#generate random characters
chars = string.ascii_letters + string.digits + '!@#$%^&*()'

random.seed = (os.urandom(1024))

url = 'https://behshad-python-sample-site.000webhostapp.com/registration.php'

names = json.loads(open('short_list.json').read())

for name in names:
    name_extra = ''.join(random.choice(string.digits))

    email = name.lower() + name_extra + '@yahoo.co.nz'
    password = ''.join(random.choice(chars) for i in range(8))
    try:
        requests.post(
            url,
            allow_redirects=False,
            data={
                'email': email,
                'password': password,
                'username': name
            })
    except requests.exceptions.RequestException as err:
        print(err)

    print(f'sending email {email} and password {password} for username {name}')