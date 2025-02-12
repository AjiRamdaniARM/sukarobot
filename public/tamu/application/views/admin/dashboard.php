<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= $title ?>
            <small><?= $subtitle ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><?= $title ?></li>
        </ol>
    </section>
    <?php
        date_default_timezone_set('Asia/Jakarta');
    ?>
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-maroon">
                    <div class="inner">
                        <h3>
                            <?php
                                echo $this->db->query('SELECT id FROM tb_tamu')->num_rows();
                            ?>
                        </h3>

                        <p>Total Tamu</p>
                    </div>
                    <div class="icon">
                        <div class="fa fa-book"></div>
                    </div>
                    <a href="<?= base_url('admin/tamu') ?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>
                            <?php
                                echo $this->db->query('SELECT id FROM tb_tamu WHERE jenisKelamin = "Laki-Laki" ')->num_rows();
                            ?>
                        </h3>

                        <p>Total Laki-Laki</p>
                    </div>
                    <div class="icon">
                        <div class="fa fa-male"></div>
                    </div>
                    <a href="<?= base_url('admin/tamu') ?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            <?php
                                echo $this->db->query('SELECT id FROM tb_tamu WHERE jenisKelamin = "Perempuan" ')->num_rows();
                            ?>
                        </h3>

                        <p>Total Perempuan</p>
                    </div>
                    <div class="icon">
                        <div class="fa fa-female"></div>
                    </div>
                    <a href="<?= base_url('admin/tamu') ?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-teal">
                    <div class="inner">
                        <h3>
                            <?php
                                echo $this->db->query('SELECT id FROM tb_user WHERE level="Administrator"')->num_rows();
                            ?>
                        </h3>

                        <p>Total Administrator</p>
                    </div>
                    <div class="icon">
                        <div class="fa fa-users"></div>
                    </div>
                    <a href="<?= base_url('admin/user') ?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <i class="fa fa-bar-chart-o"></i>

                      <h3 class="box-title">Grafik Kunjungan Tamu (<?= date('Y') ?>)</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="box-body">
                      <div id="bar-chart" style="height: 300px;"></div>
                    </div>
                    <!-- /.box-body-->
                </div>
            </div>
        </div>
    </section>
</div>