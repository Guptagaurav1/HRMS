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
                    <a class="dropdown-item" href="view-profile.html"><span class="dropdown-icon"><i
                                class="fa-regular fa-circle-user"></i></span> Profile</a>
                </li>
                <li>
                    <a class="dropdown-item" href="chat.html"><span class="dropdown-icon"><i
                                class="fa-regular fa-message-lines"></i></span> Message</a>
                </li>
                <li>
                    <a class="dropdown-item" href="task.html"><span class="dropdown-icon"><i
                                class="fa-regular fa-calendar-check"></i></span> Taskboard</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#"><span class="dropdown-icon"><i
                                class="fa-regular fa-circle-question"></i></span> Help</a>
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
                    <div class="dashboard-icon d-flex gap-1 border rounded bg-body-secondary light-theme-btn active"
                        id="lightTheme">
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

<div class="main-sidebar ">
    <div class="main-menu">
        <ul class="sidebar-menu scrollable">

            <li class="sidebar-item">

                <a role="button" class="sidebar-link-group-title has-sub">HRMS</a>
                <!-- If logged-in user is department user. -->

                <ul class="sidebar-link-group">
                    <li class="sidebar-dropdown-item">
                        {{-- <a role="button" class="sidebar-link has-sub" data-dropdown="crmDropdown"><span
                                class="nav-icon"><i class="fa-light fa-user-headset"></i></span> <span
                                class="sidebar-txt">CRM</span></a> --}}
                        {{-- <ul class="sidebar-dropdown-menu" id="crmDropdown">
                            <li class="sidebar-dropdown-item"><a href="audience.html" class="sidebar-link">Target
                                    Audience</a></li>
                            <li class="sidebar-dropdown-item"><a href="company.html" class="sidebar-link">Company</a>
                            </li>
                            <li class="sidebar-dropdown-item"><a href="task.html" class="sidebar-link">Task</a></li>
                            <li class="sidebar-dropdown-item"><a href="leads.html" class="sidebar-link">Leads</a></li>
                            <li class="sidebar-dropdown-item"><a href="customer.html" class="sidebar-link">Customer</a>
                            </li>
                        </ul> --}}
                    </li>
                    @if (Auth::check())
                        @if (auth()->user()->hasPermission('employee.add-employee') || auth()->user()->hasPermission('employee.employee-list'))
                            <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub" data-dropdown="hrmDropdown"><span
                                        class="nav-icon"><i class="fa-light fa-user-tie"></i></span> <span
                                        class="sidebar-txt">Employee</span></a>
                                <ul class="sidebar-dropdown-menu" id="hrmDropdown">
                                    @if (auth()->user()->hasPermission('employee.add-employee'))
                                        <li class="sidebar-dropdown-item"><a
                                                href="{{ route('employee.add-employee') }}" class="sidebar-link">Add
                                                Employee</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('employee.employee-list'))
                                        <li class="sidebar-dropdown-item"><a
                                                href="{{ route('employee.employee-list') }}"
                                                class="sidebar-link">Employee List</a></li>
                                    @endif
                                </ul>
                            </li>
                        @endif

                        {{-- <li class="sidebar-dropdown-item">
                        <a href="calendar.html" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-calendar"></i></span> <span
                                class="sidebar-txt">Calendar</span></a>
                    </li> --}}
                        {{-- <li class="sidebar-dropdown-item">
                        <a href="chat.html" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-messages"></i></span> <span class="sidebar-txt">Chat</span></a>
                    </li>
                    <li class="sidebar-dropdown-item">
                        <a href="email.html" class="sidebar-link"><span class="nav-icon"><i
                                    class="fa-light fa-envelope"></i></span> <span class="sidebar-txt">Email</span></a>
                    </li> --}}
                        @if (auth()->user()->hasPermission('departments.index'))
                            <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub"
                                    data-dropdown="ecommerceDropdown"><span class="nav-icon"><i
                                            class="fa-solid fa-gear"></i></span> <span class="sidebar-txt">Master
                                        Data</span></a>
                                <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                    @if (auth()->user()->hasPermission('departments.index'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('departments.index') }}"
                                                class="sidebar-link">Department</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('skills.index'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('skills.index') }}"
                                                class="sidebar-link">Skill</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('company.list'))
                                        {{-- <li class="sidebar-dropdown-item"><a href="{{ route('company-master') }}"
                                                class="sidebar-link">Company Master</a></li> --}}
                                        <li class="sidebar-dropdown-item"><a href="{{ route('company.list') }}"
                                                class="sidebar-link">Company</a></li>
                                    @endif

                                    @if (auth()->user()->hasPermission('functional-role'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('functional-role') }}"
                                                class="sidebar-link">Functional Role</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('qualification'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('qualification') }}"
                                                class="sidebar-link">Qualification</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('bank-details'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('bank-details') }}"
                                                class="sidebar-link">Bank Details</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('organizations.index'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('organizations.index') }}"
                                                class="sidebar-link">Organization</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('designations.index'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('designations.index') }}"
                                                class="sidebar-link">Designation</a></li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if (auth()->user()->hasPermission('position-request') ||
                                auth()->user()->hasPermission('recruitment-report') ||
                                auth()->user()->hasPermission('recruitment-list') ||
                                auth()->user()->hasPermission('addcontact-form') ||
                                auth()->user()->hasPermission('recruitment.offerlettershared-list'))
                            <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub"
                                    data-dropdown="ecommerceDropdown"><span class="nav-icon"><i
                                            class="fa-solid fa-magnifying-glass"></i></span> <span
                                        class="sidebar-txt">New Recruitment</span></a>
                                <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                    @if (auth()->user()->hasPermission('position-request'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('position-request') }}"
                                                class="sidebar-link">Position Request</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('recruitment-report'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('recruitment-report') }}"
                                                class="sidebar-link">Recruitment Report</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('recruitment-list'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('recruitment-list') }}"
                                                class="sidebar-link">Recruitment List</a></li>
                                    @endif
                                    {{-- <li class="sidebar-dropdown-item"><a href="{{route('recruitment-plan')}}" class="sidebar-link">Recruitment Plan</a></li> --}}
                                    {{-- <li class="sidebar-dropdown-item"><a href="{{route('position-review-dept')}}" class="sidebar-link">Position Review Dept</a></li> --}}
                                    @if (auth()->user()->hasPermission('addcontact-form'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('addcontact-form') }}"
                                                class="sidebar-link">Add Contact Form</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('recruitment.offerlettershared-list'))
                                        <li class="sidebar-dropdown-item"><a
                                                href="{{ route('recruitment.offerlettershared-list') }}"
                                                class="sidebar-link">Offer Letter Shared List</a></li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if (auth()->user()->hasPermission('salary-list') || auth()->user()->hasPermission('create-salary'))
                            <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub"
                                    data-dropdown="ecommerceDropdown"><span class="nav-icon"><i
                                            class="fa-solid fa-indian-rupee-sign"></i></span> <span
                                        class="sidebar-txt">Salary Structure</span></a>
                                <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                    <li class="sidebar-dropdown-item"><a href="{{ route('create-salary') }}"
                                            class="sidebar-link">Create Salary</a></li>
                                    <li class="sidebar-dropdown-item"><a href="{{ route('salary-list') }}"
                                            class="sidebar-link">Salary List</a></li>

                                </ul>
                            </li>
                        @endif
                        @if (auth()->user()->hasPermission('profile.modify-profile-request') ||
                                auth()->user()->hasPermission('profile.profile-detail-request-list'))
                            <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub"
                                    data-dropdown="ecommerceDropdown"><span class="nav-icon"><i
                                            class="fa-solid fa-user"></i></span> <span
                                        class="sidebar-txt">Profile</span></a>
                                <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                    {{-- @if (auth()->user()->hasPermission('position-request'))
                                <li class="sidebar-dropdown-item"><a href="{{route('position-request')}}" class="sidebar-link">My Account</a></li>
                            @endif --}}
                                    @if (auth()->user()->hasPermission('profile.modify-profile-request'))
                                        <li class="sidebar-dropdown-item"><a
                                                href="{{ route('profile.modify-profile-request') }}"
                                                class="sidebar-link">Modify Profile Request</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('profile.profile-detail-request-list'))
                                        <li class="sidebar-dropdown-item"><a
                                                href="{{ route('profile.profile-detail-request-list') }}"
                                                class="sidebar-link">Profile Request Log</a></li>
                                    @endif

                                </ul>
                            </li>
                        @endif

                        @if (auth()->user()->hasPermission('compose-email'))
                            <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub"
                                    data-dropdown="ecommerceDropdown"><span class="nav-icon"><i
                                            class="fa-solid fa-envelope"></i></span> <span
                                        class="sidebar-txt">Helpdesk</span></a>
                                <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                    <li class="sidebar-dropdown-item"><a href="{{ route('compose-email') }}"
                                            class="sidebar-link">Compose Mail</a></li>

                                </ul>
                            </li>
                        @endif
                        @if (auth()->user()->hasPermission('work-order-list'))
                            <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub"
                                    data-dropdown="ecommerceDropdown"><span class="nav-icon"><i
                                            class="fa-light fa-envelope-open-text"></i></span> <span
                                        class="sidebar-txt">Work Order</span></a>
                                <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                    @if (auth()->user()->hasPermission('project-list'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('project-list') }}"
                                                class="sidebar-link">Project List</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('add-work-order'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('add-work-order') }}"
                                                class="sidebar-link">Add Work Order</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('work-order-list'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('work-order-list') }}"
                                                class="sidebar-link">Work Order List</a></li>
                                    @endif

                                    <!-- @if (auth()->user()->hasPermission('project-report'))
