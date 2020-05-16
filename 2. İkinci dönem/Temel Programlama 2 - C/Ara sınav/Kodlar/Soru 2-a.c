#include <stdio.h>


char inputList[100];

void UrunbilgisiniYaz(int urunBilgisi[]){
  printf("Şu anki stok:");
  for(int i=0;i<5;i++){
    printf(" %d", urunBilgisi[i]);
  }
  printf("\n");
}

void metinAl(char inputList[], char yazilicakYazi[]){
  char c;
  int i=0;
  printf("%s", yazilicakYazi);
  while((c=getchar())!='\n')
    inputList[i++]=c;
  inputList[i++]='\n';
  inputList[i]=EOF;
}

int main(void) {
  int urunBilgisi[5]={5,5,5,5,5};
  int calisma=1;
  UrunbilgisiniYaz(urunBilgisi);
  while(calisma){
    metinAl(inputList, "");
    for(int i=0;inputList[i]!=EOF;i++){
      switch (inputList[i]){
        case 'E':
          urunBilgisi[0]-=1;
          break;
        case 'M':
          urunBilgisi[1]-=1;
          break;
        case 'D':
          urunBilgisi[2]-=1;
          break;
        case 'K':
          urunBilgisi[3]-=1;
          break;
        case 'S':
          urunBilgisi[4]-=1;
          break;
        case '\n':
          UrunbilgisiniYaz(urunBilgisi);
          break;
        case 'X':
          calisma=0;
          inputList[i+1]=EOF;
          break;
        default:
          printf("Geçerli değil!\n");
          break;
      }
    }
  }
  return 0;
}