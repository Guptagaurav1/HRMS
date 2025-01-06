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
                <a role="button" class="sidebar-link-group-title has-sub">HRMS</a>
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
                        <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-solid fa-gear"></i></span> <span class="sidebar-txt">Master Data</span></a>
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
                        <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-solid fa-magnifying-glass"></i></span> <span class="sidebar-txt">New Recruitment</span></a>
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
                        <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-solid fa-money-bill"></i></span> <span class="sidebar-txt">Salary Structure</span></a>
                        <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                            <li class="sidebar-dropdown-item"><a href="{{route('position-request')}}" class="sidebar-link">Create Salary</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('recruitment-report')}}" class="sidebar-link">Salary List</a></li>
                            
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-solid fa-user"></i></span> <span class="sidebar-txt">Profile</span></a>
                        <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                            <li class="sidebar-dropdown-item"><a href="{{route('position-request')}}" class="sidebar-link">My Account</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('recruitment-report')}}" class="sidebar-link">Modify Profile Request</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('recruitment-report')}}" class="sidebar-link">Profile Request Log</a></li>
                            
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-solid fa-envelope"></i></span> <span class="sidebar-txt">Helpdesk</span></a>
                        <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                            <li class="sidebar-dropdown-item"><a href="{{route('position-request')}}" class="sidebar-link">Compose Mail</a></li>
                           
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-light fa-envelope-open-text"></i></span> <span class="sidebar-txt">Work Order</span></a>
                        <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                            <li class="sidebar-dropdown-item"><a href="{{route('users.index')}}" class="sidebar-link">Add Work Order</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('manage-roles')}}" class="sidebar-link">Work Order List</a></li>
                           
                        </ul>
                    </li>
                    
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-solid fa-file-invoice"></i></span> <span class="sidebar-txt">Invoice & Billing</span></a>
                        <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                            <li class="sidebar-dropdown-item"><a href="{{route('users.index')}}" class="sidebar-link">Generate Invoice</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('manage-roles')}}" class="sidebar-link">Invoice List</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('manage-roles')}}" class="sidebar-link">Create Billing Structure</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('manage-roles')}}" class="sidebar-link">Billing Structure List</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('manage-roles')}}" class="sidebar-link">Form 16</a></li>
                           
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-light fa-envelope-open-text"></i></span> <span class="sidebar-txt">User & Role</span></a>
                        <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                            <li class="sidebar-dropdown-item"><a href="{{route('users.create')}}" class="sidebar-link">Add User</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('manage-roles')}}" class="sidebar-link">Manage (Roles)</a></li>
                           
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-solid fa-business-time"></i></span> <span class="sidebar-txt">Leave</span></a>
                        <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                            <li class="sidebar-dropdown-item"><a href="{{route('reimbursement-list')}}" class="sidebar-link">Holiday List</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('reimbursement-list')}}" class="sidebar-link">Applied Request List</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('reimbursement-list')}}" class="sidebar-link">Leave Regularization</a></li>
                            
                           
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-solid fa-business-time"></i></span> <span class="sidebar-txt">Employee Details</span></a>
                        <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                            <li class="sidebar-dropdown-item"><a href="{{route('reimbursement-list')}}" class="sidebar-link">Employee Salary Slip</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-solid fa-business-time"></i></span> <span class="sidebar-txt">Salary Slip</span></a>
                        <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                            <li class="sidebar-dropdown-item"><a href="{{route('reimbursement-list')}}" class="sidebar-link">Salary Slip</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-solid fa-business-time"></i></span> <span class="sidebar-txt">Response Log</span></a>
                        <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                            <li class="sidebar-dropdown-item"><a href="{{route('reimbursement-list')}}" class="sidebar-link">Employee Profile Response Log</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('reimbursement-list')}}" class="sidebar-link">Recruiter Response Log</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-solid fa-business-time"></i></span> <span class="sidebar-txt">Reimbursement</span></a>
                        <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                            <li class="sidebar-dropdown-item"><a href="{{route('reimbursement-list')}}" class="sidebar-link">Reimbursement List</a></li>
                            
                           
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-solid fa-people-group"></i></span> <span class="sidebar-txt">My Team </span></a>
                        <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                            <li class="sidebar-dropdown-item"><a href="{{route('my-team-list')}}" class="sidebar-link">Team User</a></li>
                            
                           
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-brands fa-creative-commons-by"></i></span> <span class="sidebar-txt">Attendace</span></a>
                        <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                            <li class="sidebar-dropdown-item"><a href="{{route('upload-attendance')}}" class="sidebar-link">Upload Attendace</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('attendance-list')}}" class="sidebar-link">Attendance List</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-solid fa-calendar-days"></i></span> <span class="sidebar-txt">Upcoming Event</span></a>
                        <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                            <li class="sidebar-dropdown-item"><a href="{{route('birthday-list')}}" class="sidebar-link">Birthday List</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('marriage-anniversary-list')}}" class="sidebar-link">Marriage Anniversary List</a></li>
                            <li class="sidebar-dropdown-item"><a href="{{route('work-anniversary-list')}}" class="sidebar-link">Work Anniversary List</a></li>
                            
                           
                        </ul>
                    </li>
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a role="button" class="sidebar-link has-sub" data-dropdown="advanceUiDropdown"><span class="nav-icon"><i class="fa-solid fa-right-from-bracket"></i></span> <span class="sidebar-txt">Logs</span></a>
                            <ul class="sidebar-dropdown-menu" id="advanceUiDropdown">
                                <li class="sidebar-dropdown-item"><a href="{{route('credential_log_list')}}" class="sidebar-link">Credential Log List</a></li>
                               
                            </ul>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a role="button" class="sidebar-link has-sub" data-dropdown="advanceUiDropdown"><span class="nav-icon"><i class="fa-solid fa-person"></i></span> <span class="sidebar-txt">Posh</span></a>
                            <ul class="sidebar-dropdown-menu" id="advanceUiDropdown">
                                <li class="sidebar-dropdown-item"><a href="{{route('posh-complaint-list')}}" class="sidebar-link">Posh Complaint List</a></li>
                               
                            </ul>
                        </li>
                        <li class="help-center">
                            <h3>Help Center</h3>
                            <p>We're an award-winning, forward thinking</p>
                            <a href="#" class="btn btn-sm btn-light">Go to Help Center</a>
                        </li>
                        
                       
                    </ul>
                </ul>
            </li>
            
           
            
        </ul>
    </div>
</div>
<!-- main sidebar end -->

<!-- main content start -->
