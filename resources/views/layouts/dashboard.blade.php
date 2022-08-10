{{-- https://github.com/hassamulhaq/epic-crm @devhassam --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="{{ asset('/css/ui/vendors/flatpickr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/ui/style.css') }}" rel="stylesheet">
</head>

<body class="gs bs hi g_" :class="{ 'sidebar-expanded': sidebarExpanded }"
      x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }"
      x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))">

<script>
    if (localStorage.getItem('sidebar-expanded') === 'true') {
        document.querySelector('body').classList.add('sidebar-expanded');
    } else {
        document.querySelector('body').classList.remove('sidebar-expanded');
    }
</script>

<!-- Page wrapper -->
<div class="flex ss la">
    <!-- Sidebar -->
    <div>
        <!-- Sidebar backdrop (mobile only) -->
        <div class="m w bg-slate-900 pu tb tex ted bz wr" :class="sidebarOpen ? 'ba' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak=""></div>

        <!-- Sidebar -->
        <div id="sidebar" class="flex ak g tb x k tea tec teh tts ss lp tth l or tej ttz 2xl:!w-64 ub hs dw we wr wu"
             :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'" @click.outside="sidebarOpen = false"
             @keydown.escape.window="sidebarOpen = false" x-cloak="lg">

            <!-- Sidebar header -->
            <div class="flex fe nx vq j_">
                <!-- Close button -->
                <button class="tex text-slate-500 xl" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar"
                        :aria-expanded="sidebarOpen">
                    <span class="d">Close sidebar</span>
                    <svg class="oi so du" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"></path>
                    </svg>
                </button>
                <!-- Logo -->
                <a class="block" href="{{ route('admin.dashboard') }}">
                    <svg width="32" height="32" viewBox="0 0 32 32">
                        <defs>
                            <linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%" id="logo-a">
                                <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%"></stop>
                                <stop stop-color="#A5B4FC" offset="100%"></stop>
                            </linearGradient>
                            <linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%" id="logo-b">
                                <stop stop-color="#38BDF8" stop-opacity="0" offset="0%"></stop>
                                <stop stop-color="#38BDF8" offset="100%"></stop>
                            </linearGradient>
                        </defs>
                        <rect fill="#6366F1" width="32" height="32" rx="16"></rect>
                        <path
                            d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z"
                            fill="#4F46E5"></path>
                        <path
                            d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z"
                            fill="url(#logo-a)"></path>
                        <path
                            d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z"
                            fill="url(#logo-b)"></path>
                    </svg>
                </a>
            </div>
            <!-- /Sidebar header -->

            <!-- Menu -->
            {{--@include('components/backend/sidebar/sidebar-menu/sidebar-menu', [])--}}
            <x-sidebar-menu></x-sidebar-menu>
            <!-- /Menu -->
        </div>

        <!-- Expand | collapse button -->
        <div class="mt hidden tew 2xl:hidden justify-end rn">
            <div class="vn vr">
                <button @click="sidebarExpanded = !sidebarExpanded">
                    <span class="d">Expand / collapse sidebar</span>
                    <svg class="oi so du _o" viewBox="0 0 24 24">
                        <path class="gq"
                              d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z"></path>
                        <path class="g_" d="M3 23H1V1h2z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <!-- /Expand | collapse button -->
    </div>
    <!-- /Sidebar -->

    <!-- Content area -->
    <div class="y flex ak ug ll lc">

        <!-- Site header -->
        @include('layouts/header')

        <main>
            <div class="vs jj ttm vl ou uf na">
            @yield('content')
            </div>
        </main>

    </div>

</div>

<script src="{{ asset('/js/ui/vendors/alpinejs.min.js') }}" defer=""></script>
<script src="{{ asset('/js/ui/vendors/chart.js') }}"></script>
<script src="{{ asset('/js/ui/vendors/moment.js') }}"></script>
<script src="{{ asset('/js/ui/vendors/chartjs-adapter-moment.js') }}"></script>
<script src="{{ asset('/js/ui/dashboard-charts.js') }}"></script>
<script src="{{ asset('/js/ui/vendors/flatpickr.js') }}"></script>
<script src="{{ asset('/js/ui/flatpickr-init.js') }}"></script>

<script>
    console.log("%cImportant!", "color: blue; font-size: x-large");
