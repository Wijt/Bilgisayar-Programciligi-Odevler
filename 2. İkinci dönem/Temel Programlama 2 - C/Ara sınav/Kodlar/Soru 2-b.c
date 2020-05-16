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
      if(inputList[i]=='E'){
        urunBilgisi[0]-=1;
      }
      else if(inputList[i]=='M'){
        urunBilgisi[1]-=1;
      }
      else if(inputList[i]=='D'){
        urunBilgisi[2]-=1;
      }
      else if(inputList[i]=='K'){
        urunBilgisi[3]-=1;
      }
      else if(inputList[i]=='S'){
        urunBilgisi[4]-=1;
      }
      else if(inputList[i]=='\n'){
        UrunbilgisiniYaz(urunBilgisi);  
      }
      else if(inputList[i]=='X'){
        UrunbilgisiniYaz(urunBilgisi);
        calisma=0;
        break;
      }
      else{
        printf("Geçersiz!\n");
      }
    }
  }
  return 0;
}