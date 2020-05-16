import random as rnd

class stackYapisi:
   
    def __init__(self, elemanSayisi):
        self.liste = [None] * elemanSayisi
        self.son = -1
        self.maxSayi = elemanSayisi

    def ListeyiAl(self, liste:list):
        for i in range(len(liste)-1,-1,-1):
            self.PushYap(liste[i]);

    def PopYap(self):
        if self.son == -1:
            return None
        self.son -= 1
        return self.liste[(self.son)+1]    
    
    def PushYap(self, eleman):
        if(self.son+1 <= self.maxSayi):
            self.son += 1 
            self.liste[self.son] = eleman
        
    def ElemanlariYazdir(self):
        print(self.liste[0:self.son+1])
 
def randomElemanDoldur(liste:list, kacEleman:int):
    while len(liste) < kacEleman:
        randoma = rnd.randint(1,100)
        if randoma in liste:
            continue
        liste.append(randoma)
        
def sirala(liste:list):
    uzunluk=len(liste)
    for j in range(1,uzunluk):
        key=liste[j]
        i=j-1
        while i>-1 and liste[i]>key:
            liste[i+1]=liste[i]
            i=i-1
        liste[i+1]=key
    return (liste)

def main():
    kartlar = []
    randomElemanDoldur(kartlar,100)
    
    oyuncu1 = stackYapisi(5)
    oyuncu2 = stackYapisi(5)

    oyuncu1.ListeyiAl(sirala(kartlar[0:5]))
    oyuncu2.ListeyiAl(sirala(kartlar[5:10]))
    
    o1Puan=0
    o2Puan=0
    
    input("Oyun ilerletmek için enter tuşuna basınız...")
    for i in range(0,5):
        print("----------------------------------------------------")
        oyuncu1.ElemanlariYazdir()
        oyuncu2.ElemanlariYazdir()
        o1kart=oyuncu1.PopYap()
        o2kart=oyuncu2.PopYap()
        input("Oyuncu 1 "+str(o1kart)+" numaralı kartı attı.")
        input("Oyuncu 2 "+str(o2kart)+" numaralı kartı attı.")
        if o1kart>o2kart:
            print("Oyuncu 1 puan aldı!")
            o1Puan+=1
        else:
            print("Oyuncu 2 puan aldı!")
            o2Puan+=1
        input("1. oyuncu: "+str(o1Puan)+" puan\n2. oyuncu: "+str(o2Puan)+" puan")
    
    print("*************************BİTİŞ***************************")
    
    if o1Puan>o2Puan:
        input("1. OYUNCU KAZANDI!")
    else:
        input("2. OYUNCU KAZANDI!")
    
main()