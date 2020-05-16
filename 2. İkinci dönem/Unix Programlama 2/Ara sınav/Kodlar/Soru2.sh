declare -a dizi;
dizi=();
for (( i=0;i<5;i++ ))
do
  read -p "$((i+1)) Sayi giriniz: " sayi;
  dizi+=($sayi);
done
let toplam=0;
for i in ${dizi[@]}
do
  toplam=$(( toplam+$i ));
done
echo "Girdiğiniz sayıların ortalaması: ";
echo "scale=2;$toplam/${#dizi[@]}"|bc;