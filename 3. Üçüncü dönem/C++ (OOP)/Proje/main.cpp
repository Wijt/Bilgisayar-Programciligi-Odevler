#include <iostream>
#include <vector>
#include <string>
#include <fstream>
#include <cstdlib>
#include <iomanip>
#include <sstream>

using namespace std;

void ConsoleClear();
const vector<string> explode(const string& s, const char& c);
string doubleToString(double v, int afterDot);
void waitForEnterKey();

class Musteri {
public:
    string tc, adi, soyadi;
    double borc, alacak, bakiye;
    Musteri(string tc, string adi, string soyadi, double borc, double alacak){
        this->tc = tc;
        this->adi = adi;
        this->soyadi = soyadi;
        this->borc = borc;
        this->alacak = alacak;
        this->bakiye = borc-alacak;
    }
    Musteri(){
        this->tc = "";
        this->adi = "";
        this->soyadi = "";
        this->borc = 0;
        this->alacak = 0;
        this->bakiye = 0;
    }
    string ToString(){
        return tc+","+adi+","+soyadi+"," + doubleToString(borc, 2) +","+doubleToString(alacak, 2)+","+doubleToString(bakiye, 2);
    }
};

void MusterileriKaydet(vector<Musteri> m);
void MusterileriYukle();
void MusteriSil(string tc);
void MusteriEkle(string tc, string adi, string soyadi, double borc, double alacak);
void MusterileriListele();
double ToplamBakiye(vector<Musteri> ms);
int MusterilerdeAra(string aranacak);

void MainScreen();
void M_ListeleScreen();
void M_EkleScreen();
void M_SilScreen();
void M_DegisScreen();
void M_AraScreen();
void M_ToplamBakiyeScreen();

vector<Musteri> musteriler;

int main() {
    MusteriEkle("10006739422", "Furkan", "Kaya", 1000, 10000);
    MusteriEkle("54657854555", "Ahmet", "Tuncay", 53660, 65000);
    MusteriEkle("86565465877", "Hüseyin", "Yıldırım", 5468, 55000);
    MainScreen();
    return 0;
}


void MainScreen(){
    int secim = -1;
    ConsoleClear();
    cout << " \n------------------" << "Programa Hoşgeldiniz" << "------------------\n";
    cout << "Seçenekler: \n";
    cout << "(1) Müşterileri listele\n";
    cout << "(2) Müşteri ekle\n";
    cout << "(3) Müşteri sil\n";
    cout << "(4) Müşteri güncelle\n";
    cout << "(5) Müşteri ara\n";
    cout << "(6) Toplam bakiyeyi kontrol et\n";
    cout << "(0) Çıkış\n";
    cout << "Seçiminiz: ";
    cin >> secim;

    switch (secim)
    {
        case 1:
            M_ListeleScreen();
            break;
        case 2:
            M_EkleScreen();
            break;
        case 3:
            M_SilScreen();
            break;
        case 4:
            M_DegisScreen();
            break;
        case 5:
            M_AraScreen();
            break;
        case 6:
            M_ToplamBakiyeScreen();
            break;
        case 0:
            cout << "Hoşçakalın. \n";
            break;
        default:
            cout << "Yanlış bir seçim yaptınız. \n";
            cout << "Tekrar denemek için enter'a basınız.";
            waitForEnterKey();
            MainScreen();
            break;
    }
}

void M_EkleScreen(){
    ConsoleClear();
    Musteri ym;
    cout << "Müşteri bilgilerini giriniz: \n";
    cout << "TC: ";
    cin >> ym.tc;
    cout << "Ad: ";
    cin >> ym.adi;
    cout << "Soyad: ";
    cin >> ym.soyadi;
    cout << "Borç miktarı: ";
    cin >> ym.borc;
    cout << "Alacak miktarı: ";
    cin >> ym.alacak;
    MusteriEkle(ym.tc, ym.adi, ym.soyadi, ym.borc, ym.alacak);
    cout << "Müşteri başarıyla eklendi ve kaydedildi.\n";
    cout << "Ana menüye dönmek için enter'a basınız.";
    waitForEnterKey();
    MainScreen();
}

void M_SilScreen(){
    string tc;
    while (true)
    {
        ConsoleClear();
        cout << "Silinecek müşterinin T.C. numarasını giriniz: " << endl;
        cout << "TC: ";
        cin >> tc;
        int id = MusterilerdeAra(tc);
        if(id != -1) break;
        else{
            cout << "Bu T.C. numarasına sahip kimse yok.\n";
            cout << "Tekrar denemek için enter'a basınız...";
            waitForEnterKey();
        }
    }
    MusteriSil(tc);
    cout << "Müşteri başarıyla silindi ve kaydedildi.\n";
    cout << "Ana menüye dönmek için enter'a basınız.";
    waitForEnterKey();
    MainScreen();
}

