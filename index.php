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
        <section id="home">
            <h1> Một Vũ Trụ Mới.</h1>
            <p>
                Tìm Kiếm Thông Tin, Khám Phá Vũ Trụ Giả Tưởng Đầy Huyền Bí <br>
                Cùng Cốt Truyện Tuyệt Vời, Những Nhân Vật Mạnh Mẽ Đang Chờ Đợi.
            </p>
            <form class="form-inline" action="#">
                <input class="form-control mr-sm-2 mb-3" type="text" placeholder="Bạn Đang Tìm Gì??" size="50px">
                <button class="btn btn-primary" type="submit" style="width: 100%">
                    <i class="fa-solid fa-magnifying-glass fa-beat-fade"></i>
                </button>
            </form>
        </section>

        <section class="mb-3">
            <div class="container py-5">
                <h2 class="text-center font-color"><i class="fa-solid fa-list" style="font-size: 40px;"></i> CẬP NHẬT TIN TỨC NGAY.</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
                    <?php foreach ($news_list as $news): ?>
                        <form action="newsInfo.php" method="GET">
                            <input type="hidden" name="news_id" value="<?php echo $news['newsID']; ?>">
                            <div class="col h-100">
                                <div class="card h-100">
                                    <img src="<?php echo $news['newsImage']; ?>" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <a href="newsInfo.php?news_id=<?php echo $news['newsID']; ?>"><h5 class="card-title"><?php echo $news['newsName']; ?></h5></a>
                                    </div>
                                    
                                </div>
                            </div>
                        </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>       


        <section class="mb-3">
            <div class="f5f6fa-bg-color">
                <h2 class="text-center font-color"><i class="fa-solid fa-earth-americas" style="font-size: 36px;"></i> KHÁM PHÁ NGAY VŨ TRỤ MỚI</h2>
                <div class="row d-flex justify-content-center align-items-center text-center font-color py-5">
                    <div class="col-sm-9 p-3 mb-5">
                        <img src="image/cybertron.jpg" class="img-item img-fluid" alt="">
                        <p class="card-text">Trong thế giới của Transformers, từ xa xưa tồn tại một thực thể giống như đấng tạo hóa, 
                            gọi là The One, vị thần này đã tạo ra 3 thực thể bao gồm Quintessa cùng với 2 song sinh là Unicron và Primus.
                         Unicron và Primus, Quintessa còn được gọi là "the Creator" (Đấng Tạo Hóa) – người tạo ra các Transformers. 
                        Trong đó Primus là người tạo ra 13 vị Prime (Hiệp sĩ Cybertron), những vị tổ tiên xa xưa của robot biến hình 
                        Transformers, mà Optimus Prime là một trong những hậu duệ và cũng là vị Prime cuối cùng còn sống sót. 
                        Ngược lại với Primus, Unicron lại là bản thể hung ác, đại diện cho hỗn mang trong vũ trụ. Unicron có kích 
                        thước vô cùng khổng lồ và có thể biến hình thành một hành tinh, chuyên đi tiêu diệt và ăn những hành tinh 
                        khác, hắn từng ăn hết hơn 20% số hành tinh tồn tại trong vũ trụ.<br>
                        Trái Đất thực ra là lớp vỏ bọc của Unicron, một thực thể mà chẳng mấy chốc sẽ hút cạn sinh lực của hành tinh Cybertron.
                        Unicron là lõi của Trái Đất. Unicron được mệnh danh là "Thần Hỗn Loạn", hắn sinh tồn bằng cách nuốt chửng những hành tinh
                        có sự sống. Đây là một transformer cổ xưa có kích thước khổng lồ, với khả năng biến thân thành một hành tinh kim loại. 
                        Unicron cũng là một trong những kẻ thù nổi tiếng nhất của Optimus Prime.</p>
                    </div>
                    <div class="col-3 p-3 mb-5 mr-3">
                        <img src="image/optimus.jpg" class="img-char" style=" margin-right: 100px img-fluid" alt="">
                        <p class="card-text">OPTIMUS PRIME <br>
                        Optimus là thủ lĩnh của Autobot, một phe của Transformers là đối thủ của Decepticon, một phe khác.
                     </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-3">
            <div class="f5f6fa-bg-color">
                <h2 class="text-center font-color"><i class="fa-solid fa-fire" style="font-size: 36px;"></i> NHÂN VẬT TIÊU BIỂU </h2>
                <div class="row d-flex justify-content-around align-items-center text-center font-color py-5">                                                   
                    <?php foreach ($nv_list as $nv): ?>
                        <div class="col-2">
                            <img src="<?php echo $nv['AnhNv']; ?>" class="img-char-item" alt="">
                            <a href="characterInfo.php?nv_id=<?php echo $nv['IDnv']; ?>" class="card-text name-color"> <?php echo $nv['TenNv']; ?> </a>
                        </div>
                    <?php endforeach; ?>                    
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