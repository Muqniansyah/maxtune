<?php $this->load->view("partial/v_header.php") ?>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php $this->load->view("partial/v_sidebar.php") ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <?php $this->load->view("partial/v_topbar.php") ?>

            <!-- Main Content -->
            <div id="content">
                <div class="container-fluid mt-5">
                    <?php
                        if (!empty('content/v_profile')): 
                            $this->load->view('content/v_profile'); 
                        else: 
                            echo ('Halaman tidak ditemukan'); 
                        endif; 
                    ?>
                </div>
                <?php $this->load->view("partial/v_footer.php") ?>
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Benar ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Ingin keluar dari dashboard?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href=" <?php echo base_url().'login' ?>">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view("partial/v_js.php") ?>
</body>
</html>