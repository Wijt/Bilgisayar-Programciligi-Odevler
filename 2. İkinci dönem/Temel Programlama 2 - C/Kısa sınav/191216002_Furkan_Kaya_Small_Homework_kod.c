#include <stdio.h>

char inputList[100];

void metinAl(char inputList[], char yazilicakYazi[]);
char islemBelirle();
int intYap(char s[]);

int toplama(int a, int b){return a+b;}
int cikarma(int a, int b){return a-b;}
int bolme(int a, int b){return b !=0 ? a/b : -1;}
int carpma(int a, int b){return a*b;}
int faktoriyel(int n){
  if(n==0) return 1;
  return n * faktoriyel(n-1);
}
int modul(int a, int b){return a%b;}

char islemBelirle(){
  while(1){
    char islem=0;
    printf("Yapmak istediğiniz işlemi giriniz: (Ctrl+D onay)\n");
    printf("\t1-) Toplama\n");
    printf("\t2-) Çıkarma\n");
    printf("\t3-) Bölme\n");
    printf("\t4-) Çarpma\n");
    printf("\t5-) Faktöriyel\n");
    printf("\t6-) Modül\n");
    printf("\t0-) Çıkış\n");
    metinAl(inputList, "İstenilen: ");
    islem=inputList[0];
    if((islem - '0') >= 0 && (islem - '0') <= 6)
      return islem;
    else
      printf("\nHATALI İŞLEM. TEKRAR DENEYİNİZ.\n\n");
  }
  return -1;
}

void metinAl(char inputList[], char yazilicakYazi[]){
  char c;
  int i=0;
  printf("%s", yazilicakYazi);
  while((c=getchar())!=EOF)
    inputList[i++]=c;
  inputList[i]=EOF;
}

int intYap(char s[]){
  int i, n;
  n=0;
  for(i=0; s[i]>='0' && s[i]<= '9'; i++){
    n = 10 * n + (s[i]-'0');
  }
  return n;
}

int main(){
  while(1){
    char islem = islemBelirle();
    int birinciSayi, ikinciSayi;
    if(islem == '0'){
      printf("\nPeki, hoşçakalın...");
      break;
    }else if(islem == '1'){
      metinAl(inputList, "\nBirinci sayıyı giriniz: ");
      birinciSayi = intYap(inputList);
      metinAl(inputList, "\nİkinci sayıyı giriniz: ");
      ikinciSayi = intYap(inputList);
      printf("\nToplamınız: %d\n", toplama(birinciSayi, ikinciSayi));
    }else if(islem == '2'){
      metinAl(inputList, "\nBirinci sayıyı giriniz: ");
      birinciSayi = intYap(inputList);
      metinAl(inputList, "\nİkinci sayıyı giriniz: ");
      ikinciSayi = intYap(inputList);
      printf("\nFarkınız: %d\n", cikarma(birinciSayi, ikinciSayi));
    }else if(islem == '3'){
      metinAl(inputList, "\nBirinci sayıyı giriniz: ");
      birinciSayi = intYap(inputList);
      metinAl(inputList, "\nİkinci sayıyı giriniz: ");
      ikinciSayi = intYap(inputList);
      if(ikinciSayi==0){
        printf("\nSonuç: SONSUZLUK\n");
        continue;
      }
      printf("\nBölümünüz: %d\n", bolme(birinciSayi, ikinciSayi));
    }else if(islem == '4'){
      metinAl(inputList, "\nBirinci sayıyı giriniz: ");
      birinciSayi = intYap(inputList);
      metinAl(inputList, "\nİkinci sayıyı giriniz: ");
      ikinciSayi = intYap(inputList);
      printf("\nÇarpımınız: %d\n", carpma(birinciSayi, ikinciSayi));
    }else if(islem == '5'){
      metinAl(inputList, "\nFaktöriyeli alınıcak sayıyı: ");
      birinciSayi = intYap(inputList);
      printf("\nSonucunuz: %d\n", faktoriyel(birinciSayi));
    }else if(islem == '6'){
      metinAl(inputList, "\nBirinci sayıyı giriniz: ");
      birinciSayi = intYap(inputList);
      metinAl(inputList, "\nİkinci sayıyı giriniz: ");
      ikinciSayi = intYap(inputList);
      printf("\nModülü: %d\n", modul(birinciSayi, ikinciSayi));
    }
  }
  return 0;
}