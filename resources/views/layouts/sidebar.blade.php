<div class="profile-right-sidebar">
    <button class="right-bar-close"><i class="fa-light fa-angle-right"></i></button>
    <div class="top-panel">
        <div class="profile-content scrollable">
            <ul>
                <li>
                    <div class="dropdown-txt text-center">
                        <p class="mb-0">Gaurav</p>
                        <span class="d-block">Front End</span>
                        <div class="d-flex justify-content-center">
                            <div class="form-check pt-3">
                                <input class="form-check-input" type="checkbox" id="seeProfileAsDropdown">
                                <label class="form-check-label" for="seeProfileAsDropdown">See as dropdown</label>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a class="dropdown-item" href="view-profile.html"><span class="dropdown-icon"><i class="fa-regular fa-circle-user"></i></span> Profile</a>
                </li>
                <li>
                    <a class="dropdown-item" href="chat.html"><span class="dropdown-icon"><i class="fa-regular fa-message-lines"></i></span> Message</a>
                </li>
                <li>
                    <a class="dropdown-item" href="task.html"><span class="dropdown-icon"><i class="fa-regular fa-calendar-check"></i></span> Taskboard</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#"><span class="dropdown-icon"><i class="fa-regular fa-circle-question"></i></span> Help</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="bottom-panel">
        <div class="button-group">
            <a href="edit-profile.html"><i class="fa-light fa-gear"></i><span>Settings</span></a>
            <a href="login.html"><i class="fa-light fa-power-off"></i><span>Logout</span></a>
        </div>
    </div>
