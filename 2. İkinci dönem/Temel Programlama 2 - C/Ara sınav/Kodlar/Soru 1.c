#include <stdio.h>

#define PI 3

int AlanHesapla(int r){
  int alan = PI*(r*r);
  return alan;
}

int CevreHesapla(int r){
  int cevre= 2*PI*r;
  return cevre;
}

int main(void) {
  int yaricap=3;
  printf("Belirtilen yarıçaptaki darinenin özellikleri:\n");
  printf("Alanı: %d\n",AlanHesapla(yaricap));
  printf("Çevresi: %d\n",CevreHesapla(yaricap));
  return 0;
}