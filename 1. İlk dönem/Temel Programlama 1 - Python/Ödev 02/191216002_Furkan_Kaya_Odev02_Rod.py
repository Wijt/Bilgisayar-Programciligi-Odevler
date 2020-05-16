def pul_kaldirma_oyna(toplam_pul_adedi, max_pul):
    oyuncuMiktari=2 #Daha önce boolean ile kodlanmış olan program sonraki aşamalarda ek oyuncu ekleyebilmek için oyuncu sayısı değişken bir algoritmayla tekrar kodlandı.
    elSayaci=0      #Oyun başlangıcında el sayısını sıfırlıyoruz.
    print("------------------------------------------------------------------------------------------------------------------------")
    print('''\
    ------------------------------------------------------------------
          Ortaya konulan pul sayısı: ''' + str(toplam_pul_adedi) + ''' 
          Çekilebilecek max pul sayısı: ''' + str(max_pul) + '''
    ------------------------------------------------------------------''')
    while True:
        oyuncuIsmi = str((elSayaci % oyuncuMiktari)+1) #Kaç el geçtiyse oyuncu sayısına göre modunu al ve 0. oyuncu diye bişey olmaması için 1 ekle
        print("------------------------------------------------------------------------------------------------------------------------")
        print("Kalan Pul: " + str(toplam_pul_adedi))
        while True:
            girilenDeger = input(oyuncuIsmi + ". Oyuncunun değeri: ") #X. Oyuncunun değeri şeklinde sırada olan oyuncudan veri alıyoruz.
            if girilenDeger.isdigit():                              #Girilen değer sayıya dönüşebiliyor mu kontrol ediyoruz.
                girilenDeger = int(girilenDeger)                    #Dönüşebiliyorsa dönüştürüyoruz.
                if 1 <= girilenDeger <= max_pul:                    #1 ila önceden belirlenmiş max sayı kuralımız arasında mı kontrol ediyoruz.
                    if toplam_pul_adedi >= girilenDeger:            #Aralıkta olduğu halde ortadaki taş sayısından fazla taş almaya kalkarsa diye kontrol ediyoruz.
                        toplam_pul_adedi -= girilenDeger            #Tüm kontroller sağlanıp doğru değer olduğuna emin olduysak ortadaki taştan çıkarıyoruz.
                        break                                       #Sayı isteme döngüsünden çıkıyoruz.
                    else:
                        print("HATA: Girilen değer kalan pul sayısı (" + str(toplam_pul_adedi) +") kadar ya da daha az olmalıdır.") #Hata mesajları
                else:
                    print("HATA: Girilen değer 1 ile " + str(max_pul) + " arasında olmalıdır.")
            else:
                print("HATA: Girilen değer tam sayı olmalıdır.")
        if toplam_pul_adedi <= 0:                                #Ortada bulunan taş bittiyse oynayan oyuncuya tebrik mesajı gösterip programı kapatıyoruz.
            print("""
            -------------TEBRİKLER--------------
                """ + oyuncuIsmi + """. Oyuncu oyunu kazandııı!
            ------------------------------------""")
            break
        elSayaci+=1                                             #Kullanıcı hamlesini yaptığında el sonlanmadıysa el sayısı arttırılıyor.
    input("Kapatmak için enter tuşuna basınız...")              #Oyun sonlanıp döngüden çıkıldığında konsol ekranının direkt kapanmaması için eklendi.

pul_kaldirma_oyna(10,5)