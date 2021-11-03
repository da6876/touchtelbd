<?php

$route = Route::current()->getName();

$userType = Session::get('user_type_id');
?>
<div class="left main-sidebar">

    <div class="sidebar-inner leftscroll">

        <div id="sidebar-menu">


            @if ($userType =='11110000')

                <ul>

                    <li class="submenu">
                        <a class="" href="{{url('Home')}}"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="{{url('RegulerSell')}}" class=""><i class="fa fa-users bigfonts"></i> <span> Regular Sell </span> <span class="menu-arrow"></span></a>
                    </li>
                    <li class="submenu">
                        <a href="#" class=""><i class="fa fa-gift bigfonts"></i> <span>Product Setup</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled" >
                            <li class=""><a href="{{url('ProductType')}}"><i class="fa fa-asl-interpreting bigfonts"></i> Product Type</a></li>
                            <li class=""><a href="{{url('CategoriesInfo')}}"><i class="fa fa-certificate bigfonts"></i> Category</a></li>
                            <li class=""><a href="{{url('AddProduct')}}"><i class="fa fa-cube bigfonts"></i> Add Product</a></li>
                            <li class=""><a href="{{url('ProductInfo')}}"><i class="fa fa-cube bigfonts"></i> Product Info</a></li>
                            <li class=""><a href="{{url('CustomerInfo')}}"><i class="fa fa-cube bigfonts"></i> Customer Info</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#" class=""><i class="fa fa-users bigfonts"></i> <span>User Config  </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled" >
                            <li class=""><a href="{{url('UserTypeInfo')}}"><i class="fa fa-vcard bigfonts"></i> User Type</a></li>
                            <li class=""><a href="{{url('UserInfo')}}"><i class="fa fa-user-o bigfonts"></i> User Info</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#" class=""><i class="fa fa-hourglass-half bigfonts"></i> <span>Stock Manage </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled" >
                            <li class=""><a href="{{url('ProductStockInfo')}}"><i class="fa fa-hourglass-start bigfonts"></i>Product Stock</a></li>
                            <li class=""><a href="{{url('ProductStock')}}"><i class="fa fa-hourglass-start bigfonts"></i>Add Stock</a></li>
                            <li class=""><a href="{{url('ProductStockBulk')}}"><i class="fa fa-hourglass-start bigfonts"></i>Bulk Add Stock</a></li>
                        </ul>
                    </li>


                    <li class="submenu">
                        <a href="{{url('PasswordCheck')}}" class=""><i class="fa fa-users bigfonts"></i> <span>Check Password </span> <span class="menu-arrow"></span></a>
                    </li>


                    <li class="submenu">
                        <a href="#" class=""><i class="fa fa-list-ol bigfonts"></i> <span>Report </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled" >
                            <li class=""><a href="#"><i class="fa fa-file-text-o bigfonts"></i> Distributor Stock</a></li>
                            <li class=""><a href="#"><i class="fa fa-file-text bigfonts"></i> Distributor List</a></li>
                            <li class=""><a href="#"><i class="fa fa-file-text-o bigfonts"></i> Total Stock</a></li>
                            <li class=""><a href="#"><i class="fa fa-file-text bigfonts"></i> Product List</a></li>
                            <li class=""><a href="#"><i class="fa fa-file-text-o bigfonts"></i> Outlet List</a></li>
                        </ul>
                    </li>

                </ul>

            @elseif($userType =='11110001')

                <ul>

                    <li class="submenu">
                        <a class="" href="{{url('Home')}}"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="{{url('RegulerSell')}}" class=""><i class="fa fa-users bigfonts"></i> <span> Regular Sell </span> <span class="menu-arrow"></span></a>
                    </li>
                    <li class="submenu">
                        <a href="#" class=""><i class="fa fa-gift bigfonts"></i> <span>Product Setup</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled" >
                            <li class=""><a href="{{url('ProductType')}}"><i class="fa fa-asl-interpreting bigfonts"></i> Product Type</a></li>
                            <li class=""><a href="{{url('CategoriesInfo')}}"><i class="fa fa-certificate bigfonts"></i> Category</a></li>
                            <li class=""><a href="{{url('AddProduct')}}"><i class="fa fa-cube bigfonts"></i> Add Product</a></li>
                            <li class=""><a href="{{url('ProductInfo')}}"><i class="fa fa-cube bigfonts"></i> Product Info</a></li>
                            <li class=""><a href="{{url('CustomerInfo')}}"><i class="fa fa-cube bigfonts"></i> Customer Info</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#" class=""><i class="fa fa-users bigfonts"></i> <span>User Config  </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled" >
                            <li class=""><a href="{{url('UserInfo')}}"><i class="fa fa-user-o bigfonts"></i> User Info</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#" class=""><i class="fa fa-hourglass-half bigfonts"></i> <span>Stock Manage </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled" >
                            <li class=""><a href="{{url('ProductStockInfo')}}"><i class="fa fa-hourglass-start bigfonts"></i>Product Stock</a></li>
                            <li class=""><a href="{{url('ProductStock')}}"><i class="fa fa-hourglass-start bigfonts"></i>Add Stock</a></li>
                            <li class=""><a href="{{url('ProductStockBulk')}}"><i class="fa fa-hourglass-start bigfonts"></i>Bulk Add Stock</a></li>
                        </ul>
                    </li>


                    <li class="submenu">
                        <a href="#" class=""><i class="fa fa-list-ol bigfonts"></i> <span>Report </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled" >
                            <li class=""><a href="#"><i class="fa fa-file-text-o bigfonts"></i> Distributor Stock</a></li>
                            <li class=""><a href="#"><i class="fa fa-file-text bigfonts"></i> Distributor List</a></li>
                            <li class=""><a href="#"><i class="fa fa-file-text-o bigfonts"></i> Total Stock</a></li>
                            <li class=""><a href="#"><i class="fa fa-file-text bigfonts"></i> Product List</a></li>
                            <li class=""><a href="#"><i class="fa fa-file-text-o bigfonts"></i> Outlet List</a></li>
                        </ul>
                    </li>

                </ul>
            @elseif($userType =='11110002')

                <ul>

                    <li class="submenu">
                        <a class="" href="{{url('Home')}}"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="{{url('RegulerSell')}}" class=""><i class="fa fa-users bigfonts"></i> <span> Regular Sell </span> <span class="menu-arrow"></span></a>
                    </li>

                    <li class="submenu">
                        <a href="#" class=""><i class="fa fa-list-ol bigfonts"></i> <span>Report </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled" >
                            <li class=""><a href="#"><i class="fa fa-file-text-o bigfonts"></i> Distributor Stock</a></li>
                            <li class=""><a href="#"><i class="fa fa-file-text bigfonts"></i> Distributor List</a></li>
                            <li class=""><a href="#"><i class="fa fa-file-text-o bigfonts"></i> Total Stock</a></li>
                            <li class=""><a href="#"><i class="fa fa-file-text bigfonts"></i> Product List</a></li>
                            <li class=""><a href="#"><i class="fa fa-file-text-o bigfonts"></i> Outlet List</a></li>
                        </ul>
                    </li>

                </ul>

            @endif


            <div class="clearfix"></div>

        </div>

        <div class="clearfix"></div>

    </div>

</div>



