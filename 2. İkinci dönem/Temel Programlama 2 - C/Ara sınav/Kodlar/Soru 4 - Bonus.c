#include <stdio.h>

int main(void) {
  int bolunecekler[5] = {11,21,31,41,51};
  int bolumler[5]={10,10,10,10,10};
  int kalanlar[5]={0};
  for(int i=0;i<5;i++){
    kalanlar[i] = bolunecekler[i] % bolumler[i];
    printf("%d sayisinin %d sayısına bölümünden kalan %d\n",bolunecekler[i],bolumler[i],kalanlar[i]);
  }
  return 0;
}