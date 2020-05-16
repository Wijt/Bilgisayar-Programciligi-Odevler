import os, platform

puanlamalar = {"Ödev-1":200, "Ödev-2":200, "Quiz-1":100, "Quiz-2":100, "Proje":400, "Vize":400, "Final":600}

ogrenciler = {
    "191216002" : {"Ödev-1":200, "Ödev-2":200, "Quiz-1":100, "Quiz-2":100, "Proje":400, "Vize":400, "Final":600},
    "191216009" : {"Ödev-1":200, "Ödev-2":200, "Quiz-1":100, "Quiz-2":100, "Proje":400, "Vize":400, "Final":233},
    "191216010" : {"Ödev-1":200, "Ödev-2":200, "Quiz-1":100, "Quiz-2":100, "Proje":400, "Vize":400, "Final":533}
}

toplamPuanlar = {}
yuzlukNotlar = {}
harfNotlari = {}

def TumOgrencilerinDigerSozlukleriniGuncelle():
    for i in ogrenciler:
        toplamPuanlar[i] = ToplamPuaniniHesapla(i)
        yuzlukNotlar[i] = PuandanYuzluge(toplamPuanlar[i])
        harfNotlari[i] = YuzluktenHarfe(yuzlukNotlar[i])





def DigerSozlukleriGuncelle(ogrenciId):
    if ogrenciId in ogrenciler:
        toplamPuanlar[ogrenciId] = ToplamPuaniniHesapla(ogrenciId)
        yuzlukNotlar[ogrenciId] = PuandanYuzluge(toplamPuanlar[ogrenciId])
        harfNotlari[ogrenciId] = YuzluktenHarfe(yuzlukNotlar[ogrenciId])
    else:
        del toplamPuanlar[ogrenciId]
        del yuzlukNotlar[ogrenciId]
        del harfNotlari[ogrenciId]



def PuandanYuzluge(puan):
    return (puan/100)*5

ortKarsiliklari = {"AA" : (90,100), "BA" : (80,89), "BB" : (70,79), "CB" : (60,69), 
                   "CC" : (50,59), "DC" : (40,49), "DD" : (20,39), "FF" : (0,19)}

def YuzluktenHarfe(sayisalNot):
    for ortKey in ortKarsiliklari:
        if ortKarsiliklari[ortKey][0] <= sayisalNot <= ortKarsiliklari[ortKey][1]:
            return ortKey
    return "Hatalı değer."

def ToplamPuaniniHesapla(ogrenciId):
    toplamPuan = 0
    for notlar in puanlamalar:
        toplamPuan += ogrenciler[ogrenciId][notlar]
    return toplamPuan

def SınıfOrtalamasiniDondur():
    toplam=0
    for ogrenci in yuzlukNotlar:
        toplam = toplam + yuzlukNotlar[ogrenci]
    return toplam/len(yuzlukNotlar)

def OgrenciSil(ogrenciId):
    EkraniTemizle()
    if ogrenciId in ogrenciler:
        del ogrenciler[ogrenciId]
        DigerSozlukleriGuncelle(ogrenciId)
        print(ogrenciId + " nolu öğrenci başarıyla silindi.")
    else:
        print(ogrenciId + " nolu öğrenci bulunmuyor.")



def UygunGirisAl(ekranaYazilacak, degerAraligi, karekterSayisi):
    while True:
        girilen = input(ekranaYazilacak)
        if type(degerAraligi) == tuple:
            if girilen.isdigit():
                if len(girilen) == karekterSayisi or karekterSayisi == "":
                    girilen = int(girilen)
                    if degerAraligi[0] <= girilen <= degerAraligi[1]:
                        return girilen
                    else:
                        print("Girdiğiniz değer " + str(degerAraligi[0]) + "'dan küçük " + str(degerAraligi[1]) + "'den büyük olamaz.")
                else:
                    print("Girdiğiniz değer " + str(karekterSayisi) + " karakter içermelidir.")
            else:
                print("Girdiğiniz değer sayı olmalıdır.")
        elif type(degerAraligi) == list:
            for i in degerAraligi:
                if i.lower() == girilen.lower():
                    return i
            print("Girdiğiniz değer şunlardan biri olmalıdır: " + str(degerAraligi))

def EminlikSor(ekranaYazilacak, eFonk, eFonkParametresi):
    while True:
        EkraniTemizle()
        eminlik = input(ekranaYazilacak)
        if eminlik == "e":
            eFonk(eFonkParametresi)
            break
        elif eminlik == "h":
            print("Vazgeçildi")
            break
        else:
            input("Hatalı bir giriş yaptınız. Tekrar denemek için enter tuşuna basınız.")



def EkraniTemizle():
    # cls komutu ubuntuda clear komutu windowsta çalışmadığı için 
    # programın çalıştığı işletim sistemini kontrol edip ona göre komut çalıştırıyoruz.
    if "windows" in platform.platform().lower(): 
        os.system("cls")
    if "linux" in platform.platform().lower():
        os.system("clear")



