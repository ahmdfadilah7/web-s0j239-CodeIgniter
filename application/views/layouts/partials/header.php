<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="<?=base_url()?>">
            <span>
                <?= $setting->nama_website ?>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
                <li class="nav-item <?php if($this->uri->segment(1)==''){ echo 'active'; } ?>">
                    <a class="nav-link" href="<?=base_url()?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php if($this->uri->segment(1)=='about'){ echo 'active'; } ?>">
                    <a class="nav-link" href="<?=base_url('about')?>">
                        About Us
                    </a>
                </li>
                <li class="nav-item <?php if($this->uri->segment(1)=='mua'){ echo 'active'; } ?>">
                    <a class="nav-link" href="<?=base_url('mua')?>">
                        Make Up Artist
                    </a>
                </li>                
                <li class="nav-item <?php if($this->uri->segment(1)=='contact'){ echo 'active'; } ?>">
                    <a class="nav-link" href="<?= base_url('contact') ?>">Contact Us</a>
                </li>
            </ul>

            <div class="user_option">
                <?php
                    if($this->session->userdata('status_pelanggan') != 'login'){
                ?>
                    <a href="<?= base_url('login') ?>">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>
                            Login
                        </span>
                    </a>
                    <a href="<?= base_url('mua/login') ?>">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>
                            Login Make Up Artist
                        </span>
                    </a>
                <?php
                    } else {
                ?>
                    <a href="<?= base_url('cart') ?>">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    </a>
                    <a href="<?= base_url('profile') ?>">
                        <i class="fa fa-user"></i>
                        <span><?= $this->session->userdata('nama_pelanggan') ?></span>
                    </a>
                    <a href="<?= base_url('logout') ?>">
                        <i class="fa fa-sign-out"></i>
                        <span>Keluar</span>
                    </a>
                <?php
                    }
                ?>
            </div>

        </div>
    </nav>
</header>