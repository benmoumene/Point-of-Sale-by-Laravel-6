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
                    <a href="{{ route('profiles.view')  }}" class="nav-link {{($route=='profiles.view')? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Your Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profiles.password.view') }}" class="nav-link {{($route=='profiles.password.view')? 'active' : ''}}">
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
                    <a href="{{ route('categories.view')  }}" class="nav-link {{($route=='categories.view')? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Category</p>
                    </a>
                </li>
    </ul>
</nav>
