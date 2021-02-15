<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/banner-logo/satu-pustaka.ico" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/template/admin/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini">

    <!-- Nabar & Sidebar -->
    <?= $this->include('admin/adminLayout/navbar') ?>
    <?= $this->include('admin/adminLayout/sidebar') ?>

    <!-- Main Content -->
    <?= $this->renderSection('konten'); ?>

    <footer class="main-footer">
        <strong>Copyright &copy; 2020 Macatongsir | Template By <a href="https://adminlte.io">AdminLTE.io</a>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/template/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="/template/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/template/admin/dist/js/adminlte.min.js"></script>
    <!-- Summernote -->
    <script src="/template/admin/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/template/admin/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
        $(document).ready(function() {
            $('#isi-kegiatan').summernote({
                height: "600px",
                callbacks: {
                    onImageUpload: function(image) {
                        uploadImage(image[0]);
                    },
                    onMediaDelete: function(target) {
                        deleteImage(target[0].src);
                    }
                }
            });

            function uploadImage(image) {
                var data = new FormData();
                data.append("image", image);
                $.ajax({
                    url: '/admin/upload_image_artikel',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "POST",
                    success: function(url) {
                        $('#isi-kegiatan').summernote("insertImage", url);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }

            function deleteImage(src) {
                $.ajax({
                    data: {
                        src: src
                    },
                    type: "POST",
                    url: '/admin/delete_image_artikel',
                    cache: false,
                    success: function(response) {
                        console.log(response);
                    }
                });
            }
        })
    </script>
</body>

</html>