void M_DegisScreen(){
    ConsoleClear();
    string tc;
    int mId;
    while (true)
    {
        ConsoleClear();
        cout << "Güncellenecek müşterinin T.C. numarasını giriniz: ";
        cout << "TC: ";
        cin >> tc;
        mId = MusterilerdeAra(tc);
        if(mId != -1) break;
        else{
            cout << "Bu T.C. numarasına sahip kimse yok.\n";
            cout << "Tekrar denemek için enter'a basınız...";
            waitForEnterKey();
        }
    }
    Musteri ym;
    cout << "Yeni bilgilerini giriniz: \n";
    cout << "TC: ";
    cin >> ym.tc;
    cout << "Ad: ";
    cin >> ym.adi;
    cout << "Soyad: ";
    cin >> ym.soyadi;
    cout << "Borç miktarı: ";
    cin >> ym.borc;
    cout << "Alacak miktarı: ";
    cin >> ym.alacak;
    ym.bakiye = ym.borc-ym.alacak;
    musteriler[mId] = ym;
    MusterileriKaydet(musteriler);
    cout << "Müşteri başarıyla güncellendi ve kaydedildi.\n";
    cout << "Ana menüye dönmek için enter'a basınız.";
    waitForEnterKey();
    MainScreen();
}

void M_ListeleScreen() {
    ConsoleClear();
    MusterileriListele();
    cout << "Ana menüye dönmek için enter'a basınız.";
    waitForEnterKey();
    MainScreen();
}

void M_AraScreen(){
    //TODO: İSİM SOY İSİM YA DA TC BİLGİSİ ARANACAK
    ConsoleClear();
    string bilgi;
    cout << "Müşterinin herhangi bir biligisini giriniz:" << endl;
    cout << "Ad, Soyad ya da TC: ";
    cin >> bilgi;
    int id = MusterilerdeAra(bilgi);
    if(id != -1) cout << musteriler[id].ToString() << endl;
    else cout << "Bu bilgi hiç bir müşteride bulunmuyor.\n";
    cout << "Ana menüye dönmek için enter'a basınız.";
    waitForEnterKey();
    MainScreen();
}

void M_ToplamBakiyeScreen(){
    ConsoleClear();
    cout << "Tüm müşterilerin toplam bakiyesi: \n";
    cout << ToplamBakiye(musteriler) << endl;
    cout << "Ana menüye dönmek için enter'a basınız.";
    waitForEnterKey();
    MainScreen();
}


int MusterilerdeAra(string aranacak){
    int id=0;
    for(auto m:musteriler){
        if(m.tc == aranacak || m.soyadi == aranacak || m.adi == aranacak){
            return id;
        }
        id++;
    }
    return -1;
}

void MusteriSil(string tc){
    vector<Musteri> mGuncel;
    for (int i=0; i < musteriler.size(); i++){
        if(tc != musteriler[i].tc) mGuncel.push_back(musteriler[i]);
    }
    MusterileriKaydet(mGuncel);
    MusterileriYukle();
}

void MusteriEkle(string tc, string adi, string soyadi, double borc, double alacak){
    musteriler.emplace_back(tc, adi, soyadi, borc, alacak);
    MusterileriKaydet(musteriler);
}

void MusterileriListele(){
    MusterileriYukle();
    for(auto m:musteriler){
        cout << m.ToString() << endl;
    }
}

double ToplamBakiye(vector<Musteri> ms){
    double toplam;
    for(auto m:ms){
        toplam += m.bakiye;
    }
    return toplam;
}


void MusterileriKaydet(vector<Musteri> m){
    ofstream myfile;
    myfile.open("musteriler.txt", ios::trunc);
    myfile << "TC,ADI,SOYADI,BORÇ,ALACAK,BAKİYE" << endl;
    for (int i = 0; i < m.size(); i++) {
        myfile << m[i].ToString() << endl;
    }
    myfile.close();
}

void MusterileriYukle(){
    ifstream file;
    string metin;
    file.open("musteriler.txt");

    musteriler.clear();

    int lCount=0;
    while(file >> metin){
        if(lCount++==0) continue;
        vector<string> bilgiler = explode(metin,',');
        musteriler.emplace_back(bilgiler[0],bilgiler[1],bilgiler[2], atof(bilgiler[3].c_str()), atof(bilgiler[4].c_str()));
    }
}

const vector<string> explode(const string& s, const char& c){
    string buff="";
    vector<string> v;
    for(auto n:s)
    {
        if(n != c) buff+=n;
        else
        if(n == c && buff != "") { v.push_back(buff); buff = ""; }
    }
    if(buff != "") v.push_back(buff);
    return v;
}

void ConsoleClear() {
#ifdef WIN32
    system("cls");
#else
    system("clear"); // most other systems use this
#endif
}

string doubleToString(double v, int afterDot){
    stringstream stream;
    stream << fixed << setprecision(afterDot) << v;
    return stream.str();
}

void waitForEnterKey(){
    std::cin.ignore( std::numeric_limits <std::streamsize> ::max(), '\n' );
    char getchar[1];
    std::cin.getline(getchar,1);
    return;
    /*getche();*/
}
