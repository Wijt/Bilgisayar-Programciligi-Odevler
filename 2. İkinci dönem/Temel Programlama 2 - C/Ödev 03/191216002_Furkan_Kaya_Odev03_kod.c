#include <stdio.h>

#define N 5

struct Kisi{
	char isim[50];
	char soyIsim[50];
	long int telNo;
};

struct Kisi rehber[N];

void NumaraAl(char yazilicakMetin[200], long int *degisken){
	while (1) {
		printf("%s", yazilicakMetin);
		if (scanf("%ld", degisken) != 1){
			while (fgetc(stdin) != '\n');
			printf("Hatalı giriş. Lütfen tekrar giriniz.\n");
		}else{
   			break;
		}
	}
}

void StringAl(char yazilicakMetin[200], char *degisken){
	while (1) {
		printf("%s", yazilicakMetin);
		if (scanf("%s", degisken) != 1){
			while (fgetc(stdin) != '\n');
			printf("Hatalı giriş. Lütfen tekrar giriniz.\n");
		}else{
   			break;
		}
	}
}

int main(void) {

	for(int i = 0; i < N; i++){
		printf("\n--------------- %d. KİŞİ ---------------\n", i+1);

		StringAl("İsmini giriniz: ", rehber[i].isim);
		StringAl("Soyismini giriniz: ", rehber[i].soyIsim);
		NumaraAl("Telefon numarasını giriniz: ", &rehber[i].telNo);
	}

	printf("\n---------------  REHBER  ---------------\n");
	
	for(int i=0; i < N; i++){
		printf("%d. kişi: %s\t %s\t %ld\n", i+1, rehber[i].isim, rehber[i].soyIsim, rehber[i].telNo);
	}
	return 0;
}