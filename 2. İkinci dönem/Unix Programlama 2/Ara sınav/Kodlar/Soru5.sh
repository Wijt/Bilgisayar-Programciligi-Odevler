odenecekVergi=0; vergiOrani=0;
read -p "Gelirinizi giriniz: " gelir;

if (( $gelir <= 22000 )); then
  vergiOrani=15;
fi
if (( $gelir > 22000 && $gelir <= 49000 )); then
  let odenecekVergi+=3300;
  let gelir=$(($gelir-22000));
  vergiOrani=20;
fi
if (( $gelir > 49000 && $gelir <= 120000 )); then
  let odenecekVergi+=8700;
  let gelir=$(($gelir-49000));
  vergiOrani=27;
fi
if (( $gelir > 120000 && $gelir <= 600000 )); then
  let odenecekVergi+=27870;
  let gelir=$(($gelir-120000));
  vergiOrani=35;
fi
if (( $gelir > 600000 )); then
  let odenecekVergi+=195870;
  let gelir=$(($gelir-600000));
  vergiOrani=40;
fi
let odenecekVergi+=$(( $(($gelir/100))*vergiOrani ));
echo $odenecekVergi;