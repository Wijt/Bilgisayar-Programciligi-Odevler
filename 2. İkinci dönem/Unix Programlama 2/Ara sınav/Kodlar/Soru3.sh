besler=0;
ucler=0;

for (( i=1;i<=100;i++ ))
do
  if (( $i%5 == 0 )); then
    besler=$((besler+$i));
    echo "Beşe bölünüyor: $i";
  fi

  if (( $i%3 == 0 )); then
    ucler=$((ucler+$i));
    echo "Üçe bölünüyor: $i";
  fi
done
echo "Toplamların farkları $(($besler-$ucler))";