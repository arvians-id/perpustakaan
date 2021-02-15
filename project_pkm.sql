-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 05:03 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_pkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `kategori` varchar(256) NOT NULL,
  `photo` varchar(256) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_artikel`
--

INSERT INTO `tb_artikel` (`id`, `slug`, `judul`, `isi`, `kategori`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(8, 'desy-ratnasari-mengapresiasi-forum-anak-kab-sukabumis', 'Desy Ratnasari Mengapresiasi Forum Anak Kab. Sukabumis', '<p><strong>Sukabumi –</strong> Anggota Komisi VIII DPR RI dari Fraksi \r\nPAN Hj. Desy Ratnasari, M.Si., M.Psi meninjau langsung bantuan \r\nPerpustakaan yang diberikan oleh Kementerian Pemberdayaan Perempuan dan \r\nPerlindungan Anak (PPPA) dan diserahkan kepada Forum Anak Daerah \r\nKabupaten. Sukabumi, di Taman Bacaan Masyarakat Gentong pasir (TBM Maca \r\nTongsir), di Kp.Gentong Pasir RT 04/01, Kecamatan Sukaraja Kabupaten \r\nSukabumi dan FAKSI yang berada di Kantor BPMPKB Kota Sukabumi.</p>\r\n<p>Desy sangat mengapresiasi, karena Forum Anak di Kabupaten Sukabumi \r\nmenginisiasi sebuah kegiatan yang manfaatnya bukan hanya untuk \r\nanak-anak, tapi juga orang Dewasa.</p><p>“Saya kira ini merupakan sebuah kegiatan yang sangat luar biasa, \r\nmanfaatnya bukan hanya untuk anak-anak, akan tetapi bagi orang dewasa. \r\nDengan keterbatasan finansial, forum anak dapat membangun kerjasama yang\r\n sangat bermanfaat bagi anak-anak dan masyarakat luas”, jelas Desy.</p>\r\n<p>Desy juga berharap, Forum Anak Daerah terus meningkatkan \r\nkreativitasnya, memberikan kegiatan yang positif bagi anak-anak yang \r\nberada dilingkungan Forbumi dan FAKSI sebagai wadah untuk membaca dan \r\nmendapatkan ilmu pengetahuan yang bermanfaat sehingga anak-anak \r\nmerasakan belajar sambil bermain dan orangtua merasa aman karena \r\nanak-anak mereka bermain dan belajar ditempat yang selayaknya sebagai \r\ntempat bermain. (GF)</p>', 'Informasi', '1598725032_ebd1d1691f13adaf9631.jpg', 0, '2020-08-30 01:17:12', '2020-09-02 10:58:53'),
(9, '4-hal-penting-yang-harus-dilakukan-sebelum-ke-salon', '4 Hal Penting Yang Harus Dilakukan Sebelum Ke Salon', '<section class=\"l-section\"><div class=\"l-section-h i-cf\" itemprop=\"text\"><p>Pergi\r\n ke salon bagi sebagian perempuan adalah sesuatu hal yang wajib atau \r\njadi kegiatan terapi yang meningkatkan mood. Salon yang merupakan tempat\r\n bagi wanita mempercantik badan mulai dari rambut hingga ke kaki pun \r\nmulai banyak yang memiliki tempat dan layanan yang lebih baik. Is simply dummy text of the printing and typesetting industry. Lorem \r\nIpsum has been the industry\'s standard dummy text ever since the 1500s, \r\nwhen an unknown printer took a galley of type and scrambled it to make a\r\n type specimen book. It has survived not only five centuries, but also \r\nthe leap into electronic typesetting, remaining essentially unchanged.</p>\r\n<h4>1.Membuat Janji Terlebih Dahulu</h4>\r\n<p>Membuat janji terlebih dahulu dengan hairstylist, pegawai atau \r\npemilik salon tentu lebih baik dilakukan sebelum kamu datang ke salon. \r\nHal ini tentu untuk menghindari agar kamu tidak menunggu terlalu lama \r\nsaat di salon. Dengan melalukan reservasi terlebih dahulu juga pemilik \r\nsalon akan dengan senang hati meluangkan waktunya untukmu tanpa diganggu\r\n untuk melayani pelanggan yang lain. Membuat janji terlebih dahulu juga \r\nsangat disarankan jika salon yang biasa kamu kunjungi cukup ramai dengan\r\n pengunjung, sehingga tidak ada drama terlalu lama menunggu membuatmu \r\nmembatalkan perawatan.</p>\r\n<p>Untuk melakukan reservasi di sejumlah salon dengan mudah bisa kamu \r\nlakukan dengan mengunduh aplikasi Qiwii. Khusus untuk kamu warga \r\nBandung, kamu dimudahkan untuk melakuakan reservasi hanya via aplikasi \r\ntanpa perlu ribet telpon. Kamu juga bisa memilih layanan yang akan kamu \r\npilih lewat smartphone mu. Belum tahu banyak soal Qiwii? Kamu bisa \r\ndownload aplikasinya <a href=\"https://play.google.com/store/apps/details?id=com.qiwii\">disini</a>.</p>\r\n<h4>2.Ketahui Prioritas Perawatan</h4>\r\n<p>Ketika berencana untuk pergi ke salon, jangan hanya datang lalu baru \r\nmemikirkan perawatan yang akan kamu pilih. Sebaiknya ketahui sejak awal \r\nperawatan apa saja yang kamu butuhkan, bukan yang kamu inginkan. Ketahui\r\n juga prioritasnya, mana yang lebih baik di segerakan perawatannya. Hal \r\nini tentu hanya kamu yang tahu. Mengetahui perawatan yang dibutuhkan \r\nbisa membuat kamu bisa memprediksi biaya yang perlu kamu keluarkan dan \r\nwaktu yang harus kamu sediakan untuk melakukan perawatan-perawatan \r\ntersebut.</p>\r\n<h4>3.Luangkan Waktu yang Cukup</h4>\r\n<p>Dengan mengetahui perawatan apa yang akan diambil, kamu juga bisa \r\nmengestimasi waktu yang harus kamu sediakan selama berada di salon \r\nsehingga <em>me-time</em> mu tidak menggangu kegiatan yang lain. Dengan \r\nmemiliki waktu yang cukup, kamu juga tidak perlu mempercepat pegawai \r\nuntuk melakukan perawatan yang kamu pilih sehingga mengganggu atau \r\nmembuat pegawai salon tidak maksimal dalam melakukan pekerjaan mereka.</p>\r\n<h4>4.Bawa Contoh Gaya Rambut Untuk Potong dan Pewarnaan</h4>\r\n<p>Ketika berencana untuk melakukan potong rambut atau mewarnai rambut, \r\nada baiknya jika kamu membaca contoh gambar seperti yang kamu inginkan. \r\nTetapi kamu harus tahu juga jika dengan datang ke salon bukan berarti \r\nkamu bisa sepenuhnya mirip dengan contoh yang kamu bawa. Tetap harus \r\nrasional dan mengetahui bentuk muka dan gaya rambut yang memang cocok \r\ndengan bentuk wajah kamu, jadi harus tetap rasional juga ya!</p>\r\n<p>Sudah tahu apa saja yang harus dilakukan sebelum ke salon? Hal-hal \r\ndiatas tentu akan membuatmu lebih mengemat waktu dan tidak bermasalah \r\ndengan pihak salon sendiri. Poin mana yang sudah sering kamu lakukan \r\natau malah justru masih sering lupa melakukan hal-hal diatas?</p>\r\n</div></section>', 'Tips', '1598726421_f5ffb80b73b724645b88.jpg', 0, '2020-08-30 01:40:21', '2020-09-02 11:03:32'),
(11, '3-jalur-daftar-antrian-paspor-online', '3 Jalur Daftar Antrian Paspor Online', '<p>Semakin pentingnya dokumen paspor bagi masyarakat, jalur-jalur \r\npengambilan nomor antrian dibuat semakin banyak dan semakin mudah. \r\nSemakin banyak channel yang diberikan untuk masyarakat tentu masyarakat \r\nsemakin mudah untuk dalam memproses pembuatan paspor. Setidaknya ada \r\ntiga jalur yang diberikan oleh pihak imigrasi agar daftar antrian paspor\r\n online tidak menumpuk di kantor layanan. is simply dummy text of the printing and typesetting industry. Lorem \r\nIpsum has been the industry\'s standard dummy text ever since the 1500s, \r\nwhen an unknown printer took a galley of type and scrambled it to make a\r\n type specimen book. It has survived not only five centuries, but also \r\nthe leap into electronic typesetting, remaining essentially unchanged.</p>\r\n<p>Apa saja tiga jalur daftar antrian paspor online tersebut? Tiga jalur\r\n tersebut adalah melalui aplikasi, website dan juga melalui pendaftaran \r\nWhatsApp.</p><ul><li><h5>Aplikasi</h5><p>Pengambilan nomor antrian memalui aplikasi sudah dilakukan sejak \r\ntahun lalu tepatnya 2017. Peluncuran aplikasi antrian paspor online ini \r\nsedikit banyak cukup membantu masyarakat dalam pembuatan maupun \r\nperpanjangan paspor. Hingga saat ini aplikasi Antrian Paspor sendiri \r\nsudah mencapai 1 juta download. Sayangnya aplikasi ini hanya bisa \r\ndigunakan bagi para pengguna android.</p>\r\n<p>Masyarakat hanya tinggal mengunduh aplikasi “ Antrian Paspor”di Play \r\nStore. Setelah berhasil mengunduh, lakukan registrasi awal dengan \r\nmemasukan data identitas. Jika proses registrasi berhasil, pengguna akan\r\n mendapat email konfirmasi pendaftaran untuk mengaktifkan akun.</p>\r\nAkun yang sudah aktif sudah bisa mengambil nomor antrian dengan \r\nmemilih kantor imigrasi, pilih tanggal dan waktu kedatangan dan \r\nmemasukan jumlah pemohon juga data pemohon. Proses pengambilan nomor \r\nantrian dikatakan selesai jika sudah mendapat notifikasi “Bukti Layanan \r\nAntrian Paspor Online” yang berbentuk PDF di email anda. Bukti tersebut \r\nbisa dicetak dan dibawa saat waktu datang ke kantor imigrasi</li><li><h5>Website</h5><p>Sebelum aplikasi, antrian website sudah lebih dulu hadir namun tidak \r\nbegitu populer. Masyarakat bisa mengambil nomor antrian melalui website \r\nimigrasi di <strong>https://antrian.imigrasi.go.id/.</strong> \r\nPengambilan nomor antrian melalui website hampir sama dengan yang ada di\r\n aplikasi. Pemohon harus registrasi dulu seperti biasa dan membuat \r\npermohonan dengan memilih kantor imigrasi dan waktu pengajuan permohonan\r\n paspor. Setelah permohonan berhasil, pemohon akan mendapat kode booking\r\n di bagian daftar permohonan.</p>\r\n<p>Secara tampilan dan navigasi, semuanya hampir sama dengan yang ada di\r\n aplikasi. Perbedaanya, kamu tidak perlu mengunduh aplikasi, kamu bisa \r\nmembuka alamat website di browser favorit. Cara permohonan benar-benar \r\nmirip dengan yang ada di aplikasi. Channel daftar antrian paspor online \r\nmelalui website ini cocok untuk kamu para pengguna IOS atau yang memang \r\ntidak ingin mengunduh aplikasinya. Namun yang harus diingat, jika sudah \r\nmendapat kode booking atau QR code sebaiknya di screenshot agar ketika \r\ndatang ke kantor imigrasi tidak sibuk masuk lagi ke website.</p></li></ul><ul><li><h5>WhatsApp</h5><p>Kehadiran channel terbaru lainnya dari pihak imigrasi adalah \r\npendaftaran permohonan melalui aplikasi chatting WhatsApp. Salah satu \r\nchannel lain untuk daftar antrian paspor online ini menjadi cara yang \r\npaling mudah dan juga sebagai langkah lain jika kuota yang ada di \r\naplikasi maupun di website telah habis.</p>\r\n<p>Ada sejumlah hal yang perlu diketahui jika kamu daftar antrian paspor\r\n online melalui WhatsApp, seperti: layanan WhatsApp tidak berlaku di \r\nsemua kantor imigrasi, hanya di tempat-tempat yang kuotanya lebih dari \r\n150 pemohon perhari, selain itu pendaftaran melalui WhatsApp hanya untuk\r\n pemohon paspor baru sedangakan untuk perpanjang dan rusak atau hilang \r\ntetap mendaftarkan antrian melalui aplikasi atau pun website. Perlu \r\ndiketahui juga jika nomor layanan tiap kantor dan wilayah tentu \r\nberbeda-beda. Nomor WhatsApp liat kantor imigrasi bisa dicari tahu \r\nmelalui akun social media tiap kantor.</p>\r\n<p>Dengan banyaknya jalur pendaftaran antrian paspor tentu semakin \r\nmembuat masyarakat terbantu. Masyarakat bisa memilih channel mana saja \r\nyang bisa disesuaikan dengan kenyamanan penggunaan dan kebutuhannya. \r\nTidak ada alasan lagi untuk mengurus paspor karena antrian lama.</p></li></ul>', 'Politik', '1598727127_ec16081f5a01245cf3d1.jpg', 0, '2020-08-30 01:52:07', '2020-09-02 11:03:35'),
(12, 'lollipop-asian-festival-perayaan-budaya-dalam-satu-tempat', 'Lollipop Asian Festival,  Perayaan Budaya Dalam Satu Tempat', '<section class=\"l-section\"><div class=\"l-section-h i-cf\" itemprop=\"text\"><p><strong>Lollipop Asian Festival</strong>\r\n – Budaya pop khususnya yang datang dari luar negeri selalu saja menarik\r\n banyak perhatian anak muda. Tak heran banyak bermunculan komunitas yang\r\n berasal dari budaya-budaya pop luar. Sebut saja cosplay, anime, k-pop, \r\norigami, komik, hingga hobi mengumpulkan Gundam adalah sejumlah budaya \r\nluar khususnya lingkup area Asia yang menjamur dan disukai oleh anak \r\nmuda saat ini.</p>\r\n<p>Melihat potensi yang besar ini, Lollipop Asian Festival mengadakan \r\nacara yang baru pertama digelar untuk mengumpulkan anak-anak muda dalam \r\nsatu acara festival beragam budaya Asia. Acara ini digelar pada hari \r\nMinggu 5 Agustus 2018 yang bertempat di area wisata Amazing 3D Art World\r\n Bandung. Benang merah dari acara ini sendiri adalah menyatukan berbagai\r\n keragaman budaya dalam satu acara.</p>\r\n<p>Seperti namanya yakni Lollipop Asian Festival, acara ini berupa \r\nfestival yang diisi dengan beragam pertunjukan musik, kompetisi, stand \r\nedukasi, fashion dan kuliner yang semuanya berkaitan dengan budaya Asia \r\nkhususnya Jepang Korena, China, India dan juga budaya lokal khususnya \r\nSunda. Meski dari tiap budaya cukup berbeda, hal yang ingin di tonjolkan\r\n dari acara Lollipop sendiri adalah pertukaran budaya dan keberagamannya\r\n yang harus dirayakan bukan untuk dipermasalahkan.</p>\r\n<p>Banyak berawal dari hobi dan kesenangan, banyak komunitas yang \r\nbergabung dalam acara ini untuk semakin memeriahkan acara. Selain \r\nsebagai pengunjung, anggota komunitas juga akan membagi pengalaman dan \r\npengetahuan di booth-booth komunitas</p>\r\n<p>Dalam acara ini, bagi yang bukan penggemar budaya pop pun bisa ikut \r\ndatang untuk mengunjungi beragam jenis pameran yang berkaitan budaya \r\nAsia ini. Tak hanya itu, mengenal sejumlah budaya dalam satu acara tentu\r\n menjadi kelebihan acara ini karena semua budaya Asia ditampilkan dan \r\ndihadirkan dalam acara Lollipop.</p>\r\n<p>Untuk pameran sendiri ada sejumlah kegiatan yang cukup menarik perhatian seperti workshop <em>costume play, drawing digital</em> dan <em>manual</em>, <em>face painting, gravity show, paint art show, origami creation, paper art creation, bottle creation</em> dan masih banyak kegiatan lainnya. Bagi kamu yang senang dengan dunia cosplay, bakal ada juga <em>Meet and Greet</em> dengan tiga Internasional Cosplayer yakni Onnies, Rena dan Sayuri.</p>\r\n<p>Untuk kamu yang senang dengan beragam kompetisi, kamu bisa mencoba \r\nperuntungan mu dengan mengikuti sejumlah kompetisi menarik dan kekinian \r\nseperti <em>costplay walk parade, cover singing</em> (Japan, Sunda, India, Mandarin, Korea), <em>photography contest, mobile legend, photo expression, formal Japan contest. </em></p>\r\n<p>Sedangkan untuk penampilan sebagai hiburan utama, aka nada 3 main \r\nstage di area acara Lollipop yang akan diisi puluhan penampilan. \r\nSetidaknya ada 62 penampilan dari berbagai jenis penampil mulai dari \r\nband, grup idol, teater, cosplayer, dancer hingga teater.</p>\r\n<p>Kamu yang belum memiliki acara diakhir pekan ini bisa memilih untuk \r\ndatang ke Lollipop Asian Festival ini. Mempelajari budaya dengan cara \r\nmenarik? Acara satu ini tentu bisa jadi pertimbangan.</p>\r\n</div></section>', 'Kebudayaan', '1598727719_a7831fcac221a295ebda.jpg', 0, '2020-08-30 02:01:59', '2020-09-02 11:03:39'),
(13, 'konsumen-sering-mengantri-benarkah-tanda-bisnis-yang-sukses', 'Konsumen Sering Mengantri, Benarkah Tanda Bisnis yang Sukses?', '<section class=\"l-section\"><div class=\"l-section-h i-cf\" itemprop=\"text\"><p><em>Konsumen sering mengantri, adalah tanda bisnis yang sukses. Ungkapan tersebut mitos atau fakta? </em></p>\r\n<p>Pernah mengantri di suatu tempat dengan jumlah antrian yang tak \r\nsedikit? Bagi industri kuliner hal seperti ini rasanya lumrah dan cukup \r\nsering terjadi. Bahkan sistem <em>waiting list</em> sudah cukup banyak \r\ndigunakan di beberapa restoran atau tempat makan karena banyaknya \r\nkonsumen yang datang. Tak hanya industri kuliner yang sering membuat \r\nkonsumennya mengantri, bisnis-bisnis lain seperti bengkel, salon dan \r\njuga foto studio tak jarang membuat konsumen mengantri menunggu giliran.</p>\r\n<p>Bagi sebagian pemilik bisnis, ketika konsumen mengantri mereka \r\nmenganggap jika bisnisnya bisa dibilang sukses karena banyak orang yang \r\nmau mengantri untuk produk yang ditawarkan. Tapi apakah benar, jika \r\nantrian adalah tanda kesuksesan suatu bisnis?</p>\r\n<p>Mari kita bahas lebih lanjut soal topik ini, antrian sendiri adalah \r\nkegiatan yang banyak orang sebenarnya tidak mau melakukannya. Sayangnya \r\nkarena kebutuhan, banyak orang yang akhirnya rela mengantri untuk \r\nmemenuhi kebutuhan tersebut. Mungkin bagi banyak orang, mengantri dengan\r\n waktu yang sebentar bukan menjadi masalah. Hal yang menjadi masalah \r\nadalah ketika konsumen mengantri terlalu lama terlebih jika berada di \r\nantrian yang cukup panjang.</p>\r\n<p>Bila dikaitkan dengan bisnis, bisa jadi antrian adalah tanda bisnis \r\natau produk yang ditawarkan sangat digemari atau memang memuaskan. \r\nNamun, pemilik bisnis juga harus menyadari jika sebenarnya dengan \r\nbanyaknya orang yang mencari produk atau jasa yang ditawarkan, layanan \r\nyang diberikan pun harus semakin ditingkatkan.</p>\r\n<p>Mengapa harus mengingkatkan layanan? Karena pada akhirnya antrian \r\nbukan tanda semata-mata produk atau jasa yang ditawarkan laku terjual \r\ntetapi juga menjadi peringatan jika manajeman antrian yang dimiliki \r\ntidak begitu baik.</p>\r\n<p>Manajemen antrian tentu tidak jauh berkutat pada jumlah konsumen yang\r\n datang dengan jumlah tenaga layanan yang disediakan. Pemilik bisnis \r\nbisa menambah tenaga layanan jika memang ternyata dirasa pegawai memang \r\nmenjadi masalah yang utama dan bisa membantu mengurangi antrian.</p>\r\n<p>Namun, jika memang pegawai sudah bertambah namun antrian tetap saja \r\ntidak terbendung, pemilik bisnis bisa memanfaatkan teknologi saat ini \r\nsalah satunya adalah <a href=\"http://qiwii.id/layanan/business/\">aplikasi antrian</a>.</p>\r\n<p>Menggunakan aplikasi untuk mengambil nomor antrian hanya lewat \r\nhandphone dimanapun dan kapanpun tentu akan memudahkan dan membuat \r\nkonsumen lebih nyaman mendapat layanan di satu tempat. Konsumen juga \r\ntidak perlu lagi menunggu lama di tempat layanan jika suatu bisnis \r\nmemiliki sistem antrian online.</p>\r\n<p>Mungkin banyak yang bertanya jika sistem antrian online akan memakan \r\nbanyak pengeluaran. Jika pemilik bisnis jeli mencari informasi tentu \r\ntidak akan lagi khawatir dengan biaya. Aplikasi antrian Qiwii memberikan\r\n layanan antrian online gratis bagi para pemilik bisnis di Bandung \r\nterutama di bidang kuliner, salon, barbershop hingga foto studio.</p>\r\n<p>Jadi bisa disimpulkan jika sebenarnya antrian tidak selamanya \r\nmenandakan suatu bisnis yang sukses tetapi juga sebagai tanda jika \r\nmanajeman antriannya masih belum bisa membuat konsumen nyaman dan \r\nbahagia. Konsumen mana yang mau mengantri, sudah membayar untuk mendapat\r\n layanan tetapi masih disuruh antri?</p>\r\n<p>Pemilik bisnis harusnya bisa lebih peka dan maksimal lagi dalam \r\nmemberikan layanan yang terbaik. Bisnis yang sukses bukan merupakan \r\nbisnis yang membuat konsumennya antri tetapi bisa membuat konsumennya \r\nbahagia mendapat pelayanan yang terbaik dan mau kembali berkunjung \r\nbahkan dengan mudah menyarankan produk atau jasa yang dibeli pada orang \r\nlain karena pelayanan memuaskan yang didapat.</p>\r\n</div></section>', 'Politik', '1598727775_013417e27faae0869f14.jpg', 0, '2020-08-30 02:02:55', '2020-09-02 11:03:41'),
(14, 'pelajari-jenis-antrian-ini-siapa-tahu-kamu-bisa-antri-lebih-cepat', 'Pelajari Jenis Antrian Ini, Siapa Tahu Kamu Bisa Antri Lebih Cepat', '<section class=\"l-section\"><div class=\"l-section-h i-cf\" itemprop=\"text\"><p>Mengantri\r\n merupakan bagian dari kehidupan, siapapun pasti pernah mengantri. Tapi \r\napakah kamu tahu ada beberapa jenis antrian yang bisa mempermudah dan \r\nmempercepat konsumen untuk mengantri di sejumlah layanan. Jenis antrian \r\nini sendiri adalah sistem yang digunakan untuk mempermudah layanan. \r\nSetiap tipe antrian ini juga di sesuaikan dengan jenis layanan karena \r\nbelum tentu saju jenis antrian cocok diterapkan di satu jenis \r\nlayanan. Apa saja jenis antrian antrian yang harus kita ketahui, berikut\r\n ulasannya.</p>\r\n<h4>1. Antrian Standar Linier</h4>\r\n<p>Antrian standar linier ini merupakan antrian yang paling sering \r\nditemukan diberbagai layanan. Antrian standar linier merupakan antrian \r\ndengan sejumlah chanel dan membuat konsumen mengantri di setiap chanel \r\nyang ada untuk dilayani. Contoh paling sederhana adalah saat mengantri \r\ndi toko swalayan yang memiliki beberapa kasir. Konsumen pun bisa memilih\r\n antrian mana saja yang disukai.</p>\r\n<p>Kelebihan dari jenis antrian satu ini konsumen bisa memilih chanel \r\nmana saja, konsumen bisa berpindah antrian jika dirasa antriannya \r\nlambat, dan server akan melayani lebih cepat jika merasa antriannya \r\nsemakin panjang.</p>\r\n<h4>2. Antrian Satu Baris</h4>\r\n<p>Sedangkan untuk antrian satu baris, setiap konsumen mengantri dalam \r\nsatu baris untuk mendapat layanan yang disediakan di beberapa chanel. \r\nJenis antrian satu ini meski akan terlihat lebih panjang namun waktu \r\ntunggunya relatif sebentar. Jenis antrian satu baris biasanya sering \r\ndigunakan di layanan bank atau layanan pemerintahan.</p>\r\n<p>Kelebihan antrian satu ini adalah sistemnya yang adil. Siapapun yang \r\ndatang pertama akan dilayani duluan. Berbeda dengan sistem antrian \r\nstandar linier yang bisa membuat konsumen yang datang belakangan bisa \r\nlebih dulu dilayani atau sebaliknya. Sedangkan di antian satu baris ada \r\njaminan keadilan bagi setiap konsumen.</p>\r\n<h4>3. Antrian Virtual</h4>\r\n<p>Antrian virtual biasanya menggunakan sistem pengambilan nomor di box \r\nkiosk di tempat layanan dan kembali menunggu untuk dipanggil. Seiring \r\nperkembangan zaman, antri virtual bisa dilakukan melalui smartphone \r\ndimana saja dan kapan saja. Metode antrian online inilah yang \r\ndikembangkan oleh aplikasi atrian Qiwii.</p>\r\n<p>Kelebihan dari antrian satu ini adalah konsumen memiliki waktu yang \r\nlebih bebas dan tidak terikat karena tidak perlu menunggu di tempat \r\nlayanan. Konsumen pun tentunya lebih merasa nyaman karena bisa menunggu \r\ndimana saja dan tidak perlu membuang banyak waktu untuk menunggu. Selain\r\n itu, konsumen hanya perlu datang saat nomor antriannya akan dipanggil, \r\ndengan sistem notifikasi dan slot waktu konsumen bisa lebih mengatur \r\nwaktu dengan baik menggunakan aplikasi antrian yang membuat konsumen \r\nbisa mengantri secara virtual.</p>\r\n<p>Dari tiga jenis antrian diatas, antrian mana yang paling sering kamu \r\ntemui? Sudah tahu kelebihan dari tipeantrian diatas. Meski antrian \r\nmanual bisa diakali tetapi tetap saja antri secara virtual adalah \r\nantrian yang paling praktis dan paling cocok di era saat ini. Sudah siap\r\n untuk berganti cara mengantri? Atau lebih senang antri seperti biasa?</p>\r\n</div></section>', 'Politik', '1598727880_a241bb9e213ed34b0cbc.jpg', 0, '2020-08-30 02:04:40', '2020-09-02 11:03:44'),
(15, '5-cara-antri-lebih-cepat-di-toko-swalayan', '5 Cara Antri Lebih Cepat di Toko Swalayan', '<section class=\"l-section\"><div class=\"l-section-h i-cf\" itemprop=\"text\"><p>5\r\n Cara Antri Lebih Cepat – Berbelanja ke Toko Swalayan sudah menjadi \r\nkegiatan yang dilakukan hampir setiap hari. Namun, satu hal yang paling \r\nbikin males saat berbelanja adalah saat antri di kasir. Terlebih saat \r\nawal bulan, semua orang berbondong-bondong berbelanja untuk memenuhi \r\nkebutuhan bulanan.</p>\r\n<p>Alhasil, setiap orang biasanya menuju kasir dengan <em>trolley</em> \r\nyang terisi penuh. Jika kamu tidak mau lagi terjebak lebih lama saat \r\nmengantri di kasir, coba perhatikan beberapa hal berikut yang bisa \r\nmembuat mu terhindar dari antrian panjang di kasir dan bisa antri lebih \r\ncepat.</p>\r\n<h5><strong>1.Belanja Saat Toko Relatif Sepi</strong></h5>\r\n<p>Memilih waktu yang tepat untuk berbelanja adalah salah satu \r\nmenghindari antrian panjang di kasir sehingga kamu bisa antri lebih \r\ncepat. Orang-orang banyak memilih berbelanja saat sore hari, malam hari \r\natau saat akhir pekan. Jika memungkinkan hindari lah waktu-waktu ini \r\nkarena pengunjung yang datang tentu akan lebih banyak. Datang saat toko \r\nbaru buka atau berberlanja saat siang hari bisa jadi pilihan ketika \r\npengunjung relatif lebih sedikit.</p>\r\n<h5><strong>2.Belanja Dengan Membawa Daftar Belanjaan </strong></h5>\r\n<p>Berbelanja dengan perencanaan akan membuat kamu fokus pada kebutuhan \r\ndan tidak memasukan barang diluar daftar belanja. Selain itu, dengan \r\nmemiliki daftar belanjaan akan meminimalisir barang yang terlupa diambil\r\n saat sudah berada meja kasir. Beruntung jika kamu berbelanja dengan \r\nseorang teman, jika tidak kamu harus mengambil barang barang yang \r\nterlupa dan meninggalkan antrian kasir. Tentu hal ini kan membuatmu dua \r\nkali mengantri bukan?</p>\r\n<h5><strong>3.Pilih Antrian Sebelah Kiri</strong></h5>\r\n<p>Kecenderungan orang akan memilih kasir sebelah kanan atau tengah \r\nsehingga pada area ini antrian lebih panjang. Kebanyakan orang lebih \r\nsering menggunakan tangan kanan juga berpengaruh sehingga orang lebih \r\nbanyak memilih jalur kasir di sebelah kanan. Ketika antrian lebih banyak\r\n di sebelah kanan, carilah kasir di bagian kiri yang biasanya \r\nkonsumennya lebih sedikit yang bisa membuatmu antri lebih cepat.   <strong> </strong></p>\r\n<h5><strong>4.Lihat Antrian dari Jumlah Belanjaan</strong></h5>\r\n<p>Hal lain yang juga cukup berpengaruh saat mengantri di toko swalayan \r\nadalah jumlah belanjaan dari tiap konsumen yang mengantri. Ada dua \r\npilihan yang bisa kamu praktekan saat mengantri. Pertama, mengantri \r\ndibelakang beberapa orang namun jumlah belanjaan tiap orang sedikit. \r\nKedua, kamu bisa memilih mengantri diantara orang dengan jumlah \r\nbelanjaan banyak namun jenis produk yang dibeli relatif sedikit.</p>\r\n<h5><strong>5.Bantu Kasir Mengeluarkan Barang </strong></h5>\r\n<p>Meski tidak berhubungan dengan pemilihan antrian, membantu \r\nmengeluarkan barang dari keranjang belanja tentu bisa mempercepat proses\r\n pelayanan sehingga kamu bisa lebih cepat selesai melakukan pembayaran.</p>\r\n<p>Lima tip tersebut bisa langsung kamu praktekan terutama di swalayan \r\nyang cukup besar dan menjadi tujuan banyak orang untuk berbelanja. \r\nMengantri lebih cepat tentu bisa membuat semua urusan selesai lebih \r\ncepat. Tidak perlu lagi mengantri lama hanya untuk melakukan pembayaran \r\ndi kasir jika kamu menerapkan hal-hal diatas dengan baik.</p>\r\n</div></section>', 'Informasi', '1598727906_de14f58a01dc445491b3.jpg', 0, '2020-08-30 02:05:06', '2020-09-02 11:03:47');

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel_kategori`
--