<li class="sidebar-dropdown-item"><a href="{{ route('project-report') }}" class="sidebar-link">WorkOrder Project Report</a></li>
@endif -->
                                </ul>
                            </li>
                        @endif
                        @if (auth()->user()->hasPermission('invoice-list'))
                            <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub"
                                    data-dropdown="ecommerceDropdown"><span class="nav-icon"><i
                                            class="fa-solid fa-file-invoice"></i></span> <span
                                        class="sidebar-txt">Invoice & Billing</span></a>
                                <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                    @if (auth()->user()->hasPermission('generate-invoice'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('generate-invoice') }}"
                                                class="sidebar-link">Generate Invoice</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('invoice-list'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('invoice-list') }}"
                                                class="sidebar-link">Invoice List</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('add-biling-tructure'))
                                        <li class="sidebar-dropdown-item"><a
                                                href="{{ route('add-biling-tructure') }}" class="sidebar-link">Create
                                                Billing Structure</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('biling-structure-list'))
                                        <li class="sidebar-dropdown-item"><a
                                                href="{{ route('biling-structure-list') }}"
                                                class="sidebar-link">Billing Structure List</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('form16'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('form16') }}"
                                                class="sidebar-link">Form
                                                16</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if (auth()->user()->hasPermission('manage-roles'))
                            <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub"
                                    data-dropdown="ecommerceDropdown"><span class="nav-icon"><i
                                            class="fa-light fa-envelope-open-text"></i></span> <span
                                        class="sidebar-txt">User & Role</span></a>
                                <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                    {{-- @if (auth()->user()->hasPermission('add-user')) --}}
                                    <li class="sidebar-dropdown-item"><a href="{{ route('add-user') }}"
                                            class="sidebar-link">Add User</a></li>
                                    {{-- @endif --}}
                                    {{-- @if (auth()->user()->hasPermission('manage-roles')) --}}
                                    <li class="sidebar-dropdown-item"><a href="{{ route('manage-roles') }}"
                                            class="sidebar-link">Manage (Roles)</a></li>
                                    {{-- @endif --}}

                                </ul>
                            </li>
                        @endif
                        @if (auth()->user()->hasPermission('holiday-list'))
                            <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub"
                                    data-dropdown="ecommerceDropdown"><span class="nav-icon"><i
                                            class="fa-solid fa-business-time"></i></span> <span
                                        class="sidebar-txt">Leave</span></a>
                                <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                    @if (auth()->user()->hasPermission('holiday-list'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('emp-leaves') }}"
                                                class="sidebar-link">Leave List</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('holiday-list'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('holiday-list') }}"
                                                class="sidebar-link">Holiday List</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('applied-request-list'))
                                        <li class="sidebar-dropdown-item"><a
                                                href="{{ route('applied-request-list') }}"
                                                class="sidebar-link">Applied Request List</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('leave-regularization'))
                                        <li class="sidebar-dropdown-item"><a
                                                href="{{ route('leave-regularization') }}" class="sidebar-link">Leave
                                                Regularization</a></li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if (auth()->user()->hasPermission('employee-month-salary-slip'))
                            <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub"
                                    data-dropdown="ecommerceDropdown"><span class="nav-icon"><i
                                            class="fa-solid fa-clipboard-user"></i></span> <span
                                        class="sidebar-txt">Employee Details</span></a>
                                <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                    <li class="sidebar-dropdown-item"><a
                                            href="{{ route('employee-month-salary-slip') }}"
                                            class="sidebar-link">Employee Salary Slip</a></li>
                                </ul>
                            </li>
                        @endif
                        @if (auth()->user()->hasPermission('salary-slip'))
                            <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub"
                                    data-dropdown="ecommerceDropdown"><span class="nav-icon"><i
                                            class="fa-solid fa-receipt"></i></span> <span class="sidebar-txt">Salary
                                        Slip</span></a>
                                <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                    <li class="sidebar-dropdown-item"><a href="{{ route('salary-slip') }}"
                                            class="sidebar-link">Salary Slip</a></li>
                                </ul>
                            </li>
                        @endif
                        @if (auth()->user()->hasPermission('employee-profile-response-log'))
                            <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub"
                                    data-dropdown="ecommerceDropdown"><span class="nav-icon"><i
                                            class="fa-solid fa-leaf"></i></span> <span class="sidebar-txt">Response
                                        Log</span></a>
                                <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                    @if (auth()->user()->hasPermission('employee-profile-response-log'))
                                        <li class="sidebar-dropdown-item"><a
                                                href="{{ route('employee-profile-response-log') }}"
                                                class="sidebar-link">Employee Profile Response Log</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('recruiter-response-log'))
                                        <li class="sidebar-dropdown-item"><a
                                                href="{{ route('recruiter-response-log') }}"
                                                class="sidebar-link">Recruiter Response Log</a></li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if (auth()->user()->hasPermission('anniversary-wish-log'))
                            <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub"
                                    data-dropdown="ecommerceDropdown"><span class="nav-icon"><i
                                            class="fa-solid fa-envelope"></i></span> <span class="sidebar-txt">Mail
                                        Log</span></a>
                                <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                    @if (auth()->user()->hasPermission('anniversary-wish-log'))
                                        <li class="sidebar-dropdown-item"><a
                                                href="{{ route('anniversary-wish-log') }}"
                                                class="sidebar-link">Anniversary Wish Log</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('birthday-wish-log'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('birthday-wish-log') }}"
                                                class="sidebar-link">Birthday Wish Log</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('work-anniversary-wish-log'))
                                        <li class="sidebar-dropdown-item"><a
                                                href="{{ route('work-anniversary-wish-log') }}"
                                                class="sidebar-link">Work Anniversary Wish Log</a></li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if (auth()->user()->hasPermission('reimbursement.list'))
                            <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub"
                                    data-dropdown="ecommerceDropdown"><span class="nav-icon"><i
                                            class="fa-solid fa-business-time"></i></span> <span
                                        class="sidebar-txt">Reimbursement</span></a>
                                <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                    @if (auth()->user()->hasPermission('reimbursement.list'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('reimbursement.list') }}"
                                                class="sidebar-link">Reimbursement List</a></li>
                                    @endif

                                </ul>
                            </li>
                        @endif
                        @if (auth()->user()->hasPermission('my-team-list'))
                            <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub"
                                    data-dropdown="ecommerceDropdown"><span class="nav-icon"><i
                                            class="fa-solid fa-people-group"></i></span> <span class="sidebar-txt">My
                                        Team </span></a>
                                <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                    <li class="sidebar-dropdown-item"><a href="{{ route('my-team-list') }}"
                                            class="sidebar-link">Team User</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if (auth()->user()->hasPermission('attendance-list'))
                            <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub"
                                    data-dropdown="ecommerceDropdown"><span class="nav-icon"><i
                                            class="fa-brands fa-creative-commons-by"></i></span> <span
                                        class="sidebar-txt">Attendace</span></a>
                                <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                    @if (auth()->user()->hasPermission('upload-attendance'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('upload-attendance') }}"
                                                class="sidebar-link">Upload Attendace</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('attendance-list'))
                                        <li class="sidebar-dropdown-item"><a href="{{ route('attendance-list') }}"
                                                class="sidebar-link">Attendance List</a></li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if (auth()->user()->hasPermission('events.birthday-list') ||
                                auth()->user()->hasPermission('events.marriage-anniversary-list') ||
                                auth()->user()->hasPermission('events.work-anniversary-list'))
                            <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub"
                                    data-dropdown="ecommerceDropdown"><span class="nav-icon"><i
                                            class="fa-solid fa-calendar-days"></i></span> <span
                                        class="sidebar-txt">Upcoming Event</span></a>
                                <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                    @if (auth()->user()->hasPermission('events.birthday-list'))
                                        <li class="sidebar-dropdown-item"><a
                                                href="{{ route('events.birthday-list') }}"
                                                class="sidebar-link">Birthday List</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('events.marriage-anniversary-list'))
                                        <li class="sidebar-dropdown-item"><a
                                                href="{{ route('events.marriage-anniversary-list') }}"
                                                class="sidebar-link">Marriage Anniversary List</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermission('events.work-anniversary-list'))
                                        <li class="sidebar-dropdown-item">
                                            <a href="{{ route('events.work-anniversary-list') }}"
                                                class="sidebar-link">Work Anniversary List</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif

                        <ul class="sidebar-link-group">
                            @if (auth()->user()->hasPermission('employee.sent-credentials-logs'))
                                <li class="sidebar-dropdown-item">
                                    <a role="button" class="sidebar-link has-sub"
                                        data-dropdown="advanceUiDropdown"><span class="nav-icon"><i
                                                class="fa-solid fa-right-from-bracket"></i></span> <span
                                            class="sidebar-txt">Logs</span></a>
                                    <ul class="sidebar-dropdown-menu" id="advanceUiDropdown">
                                        <li class="sidebar-dropdown-item"><a
                                                href="{{ route('employee.sent-credentials-logs') }}"
                                                class="sidebar-link">Credential Log List</a></li>
                                    </ul>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermission('posh.complaint-list'))
                                <li class="sidebar-dropdown-item">
                                    <a role="button" class="sidebar-link has-sub"
                                        data-dropdown="advanceUiDropdown"><span class="nav-icon"><i
                                                class="fa-solid fa-person"></i></span> <span
                                            class="sidebar-txt">Posh</span></a>
                                    <ul class="sidebar-dropdown-menu" id="advanceUiDropdown">
                                        <li class="sidebar-dropdown-item"><a
                                                href="{{ route('posh.complaint-list') }}" class="sidebar-link">Posh
                                                Complaint List</a></li>
                                    </ul>
                                </li>
                            @endif

                            @if (auth()->user()->hasPermission('vendors.index'))
                                <li class="sidebar-dropdown-item">
                                    <a role="button" class="sidebar-link has-sub"
                                        data-dropdown="advanceUiDropdown"><span class="nav-icon"><i
                                                class="fa-solid fa-person"></i></span> <span
                                            class="sidebar-txt">VMS</span></a>
                                    <ul class="sidebar-dropdown-menu" id="advanceUiDropdown">
                                        <li class="sidebar-dropdown-item"><a href="{{ route('vendors.index') }}"
                                                class="sidebar-link">Vendors</a></li>
                                        @if (auth()->user()->hasPermission('clients.index'))
                                            <li class="sidebar-dropdown-item"><a href="{{ route('clients.index') }}"
                                                    class="sidebar-link">Clients</a></li>
                                        @endif

                                    </ul>
                                </li>
                            @endif
                            {{-- <li class="help-center">
                        <li class="help-center">
                            <h3>Help Center</h3>
                            <p>We're an award-winning, forward thinking</p>
                            <a href="#" class="btn btn-sm btn-light">Go to Help Center</a>
                        </li> --}}
                        </ul>
                </ul>
                <!-- If logged-in user is employee. -->
                @endif

                @if (auth('employee')->check())
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">

                        </li>
                        <li class="sidebar-dropdown-item">
                            <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span
                                    class="nav-icon"><i class="fa-solid fa-magnifying-glass"></i></span> <span
                                    class="sidebar-txt">Home</span></a>
                            <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                <li class="sidebar-dropdown-item"><a href="{{ route('employee_dashboard') }}"
                                        class="sidebar-link">Home</a></li>

                            </ul>
                        </li>

                        <li class="sidebar-dropdown-item">
                            <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span
                                    class="nav-icon"><i class="fa-solid fa-user"></i></span> <span
                                    class="sidebar-txt">Profile</span></a>
                            <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                @if (auth('employee')->user()->hasPermission('employee.myprofile'))
                                <li class="sidebar-dropdown-item"><a href="{{ route('employee.myprofile') }}"
                                        class="sidebar-link">My Account</a></li>
                                    @endif
                                @if (auth('employee')->user()->hasPermission('profile.modify-profile-request'))
                                    <li class="sidebar-dropdown-item"><a
                                            href="{{ route('profile.modify-profile-request') }}"
                                            class="sidebar-link">Modify Profile Request</a></li>
                                @endif
                                @if (auth('employee')->user()->hasPermission('profile.profile-detail-request-list'))
                                    <li class="sidebar-dropdown-item"><a
                                            href="{{ route('profile.profile-detail-request-list') }}"
                                            class="sidebar-link">Profile Request Log</a></li>
                                @endif



                            </ul>
                        </li>
                        {{-- <li class="sidebar-dropdown-item">
                            <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span
                                    class="nav-icon"><i class="fa-solid fa-envelope"></i></span> <span
                                    class="sidebar-txt">Helpdesk</span></a>
                            <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                <li class="sidebar-dropdown-item"><a href="{{ route('employee-compose-email') }}"
                                        class="sidebar-link">Compose Mail</a></li>

                            </ul>
                        </li> --}}

                        @if (auth('employee')->user()->hasPermission('compose-email'))
                        <li class="sidebar-dropdown-item">
                            <a role="button" class="sidebar-link has-sub"
                                data-dropdown="ecommerceDropdown"><span class="nav-icon"><i
                                        class="fa-solid fa-envelope"></i></span> <span
                                    class="sidebar-txt">Helpdesk</span></a>
                            <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                <li class="sidebar-dropdown-item"><a href="{{ route('compose-email') }}"
                                        class="sidebar-link">Compose Mail</a></li>

                            </ul>
                        </li>
                    @endif


                        <li class="sidebar-dropdown-item">
                            <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span
                                    class="nav-icon"><i class="fa-solid fa-business-time"></i></span> <span
                                    class="sidebar-txt">Leave</span></a>
                            <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                {{-- <li class="sidebar-dropdown-item"><a href="{{ route('employee-holiday-list') }}"
                                        class="sidebar-link">Holiday List</a></li> --}}
                                        @if (auth('employee')->user()->hasPermission('holiday-list'))
                                <li class="sidebar-dropdown-item"><a href="{{ route('holiday-list') }}"
                                        class="sidebar-link">Holiday List</a></li>
                                        @endif

                                        @if (auth('employee')->user()->hasPermission('leave.leave_request'))
                                <li class="sidebar-dropdown-item"><a
                                        href="{{ route('leave.leave_request') }}" class="sidebar-link">Apply
                                        Leave</a></li>
                                        @endif
                                <li class="sidebar-dropdown-item"><a
                                        href="{{ route('employee-applied-request-list') }}"
                                        class="sidebar-link">Applied Request List</a></li>
                                <li class="sidebar-dropdown-item"><a href="{{ route('leave-taken') }}"
                                        class="sidebar-link">Leave Taken</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span
                                    class="nav-icon"><i class="fa-solid fa-clipboard-user"></i></span> <span
                                    class="sidebar-txt">Employee Details</span></a>
                            <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                <li class="sidebar-dropdown-item"><a href="{{ route('employee-salary-slip') }}"
                                        class="sidebar-link">Employee Salary Slip</a></li>
                            </ul>
                        </li>

                        <ul class="sidebar-link-group">
                            {{-- <li class="sidebar-dropdown-item">
                                <a role="button" class="sidebar-link has-sub"
                                    data-dropdown="advanceUiDropdown"><span class="nav-icon"><i
                                            class="fa-solid fa-right-from-bracket"></i></span> <span
                                        class="sidebar-txt">Reimbursement</span></a>
                                <ul class="sidebar-dropdown-menu" id="advanceUiDropdown">
                                    <li class="sidebar-dropdown-item"><a href="{{ route('create-reimbursement') }}"
                                            class="sidebar-link">Apply Reimbursement</a></li>
                                    <li class="sidebar-dropdown-item"><a
                                            href="{{ route('reiembursement-list-employee') }}"
                                            class="sidebar-link">Reimbursement List</a></li>
                                </ul>
                            </li> --}}
                            <li class="help-center">
                                <h3>Help Center</h3>
                                <p>We're an award-winning, forward thinking</p>
                                <a href="#" class="btn btn-sm btn-light">Go to Help Center</a>
                            </li>

                        </ul>
                @endif
        </ul>
        </li>
        </ul>
    </div>
</div>