</script>
<script>const pagesList = [{
        "name": "Dashboard",
        "url": "http://127.0.0.1:8000/mosaic/index.html",
        "active": true
    }, {
        "name": "Analytics",
        "url": "http://127.0.0.1:8000/mosaic/analytics.html",
        "active": false
    }, {
        "name": "Fintech",
        "url": "http://127.0.0.1:8000/mosaic/fintech.html",
        "active": false
    }, {
        "name": "Customers",
        "url": "http://127.0.0.1:8000/mosaic/customers.html",
        "active": false
    }, {"name": "Orders", "url": "http://127.0.0.1:8000/mosaic/orders.html", "active": false}, {
        "name": "Invoices",
        "url": "http://127.0.0.1:8000/mosaic/invoices.html",
        "active": false
    }, {"name": "Shop", "url": "http://127.0.0.1:8000/mosaic/shop.html", "active": false}, {
        "name": "Shop 2",
        "url": "http://127.0.0.1:8000/mosaic/shop-2.html",
        "active": false
    }, {
        "name": "Single Product",
        "url": "http://127.0.0.1:8000/mosaic/product.html",
        "active": false
    }, {"name": "Cart", "url": "http://127.0.0.1:8000/mosaic/cart.html", "active": false}, {
        "name": "Cart 2",
        "url": "http://127.0.0.1:8000/mosaic/cart-2.html",
        "active": false
    }, {"name": "Cart 3", "url": "http://127.0.0.1:8000/mosaic/cart-3.html", "active": false}, {
        "name": "Pay",
        "url": "http://127.0.0.1:8000/mosaic/pay.html",
        "active": false
    }, {
        "name": "Campaigns",
        "url": "http://127.0.0.1:8000/mosaic/campaigns.html",
        "active": false
    }, {
        "name": "Users Tabs",
        "url": "http://127.0.0.1:8000/mosaic/users-tabs.html",
        "active": false
    }, {
        "name": "Users Tiles",
        "url": "http://127.0.0.1:8000/mosaic/users-tiles.html",
        "active": false
    }, {"name": "Profile", "url": "http://127.0.0.1:8000/mosaic/profile.html", "active": false}, {
        "name": "Feed",
        "url": "http://127.0.0.1:8000/mosaic/feed.html",
        "active": false
    }, {"name": "Forum", "url": "http://127.0.0.1:8000/mosaic/forum.html", "active": false}, {
        "name": "Forum Post",
        "url": "http://127.0.0.1:8000/mosaic/forum-post.html",
        "active": false
    }, {
        "name": "Meetups",
        "url": "http://127.0.0.1:8000/mosaic/meetups.html",
        "active": false
    }, {
        "name": "Meetups Post",
        "url": "http://127.0.0.1:8000/mosaic/meetups-post.html",
        "active": false
    }, {
        "name": "Cards",
        "url": "http://127.0.0.1:8000/mosaic/credit-cards.html",
        "active": false
    }, {
        "name": "Transactions",
        "url": "http://127.0.0.1:8000/mosaic/transactions.html",
        "active": false
    }, {
        "name": "Transaction Details",
        "url": "http://127.0.0.1:8000/mosaic/transaction-details.html",
        "active": false
    }, {
        "name": "Jobs Listing",
        "url": "http://127.0.0.1:8000/mosaic/job-listing.html",
        "active": false
    }, {
        "name": "Jobs Post",
        "url": "http://127.0.0.1:8000/mosaic/job-post.html",
        "active": false
    }, {
        "name": "Company Profile",
        "url": "http://127.0.0.1:8000/mosaic/company-profile.html",
        "active": false
    }, {
        "name": "Kanban",
        "url": "http://127.0.0.1:8000/mosaic/tasks-kanban.html",
        "active": false
    }, {
        "name": "Tasks List",
        "url": "http://127.0.0.1:8000/mosaic/tasks-list.html",
        "active": false
    }, {"name": "Messages", "url": "http://127.0.0.1:8000/mosaic/messages.html", "active": false}, {
        "name": "Inbox",
        "url": "http://127.0.0.1:8000/mosaic/inbox.html",
        "active": false
    }, {
        "name": "Calendar",
        "url": "http://127.0.0.1:8000/mosaic/calendar.html",
        "active": false
    }, {
        "name": "Applications",
        "url": "http://127.0.0.1:8000/mosaic/applications.html",
        "active": false
    }, {
        "name": "My Account",
        "url": "http://127.0.0.1:8000/mosaic/settings.html",
        "active": false
    }, {
        "name": "My Notifications",
        "url": "http://127.0.0.1:8000/mosaic/notifications.html",
        "active": false
    }, {
        "name": "Connected Apps",
        "url": "http://127.0.0.1:8000/mosaic/connected-apps.html",
        "active": false
    }, {
        "name": "Plans",
        "url": "http://127.0.0.1:8000/mosaic/plans.html",
        "active": false
    }, {
        "name": "Billing & Invoices",
        "url": "http://127.0.0.1:8000/mosaic/billing.html",
        "active": false
    }, {
        "name": "Give Feedback",
        "url": "http://127.0.0.1:8000/mosaic/feedback.html",
        "active": false
    }, {
        "name": "Changelog",
        "url": "http://127.0.0.1:8000/mosaic/changelog.html",
        "active": false
    }, {"name": "Roadmap", "url": "http://127.0.0.1:8000/mosaic/roadmap.html", "active": false}, {
        "name": "FAQs",
        "url": "http://127.0.0.1:8000/mosaic/faqs.html",
        "active": false
    }, {
        "name": "Empty State",
        "url": "http://127.0.0.1:8000/mosaic/empty-state.html",
        "active": false
    }, {
        "name": "Page Not Found",
        "url": "http://127.0.0.1:8000/mosaic/404.html",
        "active": false
    }, {
        "name": "Knowledge Base",
        "url": "http://127.0.0.1:8000/mosaic/knowledge-base.html",
        "active": false
    }, {"name": "Sign in", "url": "http://127.0.0.1:8000/mosaic/signin.html", "active": false}, {
        "name": "Sign up",
        "url": "http://127.0.0.1:8000/mosaic/signup.html",
        "active": false
    }, {
        "name": "Reset password",
        "url": "http://127.0.0.1:8000/mosaic/reset-password.html",
        "active": false
    }, {
        "name": "Onboarding 1",
        "url": "http://127.0.0.1:8000/mosaic/onboarding-01.html",
        "active": false
    }, {
        "name": "Onboarding 2",
        "url": "http://127.0.0.1:8000/mosaic/onboarding-02.html",
        "active": false
    }, {
        "name": "Onboarding 3",
        "url": "http://127.0.0.1:8000/mosaic/onboarding-03.html",
        "active": false
    }, {
        "name": "Onboarding 4",
        "url": "http://127.0.0.1:8000/mosaic/onboarding-04.html",
        "active": false
    }, {
        "name": "Button",
        "url": "http://127.0.0.1:8000/mosaic/component-button.html",
        "active": false
    }, {
        "name": "Input Form",
        "url": "http://127.0.0.1:8000/mosaic/component-form.html",
        "active": false
    }, {
        "name": "Dropdown",
        "url": "http://127.0.0.1:8000/mosaic/component-dropdown.html",
        "active": false
    }, {
        "name": "Alert & Banner",
        "url": "http://127.0.0.1:8000/mosaic/component-alert.html",
        "active": false
    }, {
        "name": "Modal",
        "url": "http://127.0.0.1:8000/mosaic/component-modal.html",
        "active": false
    }, {
        "name": "Pagination",
        "url": "http://127.0.0.1:8000/mosaic/component-pagination.html",
        "active": false
    }, {
        "name": "Tabs",
        "url": "http://127.0.0.1:8000/mosaic/component-tabs.html",
        "active": false
    }, {
        "name": "Breadcrumb",
        "url": "http://127.0.0.1:8000/mosaic/component-breadcrumb.html",
        "active": false
    }, {
        "name": "Badge",
        "url": "http://127.0.0.1:8000/mosaic/component-badge.html",
        "active": false
    }, {
        "name": "Avatar",
        "url": "http://127.0.0.1:8000/mosaic/component-avatar.html",
        "active": false
    }, {
        "name": "Tooltip",
        "url": "http://127.0.0.1:8000/mosaic/component-tooltip.html",
        "active": false
    }, {
        "name": "Accordion",
        "url": "http://127.0.0.1:8000/mosaic/component-accordion.html",
        "active": false
    }, {"name": "Icons", "url": "http://127.0.0.1:8000/mosaic/component-icons.html", "active": false}];
    if (window != top) {
        window.parent.postMessage(pagesList, "http://127.0.0.1:8000/")
    }

</script>
</body>
</html>
