<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>

  <script>
    function okulSatiriEkle(n) {
      $("#okulekle_btn").attr("onclick", "okulSatiriEkle(" + (n + 1) + ")");
      $("#okulsayisi").attr("value", n);
      $("#okullar").append(`<div class="flex flex-wrap -mx-1 overflow-hidden mb-10"><div class="my-1 px-1 w-1/6 overflow-hidden md:w-full lg:w-1/6 xl:w-1/6"><select id="okultur_${n}"class="block appearance-none w-full bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight"><option value="ilkogretim">İlköğretim</option><option value="lise">Lise</option><option value="onlisans">Önlisans</option><option value="lisans">Lisans</option><option value="yukseklisans">Yüksek Lisans</option></select></div><div class="my-1 px-1 w-1/6 overflow-hidden md:w-full lg:w-1/6 xl:w-1/6"><input type="text" id="okuladi_${n}" name="okuladi_${n}"class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" /></div><div class="my-1 px-1 w-1/6 overflow-hidden md:w-full lg:w-1/6 xl:w-1/6"><input type="text" id="okulbolumu_${n}" name="okulbolumu_${n}"class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" /></div><div class="my-1 px-1 w-1/6 overflow-hidden md:w-full lg:w-1/6 xl:w-1/6"><input type="date" id="okulbaslangic_${n}" name="okulbaslangic_${n}"class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" /></div><div class="my-1 px-1 w-1/6 overflow-hidden md:w-full lg:w-1/6 xl:w-1/6"><input type="date" id="okulbitis_${n}" name="okulbitis_${n}"class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" /></div><div class="my-1 px-1 w-1/6 overflow-hidden md:w-full lg:w-1/6 xl:w-1/6"><input type="text" id="okulderece_${n}" name="okulderece_${n}"class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" /></div></div>`);
    }

    function dilSatiriEkle(n) {
      $("#dilekle_btn").attr("onclick", "dilSatiriEkle(" + (n + 1) + ")");
      $("#dilsayisi").attr("value", n);
      $("#diller").append(`<div class="flex flex-wrap -mx-1 overflow-hidden mb-10"><div class="my-1 px-1 w-1/4 overflow-hidden md:w-full lg:w-1/5 xl:w-1/4"><input type="text" id="diladi_${n}" name="diladi_${n}"class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" /></div><div class="my-1 px-1 w-1/4 overflow-hidden md:w-full lg:w-1/5 xl:w-1/4"><select id="okumaderece_${n}"class="block appearance-none w-full bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight"><option value="orta">Orta</option><option value="iyi">İyi</option><option value="cokiyi">Çok İyi</option></select></div><div class="my-1 px-1 w-1/4 overflow-hidden md:w-full lg:w-1/5 xl:w-1/4"><select id="yazmaderece_${n}"class="block appearance-none w-full bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight"><option value="orta">Orta</option><option value="iyi">İyi</option><option value="cokiyi">Çok İyi</option></select></div><div class="my-1 px-1 w-1/4 overflow-hidden md:w-full lg:w-1/5 xl:w-1/4"><select id="konusmaderece_${n}"class="block appearance-none w-full bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight"><option value="orta">Orta</option><option value="iyi">İyi</option><option value="cokiyi">Çok İyi</option></select></div></div>`);
    }

    function programSatiriEkle(n) {
      $("#programekle_btn").attr("onclick", "programSatiriEkle(" + (n + 1) + ")");
      $("#programsayisi").attr("value", n);
      $("#programlar").append(`<div class="flex flex-wrap -mx-1 overflow-hidden mb-5"><div class="my-1 px-1 w-1/2 overflow-hidden sm:w-1/2 md:1/2 lg:w-1/2 xl:w-1/2"><input type="text" id="programadi_${n}" name="programadi_${n}"class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" /></div><div class="my-1 px-1 w-1/2 overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2"><select id="programderece_${n}"class="block appearance-none w-full bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight"><option value="az">Az</option><option value="orta">Orta</option><option value="iyi">İyi</option><option value="cokiyi">Çok İyi</option></select></div></div>`);
    }
  </script>



  <div class="fixed inset-0 bg-gradient-to-tl from-gray-700 via-gray-800 to-gray-900"></div>

  <section class="text-gray-400 body-font flex items-center justify-center">
    <div class="container px-5 py-5 mx-auto flex">
      <div class="lg:w-2\/5 md:w-3\/5 bg-gray-900 shadow-md rounded-lg p-8 flex flex-col w-full mx-auto md:mt-0 relative z-10">
        <h2 class="text-white text-lg mb-1 font-medium title-font">
          İşe Alım Formu
        </h2>
        <p class="leading-relaxed">
          Açılan pozisyona başvurmak için aşağıdaki formu eksiksiz doldurmanız
          gerekmektedir.
        </p>
      </div>
    </div>
  </section>
  <form method="POST" action="">
    <input id="dilsayisi" name="dilsayisi" type="number" hidden>
    <input id="okulsayisi" name="okulsayisi" type="number" hidden>
    <input id="programsayisi" name="programsayisi" type="number" hidden>
    <section class="text-gray-400 body-font flex items-center justify-center">
      <div class="container px-5 py-5 mx-auto flex">
        <div class="lg:w-2\/5 md:w-3\/5 bg-gray-900 shadow-md rounded-lg p-8 flex flex-col w-full mx-auto md:mt-0 relative z-10">
          <h2 class="text-white text-lg mb-1 font-medium title-font">
            FOTOĞRAF
          </h2>
          <div class="flex flex-wrap -mx-1 overflow-hidden">

            <div class="my-1 px-1 w-full overflow-hidden">
              <div class="flex flex-wrap -mx-1 overflow-hidden">

                <div class="my-1 px-1 w-1/2 overflow-hidden">
                  <video class="mx-auto" width="200" height="200" autoplay="true" id="video">
                </div>

                <div class="my-1 px-1 w-1/2 overflow-hidden">
                  <canvas class="mx-auto" id="canvas" style="overflow:auto"></canvas>
                </div>

              </div>
            </div>

            <div class="my-1 px-1 w-full overflow-hidden">

              <button type="button" onclick="capture()" class="text-white w-full bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg">
                Çek
              </button>
            </div>

            <div class="my-1 px-1 w-full overflow-hidden">
              <input type="text" id="fotograf" name="fotograf" readonly class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />

            </div>

          </div>
          <script>
            var video = document.querySelector("#video");
            if (navigator.mediaDevices.getUserMedia) {
              navigator.mediaDevices.getUserMedia({
                  video: true
                })
                .then(function(stream) {
                  video.srcObject = stream;
                })
                .catch(function(err0r) {
                  console.log("Something went wrong!");
                });
            }
            var resultb64 = "";

            function capture() {
              var canvas = document.getElementById('canvas');
              var video = document.getElementById('video');
              canvas.width = 200;
              canvas.height = 200;
              canvas.getContext('2d').drawImage(video, 0, 0, 200, 200);
              resultb64 = canvas.toDataURL();
              document.getElementById("fotograf").value = canvas.toDataURL();
            }
            document.getElementById("fotograf").value = resultb64;
          </script>
        </div>
      </div>
    </section>

    <section class="text-gray-400 body-font flex items-center justify-center">
      <div class="container px-5 py-5 mx-auto flex">
        <div class="lg:w-2\/5 md:w-3\/5 bg-gray-900 shadow-md rounded-lg p-8 flex flex-col w-full mx-auto md:mt-0 relative z-10">
          <h2 class="text-white text-lg mb-1 font-medium title-font">
            A. KİŞİSEL BİLGİLER
          </h2>
          <!-- İSİM, SOYİSİM -->
          <div class="relative mb-4 grid md:grid-cols-2 sm:grid-flow-row-dense gap-5">
            <div>
              <label for="ad" class="leading-7 text-sm text-gray-400">Adınız</label>
              <input type="text" id="ad" name="ad" required class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
            </div>
            <div>
              <label for="soyad" class="leading-7 text-sm text-gray-400">Soyadınız</label>
              <input type="text" id="soyad" name="soyad" required class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
            </div>
          </div>
          <!-- DOĞUM YERİ, DOĞUM TARİHİ -->
          <div class="relative mb-4 grid md:grid-cols-2 sm:grid-flow-row-dense gap-5">
            <div>
              <label for="dogum_yeri" class="leading-7 text-sm text-gray-400">Doğum Yeriniz</label>
              <select id="dogum_yeri" name="dogum_yeri" required class="block appearance-none w-full bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight">
                <option value="istanbul">İstanbul</option>
                <option value="ankara">Ankara</option>
                <option value="izmir">İzmir</option>
                <option value="eskişehir">Eskişehir</option>
              </select>
            </div>
            <div>
              <label for="d-tarih-c" class="leading-7 text-sm text-gray-400">Doğum Tarihiniz</label>
              <div id="d-tarih-c" class="flex space-x-5">
                <select required id="dogum_tarihi_gun" name="dogum_tarihi_gun" class="block appearance-none w-1/3 bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight">
                </select>
                <select required id="dogum_tarihi_ay" name="dogum_tarihi_ay" class="block appearance-none w-1/3 bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight">
                </select>
                <select required id="dogum_tarihi_yil" name="dogum_tarihi_yil" class="block appearance-none w-1/3 bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight">
                </select>
              </div>
            </div>
          </div>

          <!-- CİNSİYET, UYRUK -->
          <div class="relative mb-4 grid md:grid-cols-2 sm:grid-flow-row-dense gap-5">
            <div>
              <label for="cinsiyet" class="leading-7 text-sm text-gray-400">Cinsiyetiniz</label>
              <select name="cinsiyet" id="cinsiyet" class="block appearance-none w-full bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight">
                <option value="K">Kadın</option>
                <option value="E">Erkek</option>
              </select>
            </div>
            <div>
              <label for="uyruk" class="leading-7 text-sm text-gray-400">Uyruğunuz</label>
              <select id="uyruk" name="uyruk" class="block appearance-none w-full bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight">
                <option value="tc">Türkiye Vatandaşı</option>
                <option value="diger">Diğer</option>
              </select>
            </div>
          </div>

          <!-- ADRES -->
          <div class="relative mb-4">
            <label for="adres" class="leading-7 text-sm text-gray-400">İkâmetgah Adresiniz</label>
            <textarea id="adres" name="adres" class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 h-32 text-base outline-none text-gray-100 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
          </div>

          <!-- TELEFON -->
          <div class="relative mb-4">
            <label for="telnolar" class="leading-7 text-sm text-gray-400">Telefon Numaranız</label>
            <div class="flex space-x-5" id="telnolar">
              <div class="w-1/3">Ev: &nbsp;<input type="tel" id="evtel" name="evtel" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
              </div>
              <div class="w-1/3"> Tel: &nbsp;<input type="tel" id="tel" name="tel" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
              </div>
              <div class="w-1/3">Tel 2: &nbsp;<input type="tel" id="tel2" name="tel2" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
              </div>
            </div>
          </div>

          <!-- EPOSTA -->
          <div class="relative mb-4">
            <label for="eposta" class="leading-7 text-sm text-gray-400">E-postanız</label>
            <input type="eposta" required id="eposta" name="eposta" class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
          </div>

          <!-- ASKERLİK DURUMU -->
          <div class="relative mb-4">
            <label for="askerlik_durumu" class="leading-7 text-sm text-gray-400">Askerlik Durumunuz</label>
            <select id="askerlik_durumu" name="askerlik_durumu" class="block appearance-none w-full bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight">
              <option value="tamamlandi">Tamamlandı</option>
              <option value="tecilli">Tecilli</option>
              <option value="muaf">Muaf</option>
            </select>
          </div>

          <!-- TAMAM İSE -->
          <div class="relative mb-4" id="asker_tamam_div">
            <label for="d-tarih-c" class="leading-7 text-sm text-gray-400">Terhis tarihi</label>
            <div id="d-tarih-c" class="flex space-x-5">
              <select id="asker_tamam_gun" name="asker_tamam_gun" class="block appearance-none w-1/3 bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight">
              </select>
              <select id="asker_tamam_ay" name="asker_tamam_ay" class="block appearance-none w-1/3 bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight">
              </select>
              <select id="asker_tamam_yil" name="asker_tamam_yil" class="block appearance-none w-1/3 bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight">
              </select>
            </div>
          </div>

          <!-- TECİLLİ İSE -->
          <div class="relative mb-4" id="asker_tecilli_div">
            <label for="d-tarih-c" class="leading-7 text-sm text-gray-400">Tarih</label>
            <div id="d-tarih-c" class="flex space-x-5">
              <select id="asker_tecilli_gun" name="asker_tecilli_gun" class="block appearance-none w-1/3 bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight">
              </select>
              <select id="asker_tecilli_ay" name="asker_tecilli_ay" class="block appearance-none w-1/3 bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight">
              </select>
              <select id="asker_tecilli_yil" name="asker_tecilli_yil" class="block appearance-none w-1/3 bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight">
              </select>
            </div>
          </div>

          <!-- MUAF İSE -->
          <div class="relative mb-4" id="asker_muaf_div">
            <label for="muafiyet_nedeni" class="leading-7 text-sm text-gray-400">Muafiyet Nedeni</label>
            <textarea id="muafiyet_nedeni" name="muafiyet_nedeni" class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 h-32 text-base outline-none text-gray-100 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
          </div>

          <!-- SÜRÜCÜ BELGESİ -->
          <div class="relative mb-4">
            <label for="message" class="leading-7 text-sm text-gray-400">Sürücü belgeniz var mı?</label>
            <div class="flex space-x-10">
              <div>
                <label for="message" class="text-2xl text-sm text-gray-400">B</label>
                <input name="ehliyet" id="belge_b" value="b" type="checkbox" class="w-5 h-5 text-blue-500 transition duration-100 ease-in-out border-blue-500 rounded shadow-sm focus:border-blue-900 text-gray-100 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-0 disabled:opacity-50 disabled:cursor-not-allowed">
              </div>
              <div>
                <label for="message" class="text-2xl text-sm text-gray-400">C</label>
                <input name="ehliyet" value="c" type="checkbox" class="w-5 h-5 text-blue-500 transition duration-100 ease-in-out border-blue-500 rounded shadow-sm focus:border-blue-900 text-gray-100 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-0 disabled:opacity-50 disabled:cursor-not-allowed">
              </div>
              <div>
                <label for="message" class="text-2xl text-sm text-gray-400">D</label>
                <input name="ehliyet" value="d" type="checkbox" class="w-5 h-5 text-blue-500 transition duration-100 ease-in-out border-blue-500 rounded shadow-sm focus:border-blue-900 text-gray-100 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-0 disabled:opacity-50 disabled:cursor-not-allowed">
              </div>
              <div>
                <label for="message" class="text-2xl text-sm text-gray-400">E</label>
                <input name="ehliyet" value="e" type="checkbox" class="w-5 h-5 text-blue-500 transition duration-100 ease-in-out border-blue-500 rounded shadow-sm focus:border-blue-900 text-gray-100 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-0 disabled:opacity-50 disabled:cursor-not-allowed">
              </div>
              <div>
                <label for="message" class="text-2xl text-sm text-gray-400">F</label>
                <input name="ehliyet" value="f" type="checkbox" class="w-5 h-5 text-blue-500 transition duration-100 ease-in-out border-blue-500 rounded shadow-sm focus:border-blue-900 text-gray-100 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-0 disabled:opacity-50 disabled:cursor-not-allowed">
              </div>
              <div>
                <label for="message" class="text-2xl text-sm text-gray-400">Yok</label>
                <input name="ehliyet" value="yok" type="checkbox" class="w-5 h-5 text-blue-500 transition duration-100 ease-in-out border-blue-500 rounded shadow-sm focus:border-blue-900 text-gray-100 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-0 disabled:opacity-50 disabled:cursor-not-allowed">
              </div>
            </div>
          </div>

          <!-- MEDENİ DURUM, EŞ MESLEĞİ -->
          <div class="relative mb-4 grid md:grid-cols-2 sm:grid-flow-row-dense gap-5">
            <div>
              <label for="medeni_durum" class="leading-7 text-sm text-gray-400">Medeni Durumunuz</label>
              <select id="medeni_durum" name="medeni_durum" class="block appearance-none w-full bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight">
                <option value="evli">Evli</option>
                <option value="bekar">Bekar</option>
              </select>
            </div>
            <div id="es_meslegi_div">
              <label for="esmeslek" class="leading-7 text-sm text-gray-400">Eşinizin Mesleği</label>
              <input type="text" id="esmeslek" name="esmeslek" class="w-full bg-gray-800 rounded border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
            </div>
          </div>

          <!-- SİGARA, ÇOCUK SAYISI -->
          <div class="relative mb-4 grid md:grid-cols-2 sm:grid-flow-row-dense gap-5">
            <div>
              <label for="sigara_kullanimi" class="leading-7 text-sm text-gray-400">Sigara Kullanıyor Musunuz?</label>
              <select id="sigara_kullanimi" name="sigara_kullanimi" class="block appearance-none w-full bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight">
                <option value="1">Evet</option>
                <option value="0">Hayır</option>
              </select>
            </div>
            <div>
              <label for="cocuk_sayisi" class="leading-7 text-sm text-gray-400">Çocuk Sayısı</label>
              <select id="cocuk_sayisi" name="cocuk_sayisi" class="block w-full appearance-none bg-gray-800 border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-900 text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out hover:border-blue-500 px-4 py-2 pr-8 rounded shadow leading-tight">
              </select>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="text-gray-400 body-font flex items-center justify-center">
      <div class="container px-5 py-5 mx-auto flex">
        <div class="lg:w-2\/5 md:w-3\/5 bg-gray-900 shadow-md rounded-lg p-8 flex flex-col w-full mx-auto md:mt-0 relative z-10">
          <h2 class="text-white text-lg mb-1 font-medium title-font">
            B. EĞİTİM BİLGİLERİ
          </h2>
          <div class="flex flex-wrap -mx-1 overflow-hidden sm:-mx-1 md:-mx-1 lg:-mx-1 xl:-mx-1">

            <div class="my-1 px-1 w-1/6 overflow-hidden sm:my-1 sm:px-1 sm:w-1/6 md:my-1 md:px-1 md:w-1/6 lg:my-1 lg:px-1 lg:w-1/6 xl:my-1 xl:px-1 xl:w-1/6">
              Okul Türü</div>

            <div class="my-1 px-1 w-1/6 overflow-hidden sm:my-1 sm:px-1 sm:w-1/6 md:my-1 md:px-1 md:w-1/6 lg:my-1 lg:px-1 lg:w-1/6 xl:my-1 xl:px-1 xl:w-1/6">
              Okul Adı</div>

            <div class="my-1 px-1 w-1/6 overflow-hidden sm:my-1 sm:px-1 sm:w-1/6 md:my-1 md:px-1 md:w-1/6 lg:my-1 lg:px-1 lg:w-1/6 xl:my-1 xl:px-1 xl:w-1/6">
              Bölümü</div>

            <div class="my-1 px-1 w-1/6 overflow-hidden sm:my-1 sm:px-1 sm:w-1/6 md:my-1 md:px-1 md:w-1/6 lg:my-1 lg:px-1 lg:w-1/6 xl:my-1 xl:px-1 xl:w-1/6">
              Başlangıç Tarihi</div>

            <div class="my-1 px-1 w-1/6 overflow-hidden sm:my-1 sm:px-1 sm:w-1/6 md:my-1 md:px-1 md:w-1/6 lg:my-1 lg:px-1 lg:w-1/6 xl:my-1 xl:px-1 xl:w-1/6">
              Bitiş Tarihi</div>

            <div class="my-1 px-1 w-1/6 overflow-hidden sm:my-1 sm:px-1 sm:w-1/6 md:my-1 md:px-1 md:w-1/6 lg:my-1 lg:px-1 lg:w-1/6 xl:my-1 xl:px-1 xl:w-1/6">
              Mezuniyet Derecesi</div>

          </div>

          <div id="okullar">

          </div>


          <button id="okulekle_btn" type="button" onClick="okulSatiriEkle(1)" class="text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg">
            Okul Satırı Ekle
          </button>


        </div>
      </div>
    </section>

    <section class="text-gray-400 body-font flex items-center justify-center">
      <div class="container px-5 py-5 mx-auto flex">
        <div class="lg:w-2\/5 md:w-3\/5 bg-gray-900 shadow-md rounded-lg p-8 flex flex-col w-full mx-auto md:mt-0 relative z-10">
          <h2 class="text-white text-lg mb-1 font-medium title-font">
            C. YABANCI DİL BİLGİSİ
          </h2>

          <div class="flex flex-wrap -mx-1 overflow-hidden sm:-mx-1 md:-mx-1 lg:-mx-1 xl:-mx-1">

            <div class="my-1 px-1 w-1/4 overflow-hidden sm:my-1 sm:px-1 sm:w-1/4 md:my-1 md:px-1 md:w-1/4 lg:my-1 lg:px-1 lg:w-1/4 xl:my-1 xl:px-1 xl:w-1/4">
              Dil</div>

            <div class="my-1 px-1 w-1/4 overflow-hidden sm:my-1 sm:px-1 sm:w-1/4 md:my-1 md:px-1 md:w-1/4 lg:my-1 lg:px-1 lg:w-1/4 xl:my-1 xl:px-1 xl:w-1/4">
              Okuma</div>

            <div class="my-1 px-1 w-1/4 overflow-hidden sm:my-1 sm:px-1 sm:w-1/4 md:my-1 md:px-1 md:w-1/4 lg:my-1 lg:px-1 lg:w-1/4 xl:my-1 xl:px-1 xl:w-1/4">
              Yazma</div>

            <div class="my-1 px-1 w-1/4 overflow-hidden sm:my-1 sm:px-1 sm:w-1/4 md:my-1 md:px-1 md:w-1/4 lg:my-1 lg:px-1 lg:w-1/4 xl:my-1 xl:px-1 xl:w-1/4">
              Konuşma</div>
          </div>

          <div id="diller">

          </div>
          <button type="button" id="dilekle_btn" onClick="dilSatiriEkle(1)" class="text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg">
            Dil Satırı Ekle
          </button>
        </div>
      </div>
    </section>

    <section class="text-gray-400 body-font flex items-center justify-center">
      <div class="container px-5 py-5 mx-auto flex">
        <div class="lg:w-2\/5 md:w-3\/5 bg-gray-900 shadow-md rounded-lg p-8 flex flex-col w-full mx-auto md:mt-0 relative z-10">
          <h2 class="text-white text-lg mb-1 font-medium title-font">
            D. BİLGİSAYAR BİLGİSİ
          </h2>
          <div class="flex flex-wrap -mx-1 overflow-hidden sm:-mx-1 md:-mx-1 lg:-mx-1 xl:-mx-1">

            <div class="my-1 px-1 w-1/2 overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-1 lg:px-1 lg:w-1/2 xl:my-1 xl:px-1 xl:w-1/2">
              Program
            </div>

            <div class="my-1 px-1 w-1/2 overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-1 lg:px-1 lg:w-1/2 xl:my-1 xl:px-1 xl:w-1/2">
              Dereceniz
            </div>
          </div>

          <div id="programlar">

          </div>
          <button type="button" id="programekle_btn" onClick="programSatiriEkle(1)" class="text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg">
            Program Satırı Ekle
          </button>
        </div>
      </div>
    </section>

    <section class="text-gray-400 body-font flex items-center justify-center">
      <div class="container px-5 py-5 mx-auto flex">
        <div class="lg:w-2\/5 md:w-3\/5 bg-gray-900 shadow-md rounded-lg p-8 flex flex-col w-full mx-auto md:mt-0 relative z-10">
          <input type="submit" name="submit" class="text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg">
          </input>
        </div>
      </div>
    </section>

  </form>
  <?php

  if (isset($_POST['submit'])) {

    $dilsayisi = $_POST["dilsayisi"];
    $okulsayisi = $_POST["okulsayisi"];
    $programsayisi = $_POST["programsayisi"];

    $fotograf = $_POST["fotograf"];
    $ad = $_POST["ad"];
    $soyad = $_POST["soyad"];
    $dogum_yeri = $_POST["dogum_yeri"];
    $tarihstr = $_POST["dogum_tarihi_gun"] . "/" . $_POST["dogum_tarihi_ay"] . "/" . $_POST["dogum_tarihi_yil"];
    $dogum_tarihi = date('d-m-Y', strtotime($tarihstr));
    $cinsiyet = $_POST["cinsiyet"];
    $adres = $_POST["adres"];
    $uyruk = $_POST["uyruk"];
    $evtel = $_POST["evtel"];
    $tel = $_POST["tel"];
    $tel2 = $_POST["tel2"];
    $eposta = $_POST["eposta"];
    $askerlik_durumu = $_POST["askerlik_durumu"];
    $tarihstr = $_POST["asker_tamam_gun"] . "/" . $_POST["asker_tamam_ay"] . "/" . $_POST["asker_tamam_yil"];
    $asker_tamam_tarih = date('d-m-Y', strtotime($tarihstr));
    $tarihstr = $_POST["asker_tecilli_gun"] . "/" . $_POST["asker_tecilli_ay"] . "/" . $_POST["asker_tecilli_yil"];
    $asker_tecilli_tarih = date('d-m-Y', strtotime($tarihstr));
    $muafiyet_nedeni = $_POST["muafiyet_nedeni"];
    $medeni_durum = $_POST["medeni_durum"];
    $esmeslek = $_POST["esmeslek"];
    $sigara_kullanimi = $_POST["sigara_kullanimi"];
    $cocuk_sayisi = $_POST["cocuk_sayisi"];
    $diller = array();
    $programlar = array();
    $okullar = array();

    for ($i = 1; $i <= $dilsayisi; $i += 1) {
      array_push($diller, $_POST["diladi_".$i]);
      array_push($diller, $_POST["okumaderece_". $i]);
      array_push($diller, $_POST["yazmaderece_". $i]);
      array_push($diller, $_POST["konusmaderece_". $i]);
    }

    for ($i = 1; $i <= $okulsayisi; $i += 1) {
      array_push($okullar, $_POST["okultur_" .$i]);
      array_push($okullar, $_POST["okuladi_" . $i]);
      array_push($okullar, $_POST["okulbolumu_" . $i]);
      array_push($okullar, $_POST["okulbaslangic_" . $i]);
      array_push($okullar, $_POST["okulderece_" . $i]);
    }

    for ($i = 1; $i <= $programsayisi; $i += 1) {
      array_push($programlar, $_POST["programadi_" . $i]);
      array_push($programlar, $_POST["programderece_" . $i]);
    }

    $okullarjson = json_encode($okullar);
    $programlarjson = json_encode($programlar);
    $dillerjson = json_encode($diller);
    
    $conn = mysqli_connect("localhost", "root", "root", "is_basvurusu");
    $sql = "insert into basvurular (fotograf, ad, soyad, dogum_yeri, dogum_tarihi, eposta, cinsiyet, uyruk, adres, telno_ev, telno_cep, telno_cep2, askerlik_durumu,terhis_tarihi,tecil_tarihi,muafiyet_nedeni,medeni_durumu,es_meslegi,sigara_kullanimi,cocuk_sayisi,egitim_bilgileri,dil_bilgileri,program_bilgileri) VALUES ('$fotograf', '$ad', '$soyad', '$dogum_yeri', STR_TO_DATE('$dogum_tarihi', '%d-%m-%Y'), '$eposta','$cinsiyet','$uyruk','$adres','$evtel','$tel','$tel2','$askerlik_durumu', STR_TO_DATE('$asker_tamam_tarih', '%d-%m-%Y'), STR_TO_DATE('$asker_tecilli_tarih', '%d-%m-%Y'),'$muafiyet_nedeni','$medeni_durum','$esmeslek','$sigara_kullanimi','$cocuk_sayisi','$okullarjson','$dillerjson','$programlarjson');";
    if (mysqli_query($conn, $sql)) {
      echo "<script type='text/javascript'>Swal.fire('Tebrikler!','Bavşuruyu başarıyla gerçekleştirdin!','success');</script>";
    } else {
      echo "<script type='text/javascript'>Swal.fire('HATA!','Başvuru sırasında hata oluştu. Yetkililere bildiriniz!','error');</script>";
      echo "eeee:Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
  ?>


  <script type="text/javascript">
    const displayWhenSelected = (source, value, target) => {
      var isSelected = source.children("option:selected").val() == value;
      if (isSelected) {
        target.show();
      } else {
        target.hide();
      }
    };

    const listeDoldur = (doldurulacak, baslangic, son) => {
      doldurulacak.innerHTML = "";
      for (var i = baslangic; i <= son; i++) {
        doldurulacak.innerHTML += `<option value="${i}">${i}</option>`;
      }
    }

    function formu_guncelle() {
      displayWhenSelected($("#medeni_durum"), "evli", $("#es_meslegi_div"));
      displayWhenSelected($("#askerlik_durumu"), "tamamlandi", $("#asker_tamam_div"));
      displayWhenSelected($("#askerlik_durumu"), "tecilli", $("#asker_tecilli_div"));
      displayWhenSelected($("#askerlik_durumu"), "muaf", $("#asker_muaf_div"));
    }



    $('select').on('change', function() {
      formu_guncelle();
    });

    formu_guncelle();

    listeDoldur(document.getElementById("cocuk_sayisi"), 0, 30);

    $('select[id*="_gun"]').each(function() {
      listeDoldur(this, 1, 31);
    });

    $('select[id*="_ay"]').each(function() {
      listeDoldur(this, 1, 12);
    });

    listeDoldur(document.getElementById("dogum_tarihi_yil"), 1950, (new Date().getFullYear() - 18));


    $('select[id*="yil"]').not('select[id*="dogum"]').each(function() {
      listeDoldur(this, (new Date().getFullYear() - 50), (new Date().getFullYear() + 50));
    });
    
  </script>
</body>
</html>