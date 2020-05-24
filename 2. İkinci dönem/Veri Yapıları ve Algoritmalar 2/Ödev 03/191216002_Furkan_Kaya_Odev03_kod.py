sBas = 0
sKuyruk = 0
sMaxUzunluk = 10
sUzunluk = 0

s = [None] * sMaxUzunluk

def sElemanEkle(eleman):
    global sKuyruk, sMaxUzunluk, sUzunluk
    s[sKuyruk] = eleman
    sUzunluk+=1
    if sKuyruk == sMaxUzunluk-1:
        sKuyruk = 0
    else:
        sKuyruk += 1

def sElemanCikar():
    global sBas, sKuyruk, sMaxUzunluk, sUzunluk
    x = s[sBas]
    sUzunluk-=1
    if sBas == sMaxUzunluk-1:
        sBas = 0
    else:
        sBas += 1
    return x

def sElemanlariYazdir():
    global sBas, sKuyruk, sMaxUzunluk
    pointer=sBas
    for i in range(sUzunluk):
        print(s[pointer], end = ", " if i != sUzunluk-1 else " ")
        pointer+=1
        if pointer == sMaxUzunluk:
            pointer = 0
    print("\n", end="")






isimler = ["Ayşe", "Ali", "Özgür", "Cem", "Melis",
           "Suna", "Derya", "Aykut", "Duygu", "Şeref"]

def IsimleriKuyrugaEkle():
    for i in isimler:
        sElemanEkle(i)

def BastakiSoyledi(sayi):
    for i in range(sayi):
        sElemanEkle(sElemanCikar())

def SayiIste(metin):
    while True:
        alinan = input(metin)
        if alinan.isnumeric():
            alinan=int(alinan)
            break
        else:
            print("Girdiğiniz değer bir tam sayı olmalı!")
    return alinan

def main():
    IsimleriKuyrugaEkle()
    while sUzunluk != 1:
        for i in range(3):
            sElemanlariYazdir()
            sayi = SayiIste("Sayı giriniz: ")
            BastakiSoyledi(sayi)
        print("Oyundan çıktı: ", sElemanCikar())
    print("Oyunu kazandı: ", sElemanCikar())

main()