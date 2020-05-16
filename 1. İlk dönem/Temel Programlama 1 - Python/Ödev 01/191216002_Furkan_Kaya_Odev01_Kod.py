def Topla(a, b):
    return str(a+b)

def Cikar(a, b):
    return str(a-b)

def Bol(a, b):
    if b==0:                                                                        #0 sayısı hataya sebep olacağından kontrol ettirip engel oluyoruz.
        return "HATA: Bölme işleminde 0, bölemez."
    return str(a/b)

def Carp(a, b):
    return str(a*b)

islemler = ["1", "2", "3", "4", "q", "Q"]                                           #Dizi, fonksiyon her çalıştığında tekrar tanımlanmaması için dışarıda tanımlandı.

def Program():
    print("-------------------------------------------------------")                #Program tekrar başladığında önceki işlemlerle karışmaması için çizgi çekildi.
    islem = input("Yapmak istediğiniz işlemi seçiniz."
                  "\n[1]Toplama İşlemi"
                  "\n[2]Çıkarma İşlemi"
                  "\n[3]Çarpma İşlemi"
                  "\n[4]Bölme İşlemi"
                  "\n[Q]Çıkış"
                  "\nİstenilen işlem: ")

    if islem not in islemler:                                                       #Basılan tuşun bizim işlem listemiz arasında olup olmadığını kontrol ediyoruz.
        print("Yanlış tuşlama yaptınız. Lütfen tekrar deneyiniz...")
        input("Devam etmek için enter tuşuna basınız...")                           #Kullanıcının hatasını görmesi için program input ile bekletildi.
        Program()                                                                   #İçinde değilse tekrar başlatıp,
        return                                                                      #şuanki akışı sonlandırıyoruz.
    elif islem == "q" or islem == "Q":
        print("Yine bekleriz...")                                                   #Eğer çıkış işlemi seçildiyse devam etmeye gerek olmadığından mesaj verip akışı sonlandırıyoruz.
        input("Devam etmek için enter tuşuna basınız...")
        return
                                                                                    #Basılan tuş bizim işlemlerimizin arasında ve çıkış işlemi değilse kullanıcı program kısmına gelebiliyor.
    sayi1 = float(input("İlk sayıyı giriniz: "))                                    #Kullanıcıdan işlem yapılacak sayıları alıyoruz.
    sayi2 = float(input("İkinci sayıyı giriniz: "))                                 #Float tipini kullandım böylelikle hem virgüllü hem tam sayılarda işlem yapabiliyoruz.

    if islem == "1":
        print("İşlem sonucu: " + Topla(sayi1, sayi2))
    elif islem == "2":
        print("İşlem sonucu: " + Cikar(sayi1, sayi2))
    elif islem == "3":
        print("İşlem sonucu: " + Carp(sayi1, sayi2))
    elif islem == "4":
        print("İşlem sonucu: " + Bol(sayi1, sayi2))

    input("Devam etmek için enter tuşuna basınız...")                               #Kullanıcı sonucu görebilmesi adına input ile programın tekrarı engellendi.
    Program()                                                                       #Entera bastıktan sonra programın tekrar etmesi için fonksiyonu tekrar çağırıyoruz.
Program()                                                                           #Programın ilk çağrılması gerçekleştiriliyor.
