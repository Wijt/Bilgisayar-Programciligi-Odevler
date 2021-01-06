def readUsers(txtname, debugMode = False):
    import string
    
    users = []

    f = open(txtname, "r")
    lines = f.readlines()

    for line in lines:
        lineDatas = line.split(",")
        userData = [x.strip() for x in lineDatas]
        users.append(userData)

    if debugMode:
        import pprint
        pprint.pprint(users)
    return users

def writeUsers(users, txtname, writeMode = "w+"):
    f = open(txtname, writeMode)
    for user in users:
        for i in range(0, len(user)):
            if i == 0:
                f.write(user[i])
            else:
                f.write(", " + user[i])
        f.write("\n")
    f.close()
    return True

def nLenRandomNumber(len_, floor=1):
    import random
    top = 10**len_
    if floor > top:
        raise ValueError(f"Floor {floor} must be less than requested top {top}")
    return f'{random.randrange(floor, top):0{len_}}'

def xorTwoString(one, two):
    import binascii
    oneBinary = bin(int.from_bytes(one.encode(), 'big'))[2:]
    twoBinary = bin(int.from_bytes(two.encode(), 'big'))[2:]
    
    diff = abs(len(oneBinary) - len(twoBinary))

    if len(oneBinary) > len(twoBinary):
        twoBinary = ('0' * diff) + twoBinary
    else:
        oneBinary = ('0' * diff) + oneBinary

    final = ''

    for i in range(0, len(oneBinary)):
        final += str(int(oneBinary[i]) ^ int(twoBinary[i]))
    final = '0b' + final
    finalHex = '%x' % int(final, 2)
    print(len(finalHex))
    finalHex = '0' * (len(finalHex) % 2) + finalHex
    return str(binascii.unhexlify(finalHex))[2:-1]

def randomString(length):
    import random
    ALPHABET = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"
    #ALPHABET = "9ahd37dn4hd82jdlf753"
    chars=[]
    for i in range(length):
        chars.append(random.choice(ALPHABET))

    return "".join(chars)

def getUserData(userList, userId):
    for i in range(0, len(userList)):
        if userList[i][0] == userId:
            return userList[i]
    return None