</div>
<div class="right-sidebar">
    <button class="right-bar-close"><i class="fa-light fa-angle-right"></i></button>
    <div class="sidebar-title">
        <h3>Layout Settings</h3>
    </div>
    <div class="sidebar-body scrollable">
        <div class="right-sidebar-group">
            <span class="sidebar-subtitle">Nav Position <span><i class="fa-light fa-angle-up"></i></span></span>
            <div class="settings-row">
                <div class="settings-col">
                    <div class="dashboard-icon d-flex gap-1 border rounded active" id="verticalMenu">
                        <div class="pb-2 px-1 pt-1 bg-menu">
                            <div class="px-2 py-1 rounded-pill bg-nav mb-2"></div>
                            <div class="border border-primary mb-1">
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                            </div>
                            <div class="border border-primary">
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                            </div>
                        </div>
                        <div class="w-100 d-flex flex-column justify-content-between">
                            <div class="px-2 py-1 bg-menu"></div>
                            <div class="px-2 py-1 bg-menu"></div>
                        </div>
                        <span class="part-txt">Vertical</span>
                    </div>
                </div>
                <div class="settings-col d-lg-block d-none">
                    <div class="dashboard-icon d-flex h-100 gap-1 border rounded" id="horizontalMenu">
                        <div class="w-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="p-1 bg-menu border-bottom">
                                    <div class="rounded-circle p-1 bg-nav w-max-content"></div>
                                </div>
                                <div class="p-1 bg-menu d-flex gap-1 mb-1">
                                    <div class="w-max-content px-2 pt-1 rounded bg-nav"></div>
                                    <div class="w-max-content px-2 pt-1 rounded bg-nav"></div>
                                    <div class="w-max-content px-2 pt-1 rounded bg-nav"></div>
                                    <div class="w-max-content px-2 pt-1 rounded bg-nav"></div>
                                </div>
                            </div>
                            <div class="px-2 py-1 bg-menu"></div>
                        </div>
                        <span class="part-txt">Horizontal</span>
                    </div>
                </div>
                <div class="settings-col">
                    <div class="dashboard-icon d-flex gap-1 border rounded" id="twoColumnMenu">
                        <div class="p-1 bg-menu"></div>
                        <div class="pb-4 px-1 pt-1 bg-menu">
                            <div class="px-2 py-1 rounded-pill bg-nav mb-2"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                        </div>
                        <div class="w-100 d-flex flex-column justify-content-between">
                            <div class="px-2 py-1 bg-menu"></div>
                            <div class="px-2 py-1 bg-menu"></div>
                        </div>
                        <span class="part-txt">Two column</span>
                    </div>
                </div>
                <div class="settings-col">
                    <div class="dashboard-icon d-flex gap-1 border rounded" id="flushMenu">
                        <div class="pb-4 px-1 pt-1 bg-menu">
                            <div class="px-2 py-1 rounded-pill bg-nav mb-2"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                        </div>
                        <div class="w-100 d-flex flex-column justify-content-between">
                            <div class="px-2 py-1 bg-menu"></div>
                            <div class="px-2 py-1 bg-menu"></div>
                        </div>
                        <span class="part-txt">Flush</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-sidebar-group">
            <span class="sidebar-subtitle">Theme Direction <span><i class="fa-light fa-angle-up"></i></span></span>
            <div>
                <div class="btn-group d-flex">
                    <button class="btn btn-primary active w-50" id="dirLtr">LTR</button>
                    <button class="btn btn-primary w-50" id="dirRtl">RTL</button>
                </div>
            </div>
        </div>
        <div class="right-sidebar-group">
            <span class="sidebar-subtitle">Primary Color <span><i class="fa-light fa-angle-up"></i></span></span>
            <div class="settings-row-2">
                <button class="color-palette color-palette-1 active" data-color="blue-color">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button class="color-palette color-palette-2" data-color="orange-color">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button class="color-palette color-palette-3" data-color="pink-color">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button class="color-palette color-palette-4" data-color="eagle_green-color">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button class="color-palette color-palette-5" data-color="purple-color">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button class="color-palette color-palette-6" data-color="gold-color">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button class="color-palette color-palette-7" data-color="green-color">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button class="color-palette color-palette-8" data-color="deep_pink-color">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button class="color-palette color-palette-9" data-color="tea_green-color">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button class="color-palette color-palette-10" data-color="yellow_green-color">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
        <div class="right-sidebar-group">
            <span class="sidebar-subtitle">Theme Color <span><i class="fa-light fa-angle-up"></i></span></span>
            <div class="settings-row">
                <div class="settings-col">
                    <div class="dashboard-icon d-flex bg-blue-theme gap-1 border rounded" id="blueTheme">
                        <div class="pb-4 px-1 pt-1 bg-menu">
                            <div class="px-2 py-1 rounded-pill bg-nav mb-2"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                        </div>
                        <div class="w-100 d-flex flex-column justify-content-between">
                            <div class="px-2 py-1 bg-menu"></div>
                            <div class="px-2 py-1 bg-menu"></div>
                        </div>
                        <span class="part-txt">Blue Theme</span>
                    </div>
                </div>
                <div class="settings-col">
                    <div class="dashboard-icon d-flex gap-1 border rounded bg-body-secondary light-theme-btn active" id="lightTheme">
                        <div class="pb-4 px-1 pt-1 bg-dark-subtle">
                            <div class="px-2 py-1 rounded-pill bg-primary mb-2"></div>
                            <div class="px-2 pt-1 bg-primary mb-1"></div>
                            <div class="px-2 pt-1 bg-primary mb-1"></div>
                            <div class="px-2 pt-1 bg-primary mb-1"></div>
                        </div>
                        <div class="w-100 d-flex flex-column justify-content-between">
                            <div class="px-2 py-1 bg-dark-subtle"></div>
                            <div class="px-2 py-1 bg-dark-subtle"></div>
                        </div>
                        <span class="part-txt">Light Theme</span>
                    </div>
                </div>
                <div class="settings-col">
                    <div class="dashboard-icon d-flex gap-1 border rounded bg-dark" id="darkTheme">
                        <div class="pb-4 px-1 pt-1 bg-menu">
                            <div class="px-2 py-1 rounded-pill bg-nav mb-2"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                        </div>
                        <div class="w-100 d-flex flex-column justify-content-between">
                            <div class="px-2 py-1 bg-menu"></div>
                            <div class="px-2 py-1 bg-menu"></div>
                        </div>
                        <span class="part-txt">Dark Theme</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-sidebar-group" id="navBarSizeGroup">
            <span class="sidebar-subtitle">Navbar Size <span><i class="fa-light fa-angle-up"></i></span></span>
            <div class="settings-row">
                <div class="settings-col">
                    <div class="dashboard-icon d-flex gap-1 border rounded active" id="sidebarDefault">
                        <div class="pb-4 px-1 pt-1 bg-menu">
                            <div class="px-2 py-1 rounded-pill bg-nav mb-2"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                        </div>
                        <div class="w-100 d-flex flex-column justify-content-between">
                            <div class="px-2 py-1 bg-menu"></div>
                            <div class="px-2 py-1 bg-menu"></div>
                        </div>
                        <span class="part-txt">Default</span>
                    </div>
                </div>
                <div class="settings-col">
                    <div class="dashboard-icon d-flex gap-1 border rounded" id="sidebarSmall">
                        <div class="pb-4 pt-1 bg-menu">
                            <div class="p-1 rounded-pill bg-nav mb-2"></div>
                            <div class="ps-1 pt-1 bg-nav mb-1"></div>
                            <div class="ps-1 pt-1 bg-nav mb-1"></div>
                            <div class="ps-1 pt-1 bg-nav mb-1"></div>
                        </div>
                        <div class="w-100 d-flex flex-column justify-content-between">
                            <div class="px-2 py-1 bg-menu"></div>
                            <div class="px-2 py-1 bg-menu"></div>
                        </div>
                        <span class="part-txt">Small icon</span>
                    </div>
                </div>
                <div class="settings-col">
                    <div class="dashboard-icon d-flex gap-1 border rounded" id="sidebarHover">
                        <div class="pb-4 pt-1 bg-menu">
                            <div class="p-1 rounded-pill bg-nav mb-2"></div>
                            <div class="ps-1 pt-1 bg-nav mb-1"></div>
                            <div class="ps-1 pt-1 bg-nav mb-1"></div>
                            <div class="ps-1 pt-1 bg-nav mb-1"></div>
                        </div>
                        <div class="w-100 d-flex flex-column justify-content-between">
                            <div class="px-2 py-1 bg-menu"></div>
                            <div class="px-2 py-1 bg-menu"></div>
                        </div>
                        <span class="part-txt">Expand on hover</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-sidebar-group">
            <span class="sidebar-subtitle">Sidebar Background <span><i class="fa-light fa-angle-up"></i></span></span>
            <div>
                <div class="sidebar-bg-btn-box">
                    <button id="noBackground">
                        <span><i class="fa-light fa-xmark"></i></span>
                    </button>
                    <button class="sidebar-bg-btn" data-img="assets/images/nav-bg-1.jpg"></button>
                    <button class="sidebar-bg-btn" data-img="assets/images/nav-bg-2.jpg"></button>
                    <button class="sidebar-bg-btn" data-img="assets/images/nav-bg-3.jpg"></button>
                    <button class="sidebar-bg-btn" data-img="assets/images/nav-bg-4.jpg"></button>
                </div>
            </div>
        </div>
        <div class="right-sidebar-group">
            <span class="sidebar-subtitle">Main Background <span><i class="fa-light fa-angle-up"></i></span></span>
            <div>
                <div class="main-content-bg-btn-box">
                    <button id="noBackground2">
                        <span><i class="fa-light fa-xmark"></i></span>
                    </button>
                    <button class="main-content-bg-btn" data-img="assets/images/main-bg-1.jpg"></button>
                    <button class="main-content-bg-btn" data-img="assets/images/main-bg-2.jpg"></button>
                    <button class="main-content-bg-btn" data-img="assets/images/main-bg-3.jpg"></button>
                    <button class="main-content-bg-btn" data-img="assets/images/main-bg-4.jpg"></button>
                </div>
            </div>
        </div>
        <div class="right-sidebar-group">
            <span class="sidebar-subtitle">Main preloader<span><i class="fa-light fa-angle-up"></i></span></span>
            <div class="settings-row">
                <div class="settings-col">
                    <div class="dashboard-icon d-flex gap-1 border rounded" id="enableLoader">
                        <div class="pb-4 px-1 pt-1 bg-menu">
                            <div class="px-2 py-1 rounded-pill bg-nav mb-2"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                        </div>
                        <div class="w-100 d-flex flex-column justify-content-between">
                            <div class="px-2 py-1 bg-menu"></div>
                            <div class="px-2 py-1 bg-menu"></div>
                        </div>
                        <div class="preloader-small">
                            <div class="loader">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <span class="part-txt">Enable</span>
                    </div>
                </div>
                <div class="settings-col">
                    <div class="dashboard-icon d-flex gap-1 border rounded active" id="disableLoader">
                        <div class="pb-4 px-1 pt-1 bg-menu">
                            <div class="px-2 py-1 rounded-pill bg-nav mb-2"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                            <div class="px-2 pt-1 bg-nav mb-1"></div>
                        </div>
                        <div class="w-100 d-flex flex-column justify-content-between">
                            <div class="px-2 py-1 bg-menu"></div>
                            <div class="px-2 py-1 bg-menu"></div>
                        </div>
                        <span class="part-txt">Disable</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- right sidebar end -->

