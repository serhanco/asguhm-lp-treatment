=== ASGUHM LP Treatment Support Eklentisi Kullanım Kılavuzu ===

Bu doküman, eklentinin doğru bir şekilde kurulması ve kullanılması için gerekli adımları içermektedir.

== AÇIKLAMA ==

Bu eklenti, "treatment-lp" adındaki özel yazı tipi (Custom Post Type) için gelişmiş bir şablon desteği sunar. Eklenti, genel tedavi sayfaları için standart bir şablon ve "Check-Up" olarak işaretlenen sayfalar için özel olarak tasarlanmış, paketleri ve interaktif modal pencereleri içeren zengin bir şablon sunar. Şablon seçimi, Gelişmiş Özel Alanlar (Advanced Custom Fields - ACF) eklentisi üzerinden yönetilir.

== KURULUM VE AYARLAR (ÖNCELİKLİ VE ZORUNLU) ==

Eklentinin çalışması için aşağıdaki bağımlılıkların ve ayarların **doğru sırada ve eksiksiz** yapılması KRİTİKTİR.

**1. 'treatment-lp' Özel Yazı Tipi (Custom Post Type):**
Bu eklenti, `treatment-lp` adında bir yazı tipi oluşturmaz, sadece mevcut olanı destekler. Bu yazı tipinin temanız veya başka bir eklenti tarafından sisteminize zaten kaydedilmiş olması gerekmektedir.

**2. Advanced Custom Fields (ACF) PRO Eklentisi:**
Bu eklentinin tüm fonksiyonları, ACF PRO eklentisinin yüklü ve aktif olmasını gerektirir. Şablon değiştirme mantığı tamamen buna bağlıdır.

**3. Kontrol Alanının ACF Üzerinden Oluşturulması (EN ÖNEMLİ ADIM):**
WordPress admin panelinizde, aşağıdaki ayarlara sahip bir özel alan oluşturmanız zorunludur:

*   **Admin Panelinde:** Özel Alanlar > Alan Grupları bölümüne gidin.
*   `treatment-lp` yazı tipinde görünecek şekilde ayarlanmış yeni bir Alan Grubu oluşturun veya mevcut bir gruba ekleyin.
*   Bu gruba, aşağıdaki ayarlarla birebir eşleşen yeni bir alan ekleyin:
    *   **Alan Etiketi (Field Label):** `Sayfa Tipi`
    *   **Alan Adı (Field Name):** `treatment_page_type`  <-- KODUN ÇALIŞMASI İÇİN TAM OLARAK BU ŞEKİLDE OLMALIDIR!
    *   **Alan Tipi (Field Type):** `Text` (Metin) veya `Select` (Seçim) olabilir.


== KULLANIM ==

**Standart Tedavi Sayfası Şablonunu Kullanmak İçin:**

`treatment-lp` tipinde yeni bir gönderi oluşturun veya düzenleyin. Yukarıda oluşturduğunuz "Sayfa Tipi" alanını boş bırakmanız yeterlidir. Eklenti, bu durumda standart şablonu otomatik olarak kullanacaktır.

**Özel "Check-Up" Şablonunu Aktif Etmek İçin:**

1.  `treatment-lp` tipinde yeni bir gönderi oluşturun veya mevcut birini düzenleyin.
2.  Yazı düzenleme ekranında, daha önce oluşturduğunuz "Sayfa Tipi" alanını bulun.
3.  Bu alanın içine şu değeri girin: `check-up`  <-- KODUN ÇALIŞMASI İÇİN TAM OLARAK BU DEĞER GİRİLMELİDİR!
4.  Gönderiyi kaydedin veya güncelleyin.
5.  Artık bu gönderinin ön yüzü, sizinle birlikte tasarladığımız modern Check-Up Paketleri sayfasını gösterecektir.


== ÖZELLEŞTİRME ==

Gelecekte değişiklik yapmak isterseniz, ilgili dosyaların yolları aşağıdadır:

*   Check-Up paketleri bölümünün HTML içeriği: `templates/partials/section-checkup-packages.php`
*   Bu bölüme ait özel CSS stilleri: `assets/css/checkup-packages.css`

== DEĞİŞİKLİK KAYDI (CHANGELOG) ==

= 1.1 =
* YENİ: Kadın ve erkek paketleri tek bir "Check-Up Paketlerimiz" bölümü altında birleştirildi.
* YENİ: Paket kartlarının üstüne, cinsiyete göre (kadın için pembe, erkek için mavi) renkli kenarlıklar eklenerek görsel gruplama sağlandı.
* YENİ: Paket kartlarının başlık ve görsel alanları, modal penceresini açmak için tıklanabilir hale getirildi.
* YENİ: Modal pencerelerindeki test detayları, üzerine tıklandığında genişleyen interaktif akordiyon menülere dönüştürüldü.
* İYİLEŞTİRME: Check-up bölümünün renk paleti, ana tema ile tam uyumlu hale getirildi.
* DOKÜMANTASYON: Eklenti kullanımı için `readme.txt` dosyası oluşturuldu.

= 1.0 =
* Eklentinin ilk sürümü.
* `treatment-lp` yazı tipi için standart ve check-up olmak üzere iki ayrı şablon desteği eklendi.