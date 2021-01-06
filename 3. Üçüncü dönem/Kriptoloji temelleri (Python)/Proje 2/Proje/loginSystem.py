from funcLib import readUsers
from funcLib import getUserData
from funcLib import xorTwoString
from pprint import pprint
import hashlib

def clear(): 
    from os import system, name
    system('clear' if name =='posix' else 'cls') 

def main():
    while True:

        "--------- HOME SCREEN ---------"
        
        clear()
        print("Sisteme hoşgeldiniz. Ben Furkan.")
        print("Giriş izninizi sağlamak için id ve şifrenizi almam gerek.")
        print("Ama bunlardan önce hangi veritabanını kullanmak istiyorsunuz?")
        dbId = input("Seçtiğiniz veritabanı(1-5):")
        
        if not (dbId.isnumeric() and (1 <= int(dbId) <= 5)): #If input is wrong get again
            clear()
            input("Yanlış bir seçim yaptınız.\nTekrar denemek için enter'a basınız...")
            continue
        
        "-------------------------------"

        #get user list
        userList = readUsers("databases/Veritabani"+dbId+".txt")

        "--------- ID PASS ---------"
        
        clear()  
        userId = input("ID: ")
        
        userData = getUserData(userList, userId)

        if userData == None:
            print("ID seçtiğiniz veritabanında bulunamadı.")
            input("Yanlış bir seçim mi yaptınız?\nTekrar denemek için enter'a basınız...")
            continue
        
        userPass = input("Pass: ")

        "---------------------------"


        "--------- CHECK PASS ---------"
        result = False
        
        if dbId == "1":
           result = userData[1] == userPass

        elif dbId == "2":
            result = userData[1] == hashlib.md5(userPass.encode('utf-8')).hexdigest()
       
        elif dbId == "3":
            salt = "9ahd37dn4hd82jdlf753"
            result = userData[1] == hashlib.sha224(xorTwoString(userPass, salt).encode('utf-8')).hexdigest() 
        
        elif dbId == "4":
            salt = userData[2]
            result = userData[1] == hashlib.sha256(xorTwoString(userPass, salt).encode('utf-8')).hexdigest() 

        elif dbId == "5":
            saltList = userData[2:]
            for salt in saltList:
                if userData[1] == hashlib.sha384(xorTwoString(userPass, salt).encode('utf-8')).hexdigest():
                    result = True
                    break
        "------------------------------"


        "--------- RESULT SCREEN ---------"

        clear()
        if result:
            print("Şifre doğru.")
            print("Erişim sağlandı...")
        else:
            print("Şifre yanlış.")
            print("Erişim reddedildi...")

        "---------------------------------"

        input("Çıkış için enter tuşuna basınız...")

main()