<!-- main sidebar start -->
<div class="main-sidebar">
    <div class="main-menu">
        <ul class="sidebar-menu scrollable">
            <li class="sidebar-item">
                <a role="button" class="sidebar-link-group-title has-sub">Dashboard</a>
                <ul class="sidebar-link-group">
                    <li class="sidebar-dropdown-item">
                        {{-- <a href="index.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-cart-shopping-fast"></i></span> <span class="sidebar-txt">eCommerce</span></a> --}}
                    </li>
                    <li class="sidebar-dropdown-item">
                        {{-- <a href="crm-dashboard.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-user-headset"></i></span> <span class="sidebar-txt">CRM</span></a> --}}
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="route{{''}}" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-user-tie"></i></span> <span class="sidebar-txt">HRM</span></a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a role="button" class="sidebar-link-group-title has-sub">HR</a>
                <ul class="sidebar-link-group">
                    <li class="sidebar-dropdown-item">
                        {{-- <a role="button" class="sidebar-link has-sub" data-dropdown="crmDropdown"><span class="nav-icon"><i class="fa-light fa-user-headset"></i></span> <span class="sidebar-txt">CRM</span></a> --}}
                        {{-- <ul class="sidebar-dropdown-menu" id="crmDropdown">
                            <li class="sidebar-dropdown-item"><a href="audience.html" class="sidebar-link">Target Audience</a></li>
                            <li class="sidebar-dropdown-item"><a href="company.html" class="sidebar-link">Company</a></li>
                            <li class="sidebar-dropdown-item"><a href="task.html" class="sidebar-link">Task</a></li>
                            <li class="sidebar-dropdown-item"><a href="leads.html" class="sidebar-link">Leads</a></li>
                            <li class="sidebar-dropdown-item"><a href="customer.html" class="sidebar-link">Customer</a></li>
                        </ul> --}}
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="hrmDropdown"><span class="nav-icon"><i class="fa-light fa-user-tie"></i></span> <span class="sidebar-txt">Employee</span></a>
                        <ul class="sidebar-dropdown-menu" id="hrmDropdown">
                            <li class="sidebar-dropdown-item"><a href="{{route('add-employee') }}" class="sidebar-link">Add Employee</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('employee-list')}}" class="sidebar-link">Employee List</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('edit-employee')}}" class="sidebar-link">Edit Employee</a></li>
                        </ul>
                    </li>
                   
                    {{-- <li class="sidebar-dropdown-item">
                        <a href="calendar.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-calendar"></i></span> <span class="sidebar-txt">Calendar</span></a>
                    </li> --}}
                    {{-- <li class="sidebar-dropdown-item">
                        <a href="chat.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-messages"></i></span> <span class="sidebar-txt">Chat</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="email.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-envelope"></i></span> <span class="sidebar-txt">Email</span></a>
                    </li> --}}
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-light fa-envelope-open-text"></i></span> <span class="sidebar-txt">Master Data</span></a>
                        <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                            <li class="sidebar-dropdown-item"><a href="{{route('department')}}" class="sidebar-link">Department</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('skill')}}" class="sidebar-link">Skill</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('company-master')}}" class="sidebar-link">Company Master</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('functional-role')}}" class="sidebar-link">Functional Role</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('qualification')}}" class="sidebar-link">Qualification</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('bank-details')}}" class="sidebar-link">Bank Details</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('organisation')}}" class="sidebar-link">Organisations</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('designation')}}" class="sidebar-link">Designation</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-solid fa-users"></i></span> <span class="sidebar-txt">New Recruitment</span></a>
                        <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                            <li class="sidebar-dropdown-item"><a href="{{route('position-request')}}" class="sidebar-link">Position Request</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('recruitment-report')}}" class="sidebar-link">Recruitment Report</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('recruitment-list')}}" class="sidebar-link">Recruitment List</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('recruitment-plan')}}" class="sidebar-link">Recruitment Plan</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('position-review-dept')}}" class="sidebar-link">Position Review Dept</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('addcontact-form')}}" class="sidebar-link">Add Contact Form</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('offerlettershared-list')}}" class="sidebar-link">Offer Letter Shared List</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-light fa-envelope-open-text"></i></span> <span class="sidebar-txt">User & Role</span></a>
                        <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                            <li class="sidebar-dropdown-item"><a href="{{route('add-user')}}" class="sidebar-link">Add User</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('manage-roles')}}" class="sidebar-link">Manage (Roles)</a></li>
                           
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="contact.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-user-plus"></i></span> <span class="sidebar-txt">Contacts</span></a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a role="button" class="sidebar-link-group-title has-sub">Pages</a>
                <ul class="sidebar-link-group">
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="authDropdown"><span class="nav-icon"><i class="fa-light fa-user-cog"></i></span> <span class="sidebar-txt">Authentication</span></a>
                        <ul class="sidebar-dropdown-menu" id="authDropdown">
                            <li class="sidebar-dropdown-item"><a href="login.html" class="sidebar-link">Login 01</a></li>
                            <li class="sidebar-dropdown-item"><a href="login-2.html" class="sidebar-link">Login 02</a></li>
                            <li class="sidebar-dropdown-item"><a href="login-3.html" class="sidebar-link">Login 03</a></li>
                            <li class="sidebar-dropdown-item"><a href="registration.html" class="sidebar-link">Registration 01</a></li>
                            <li class="sidebar-dropdown-item"><a href="registration-2.html" class="sidebar-link">Registration 02</a></li>
                            <li class="sidebar-dropdown-item"><a href="reset-password.html" class="sidebar-link">Reset Password</a></li>
                            <li class="sidebar-dropdown-item"><a href="update-password.html" class="sidebar-link">Update Password</a></li>
                            <li class="sidebar-dropdown-item"><a href="login-status.html" class="sidebar-link">Login Status</a></li>
                            <li class="sidebar-dropdown-item"><a href="account-deactivated.html" class="sidebar-link">Account Deactivated</a></li>
                            <li class="sidebar-dropdown-item"><a href="welcome.html" class="sidebar-link">Welcome</a></li>
                            <li class="sidebar-dropdown-item"><a href="email-verify.html" class="sidebar-link">Verify Email</a></li>
                            <li class="sidebar-dropdown-item"><a href="two-factor.html" class="sidebar-link">2 Factor Verification</a></li>
                            <li class="sidebar-dropdown-item"><a href="multi-step-signup.html" class="sidebar-link">Multi Step Signup</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="errorDropdown"><span class="nav-icon"><i class="fa-light fa-triangle-exclamation"></i></span> <span class="sidebar-txt">Error Pages</span></a>
                        <ul class="sidebar-dropdown-menu" id="errorDropdown">
                            <li class="sidebar-dropdown-item"><a href="error-400.html" class="sidebar-link">Error 400</a></li>
                            <li class="sidebar-dropdown-item"><a href="error-403.html" class="sidebar-link">Error 403</a></li>
                            <li class="sidebar-dropdown-item"><a href="error-404.html" class="sidebar-link">Error 404</a></li>
                            <li class="sidebar-dropdown-item"><a href="error-408.html" class="sidebar-link">Error 408</a></li>
                            <li class="sidebar-dropdown-item"><a href="error-500.html" class="sidebar-link">Error 500</a></li>
                            <li class="sidebar-dropdown-item"><a href="error-503.html" class="sidebar-link">Error 503</a></li>
                            <li class="sidebar-dropdown-item"><a href="error-504.html" class="sidebar-link">Error 504</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="userDropdown"><span class="nav-icon"><i class="fa-light fa-user"></i></span> <span class="sidebar-txt">User</span></a>
                        <ul class="sidebar-dropdown-menu" id="userDropdown">
                            <li class="sidebar-dropdown-item"><a href="view-profile.html" class="sidebar-link">View Profile</a></li>
                            <li class="sidebar-dropdown-item"><a href="edit-profile.html" class="sidebar-link">Edit Profile</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="additionalDropdown"><span class="nav-icon"><i class="fa-light fa-square-plus"></i></span> <span class="sidebar-txt">Additional</span></a>
                        <ul class="sidebar-dropdown-menu" id="additionalDropdown">
                            <li class="sidebar-dropdown-item"><a href="coming-soon.html" class="sidebar-link">Coming Soon 01</a></li>
                            <li class="sidebar-dropdown-item"><a href="coming-soon-2.html" class="sidebar-link">Coming Soon 02</a></li>
                            <li class="sidebar-dropdown-item"><a href="pricing-table.html" class="sidebar-link">Pricing Table 01</a></li>
                            <li class="sidebar-dropdown-item"><a href="pricing-table-2.html" class="sidebar-link">Pricing Table 02</a></li>
                            <li class="sidebar-dropdown-item"><a href="under-construction.html" class="sidebar-link">Under Construction</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="utility.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-layer-group"></i></span> <span class="sidebar-txt">Utility</span></a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a role="button" class="sidebar-link-group-title has-sub">Components</a>
                <ul class="sidebar-link-group">
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="advanceUiDropdown"><span class="nav-icon"><i class="fa-light fa-layer-group"></i></span> <span class="sidebar-txt">Advance UI</span></a>
                        <ul class="sidebar-dropdown-menu" id="advanceUiDropdown">
                            <li class="sidebar-dropdown-item"><a href="sweet-alert.html" class="sidebar-link">Sweet Alert</a></li>
                            <li class="sidebar-dropdown-item"><a href="nestable-list.html" class="sidebar-link">Nestable List</a></li>
                            <li class="sidebar-dropdown-item"><a href="animation.html" class="sidebar-link">Animation</a></li>
                            <li class="sidebar-dropdown-item"><a href="swiper-slider.html" class="sidebar-link">Swiper Slider</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="#" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-memo-pad"></i></span> <span class="sidebar-txt">New Forms</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="table.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-table"></i></span> <span class="sidebar-txt">Tables</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="charts.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-chart-simple"></i></span> <span class="sidebar-txt">Charts</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="icon.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-compass-drafting"></i></span> <span class="sidebar-txt">Icons</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="map.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-location-dot"></i></span> <span class="sidebar-txt">Maps</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="file-manager.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-folder-open"></i></span> <span class="sidebar-txt">File Manager</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="levelDropdown"><span class="nav-icon"><i class="fa-light fa-layer-group"></i></span> <span class="sidebar-txt">Multiple Level</span></a>
                        <ul class="sidebar-dropdown-menu" id="levelDropdown">
                            <li class="sidebar-dropdown-item"><a href="#" class="sidebar-link">Level 1</a></li>
                            <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub">Level 1</a>
                                <ul class="sidebar-dropdown-menu">
                                    <li class="sidebar-dropdown-item"><a href="#" class="sidebar-link">Level 2</a></li>
                                    <li class="sidebar-dropdown-item">
                                        <a role="button" class="sidebar-link has-sub">Level 2</a>
                                        <ul class="sidebar-dropdown-menu">
                                            <li class="sidebar-dropdown-item"><a href="#" class="sidebar-link">Level 3</a></li>
                                            <li class="sidebar-dropdown-item"><a href="#" class="sidebar-link">Level 3</a></li>
                                            <li class="sidebar-dropdown-item"><a href="#" class="sidebar-link">Level 3</a></li>
                                            <li class="sidebar-dropdown-item"><a href="#" class="sidebar-link">Level 3</a></li>
                                        </ul>
                                    </li>
                                    <li class="sidebar-dropdown-item"><a href="#" class="sidebar-link">Level 2</a></li>
                                    <li class="sidebar-dropdown-item"><a href="#" class="sidebar-link">Level 2</a></li>
                                </ul>
                            </li>
                            <li class="sidebar-dropdown-item"><a href="#" class="sidebar-link">Level 1</a></li>
                            <li class="sidebar-dropdown-item"><a href="#" class="sidebar-link">Level 1</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="help-center">
                <h3>Help Center</h3>
                <p>We're an award-winning, forward thinking</p>
                <a href="#" class="btn btn-sm btn-light">Go to Help Center</a>
            </li>
        </ul>
    </div>
</div>
<!-- main sidebar end -->

<!-- main content start -->