def OgrenciBilgileriniEkranaBas(ogrenciNumarasi):
    print("Öğrenci no: " + ogrenciNumarasi)
    print("Toplam Puanı: \t\t" +  str(toplamPuanlar[ogrenciNumarasi]))
    print("Not Karşılığı: \t\t" + harfNotlari[ogrenciNumarasi])
    print("Yüzlük karşılığı: \t" + str(round(yuzlukNotlar[ogrenciNumarasi],2)))## 97,777777877777
    print("Notlar: ")
    for notIsmi in puanlamalar:
        print("\t" + notIsmi + ": " + str(ogrenciler[ogrenciNumarasi][notIsmi]))
    print("\n")


def TumOgrencileriEkranaBas():
    for ogrenciNumarasi in ogrenciler:
        OgrenciBilgileriniEkranaBas(ogrenciNumarasi)
    print("Sınıf ortalaması: " + str(round(SınıfOrtalamasiniDondur(),2)))




def OgrenciSilEkrani(): 
    EkraniTemizle()
    silinecekid = str(UygunGirisAl("Silmek istediğiniz öğrencinin numarasını giriniz: ", (191216000,999999999), 9))
    if silinecekid in ogrenciler:
        EminlikSor((silinecekid + " nolu öğrenciyi silmek istediğinize emin misiniz? e/h:"), OgrenciSil, silinecekid)
    else:
        print(silinecekid + " nolu öğrenci mevcut değil.")

def OgrenciEkleEkrani():
    notlar={}
    ogrenci={}
    ogrenciNumarasi = str(UygunGirisAl("Öğrenci numarasını giriniz: ", (191216000,999999999), 9))
    if ogrenciNumarasi in ogrenciler:
        print(ogrenciNumarasi + " nolu öğrenci zaten mevcut.")
        return
    for i in puanlamalar:
        notlar[i] = UygunGirisAl((i + " Notunu giriniz: "), (0, puanlamalar[i]), "")
    ogrenci[ogrenciNumarasi] = notlar
    ogrenciler.update(ogrenci)
    DigerSozlukleriGuncelle(ogrenciNumarasi)
    EkraniTemizle()
    print(ogrenciNumarasi + " nolu öğrenci başarıyla eklendi.")

def TekOgrenciListeleEkrani():
    EkraniTemizle()
    ogrenciNumarasi = str(UygunGirisAl("Öğrenci numarasını giriniz: ", (191216000,999999999), 9))
    EkraniTemizle()
    if ogrenciNumarasi not in ogrenciler:
        print(ogrenciNumarasi + " nolu öğrenci mevcut değil.")
        return
    OgrenciBilgileriniEkranaBas(ogrenciNumarasi)

def OgrenciGuncelleEkrani(): 
    ogrenciNumarasi = str(UygunGirisAl("Değiştirmek istediğiniz öğrenci numarasını giriniz: ", (191216000,999999999), 9))
    if ogrenciNumarasi not in ogrenciler:
        print(ogrenciNumarasi + " nolu öğrenci bulunmuyor.")
        return
    degistirilmekIstenenNot = str(UygunGirisAl((str(list(puanlamalar.keys())) + " arasından hangi notu değiştirmek istersiniz? "), list(puanlamalar.keys()), ""))
    EkraniTemizle()
    yeniDegeri = UygunGirisAl((degistirilmekIstenenNot + " notunun yeni değerini ne yapmak istersiniz?: "), (0, puanlamalar[degistirilmekIstenenNot]), "")
    print("Not başarıyla değiştirildi.")
    ogrenciler[ogrenciNumarasi][degistirilmekIstenenNot] = int(yeniDegeri)
    DigerSozlukleriGuncelle(ogrenciNumarasi)    
   
def ListeleEkrani():
    EkraniTemizle()
    print("""
    _____________________________________________________________________________
    (1) Tek bir öğrenci listele
    (2) Tüm öğrencileri listele
    (0) Ana menüye dön
    _____________________________________________________________________________        
          """)
    secim = str(UygunGirisAl("İşlem: ", (0,2), 1))

    if secim=="1":
       TekOgrenciListeleEkrani()
    elif secim=="2":
        EkraniTemizle()
        TumOgrencileriEkranaBas()
    elif secim=="0":
        Main()
    else:
        print("Hatalı seçim yaptınız. Tekrar deneyiniz...")



def Main():
    EkraniTemizle()
    print("Hoşgeldiniz. Aşağıdaki menüden işleminizi seçiniz.")
    print("""
    _____________________________________________________________________________
    (1) Öğrencileri listele
    (2) Öğrenci ekle
    (3) Öğrenci sil
    (4) Öğreci bilgilerini güncelle
    (0) Çıkış
    _____________________________________________________________________________        
          """)
    islem = str(UygunGirisAl("İşlem: ", (0,4), 1))
    EkraniTemizle()
    if islem=="1":
        ListeleEkrani()
    elif islem=="2":
        OgrenciEkleEkrani()
    elif islem=="3":
        OgrenciSilEkrani()
    elif islem=="4":
        OgrenciGuncelleEkrani()
    elif islem=="0":
        input("Hoşçakalın.")
        exit()
    else:
        print("Hatalı seçim yaptınız. Tekrar deneyiniz.")
    input("Ana menüye dönmek için enter tuşuna basınız...")
    Main()
    
TumOgrencilerinDigerSozlukleriniGuncelle()
Main()