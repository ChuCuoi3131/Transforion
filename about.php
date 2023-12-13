<?php
    session_start();
    require("model/connectdb.php");
    require("model/menudb.php");
    require("model/newsdb.php");
    require("model/characterdb.php");
    $menu_list = get_menu();
    $news_list = get_news();
    $nv_list = get_nhanvat();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transforion!</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/swiper@11.0.4/swiper-bundle.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/73d99ea241.js" crossorigin="anonymous"></script>

</head>
<body>
    <header>
        <div class="navbar">
        
            <div class="logo"><a href="index.php">TRANSFORION</a></div>
            <ul class="links">
                <?php foreach ($menu_list as $menu): ?>
                <li><a href="<?php echo $menu['menuURL']; ?>"><?php echo $menu['TenMenu']; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <ul class="links">
                <?php if (isset($_COOKIE['username'])): ?>                    
                    <li><a href="#" class="links"><?php echo $_COOKIE['username']; ?></a></li>
                    <li><a href="logout.php" class="action_btn">Đăng xuất</a></li>
                <?php else: ?>                   
                    <li><a href="login.php" class="action_btn">Đăng nhập</a></li>
                <?php endif; ?>
            </ul>
            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>

        <div class="dropdown_menu">
            <?php foreach ($menu_list as $menu): ?>
            <li><a href="<?php echo $menu['menuURL']; ?>"><?php echo $menu['TenMenu']; ?></a></li>
            <?php endforeach; ?>
            <?php if (isset($_COOKIE['username'])): ?>
                <li><a href="#" class="links"><?php echo $_COOKIE['username']; ?></a></li>
                <li><a href="logout.php" class="action_btn">Đăng xuất</a></li>
            <?php else: ?>
                <li><a href="login.php" class="action_btn">Đăng nhập</a></li>
            <?php endif; ?>
        </div>
    </header>

    <main>

    <section class="mb-3">
            <div class="container py-5">
                <div class="title">
                    <h1><i class="fa-solid fa-code" style="font-size: 36px;"></i> Đội ngũ phát triển</h1>
                </div>
                <div class="sub-container">
                    <div class="teams">
                        <img src="image/p1.jpg" alt="">
                        <div class="name">Nguyễn Duy Phong</div>
                        <div class="role">Developer</div>
                        <div class="about">
                            22MC - 22IT217 - VKU<br>
                            <i class="fa-solid fa-location-dot"></i> Nghệ An, Việt Nam<br>
                        </div>
                        <div class="social-links">
                            <a href="" class="card-title"><i class="fa-brands fa-facebook" style="position:unset;transform:none;"></i></a>
                            <a href="" class="card-title"><i class="fa-brands fa-instagram" style="position:unset;transform:none;"></i></a>
                            <a href="" class="card-title"><i class="fa-brands fa-twitter" style="position:unset;transform:none;"></i></a>
                            <a href="" class="card-title"><i class="fa-brands fa-github" style="position:unset;transform:none;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>        

        <div class="container">
            <footer class="py-5">
                <div class="row">
                    <div class="col-3">
                        <a href="index.php" class="links">
                            <h5 class="text-primary">TRANSFORION </h5>
                        </a>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"> Tận Hưởng Thời Gian Của Bạn!</li>
                        </ul>
                    </div>

                    <div class="col-2">
                        <h5 class="text-primary">Menu</h5>
                        <ul class="nav flex-column">
                            <?php foreach ($menu_list as $menu) : ?>
                                <li class="nav-item mb-2"><a href="<?php echo $menu['menuURL']; ?>" class="nav-link p-0 text-muted"><?php echo $menu['TenMenu']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="col-2">
                        <h5 class="text-primary">Bạn có thể hứng thú.</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="https://toyz.vn/categories/transformer" class="nav-link p-0 text-muted">Mô Hình Độc Lạ Bình Dương.</a></li>
                            <li class="nav-item mb-2"><a href="https://shop.hasbro.com/en-us/transformers" class="nav-link p-0 text-muted">Đồ Chơi Transformer.</a></li>
                            <li class="nav-item mb-2"><a href="https://phimmoi.io/?search=transformer" class="nav-link p-0 text-muted">Xem Phim Ngay.</a></li>
                        </ul>
                    </div>

                    <div class="col-4 offset-1">
                        <form>
                            <h5>Đăng ký nhận thông báo tại đây</h5>
                            <p>Thông báo hàng tháng về những điều mới lạ và thú vị.</p>
                            <div class="d-flex w-100 gap-2">
                                <label for="newsletter1" class="visually-hidden">Email address</label>
                                <input id="newsletter1" type="text" class="form-control" placeholder="Type your email address here...">
                                <button class="btn btn-primary" type="button">Theo dõi</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-flex justify-content-between py-4 my-4 border-top">
                    <p>&copy; <?php echo date("Y"); ?> TRANSFORION, Inc. All rights reserved.</p>
                </div>
            </footer>
        </div>
    </main>

    <script>
        const toggleBtn = document.querySelector('.toggle_btn');
        const toggleBtnIcon = document.querySelector('.toggle_btn i');
        const dropDownMenu = document.querySelector('.dropdown_menu');

        toggleBtn.onclick = function() {
            dropDownMenu.classList.toggle('open');
            const isOpen = dropDownMenu.classList.contains('open');
            toggleBtnIcon.classList = isOpen ?
                'fa-solid fa-xmark' :
                'fa-solid fa-bars'
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11.0.4/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>