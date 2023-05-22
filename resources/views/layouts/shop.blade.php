<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- JQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/bootstrap/bootstrap-4/js/jquery-3.2.1.slim.min.js"></script>
    <script src="assets/bootstrap/bootstrap-4/js/popper.min.js"></script>
    <script src="assets/bootstrap/bootstrap-4/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div id="wraper">
        {{-- Header --}}
        <div id="header" class="mb-3 bg-dark">
            <div class="container">
                <div class="row">
                    <div class="py-2 text-white col-md-4 text-bold">
                        <a href="{{ url('/') }}">
                            <h2>LOGO</h2>
                        </a>
                    </div>
                    <div class="py-2 text-white col-md-4 text-bold">
                        <form id="searchForm" class="form-group d-flex" method="GET">
                            <input
                                type="text"
                                id="searchInput"
                                class="form-control"
                                value=""
                                placeholder="Search here..."
                            />
                            <button type="submit" class="submit ml-2 btn btn-primary">search</button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ url('cart/show') }}" class="float-right py-2 d-block text-danger">Giỏ hàng<span class="text-success">({{ Cart::count() }})</span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header -->
        <div id="wp-content">
            {{-- Nội dung thay đổi (lấy nội dung của con) --}}
            @yield('content')
        </div>
        {{-- Footer --}}
        <div id="footer" class="mt-3 text-center bg-secondary text-warning">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h5>FOOTER - COPYRIGHT</h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- end wp-content -->
    </div>
    <script type="text/javascript">
        $(document).ready(() => {
            $('#searchForm').submit((e) => {
                e.preventDefault();
                let keyword = $('#searchInput').val();
                if (keyword && keyword !== null) {
                    $.ajax({
                        url     : "{{ route('product.search') }}",
                        method  : 'GET',
                        data    : {keyword: keyword},
                        success  : (response, status) => {
                            // console.log('check data     :', response);
                            // console.log('check status   :', status);
                            // Lưu trữ danh sách sản phẩm ban đầu
                            let originalProducts = $('.list-product .row').html();
                            let products = response.products;
                            let banners = response.banners;
                            console.log('check banners :', banners);
                            console.log('check banners :', banners.image);
                            // Xóa sản phẩm hiện có
                            $('.list-product .row').empty();
                            // Kiểm tra sản phẩm tồn tại chưa và có dữ liệu không
                            if (products && products.length > 0) {
                                // Hiển thị sản phẩm tìm kiếm được
                                $.each(products, (index, product) => {
                                    let productHTML = `
                                        <div class="col-md-3 col-sm-4 col-6 mb-3">
                                            <div class="product-item border py-2">
                                                <div class="product-thumb">
                                                    <a href="">
                                                        <img class="img-fluid" src="{{ asset('${product.thumbnail}') }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-info p-2 text-center">
                                                    <a class="product-title" href="">${product.name}</a>
                                                    <div class="price-box">
                                                        <span class="current-price text-danger">${product.price}</span>
                                                    </div>
                                                    <a href="{{ url('cart/add/${product.id}') }}" class="btn btn-outline-danger btn-sm mt-3 add-to-cart">Thêm vào giỏ hàng</a>
                                                </div>
                                            </div>
                                        </div>`;
                                    $('.list-product .row').append(productHTML);
                                });
                            } else {
                                $('.list-product .row').append('<div class="text-danger">Không tìm thấy sản phẩm nào !</div>');
                            }
                            $('#list-banner').empty();
                            if (Array.isArray(banners) && banners.length > 0) {
                                // Thực hiện vòng lặp và hiển thị banner
                                $.each(banners, (index, banner) => {
                                    let bannerHTML = `
                                    <div class="text-danger">
                                        <p>${banner.image}</p>
                                    </div>`;
                                    $('#list-banner').append(bannerHTML);
                                });
                            } else {
                                // Hiển thị thông báo không có banner
                                $('#list-banner').append('<div class="text-danger">Không có banner nào!</div>');
                            }
                        }
                    });
                } else {
                    console.log("Can not call API from method GET");
                }
            });
        });
    </script>
</body>

</html>
