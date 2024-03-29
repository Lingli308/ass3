
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product Page</title>

    <!-- Custom fonts for this template-->
<!--    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">-->
    <?= $this->Html ->css('/vendor/fontawesome-free/css/all.min.css')  ?>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
<!--    <link href="css/sb-admin-2.min.css" rel="stylesheet">-->
    <?= $this->Html ->css('/css/sb-admin-2.min.css')  ?>

</head>

<header class="sticky-footer bg-dark">
    <div class="container my-auto">
        <div class="header text-left my-auto">
            <h3>FAMOX CHARITY</h3>
        </div>
    </div>
</header>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">


            <!-- Begin Page Content -->
            <div class="container-fluid">

            <?php echo $this -> fetch('content')?>
            <!-- /.container-fluid -->

            </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2019</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Bootstrap core JavaScript-->
<!--<script src="vendor/jquery/jquery.min.js"></script>-->
    <?= $this->Html ->css('/vendor/jquery/jquery.min.js')  ?>

<!--<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
    <?= $this->Html ->css('/vendor/bootstrap/js/bootstrap.bundle.min.js')  ?>

<!-- Core plugin JavaScript-->
<!--<script src="vendor/jquery-easing/jquery.easing.min.js"></script>-->
    <?= $this->Html ->css('/vendor/jquery-easing/jquery.easing.min.js')  ?>

<!-- Custom scripts for all pages-->
<!--<script src="js/sb-admin-2.min.js"></script>-->
    <?= $this->Html ->css('/js/sb-admin-2.min.js')  ?>
<!-- Page level plugins -->
<!--<script src="vendor/chart.js/Chart.min.js"></script>-->
    <?= $this->Html ->css('/vendor/chart.js/Chart.min.js')  ?>

<!-- Page level custom scripts -->
<!--<script src="js/demo/chart-area-demo.js"></script>-->
    <?= $this->Html ->css('/js/demo/chart-area-demo.js')  ?>
<!--<script src="js/demo/chart-pie-demo.js"></script>-->
    <?= $this->Html ->css('/js/demo/chart-pie-demo.js')  ?>

</body>

</html>
