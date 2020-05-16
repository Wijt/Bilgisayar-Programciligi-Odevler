maas=0;
saatUcreti=0;
netGelir=0;

read -p "Çalışma yılınızı giriniz: " yil;
read -p "Çalışma saatinizi giriniz: " saat;

if (( $yil >= 1 && $yil <= 10 )); then
  maas=3000;
  saatUcreti=20;
fi
if (( $yil >= 11 && $yil <= 20 )); then
  maas=4000;
  saatUcreti=30;
fi
if (( $yil >= 21 && $yil <= 30 )); then
  maas=5000;
  saatUcreti=40;
fi
let netGelir+=$maas;
if (( $saat > 120 )); then
  let saat-=120;
  let netGelir+=$(($saat*$saatUcreti));
fi
echo "Alacağınız ücret: $netGelir";


if (( $yil -gt 1 && $yil -le 10 )); then
  ucret=3000;
  if (( $saat -gt 120 )); then
    let saat-=120;
    let ucret+=$(($saat*10));
  fi
fi
