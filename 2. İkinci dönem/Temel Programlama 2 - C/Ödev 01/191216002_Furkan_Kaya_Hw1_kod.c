#include <stdio.h>

int Us(int sayi, int us){
  if(us==0) return 1;
  int sonuc=1;
  for(int i=1;i<=us;i++){
    sonuc=sonuc*sayi;
  }
  return sonuc;
}

int SayiDegeri(int sayi, int basamak){
  int istenilenSonda = sayi/Us(10,basamak-1);
  return istenilenSonda % 10;
}

int SayiUzunlugu(int sayi){
  int l=1;
  while(sayi>9){
    l++;
    sayi/=10; 
  }
  return l;
}

int ArmstrongMu(int sayi){
  int toplam = 0;
  int sayiUzunlugu=SayiUzunlugu(sayi);
  for (int i=1; i<=sayiUzunlugu; i++)
  {
    int rakam = SayiDegeri(sayi, i);
    toplam+=Us(rakam, sayiUzunlugu);
  }
  return toplam==sayi;
}

int main(void) {
  int bulunanlar[1000];
  int bulunanlari=0;
  int alt,ust;
  printf("Lütfen aralığın alt limitini giriniz: ");
  scanf("%d", &alt);
  printf("Lütfen aralığın üst limitini giriniz: ");
  scanf("%d", &ust);
  for(int i=alt; i<=ust; i++){
    if(ArmstrongMu(i)){
      bulunanlar[bulunanlari++]=i;
    }
  }
  if(bulunanlari==0){
    printf("Girdiğiniz aralıkta hiç armstrong sayısı yok!");
  }else{
    printf("%d ile %d arasındaki armstrong sayıları: ", alt, ust);
    for(int i=0;i<bulunanlari;i++){
      printf("%d ", bulunanlar[i]);
    }
  }
  return 0;
}