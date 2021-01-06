from funcLib import readUsers
from funcLib import writeUsers
from funcLib import nLenRandomNumber
from funcLib import xorTwoString
from funcLib import randomString

import hashlib, random

"""
user[0] = id
user[1] = digest
user[2] = salt
...
user[x] = salt
"""


def cDBone():  
    users = readUsers("databases/Password.txt")

    for user in users:
        user[0] = "BIL008-2020" + nLenRandomNumber(5)

    writeUsers(users, "databases/Veritabani1.txt")

def cDBtwo():  
    users = readUsers("databases/Password.txt")

    for user in users:
        user[0] = "BIL008-2020" + nLenRandomNumber(5)
        user[1] = hashlib.md5(user[1].encode('utf-8')).hexdigest() 
    writeUsers(users, "databases/Veritabani2.txt")

def cDBtree(): 
    salt = "9ahd37dn4hd82jdlf753"

    users = readUsers("databases/Password.txt")

    for user in users:
        user[0] = "BIL008-2020" + nLenRandomNumber(5)
        user[1] = hashlib.sha224(xorTwoString(user[1], salt).encode('utf-8')).hexdigest() 
    writeUsers(users, "databases/Veritabani3.txt")

def cDBfour(): 
    users = readUsers("databases/Password.txt")
    
    for user in users:
        salt = randomString(20)
        user[0] = "BIL008-2020" + nLenRandomNumber(5)
        user[1] = hashlib.sha256(xorTwoString(user[1], salt).encode('utf-8')).hexdigest() 
        user.append(salt)
    
    writeUsers(users, "databases/Veritabani4.txt")

def cDBfive():
    users = readUsers("databases/Password.txt")

    for user in users:
        saltList = []
        for i in range(0, 20):
            saltList.append(randomString(20))

        user[0] = "BIL008-2020" + nLenRandomNumber(5)
        user[1] = hashlib.sha384(xorTwoString(user[1], random.choice(saltList)).encode('utf-8')).hexdigest()
        for i in range(0, len(saltList)):
            user.append(saltList[i])
    writeUsers(users, "databases/Veritabani5.txt")

def createDBfiles():
    cDBone()
    cDBtwo()
    cDBtree()
    cDBfour()
    cDBfive()

createDBfiles()
