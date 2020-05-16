#include <stdio.h>

int main(void) {
  int karakterSayisi=3;
  for(int i=1;i<=karakterSayisi;i++){
    for(int j=0;j<i;j++){
      printf("*");
    }
    printf("\n");
  }
  karakterSayisi--;
  for(int i=karakterSayisi;i>=0;i--){
    for(int j=0;j<i;j++){
      printf("*");
    }
    printf("\n");
  }
  return 0;
}