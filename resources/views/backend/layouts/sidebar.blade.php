@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('home')  }}" class="nav-link {{($route=='home')? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <!-- Add icons to the links using the -->
        @if (Auth::user()->usertype == 'Admin')
        <li class="nav-item">
            <a href="{{ route('users.view')  }}" class="nav-link {{($route=='users.view')? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Users</p>
            </a>
        </li>
        @endif
        <li class="nav-item has-treeview {{($prefix=='/profiles')? 'menu-open' : ''}}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Profile
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('profiles.view')  }}"
                        class="nav-link {{($route=='profiles.view')? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Your Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profiles.password.view') }}"
                        class="nav-link {{($route=='profiles.password.view')? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Change Password</p>
                    </a>
                </li>
            </ul>
        </li>
        {{--        manage suppliers        --}}
        <li class="nav-item">
            <a href="{{ route('suppliers.view')  }}" class="nav-link {{($route=='suppliers.view')? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Suppliers</p>
            </a>
        </li>
        {{--        customer management        --}}
        <li class="nav-item">
            <a href="{{ route('customers.view')  }}" class="nav-link {{($route=='customers.view')? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Customers</p>
            </a>
        </li>
        {{--        units management        --}}
        <li class="nav-item">
            <a href="{{ route('units.view')  }}" class="nav-link {{($route=='units.view')? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Units</p>
            </a>
        </li>
        {{--        category management        --}}

        <li class="nav-item">
            <a href="{{ route('categories.view') }}" class="nav-link {{($route=='categories.view')? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Category</p>
            </a>
        </li>
        {{--        product  management        --}}

        <li class="nav-item">
            <a href="{{ route('products.view') }}" class="nav-link {{($route=='products.view')? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Products</p>
            </a>
        </li>
        {{--        purchase  management        --}}
        <li class="nav-item has-treeview {{($prefix=='/purchase')? 'menu-open' : ''}}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Purchase
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('purchase.view')  }}"
                        class="nav-link {{($route=='purchase.view')? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Purchase</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('purchase.pending.list') }}"
                        class="nav-link {{($route=='purchase.pending.list')? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Approval Purchase</p>
                    </a>
                </li>
            </ul>
        </li>
        {{--        Invoice  management        --}}
        <li class="nav-item has-treeview {{($prefix=='/invoice')? 'menu-open' : ''}}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Invoice
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('invoice.view')  }}" class="nav-link {{($route=='invoice.view')? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Invoice</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('invoice.pending.list') }}"
                        class="nav-link {{($route=='invoice.pending.list')? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Approval Invoice</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('invoice.print.list') }}"
                        class="nav-link {{($route == 'invoice.print.list')? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Print Invoice</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('inovice.dailyReport') }}"
                        class="nav-link {{($route == 'inovice.dailyReport')? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Daily Invoice Report</p>
                    </a>
                </li>
            </ul>
        </li>
        {{--        Stock report  management        --}}
        <li class="nav-item has-treeview {{($prefix == '/stock')? 'menu-open' : ''}}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Stock
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('stock.report') }}" class="nav-link {{($route == 'stock.report')? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Stock Report</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('stock.report.supplier.product.wish') }}" class="nav-link {{($route == 'stock.report.supplier.product.wish')? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Supplier/Product Wish</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
