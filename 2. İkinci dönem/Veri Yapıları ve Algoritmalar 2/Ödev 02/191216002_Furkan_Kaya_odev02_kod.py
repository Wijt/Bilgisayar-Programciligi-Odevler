TABLO_UZUNLUGU=17

hashTablosu = [{}]*TABLO_UZUNLUGU

veriler = [  {191216060:"Mehmet Ali AYDIN"},
  {191216061: "Ayşe GÜNDÜZ"},
  {191216062:"Cem YILMAZ"},
  {191216063:"Halime GERÇEK"},
  {191216064:"Sevim COŞKUN"},
  {191216065:"Musa ÇİĞDEM"},
  {191216066:"Selim DESTAN"},
  {191216067:"Canan TAKIM"},
  {191216068:"Güldünya CAMBAZ"},
  {191216069:"Mesut SALKIM"}
  ]

def KeyGetir(sozluk:dict):
  return list(sozluk.keys())[0]

def ValueGetir(sozluk:dict):
  return list(sozluk.values())[0]

def hash(k,i):
  return ((k % TABLO_UZUNLUGU) + i) % TABLO_UZUNLUGU

def HashInsert(t:list, k:int, v:str):
  sayac=0
  while True:
    indis = hash(k, sayac) 
    if t[indis] == {}:
      t[indis] = {k:v}
      return
    else:
      sayac+=1
    if sayac >= TABLO_UZUNLUGU:
      break
  print("HASH TABLOSU DOLU!")

def HashSearch(t, k):
  sayac=0
  while True:
    indis = hash(k, sayac)
    if t[indis] == {} or sayac >= TABLO_UZUNLUGU:
      break
    if KeyGetir(t[indis]) == k:
      return indis
    sayac+=1
  return -1

def VerileriHashTablosunaEkle(veriler,hashTablosu):
  for i in range(0, len(veriler)):
    veri = veriler[i]
    HashInsert(hashTablosu,KeyGetir(veri),ValueGetir(veri))

def main(): 
  VerileriHashTablosunaEkle(veriler,hashTablosu)
  aranacakNo = input("Bilgilerini istediğiniz numarayı giriniz: ")
  indis=HashSearch(hashTablosu,int(aranacakNo))
  if indis != -1:
    print(ValueGetir(hashTablosu[indis]))
  else:
    print("Bu numaralı öğrenci hash tablosunda mevcut değil.")

main()