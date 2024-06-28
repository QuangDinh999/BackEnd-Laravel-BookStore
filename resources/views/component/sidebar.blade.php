<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="index-2.html"><img src="img/logo.png" alt></a>
        <a class="small_logo" href="index-2.html"><img src="img/mini_logo.png" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/dashboard.svg" alt>
                </div>
                <div class="nav_title">
                    <span>User Management </span>
                </div>
            </a>
            <ul>
                <li><a href="index_2.html">Default</a></li>
                <li><a href="index_3.html">Dark Sidebar</a></li>
                <li><a href="index-2.html">Light Sidebar</a></li>
            </ul>
        </li>
        <li class>
            <a onclick="LoadPage('category')" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/2.svg" alt>
                </div>
                <div class="nav_title">
                    <span>Categories </span>
                </div>
            </a>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/3.svg" alt>
                </div>
                <div class="nav_title">
                    <span>Pages</span>
                </div>
            </a>
            <ul>
                <li><a href="login.html">Login</a></li>
                <li><a href="resister.html">Register</a></li>
                <li><a href="error_400.html">Error 404</a></li>
                <li><a href="error_500.html">Error 500</a></li>
                <li><a href="forgot_pass.html">Forgot Password</a></li>
                <li><a href="gallery.html">Gallery</a></li>
            </ul>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/4.svg" alt>
                </div>
                <div class="nav_title">
                    <span>Admins</span>
                </div>
            </a>
            <ul>
                <li><a href="admin_list.html">Admin List</a></li>
                <li><a href="add_new_admin.html">Add New Admin</a></li>
            </ul>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/11.svg" alt>
                </div>
                <div class="nav_title">
                    <span>Role & Permissions</span>
                </div>
            </a>
            <ul>
                <li><a href="module_setting.html">Module Setting</a></li>
                <li><a href="role_permissions.html">Role & Permissions</a></li>
            </ul>
        </li>
        <li class>
            <a href="navs.html" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/12.svg" alt>
                </div>
                <div class="nav_title">
                    <span>Navs</span>
                </div>
            </a>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/5.svg" alt>
                </div>
                <div class="nav_title">
                    <span>Users</span>
                </div>
            </a>
            <ul>
                <li><a href="user_list.html">Users List</a></li>
                <li><a href="add_new_user.html">Add New User</a></li>
            </ul>
        </li>
        <li>
            <a href="Builder.html" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/6.svg" alt>
                </div>
                <div class="nav_title">
                    <span>Builder </span>
                </div>
            </a>
        </li>
        <li class>
            <a href="invoice.html" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/7.svg" alt>
                </div>
                <div class="nav_title">
                    <span>Invoice</span>
                </div>
            </a>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/13.svg" alt>
                </div>
                <div class="nav_title">
                    <span>Products</span>
                </div>
            </a>
            <ul>
                <li><a href="Products.html">Products</a></li>
                <li><a href="Product_Details.html">Product Details</a></li>
                <li><a href="Cart.html">Cart</a></li>
                <li><a href="Checkout.html">Checkout</a></li>
            </ul>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/17.svg" alt>
                </div>
                <div class="nav_title">
                    <span>Table</span>
                </div>
            </a>
            <ul>
                <li><a href="data_table.html">Data Tables</a></li>
                <li><a href="bootstrap_table.html">Bootstrap</a></li>
            </ul>
        </li>

    </ul>
</nav>


<script>
    function LoadPage(page) {
        var table = document.querySelector('#table-content')
        switch (page) {
            case 'category':
                $.ajax({
                    url: 'http://localhost/PHP_Book_Laravel-main/public/api/categories', // Địa chỉ URL bạn muốn gửi yêu cầu
                    type: 'GET', // Loại yêu cầu (GET, POST, PUT, DELETE, v.v.)
                    success: function (response) {
                        // Xử lý phản hồi thành công
                        console.log(response);
                        var result = response.map(function (category, index){
                            return `
                                        <tr>
                                            <td>${category.id}</td>
                                            <td>${category.name}</td>
                                            <td><a href="#" class="status_btn">Active</a></td>
                                        </tr>
                                        `
                        })
                        var thead = `
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Active</th>
                                        </tr>
                                    </thead>`;


                        var tablehtml = thead + `<tbody>`+ result.join('') +`</tbody>`
                        table.innerHTML = tablehtml;
                    },
                    error: function (xhr, status, error) {
                        // Xử lý lỗi
                        console.error(status + ': ' + error);
                    }
                })
                break;
            default:
                break;
        }
    }
</script>
