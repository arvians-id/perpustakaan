<?= $this->extend('home/homeLayout/template_noBodyClass') ?>

<?= $this->section('konten') ?>
<!-- Wrapper END
Page Content -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title"> Pertanyaan Yang Sering Ditanyakan (FAQ)</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab-1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-pustaka-tab-fill" data-toggle="pill" href="#satu-pustaka" role="tab" aria-controls="pills-pustaka" aria-selected="true">Tentang Satu Pustaka</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent-1">
                    <div class="tab-pane fade show active" id="satu-pustaka" role="tabpanel" aria-labelledby="pills-pustaka-tab-fill">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="iq-accordion career-style faq-style">
                                    <div class="iq-card iq-accordion-block accordion-active">
                                        <div class="active-faq clearfix">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-sm-12"><a class="accordion-title"><span> Apakah di masa pandemi Covid-19 sekarang ini proses peminjaman dan pengembalian buku dapat dilakukan? </span> </a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-details">
                                            <p class="mb-0">Tidak. Untuk sementara sampai berakhirnya masa pandemi Covid-19, proses peminjaman dan pengembalian buku kami tutup. </p>
                                        </div>
                                    </div>
                                    <div class="iq-card iq-accordion-block ">
                                        <div class="active-faq clearfix">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-sm-12"><a class="accordion-title"><span> Fitur apa saja yang dapat diakses di website macatongsir.id selama masa pandemi Covid-19? </span> </a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-details">
                                            <p class="mb-0">Selain peminjaman dan pengembalian buku, fitur lainnya seperti pencarian buku, artikel, agenda kegiatan, dan video pembelajaran sudah dapat diakses melalui website. Kami juga menyediakan informasi data real time Covid-19 di Indonesia di bagian sidebar sebagai bentuk kontribusi aksi peduli.</p>
                                        </div>
                                    </div>
                                    <div class="iq-card iq-accordion-block ">
                                        <div class="active-faq clearfix">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-sm-12"><a class="accordion-title"><span> Bagaimana cara mendapatkan informasi mengenai kegiatan dan artikel macatongsir? </span> </a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-details">
                                            <p class="mb-0">Untuk mengetahui agenda kegiatan dan artikel yang terdapat di website macatongsir.id, Anda hanya perlu meng-klik menu dibagian sidebar. Tetapi jika ingin mendapatkan notifikasi informasi, pertama-tama Anda harus daftar menjadi anggota dengan cara registrasi dan aktivasi yang nantinya akan langsung dikirim melalui email.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="iq-accordion career-style faq-style  ">
                                    <div class="iq-card iq-accordion-block">
                                        <div class="active-faq clearfix">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-sm-12"><a class="accordion-title"><span> Adakah biaya administrasi yang harus dibayar saat hendak mendaftar menjadi anggota Macatongsir? </span> </a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-details">
                                            <p class="mb-0">Tidak ada biaya administrasi apa pun yang harus dibayar untuk menjadi anggota Macatongsir. Namun, jika Anda hendak berkontribusi secara suka rela sebagai dukungan terhadap TBM Macatongsir, Anda dapat melakukan donasi semau dan sebisa Anda, apa pun itu bentuknya. </p>
                                        </div>
                                    </div>
                                    <div class="iq-card iq-accordion-block ">
                                        <div class="active-faq clearfix">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-sm-12"><a class="accordion-title"><span> Adakah batasan usia untuk menjadi anggota Macatongsir? </span> </a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-details">
                                            <p class="mb-0">Pada dasarnya tidak ada batasan usia untuk menjadi anggota Macatongsir. Namun, bagi mereka yang masih di bawah umur (di bawah 17 tahun), diperlukan adanya wali guna pendampingan.</p>
                                        </div>
                                    </div>
                                    <div class="iq-card iq-accordion-block ">
                                        <div class="active-faq clearfix">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-sm-12"><a class="accordion-title"><span>Bagaimana jika setelah proses peminjaman dibuka Saya terlambat mengembalikan buku? </span> </a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-details">
                                            <p class="mb-0">Jika Anda terlambat mengembalikan buku, akan dikenakan denda sebesar Rp. 500,- per hari per buku sebagai bentuk tanggung jawab moral dan kedisiplinan.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted border-0">
                            <a href="/home/download">Lihat Buku Pedoman Pengguna Macatongsir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Wrapper END -->
<?= $this->endSection() ?>