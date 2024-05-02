<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        {{-- <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div> --}}
        <div>
            <h4 class="logo-text">UWEFlix</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">

        <li>
            <a href="javascript:;" class="has-arrow">
                {{-- <div class="parent-icon"><i class="bx bx-category"></i>
                </div> --}}
                <div class="menu-title">Manage Users</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.user') }}"><i class='bx bx-radio-circle'></i>All Users</a>
                </li>
                <li> <a href="{{ route('add.user') }}"><i class='bx bx-radio-circle'></i>Add User</a>
                </li>
            </ul>

            <a href="javascript:;" class="has-arrow">
                {{-- <div class="parent-icon"><i class="bx bx-category"></i>
                </div> --}}
                <div class="menu-title">Manage Clubs</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.club') }}"><i class='bx bx-radio-circle'></i>All Clubs</a>
                </li>
                <li> <a href="{{ route('add.club') }}"><i class='bx bx-radio-circle'></i>Add Club</a>
                </li>
            </ul>
            <a href="javascript:;" class="has-arrow">
                {{-- <div class="parent-icon"><i class="bx bx-category"></i>
                </div> --}}
                <div class="menu-title">Manage Movies</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.movie') }}"><i class='bx bx-radio-circle'></i>All Movies</a>
                </li>
                <li> <a href="{{ route('add.movie') }}"><i class='bx bx-radio-circle'></i>Add Movie</a>
                </li>
            </ul>
        </li>


        <!--end navigation-->
</div>