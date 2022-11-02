            <!-- wrapper-->
            <div id="wrapper">
                <!-- content-->
                <div class="content">
                    <!--  section  -->
                    <section class="parallax-section dashboard-header-sec gradient-bg" data-scrollax-parent="true">
                        <div class="container">
                            <div class="dashboard-breadcrumbs breadcrumbs"><a href="#">Halaman Utama</a>
                                <span>Profile</span>
                            </div>
                            <div class="dashboard-header_conatiner fl-wrap dashboard-header_title">
                                <h1>Selamat Datang : <span>

                                        <?php


                                        $nama = "Admin";
                                        if ($this->session->userdata('sess_level') == "customer") {

                                            $nama = $this->session->userdata('sess_name');
                                        }

                                        echo $nama;
                                        ?>

                                    </span></h1>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="dashboard-header fl-wrap">
                            <div class="container">
                                <div class="dashboard-header_conatiner fl-wrap">
                                    <div class="dashboard-header-avatar">
                                        <img src="<?php echo base_url('assets/images/5.png')  ?>" alt="Foto sampul">
                                        <a href="<?php echo base_url('user/setting') ?>" class="color-bg edit-prof_btn"><i class="fal fa-edit"></i></a>
                                    </div>
                                    <div class="dashboard-header-stats-wrap">
                                        <div class="dashboard-header-stats">
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                    <!--  dashboard-header-stats-item -->

                                                    <div class="swiper-slide">
                                                        <div class="dashboard-header-stats-item">
                                                            <i class="fal fa-comments-alt"></i>
                                                            Total Pesanan
                                                            <span><?php echo $this->db->get_where('data_sewa', array('nama' => $this->session->userdata('sess_name')))->num_rows()  ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="gradient-bg-figure" style="right:-30px;top:10px;"></div>
                        <div class="gradient-bg-figure" style="left:-20px;bottom:30px;"></div>
                        <div class="circle-wrap" style="left:120px;bottom:120px;" data-scrollax="properties: { translateY: '-200px' }">
                            <div class="circle_bg-bal circle_bg-bal_small"></div>
                        </div>
                        <div class="circle-wrap" style="right:420px;bottom:-70px;" data-scrollax="properties: { translateY: '150px' }">
                            <div class="circle_bg-bal circle_bg-bal_big"></div>
                        </div>
                        <div class="circle-wrap" style="left:420px;top:-70px;" data-scrollax="properties: { translateY: '100px' }">
                            <div class="circle_bg-bal circle_bg-bal_big"></div>
                        </div>
                        <div class="circle-wrap" style="left:40%;bottom:-70px;">
                            <div class="circle_bg-bal circle_bg-bal_middle"></div>
                        </div>
                        <div class="circle-wrap" style="right:40%;top:-10px;">
                            <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
                        </div>
                        <div class="circle-wrap" style="right:55%;top:90px;">
                            <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
                        </div>
                    </section>
                    <!--  section  end-->
                    <!--  section  -->
                    <section class="gray-bg main-dashboard-sec" id="sec1">
                        <div class="container">
                            <!--  dashboard-menu-->
                            <div class="col-md-3">
                                <div class="mob-nav-content-btn color2-bg init-dsmen fl-wrap"><i class="fal fa-bars"></i> Dashboard menu</div>
                                <div class="clearfix"></div>
                                <div class="fixed-bar fl-wrap" id="dash_menu">
                                    <div class="user-profile-menu-wrap fl-wrap block_box">
                                    </div>
                                </div>
                                <a class="back-tofilters color2-bg custom-scroll-link fl-wrap" href="<?php echo base_url() ?>">Back to Menu<i class="fas fa-caret-up"></i></a>
                                <div class="clearfix"></div>
                            </div>

                            <div class="col-md-9">


                            </div>
                        </div>
                    </section>
                    <div class="limit-box fl-wrap"></div>
                </div>
                <!--content end-->
            </div>
            <!-- wrapper end-->