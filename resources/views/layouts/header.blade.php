<!-- header start -->
    <div class="header">
        <div class="row g-0 align-items-center">
            <div class="col-xxl-6 col-xl-5 col-4 d-flex align-items-center gap-20">
                <div class="main-logo d-lg-block d-none">
                    <div class="logo-big">
                    <meta name="csrf-token" content="{{ csrf_token() }}">

                        <a href="{{get_dashboard()}}">
                            <img src="{{asset('assets/images/PrakharNEWLogo.png')}}" alt="Logo" width="105px" class="mt-1">
                        </a>
                    </div>
                    <div class="logo-small">
                        <a href="{{get_dashboard()}}">
                            <img src="{{asset('assets/images/PrakharNEWLogo.png')}}" alt="Logo" width="105px" class="mt-1">
                        </a>
                    </div>
                    <div>
                    
                    </div>
                </div>
                <div class="nav-close-btn">
                    <button id="navClose"><i class="fa-light fa-bars-sort"></i></button>
                </div>
            </div>
            <div class="col-4 d-lg-none">
                <div class="mobile-logo">
                    <a href="{{get_dashboard()}}">
                        <img src="{{asset('assets/images/PrakharNEWLogo.png')}}" alt="Logo" width="70px">
                    </a>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-7 col-lg-8 col-4">
                <div class="header-right-btns d-flex justify-content-end align-items-center">
                    <div class="header-collapse-group">
                        <div class="header-right-btns d-flex justify-content-end align-items-center p-0">
                           <!--  <form class="header-form">
                                <input type="search" name="search" placeholder="Search..." required>
                                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form> -->
                            <div class="header-right-btns d-flex justify-content-end align-items-center p-0">
                                <!-- Language Icon -->
                               <!--  <div class="lang-select">
                                    <span>Language:</span>
                                    <select>
                                        <option value="">EN</option>
                                    </select>
                                </div> -->

                                <!-- Message icon -->
                                <!-- <div class="header-btn-box">
                                    <button class="header-btn" id="messageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-light fa-comment-dots"></i>
                                        <span class="badge bg-danger">3</span>
                                    </button>
                                    <ul class="message-dropdown dropdown-menu" aria-labelledby="messageDropdown">
                                        <li>
                                            <a href="#" class="d-flex">
                                                <div class="avatar">
                                                    <img src="{{asset('assets/images/avatar.png')}}" alt="image">
                                                </div>
                                                <div class="msg-txt">
                                                    <span class="name">Archer Cowie</span>
                                                    <span class="msg-short">There are many variations of passages of Lorem Ipsum.</span>
                                                    <span class="time">2 Hours ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex">
                                                <div class="avatar">
                                                    <img src="{{asset('assets/images/avatar-2.png')}}" alt="image">
                                                </div>
                                                <div class="msg-txt">
                                                    <span class="name">Cody Rodway</span>
                                                    <span class="msg-short">There are many variations of passages of Lorem Ipsum.</span>
                                                    <span class="time">2 Hours ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex">
                                                <div class="avatar">
                                                    <img src="{{asset('assets/images/avatar-3.png')}}" alt="image">
                                                </div>
                                                <div class="msg-txt">
                                                    <span class="name">Zane Bain</span>
                                                    <span class="msg-short">There are many variations of passages of Lorem Ipsum.</span>
                                                    <span class="time">2 Hours ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="show-all-btn">Show all message</a>
                                        </li>
                                    </ul>
                                </div> -->

                                <!-- Date And Time Current -->

                                <!-- <div>
                                    <span>
                                        Date : 04/11/2025
                                    </span>
                                    <span>Time : 4:51:1 AM</span>

                                </div> -->

                               {{-- Notification icon --}}
                                {{-- <div class="header-btn-box">
                                
                                    <button class="header-btn" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-light fa-bell"></i>
                                        <span class="badge bg-danger">9+</span>
                                    </button>
                                    <ul class="notification-dropdown dropdown-menu" aria-labelledby="notificationDropdown">
                                        <li>
                                            <a href="#" class="d-flex align-items-center">
                                                <div class="avatar">
                                                    <img src="{{asset('assets/images/avatar.png')}}" alt="image">
                                                </div>
                                                <div class="notification-txt">
                                                    <span class="notification-icon text-primary"><i class="fa-solid fa-thumbs-up"></i></span> <span class="fw-bold">Archer</span> Likes your post
                                                </div>
                                            </a>
                                        </li>
                                       
                                        <li>
                                            <a href="#" class="d-flex align-items-center">
                                                <div class="avatar">
                                                    <img src="{{asset('assets/images/avatar-2.png')}}" alt="image">
                                                </div>
                                                <div class="notification-txt">
                                                    <span class="notification-icon text-success"><i class="fa-solid fa-comment-dots"></i></span> <span class="fw-bold">Cody</span> Commented on your post
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex align-items-center">
                                                <div class="avatar">
                                                    <img src="{{asset('assets/images/avatar-3.png')}}" alt="image">
                                                </div>
                                                <div class="notification-txt">
                                                    <span class="notification-icon"><i class="fa-solid fa-share"></i></span> <span class="fw-bold">Zane</span> Shared your post
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex align-items-center">
                                                <div class="avatar">
                                                    <img src="{{asset('assets/images/avatar-4.png')}}" alt="image">
                                                </div>
                                                <div class="notification-txt">
                                                    <span class="notification-icon text-primary"><i class="fa-solid fa-thumbs-up"></i></span> <span class="fw-bold">Christopher</span> Likes your post
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex align-items-center">
                                                <div class="avatar">
                                                    <img src="{{asset('assets/images/avatar-5.png')}}" alt="image">
                                                </div>
                                                <div class="notification-txt">
                                                    <span class="notification-icon text-success"><i class="fa-solid fa-comment-dots"></i></span> <span class="fw-bold">Charlie</span> Commented on your post
                                                </div>
                                            </a>
                                        </li>
                                        
                                        <li>
                                            <a href="#" class="d-flex align-items-center">
                                                <div class="avatar">
                                                    <img src="{{asset('assets/images/avatar-6.png')}}" alt="image">
                                                </div>
                                                <div class="notification-txt">
                                                    <span class="notification-icon"><i class="fa-solid fa-share"></i></span> <span class="fw-bold">Jayden</span> Shared your post
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="show-all-btn">Show all message</a>
                                        </li>
                                    </ul>
                                </div> --}}

                                
                                <div class="header-btn-box">
                                    <div class="dropdown">
                                        <button class="header-btn" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                            <i class="fa-light fa-calculator"></i>
                                        </button>
                                        <ul class="dropdown-menu calculator-dropdown">
                                            <div class="dgb-calc-box">
                                                <div>
                                                    <input type="text" id="dgbCalcResult" placeholder="0" autocomplete="off" readonly>
                                                </div>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="bg-danger">C</td>
                                                            <td class="bg-secondary">CE</td>
                                                            <td class="dgb-calc-oprator bg-primary">/</td>
                                                            <td class="dgb-calc-oprator bg-primary">*</td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>8</td>
                                                            <td>9</td>
                                                            <td class="dgb-calc-oprator bg-primary">-</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>5</td>
                                                            <td>6</td>
                                                            <td class="dgb-calc-oprator bg-primary">+</td>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>2</td>
                                                            <td>3</td>
                                                            <td rowspan="2" class="dgb-calc-sum bg-primary">=</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">0</td>
                                                            <td>.</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                <button class="header-btn fullscreen-btn" id="btnFullscreen"><i class="fa-light fa-expand"></i></button>
                            </div>
                        </div>
                    </div>
                   
                    <button class="header-btn header-collapse-group-btn d-lg-none"><i class="fa-light fa-ellipsis-vertical"></i></button>
                    <button class="header-btn theme-settings-btn d-lg-none"><i class="fa-light fa-gear"></i></button>
                    <div class="header-btn-box profile-btn-box">
                        <button class="profile-btn" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{asset('assets/images/admin.png')}}" alt="image">
                        </button>
                        <ul class="dropdown-menu profile-dropdown-menu">
                            <li>
                                <div class="dropdown-txt text-center">
                                    @if(auth()->check())
                                    <p class="mb-0">{{auth()->user()->first_name. " ".auth()->user()->last_name }} <br> ({{get_role_fullname(auth()->user()->role_id)}})</p>
                                    <span class="d-block text-capitalize">{{auth()->user()->user_type }}</span>
                                    @elseif(auth('employee')->check())
                                    <p class="mb-0">{{auth('employee')->user()->emp_name}}</p>
                                    <span class="d-block">({{auth('employee')->user()->emp_designation}})</span>
                                    @endif
                                </div>
                            </li>
                            {{-- <li><a class="dropdown-item" href="view-profile.html"><span class="dropdown-icon"><i class="fa-regular fa-circle-user"></i></span> Profile</a></li>
                            <li><a class="dropdown-item" href="chat.html"><span class="dropdown-icon"><i class="fa-regular fa-message-lines"></i></span> Message</a></li>
                            <li><a class="dropdown-item" href="task.html"><span class="dropdown-icon"><i class="fa-regular fa-calendar-check"></i></span> Taskboard</a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-icon"><i class="fa-regular fa-circle-question"></i></span> Help</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="edit-profile.html"><span class="dropdown-icon"><i class="fa-regular fa-gear"></i></span> Settings</a></li> --}}
                            @if((auth('employee')->check() && auth('employee')->user()->hasPermission('user.change-password')) || (auth()->check() && auth()->user()->hasPermission('user.change-password')))
                            <li><a href="{{route('user.change-password')}}" class="dropdown-item"><span class="dropdown-icon"><i class="fa-regular fa-lock"></i></span> Change Password</a></li>
                            @endif
                            <li><a class="dropdown-item data-logout" role="button"><span class="dropdown-icon"><i class="fa-regular fa-arrow-right-from-bracket"></i></span> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

   