CREATE TABLE `tb_artikel_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_artikel_kategori`
--

INSERT INTO `tb_artikel_kategori` (`id`, `kategori`) VALUES
(8, 'Informasi'),
(10, 'Kebudayaan'),
(11, 'Tips'),
(12, 'Politik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bookmark_member`
--

CREATE TABLE `tb_bookmark_member` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `buku_id` varchar(255) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `isbn_issn` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bookmark_member`
--

INSERT INTO `tb_bookmark_member` (`id`, `user_id`, `buku_id`, `judul`, `isbn_issn`, `author`, `image`, `status`, `created_at`) VALUES
(158, '88', 'KBMT0002', 'Belajar Otodidak Framework Codeigniter + CD', '9786021514931', 'Budi Raharjo', '1599291814_177ff300c0d619fc2558.jpg', 3, '2020-09-12 05:52:13'),
(159, '88', 'KBMT0001', 'Seminggu Belajar Laravel', '978-623-7372-04-2', 'Rahmat Awaludin', '1599291466_c39b727502586f16dd36.jpg', 3, '2020-09-12 05:52:13'),
(160, '88', '5534', 'Kau, Aku, Dan Sepucuk Angpau Merah', '978-979-22-7913-9', 'Tere Liye', 'PU05360.jpg.jpg', 3, '2020-09-12 05:52:13'),
(161, '88', '1233', 'Membangun GUI Dengan JAVA NETBEANS 6.5', '978-979-29-1433-7', 'Andi &amp; wahana komputer', 'pu01074.jpg.jpg', 3, '2020-09-12 05:54:18'),
(162, '88', '13528', 'Bunga Rampai Kelembagaan: kumpulan artikel mata kuliah kelembagaan pertanian dan dinamika kelompok program studi agribisnis', '978-623-7372-04-2', 'Ema Hilma Meilani', 'Image_(14).jpg.jpg', 3, '2020-09-12 05:54:18'),
(169, '89', 'KBMT0002', 'Belajar Otodidak Framework Codeigniter + CD', '9786021514931', 'Budi Raharjo', '1599291814_177ff300c0d619fc2558.jpg', 3, '2020-09-14 08:01:16'),
(170, '89', '13527', 'Manajemen: teori dan aplikasi', '978-602-289-283-0', 'Said Ahmad Kabiru Rafiie', 'Image_(13).jpg.jpg', 3, '2020-09-14 08:01:16'),
(171, '89', 'KBMT0001', 'Seminggu Belajar Laravel', '978-623-7372-04-2', 'Rahmat Awaludin', '1599291466_c39b727502586f16dd36.jpg', 3, '2020-09-14 08:07:22'),
(179, '89', 'KBMT0001', 'Seminggu Belajar Laravel', '978-623-7372-04-2', 'Rahmat Awaludin', '1599291466_c39b727502586f16dd36.jpg', 3, '2020-09-14 08:43:34'),
(181, '89', 'KBMT0002', 'Belajar Otodidak Framework Codeigniter + CD', '9786021514931', 'Budi Raharjo', '1599291814_177ff300c0d619fc2558.jpg', 3, '2020-09-14 08:43:34'),
(184, '89', 'KBMT0001', 'Seminggu Belajar Laravel', '978-623-7372-04-2', 'Rahmat Awaludin', '1599291466_c39b727502586f16dd36.jpg', 3, '2020-09-15 09:12:23'),
(186, '89', 'KBMT0001', 'Seminggu Belajar Laravel', '978-623-7372-04-2', 'Rahmat Awaludin', '1599291466_c39b727502586f16dd36.jpg', 3, '2020-09-16 10:38:21'),
(187, '89', 'KBMT0002', 'Belajar Otodidak Framework Codeigniter + CD', '9786021514931', 'Budi Raharjo', '1599291814_177ff300c0d619fc2558.jpg', 3, '2020-09-16 10:38:21'),
(188, '89', 'KBMT0001', 'Seminggu Belajar Laravel', '978-623-7372-04-2', 'Rahmat Awaludin', '1599291466_c39b727502586f16dd36.jpg', 3, '2020-09-16 11:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku_kategori`
--

CREATE TABLE `tb_buku_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku_kategori`
--

INSERT INTO `tb_buku_kategori` (`id`, `kategori`) VALUES
(1, 'Novel'),
(3, 'Pendidikan'),
(4, 'Politik'),
(7, 'Agama Islam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku_macatongsir`
--

CREATE TABLE `tb_buku_macatongsir` (
  `id` int(11) NOT NULL,
  `kode_buku` varchar(20) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `isbn_issn` varchar(50) NOT NULL,
  `bahasa` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `status` int(3) NOT NULL,
  `photo` varchar(256) NOT NULL,
  `kategori` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku_macatongsir`
--

INSERT INTO `tb_buku_macatongsir` (`id`, `kode_buku`, `judul`, `isbn_issn`, `bahasa`, `deskripsi`, `author`, `status`, `photo`, `kategori`, `created_at`, `updated_at`) VALUES
(5, 'KBMT0001', 'Seminggu Belajar Laravel', '978-623-7372-04-2', 'Indonesia', 'Laravel itu framework PHP yang bikin hidup programmer lebih menyenangkan. Jadi, belajarnya juga mesti menyenangkan.', 'Rahmat Awaludin', 6, '1599291466_c39b727502586f16dd36.jpg', 'Agama Islam', '2020-09-05 02:37:46', '2020-09-12 04:14:02'),
(6, 'KBMT0002', 'Belajar Otodidak Framework Codeigniter + CD', '9786021514931', 'Indonesia', 'Buku ini membahas tentang teknik-teknik penggunaan codeigniter, salah satu framework PHP yang sangat populer dan banyak digunakan untuk mempermudah dan mempercepat proses pengembangan aplikasi web. Buku ini berisi materi-materi esensial yang banyak dibutuhkan pada saat bersinggungan dengan pemrograman web.', 'Budi Raharjo', 6, '1599291814_177ff300c0d619fc2558.jpg', 'Pendidikan', '2020-09-05 02:43:34', '2020-09-12 04:18:38'),
(13, 'KBMT0003', 'Mungkinkah Bandung Tanpa Antri Bisa Terwujud?', '432432423432432', 'Inggris', 'asu', 'Udin Markudin', 3, '1600276641_8a072036efc03fcda7d9.png', 'Agama Islam', '2020-09-17 12:17:21', '2020-09-17 12:18:44'),
(14, 'KBMT0004', 'Lollipop Asian Festival,  Perayaan Budaya Dalam Satu Tempat', '978-623-7372-04-2', 'Indonesia', 'as', 'Budi Raharjos', 1, '1600276748_1da2a15e223e807bfddd.jpg', 'Politik', '2020-09-17 12:19:08', '2020-09-17 12:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_donasi`
--

CREATE TABLE `tb_donasi` (
  `id` int(11) NOT NULL,
  `user_id` varchar(56) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `donasi` varchar(20) NOT NULL,
  `tanggal_terima` date DEFAULT NULL,
  `keterangan` text NOT NULL,
  `status` int(3) NOT NULL,
  `photo_donatur` varchar(256) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_formulir_kegiatan`
--

CREATE TABLE `tb_formulir_kegiatan` (
  `id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `kode_kegiatan` varchar(20) NOT NULL,
  `nama_peserta` varchar(256) NOT NULL,
  `email_peserta` varchar(256) NOT NULL,
  `no_hp_peserta` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id` int(11) NOT NULL,
  `kode_kegiatan` varchar(256) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `mentor` varchar(256) NOT NULL,
  `kuota` varchar(256) NOT NULL,
  `biaya` varchar(256) NOT NULL,
  `tempat` varchar(256) NOT NULL,
  `no_hp_pementor` varchar(256) NOT NULL,
  `kegiatan_dimulai` date NOT NULL,
  `kegiatan_selesai` date NOT NULL,
  `isi` text NOT NULL,
  `photo` varchar(256) NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id`, `kode_kegiatan`, `judul`, `mentor`, `kuota`, `biaya`, `tempat`, `no_hp_pementor`, `kegiatan_dimulai`, `kegiatan_selesai`, `isi`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(73, 'KGMT0001', 'Seminar Yang Sangat Tidak Bermanfaat', 'Widdy Arfi', '25', '150000', 'Sukabumi Selabintana', '082299921720', '2020-09-21', '2020-09-22', '<p>ppp</p>', '1600537231_03a6311ecf13c7ec72c3.jpg', 0, '2020-09-20 00:40:40', '2020-09-20 00:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konfigurasi_carousel`
--

CREATE TABLE `tb_konfigurasi_carousel` (
  `id` int(11) NOT NULL,
  `photo1` int(11) NOT NULL,
  `judul1` int(11) NOT NULL,
  `teks1` int(11) NOT NULL,
  `photo2` int(11) NOT NULL,
  `judul2` int(11) NOT NULL,
  `teks2` int(11) NOT NULL,
  `photo3` int(11) NOT NULL,
  `judul3` int(11) NOT NULL,
  `teks3` int(11) NOT NULL,
  `menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id` int(11) NOT NULL,
  `user_id` varchar(128) NOT NULL,
  `tanggal_input` varchar(128) NOT NULL,
  `tanggal_dibawa` date NOT NULL,
  `tanggal_dikembalikan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan_ditolak`
--

CREATE TABLE `tb_pengajuan_ditolak` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan_member`
--

CREATE TABLE `tb_pengajuan_member` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `photo_ktp_kartu_pelajar` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengajuan_member`
--

INSERT INTO `tb_pengajuan_member` (`id`, `user_id`, `nama_lengkap`, `email`, `no_hp`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `alamat`, `status`, `pesan`, `photo_ktp_kartu_pelajar`, `created_at`, `updated_at`) VALUES
(59, '89', 'Widdy Arfiansyah', 'pengguna01@gmail.com', '+6282299921720', 'Nusa Tenggara Barat', 'Kabupaten Sumbawa', 'Lape', 'Labuan Kuris', 'a', 'Mahasiswa', 'a', '1600016785_23f8dede1a895f43a018.png', '2020-09-14 00:06:25', '2020-09-14 00:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(11) NOT NULL,
  `is_active` varchar(1) NOT NULL,
  `status_pengajuan_member` int(3) NOT NULL,
  `status_ketersediaan_buku` int(3) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `nama_lengkap`, `email`, `password`, `role`, `is_active`, `status_pengajuan_member`, `status_ketersediaan_buku`, `created_at`, `updated_at`) VALUES
(87, 'Widdy Arfiansyah', 'widdyarfiansyah@ummi.ac.id', '$2y$10$tP6fM4t/IanrAba8d1Q6G.tSs1kPDeuX7pXUPsYq.qFWKSoK/74dm', '1', '1', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'Widdy Arfiansyah', 'widdyarfiansyah00@gmail.com', '$2y$10$koAfLdhtbMwfMhuZvTCnqO4v0Z18mimq7oufgnjLNekCKhIp3/hZK', '2', '1', 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'World Dragonest', 'worlddragonest01@gmail.com', '$2y$10$KE0yU0DwQ6O8cz7wVZlcLeVgnm4rzuK3L.Lkt19s3GV6yfxXt0hze', '2', '1', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna_token`
--

CREATE TABLE `tb_pengguna_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(256) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil_pengguna`
--

CREATE TABLE `tb_profil_pengguna` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_profil_pengguna`
--

INSERT INTO `tb_profil_pengguna` (`id`, `user_id`, `tanggal_lahir`, `no_hp`, `jenis_kelamin`, `status`, `photo`) VALUES
(69, '87', '0000-00-00', '', 'Lainnya', '', 'default.png'),
(71, '89', '2020-09-14', '082299921720', 'Lainnya', 'Sudah Bekerja', '1600587881_e9efe76b6d8d2f93da24.jpg'),
(72, '90', '0000-00-00', '', 'Lainnya', '', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role_pengguna`
--

CREATE TABLE `tb_role_pengguna` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role_pengguna`
--

INSERT INTO `tb_role_pengguna` (`id`, `keterangan`) VALUES
(1, 'Administrator'),
(2, 'Mitra'),
(3, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_aktif`
--

CREATE TABLE `tb_status_aktif` (
  `id` int(2) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_status_aktif`
--

INSERT INTO `tb_status_aktif` (`id`, `keterangan`, `icon`) VALUES
(0, 'Belum Terverifikasi', 'fas fa-user-times'),
(1, 'Terverifikasi', 'fas fa-user-check');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_peminjaman`
--

CREATE TABLE `tb_status_peminjaman` (
  `tanggal_selesai` date DEFAULT NULL,
  `pesan` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_status_peminjaman`
--

INSERT INTO `tb_status_peminjaman` (`tanggal_selesai`, `pesan`) VALUES
('0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_artikel_kategori`
--
ALTER TABLE `tb_artikel_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bookmark_member`
--
ALTER TABLE `tb_bookmark_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_buku_kategori`
--
ALTER TABLE `tb_buku_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_buku_macatongsir`
--
ALTER TABLE `tb_buku_macatongsir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_donasi`
--
ALTER TABLE `tb_donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_formulir_kegiatan`
--
ALTER TABLE `tb_formulir_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_kegiatan` (`kode_kegiatan`);

--
-- Indexes for table `tb_konfigurasi_carousel`
--
ALTER TABLE `tb_konfigurasi_carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengajuan_ditolak`
--
ALTER TABLE `tb_pengajuan_ditolak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengajuan_member`
--
ALTER TABLE `tb_pengajuan_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengguna_token`
--
ALTER TABLE `tb_pengguna_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_profil_pengguna`
--
ALTER TABLE `tb_profil_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_role_pengguna`
--
ALTER TABLE `tb_role_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tb_artikel_kategori`
--
ALTER TABLE `tb_artikel_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_bookmark_member`
--
ALTER TABLE `tb_bookmark_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `tb_buku_kategori`
--
ALTER TABLE `tb_buku_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_buku_macatongsir`
--
ALTER TABLE `tb_buku_macatongsir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_donasi`
--
ALTER TABLE `tb_donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_formulir_kegiatan`
--
ALTER TABLE `tb_formulir_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tb_konfigurasi_carousel`
--
ALTER TABLE `tb_konfigurasi_carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tb_pengajuan_ditolak`
--
ALTER TABLE `tb_pengajuan_ditolak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_pengajuan_member`
--
ALTER TABLE `tb_pengajuan_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tb_pengguna_token`
--
ALTER TABLE `tb_pengguna_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_profil_pengguna`
--
ALTER TABLE `tb_profil_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tb_role_pengguna`
--
ALTER TABLE `tb_role_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
