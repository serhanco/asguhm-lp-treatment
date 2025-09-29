# ASGUHM LP Treatment Support Eklentisi Kullanım Kılavuzu

Bu doküman, eklentinin doğru bir şekilde kurulması ve kullanılması için gerekli adımları içermektedir.

## AÇIKLAMA

Bu eklenti, "treatment-lp" adındaki özel yazı tipi (Custom Post Type) için gelişmiş bir şablon desteği sunar. Eklenti, genel tedavi sayfaları için standart bir şablon ve "Check-Up" olarak işaretlenen sayfalar için özel, dinamik bir şablon sunar. Check-up şablonunun tüm içeriği (paketler, görseller, başlıklar, test detayları vb.) WordPress admin panelinden Gelişmiş Özel Alanlar (ACF) aracılığıyla yönetilir.

## KURULUM VE AYARLAR (ÖNCELİKLİ VE ZORUNLU)

Eklentinin çalışması için aşağıdaki bağımlılıkların ve ayarların **doğru sırada ve eksiksiz** yapılması KRİTİKTİR.

**1. 'treatment-lp' Özel Yazı Tipi (Custom Post Type):**
Bu eklenti, `treatment-lp` adında bir yazı tipi oluşturmaz, sadece mevcut olanı destekler. Bu yazı tipinin temanız veya başka bir eklenti tarafından sisteminize zaten kaydedilmiş olması gerekmektedir.

**2. Advanced Custom Fields (ACF) PRO Eklentisi:**
Bu eklentinin tüm fonksiyonları (özellikle iç içe tekrarlayıcılar) ACF PRO eklentisinin yüklü ve aktif olmasını gerektirir.

**3. Gerekli ACF Alan Gruplarını Oluşturma (EN ÖNEMLİ ADIM):**
Check-up şablonunun çalışması için iki adet alan grubu ve içlerinde belirtilen alanları oluşturmanız gerekmektedir.

**ALAN GRUBU 1: Sayfa Tipi Kontrolü**
*   **Grup Adı:** `Sayfa Ayarları` (veya benzeri)
*   **Kural:** Bu grubu `Yazı Tipi` `treatment-lp` ise göster.
*   **Alanlar:**
    *   **Alan Etiketi:** `Sayfa Tipi`
    *   **Alan Adı:** `treatment_page_type`
    *   **Alan Tipi:** `Text` veya `Select`

**ALAN GRUBU 2: Check-Up Paket İçerikleri**
*   **Grup Adı:** `Check-Up Paketleri İçeriği` (veya benzeri)
*   **Kural:** Bu grubu `Sayfa Tipi` (`treatment_page_type`) alanı `check-up` değerine eşit ise göster.
*   **Alanlar:**
    *   **Alan Etiketi:** `Check-Up Paketleri`
    *   **Alan Adı:** `lp_checkup_packages`
    *   **Alan Tipi:** `Repeater` (Tekrarlayıcı)
    *   **Tekrarlayıcı Alt Alanları:**
        *   `lp_package_title` (Alan Tipi: `Text`, Etiket: `Paket Başlığı`)
        *   `lp_package_gender` (Alan Tipi: `Select`, Etiket: `Paket Cinsiyeti`, Seçenekler: `female` : Kadın, `male` : Erkek)
        *   `lp_package_image` (Alan Tipi: `Image`, Etiket: `Paket Görseli`, Dönüş Formatı: `Image URL`)
        *   `lp_package_description` (Alan Tipi: `Textarea`, Etiket: `Kısa Açıklama`)
        *   `lp_package_modal_id` (Alan Tipi: `Text`, Etiket: `Modal Pencere ID`, Not: Benzersiz olmalı, örn: `kadin-altin-modal`)
        *   `lp_package_details` (Alan Tipi: `Repeater`, Etiket: `Paket Detayları (Akordiyon)`)
            *   **İç Tekrarlayıcı Alt Alanları:**
                *   `lp_detail_title` (Alan Tipi: `Text`, Etiket: `Detay Başlığı`)
                *   `lp_detail_description` (Alan Tipi: `Textarea`, Etiket: `Detay Açıklaması`)


## KULLANIM

1.  `treatment-lp` tipinde yeni bir gönderi oluşturun veya mevcut birini düzenleyin.
2.  **Sayfa Tipi** alanına `check-up` değerini girin ve gönderiyi kaydedin. Sayfa yenilendiğinde, "Check-Up Paketleri İçeriği" alan grubunun göründüğünü göreceksiniz.
3.  **"Check-Up Paketleri"** alanının altındaki **"Yeni Paket Ekle"** butonuna tıklayarak ilk paketinizi oluşturun.
4.  Paket için gerekli tüm bilgileri (başlık, cinsiyet, görsel, açıklama, modal ID) girin.
5.  Paketin içindeki **"Paket Detayları (Akordiyon)"** bölümünde, **"Yeni Detay Ekle"** butonuna tıklayarak o pakete ait testleri ve açıklamalarını girin.
6.  İstediğiniz kadar paket ve her pakete istediğiniz kadar detay ekleyebilirsiniz. Sıralarını sürükle-bırak ile değiştirebilirsiniz.
7.  Gönderiyi kaydedin. Girdiğiniz tüm içerik, ön yüzde otomatik olarak görünecektir.


## ÖZELLEŞTİRME

İçerik yönetimi tamamen admin panelinden yapılmaktadır. Eğer şablonun **yapısını veya stilini** değiştirmek isterseniz, ilgili dosyalar:

*   **HTML Yapısı:** `templates/partials/section-checkup-packages.php`
*   **CSS Stilleri:** `assets/css/checkup-packages.css`

## DEĞİŞİKLİK KAYDI (CHANGELOG)

### 1.3
* İYİLEŞTİRME: "Doktorlar" bölümündeki açıklama metni gizlendi.
* İYİLEŞTİRME: Galeri bölümündeki görsellerin daha büyük görünmesi için sütun sınıfları güncellendi.

### 1.2
* YENİ: Tüm paket içeriği (başlıklar, görseller, açıklamalar, modal detayları) tamamen dinamik hale getirildi ve ACF Repeater alanlarına bağlandı.
* DOKÜMANTASYON: `readme.txt` dosyası, yeni dinamik ACF yapısını ve kullanımını açıklayacak şekilde tamamen güncellendi.

### 1.1
* YENİ: Kadın ve erkek paketleri tek bir "Check-Up Paketlerimiz" bölümü altında birleştirildi.
* YENİ: Paket kartlarının üstüne, cinsiyete göre renkli kenarlıklar eklenerek görsel gruplama sağlandı.
* YENİ: Paket kartlarının başlık ve görsel alanları, modal penceresini açmak için tıklanabilir hale getirildi.
* YENİ: Modal pencerelerindeki test detayları, interaktif akordiyon menülere dönüştürüldü.
* İYİLEŞTİRME: Check-up bölümünün renk paleti, ana tema ile tam uyumlu hale getirildi.
* DOKÜMANTASYON: Eklenti kullanımı için `readme.txt` dosyası oluşturuldu.

### 1.0
* Eklentinin ilk sürümü.