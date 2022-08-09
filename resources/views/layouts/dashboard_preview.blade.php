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
    if (localStorage.getItem('sidebar-expanded') == 'true') {
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
        <div class="m w bg-slate-900 pu tb tex ted bz wr" :class="sidebarOpen ? 'ba' : 'opacity-0 pointer-events-none'"
             aria-hidden="true" x-cloak=""></div>

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
                <a class="block" href="index-2.html">
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

            <!-- Links -->
            <div class="ff">
                <!-- Pages group -->
                <div>
                    <h3 class="go gv text-slate-500 gh vz">
                        <span class="hidden tey ttq 2xl:hidden gn oi" aria-hidden="true">•••</span>
                        <span class="tex ttj 2xl:block">Pages</span>
                    </h3>
                    <ul class="nk">
                        <!-- Dashboard -->
                        <li class="vn vr rounded-sm n_ ww bg-slate-900" x-data="{ open: true }">
                            <a class="block gj ld wt wi" href="#0"
                               @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center fe">
                                    <div class="flex items-center">
                                        <svg class="ub so oi" viewBox="0 0 24 24">
                                            <path class="du text-indigo-500"
                                                  d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z"></path>
                                            <path class="du text-indigo-600"
                                                  d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z"></path>
                                            <path class="du text-indigo-200"
                                                  d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z"></path>
                                        </svg>
                                        <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Dashboard</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex ub nq ttw tnn 2xl:opacity--100 wr">
                                        <svg class="w-3 h-3 ub nz du gq" :class="open ? 'as' : 'ao'"
                                             viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="tex ttj 2xl:block">
                                <ul class="me re" :class="open ? '!block' : 'hidden'">
                                    <li class="rt ww">
                                        <a class="block text-indigo-500 wt wi ld" href="{{ route('dashboard') }}">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Main</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="analytics.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Analytics</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="fintech.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Fintech</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- E-Commerce -->
                        <li class="vn vr rounded-sm n_ ww" x-data="{ open: false }">
                            <a class="block gj xc ld wt wi" href="#0"
                               @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center fe">
                                    <div class="flex items-center">
                                        <svg class="ub so oi" viewBox="0 0 24 24">
                                            <path class="du gq"
                                                  d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z"></path>
                                            <path class="du gz"
                                                  d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z"></path>
                                            <path class="du g_"
                                                  d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z"></path>
                                        </svg>
                                        <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">E-Commerce</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex ub nq ttw tnn 2xl:opacity--100 wr">
                                        <svg class="w-3 h-3 ub nz du gq" :class="open ? 'as' : 'ao'"
                                             viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="tex ttj 2xl:block">
                                <ul class="me re hidden" :class="open ? '!block' : 'hidden'">
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="customers.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Customers</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="orders.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Orders</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="invoices.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Invoices</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="shop.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Shop</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="shop-2.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Shop 2</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="product.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Single Product</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="cart.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Cart</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="cart-2.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Cart 2</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="cart-3.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Cart 3</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="pay.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Pay</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Community -->
                        <li class="vn vr rounded-sm n_ ww" x-data="{ open: false }">
                            <a class="block gj xc ld wt wi" href="#0"
                               @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center fe">
                                    <div class="flex items-center">
                                        <svg class="ub so oi" viewBox="0 0 24 24">
                                            <path class="du g_"
                                                  d="M18.974 8H22a2 2 0 012 2v6h-2v5a1 1 0 01-1 1h-2a1 1 0 01-1-1v-5h-2v-6a2 2 0 012-2h.974zM20 7a2 2 0 11-.001-3.999A2 2 0 0120 7zM2.974 8H6a2 2 0 012 2v6H6v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5H0v-6a2 2 0 012-2h.974zM4 7a2 2 0 11-.001-3.999A2 2 0 014 7z"></path>
                                            <path class="du gq"
                                                  d="M12 6a3 3 0 110-6 3 3 0 010 6zm2 18h-4a1 1 0 01-1-1v-6H6v-6a3 3 0 013-3h6a3 3 0 013 3v6h-3v6a1 1 0 01-1 1z"></path>
                                        </svg>
                                        <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Community</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex ub nq ttw tnn 2xl:opacity--100 wr">
                                        <svg class="w-3 h-3 ub nz du gq" :class="open ? 'as' : 'ao'"
                                             viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="tex ttj 2xl:block">
                                <ul class="me re hidden" :class="open ? '!block' : 'hidden'">
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="users-tabs.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Users - Tabs</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="users-tiles.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Users - Tiles</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="profile.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Profile</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="feed.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Feed</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="forum.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Forum</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="forum-post.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Forum - Post</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="meetups.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Meetups</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="meetups-post.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Meetups - Post</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Finance -->
                        <li class="vn vr rounded-sm n_ ww" x-data="{ open: false }">
                            <a class="block gj xc ld wt wi" href="#0"
                               @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center fe">
                                    <div class="flex items-center">
                                        <svg class="ub so oi" viewBox="0 0 24 24">
                                            <path class="du gq"
                                                  d="M13 6.068a6.035 6.035 0 0 1 4.932 4.933H24c-.486-5.846-5.154-10.515-11-11v6.067Z"></path>
                                            <path class="du gz"
                                                  d="M18.007 13c-.474 2.833-2.919 5-5.864 5a5.888 5.888 0 0 1-3.694-1.304L4 20.731C6.131 22.752 8.992 24 12.143 24c6.232 0 11.35-4.851 11.857-11h-5.993Z"></path>
                                            <path class="du g_"
                                                  d="M6.939 15.007A5.861 5.861 0 0 1 6 11.829c0-2.937 2.167-5.376 5-5.85V0C4.85.507 0 5.614 0 11.83c0 2.695.922 5.174 2.456 7.17l4.483-3.993Z"></path>
                                        </svg>
                                        <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Finance</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex ub nq ttw tnn 2xl:opacity--100 wr">
                                        <svg class="w-3 h-3 ub nz du gq" :class="open ? 'as' : 'ao'"
                                             viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="tex ttj 2xl:block">
                                <ul class="me re hidden" :class="open ? '!block' : 'hidden'">
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="credit-cards.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Cards</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="transactions.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Transactions</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld"
                                           href="transaction-details.html">
                                            <span
                                                class="text-sm gp ttw tnn 2xl:opacity--100 wr">Transaction Details</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Job Board -->
                        <li class="vn vr rounded-sm n_ ww" x-data="{ open: false }">
                            <a class="block gj xc ld wt wi" href="#0"
                               @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center fe">
                                    <div class="flex items-center">
                                        <svg class="ub so oi" viewBox="0 0 24 24">
                                            <path class="du gz"
                                                  d="M4.418 19.612A9.092 9.092 0 0 1 2.59 17.03L.475 19.14c-.848.85-.536 2.395.743 3.673a4.413 4.413 0 0 0 1.677 1.082c.253.086.519.131.787.135.45.011.886-.16 1.208-.474L7 21.44a8.962 8.962 0 0 1-2.582-1.828Z"></path>
                                            <path class="du g_"
                                                  d="M10.034 13.997a11.011 11.011 0 0 1-2.551-3.862L4.595 13.02a2.513 2.513 0 0 0-.4 2.645 6.668 6.668 0 0 0 1.64 2.532 5.525 5.525 0 0 0 3.643 1.824 2.1 2.1 0 0 0 1.534-.587l2.883-2.882a11.156 11.156 0 0 1-3.861-2.556Z"></path>
                                            <path class="du gq"
                                                  d="M21.554 2.471A8.958 8.958 0 0 0 18.167.276a3.105 3.105 0 0 0-3.295.467L9.715 5.888c-1.41 1.408-.665 4.275 1.733 6.668a8.958 8.958 0 0 0 3.387 2.196c.459.157.94.24 1.425.246a2.559 2.559 0 0 0 1.87-.715l5.156-5.146c1.415-1.406.666-4.273-1.732-6.666Zm.318 5.257c-.148.147-.594.2-1.256-.018A7.037 7.037 0 0 1 18.016 6c-1.73-1.728-2.104-3.475-1.73-3.845a.671.671 0 0 1 .465-.129c.27.008.536.057.79.146a7.07 7.07 0 0 1 2.6 1.711c1.73 1.73 2.105 3.472 1.73 3.846Z"></path>
                                        </svg>
                                        <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Job Board</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex ub nq ttw tnn 2xl:opacity--100 wr">
                                        <svg class="w-3 h-3 ub nz du gq" :class="open ? 'as' : 'ao'"
                                             viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="tex ttj 2xl:block">
                                <ul class="me re hidden" :class="open ? '!block' : 'hidden'">
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="job-listing.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Listing</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="job-post.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Job Post</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="company-profile.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Company Profile</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Tasks -->
                        <li class="vn vr rounded-sm n_ ww" x-data="{ open: false }">
                            <a class="block gj xc ld wt wi" href="#0"
                               @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center fe">
                                    <div class="flex items-center">
                                        <svg class="ub so oi" viewBox="0 0 24 24">
                                            <path class="du g_" d="M8 1v2H3v19h18V3h-5V1h7v23H1V1z"></path>
                                            <path class="du g_" d="M1 1h22v23H1z"></path>
                                            <path class="du gq"
                                                  d="M15 10.586L16.414 12 11 17.414 7.586 14 9 12.586l2 2zM5 0h14v4H5z"></path>
                                        </svg>
                                        <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Tasks</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex ub nq ttw tnn 2xl:opacity--100 wr">
                                        <svg class="w-3 h-3 ub nz du gq" :class="open ? 'as' : 'ao'"
                                             viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="tex ttj 2xl:block">
                                <ul class="me re hidden" :class="open ? '!block' : 'hidden'">
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="tasks-kanban.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Kanban</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="tasks-list.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">List</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Messages -->
                        <li class="vn vr rounded-sm n_ ww">
                            <a class="block gj xc ld wt wi" href="messages.html">
                                <div class="flex items-center fe">
                                    <div class="uw flex items-center">
                                        <svg class="ub so oi" viewBox="0 0 24 24">
                                            <path class="du g_"
                                                  d="M14.5 7c4.695 0 8.5 3.184 8.5 7.111 0 1.597-.638 3.067-1.7 4.253V23l-4.108-2.148a10 10 0 01-2.692.37c-4.695 0-8.5-3.184-8.5-7.11C6 10.183 9.805 7 14.5 7z"></path>
                                            <path class="du gq"
                                                  d="M11 1C5.477 1 1 4.582 1 9c0 1.797.75 3.45 2 4.785V19l4.833-2.416C8.829 16.85 9.892 17 11 17c5.523 0 10-3.582 10-8s-4.477-8-10-8z"></path>
                                        </svg>
                                        <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Messages</span>
                                    </div>
                                    <!-- Badge -->
                                    <div class="flex uy nq">
                                        <span class="inline-flex items-center justify-center su go gp ye ho vi rounded">4</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- Inbox -->
                        <li class="vn vr rounded-sm n_ ww">
                            <a class="block gj xc ld wt wi" href="inbox.html">
                                <div class="flex items-center">
                                    <svg class="ub so oi" viewBox="0 0 24 24">
                                        <path class="du g_" d="M16 13v4H8v-4H0l3-9h18l3 9h-8Z"></path>
                                        <path class="du gq"
                                              d="m23.72 12 .229.686A.984.984 0 0 1 24 13v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-8c0-.107.017-.213.051-.314L.28 12H8v4h8v-4H23.72ZM13 0v7h3l-4 5-4-5h3V0h2Z"></path>
                                    </svg>
                                    <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Inbox</span>
                                </div>
                            </a>
                        </li>
                        <!-- Calendar -->
                        <li class="vn vr rounded-sm n_ ww">
                            <a class="block gj xc ld wt wi" href="calendar.html">
                                <div class="flex items-center">
                                    <svg class="ub so oi" viewBox="0 0 24 24">
                                        <path class="du g_" d="M1 3h22v20H1z"></path>
                                        <path class="du gq" d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z"></path>
                                    </svg>
                                    <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Calendar</span>
                                </div>
                            </a>
                        </li>
                        <!-- Campaigns -->
                        <li class="vn vr rounded-sm n_ ww">
                            <a class="block gj xc ld wt wi" href="campaigns.html">
                                <div class="flex items-center">
                                    <svg class="ub so oi" viewBox="0 0 24 24">
                                        <path class="du g_"
                                              d="M20 7a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 0120 7zM4 23a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 014 23z"></path>
                                        <path class="du gq"
                                              d="M17 23a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 010-2 4 4 0 004-4 1 1 0 012 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1zM7 13a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 110-2 4 4 0 004-4 1 1 0 112 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1z"></path>
                                    </svg>
                                    <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Campaigns</span>
                                </div>
                            </a>
                        </li>
                        <!-- Settings -->
                        <li class="vn vr rounded-sm n_ ww" x-data="{ open: false }">
                            <a class="block gj xc ld wt wi" href="#0"
                               @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center fe">
                                    <div class="flex items-center">
                                        <svg class="ub so oi" viewBox="0 0 24 24">
                                            <path class="du g_"
                                                  d="M19.714 14.7l-7.007 7.007-1.414-1.414 7.007-7.007c-.195-.4-.298-.84-.3-1.286a3 3 0 113 3 2.969 2.969 0 01-1.286-.3z"></path>
                                            <path class="du gq"
                                                  d="M10.714 18.3c.4-.195.84-.298 1.286-.3a3 3 0 11-3 3c.002-.446.105-.885.3-1.286l-6.007-6.007 1.414-1.414 6.007 6.007z"></path>
                                            <path class="du g_"
                                                  d="M5.7 10.714c.195.4.298.84.3 1.286a3 3 0 11-3-3c.446.002.885.105 1.286.3l7.007-7.007 1.414 1.414L5.7 10.714z"></path>
                                            <path class="du gq"
                                                  d="M19.707 9.292a3.012 3.012 0 00-1.415 1.415L13.286 5.7c-.4.195-.84.298-1.286.3a3 3 0 113-3 2.969 2.969 0 01-.3 1.286l5.007 5.006z"></path>
                                        </svg>
                                        <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Settings</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex ub nq ttw tnn 2xl:opacity--100 wr">
                                        <svg class="w-3 h-3 ub nz du gq" :class="open ? 'as' : 'ao'"
                                             viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="tex ttj 2xl:block">
                                <ul class="me re hidden" :class="open ? '!block' : 'hidden'">
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="settings.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">My Account</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="notifications.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">My Notifications</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="connected-apps.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Connected Apps</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="plans.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Plans</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="billing.html">
                                            <span
                                                class="text-sm gp ttw tnn 2xl:opacity--100 wr">Billing &amp; Invoices</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="feedback.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Give Feedback</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Utility -->
                        <li class="vn vr rounded-sm n_ ww" x-data="{ open: false }">
                            <a class="block gj xc ld wt wi" href="#0"
                               @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center fe">
                                    <div class="flex items-center">
                                        <svg class="ub so oi" viewBox="0 0 24 24">
                                            <circle class="du gq" cx="18.5" cy="5.5" r="4.5"></circle>
                                            <circle class="du g_" cx="5.5" cy="5.5" r="4.5"></circle>
                                            <circle class="du g_" cx="18.5" cy="18.5" r="4.5"></circle>
                                            <circle class="du gq" cx="5.5" cy="18.5" r="4.5"></circle>
                                        </svg>
                                        <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Utility</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex ub nq ttw tnn 2xl:opacity--100 wr">
                                        <svg class="w-3 h-3 ub nz du gq" :class="open ? 'as' : 'ao'"
                                             viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="tex ttj 2xl:block">
                                <ul class="me re hidden" :class="open ? '!block' : 'hidden'">
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="changelog.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Changelog</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="roadmap.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Roadmap</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="faqs.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">FAQs</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="empty-state.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Empty State</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="404.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">404</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="knowledge-base.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Knowledge Base</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- More group -->
                <div>
                    <h3 class="go gv text-slate-500 gh vz">
                        <span class="hidden tey ttq 2xl:hidden gn oi" aria-hidden="true">•••</span>
                        <span class="tex ttj 2xl:block">More</span>
                    </h3>
                    <ul class="nk">
                        <!-- Authentication -->
                        <li class="vn vr rounded-sm n_ ww" x-data="{ open: false }">
                            <a class="block gj xc wt wi" :class="open &amp;&amp; 'hover--text-slate-200'" href="#0"
                               @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center fe">
                                    <div class="flex items-center">
                                        <svg class="ub so oi" viewBox="0 0 24 24">
                                            <path class="du g_" d="M8.07 16H10V8H8.07a8 8 0 110 8z"></path>
                                            <path class="du gq" d="M15 12L8 6v5H0v2h8v5z"></path>
                                        </svg>
                                        <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Authentication</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex ub nq ttw tnn 2xl:opacity--100 wr">
                                        <svg class="w-3 h-3 ub nz du gq" :class="open ? 'as' : 'ao'"
                                             viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="tex ttj 2xl:block">
                                <ul class="me re hidden" :class="open ? '!block' : 'hidden'">
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="signin.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Sign In</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="signup.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Sign up</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="reset-password.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Reset Password</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Onboarding -->
                        <li class="vn vr rounded-sm n_ ww" x-data="{ open: false }">
                            <a class="block gj xc wt wi" :class="open &amp;&amp; 'hover--text-slate-200'" href="#0"
                               @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center fe">
                                    <div class="flex items-center">
                                        <svg class="ub so oi" viewBox="0 0 24 24">
                                            <path class="du g_"
                                                  d="M19 5h1v14h-2V7.414L5.707 19.707 5 19H4V5h2v11.586L18.293 4.293 19 5Z"></path>
                                            <path class="du gq"
                                                  d="M5 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm14 0a4 4 0 1 1 0-8 4 4 0 0 1 0 8ZM5 23a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm14 0a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z"></path>
                                        </svg>
                                        <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Onboarding</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex ub nq ttw tnn 2xl:opacity--100 wr">
                                        <svg class="w-3 h-3 ub nz du gq" :class="open ? 'as' : 'ao'"
                                             viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="tex ttj 2xl:block">
                                <ul class="me re hidden" :class="open ? '!block' : 'hidden'">
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="onboarding-01.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Step 1</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="onboarding-02.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Step 2</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="onboarding-03.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Step 3</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="onboarding-04.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Step 4</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Components -->
                        <li class="vn vr rounded-sm n_ ww" x-data="{ open: false }">
                            <a class="block gj xc wt wi" :class="open &amp;&amp; 'hover--text-slate-200'" href="#0"
                               @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center fe">
                                    <div class="flex items-center">
                                        <svg class="ub so oi" viewBox="0 0 24 24">
                                            <circle class="du g_" cx="16" cy="8" r="8"></circle>
                                            <circle class="du gq" cx="8" cy="16" r="8"></circle>
                                        </svg>
                                        <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Components</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex ub nq ttw tnn 2xl:opacity--100 wr">
                                        <svg class="w-3 h-3 ub nz du gq" :class="open ? 'as' : 'ao'"
                                             viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="tex ttj 2xl:block">
                                <ul class="me re hidden" :class="open ? '!block' : 'hidden'">
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="component-button.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Button</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="component-form.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Input Form</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld"
                                           href="component-dropdown.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Dropdown</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="component-alert.html">
                                            <span
                                                class="text-sm gp ttw tnn 2xl:opacity--100 wr">Alert &amp; Banner</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="component-modal.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Modal</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld"
                                           href="component-pagination.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Pagination</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="component-tabs.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Tabs</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld"
                                           href="component-breadcrumb.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Breadcrumb</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="component-badge.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Badge</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="component-avatar.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Avatar</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld"
                                           href="component-tooltip.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Tooltip</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld"
                                           href="component-accordion.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Accordion</span>
                                        </a>
                                    </li>
                                    <li class="rt ww">
                                        <a class="block gq hover--text-slate-200 wt wi ld" href="component-icons.html">
                                            <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Icons</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Expand / collapse button -->
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

        </div>
    </div>

    <!-- Content area -->
    <div class="y flex ak ug ll lc">

        <!-- Site header -->
        <header class="b k bg-white cs border-slate-200 tw">
            <div class="vs jj ttm">
                <div class="flex items-center fe sa rr">

                    <!-- Header: Left side -->
                    <div class="flex">
                        <!-- Hamburger button -->
                        <button class="text-slate-500 hover--text-slate-600 tex"
                                @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar"
                                :aria-expanded="sidebarOpen">
                            <span class="d">Open sidebar</span>
                            <svg class="oi so du" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <rect x="4" y="5" width="16" height="2"></rect>
                                <rect x="4" y="11" width="16" height="2"></rect>
                                <rect x="4" y="17" width="16" height="2"></rect>
                            </svg>
                        </button>

                    </div>

                    <!-- Header: Right side -->
                    <div class="flex items-center fl">

                        <!-- Search button -->
                        <div x-data="{ searchOpen: false }">
                            <!-- Button -->
                            <button class="os sf flex items-center justify-center hi xt wt wi rounded-full"
                                    :class="{ 'hu': searchOpen }"
                                    @click.prevent="searchOpen = true;if (searchOpen) $nextTick(()=>{$refs.searchInput.focus()});"
                                    aria-controls="search-modal">
                                <span class="d">Search</span>
                                <svg class="oo sl" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <path class="du text-slate-500"
                                          d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                                    <path class="du gq"
                                          d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                                </svg>
                            </button>
                            <!-- Modal backdrop -->
                            <div class="m w bg-slate-900 pu tx bz" x-show="searchOpen" x-transition:enter="wt wa wr"
                                 x-transition:enter-start="opacity-0" x-transition:enter-end="ba"
                                 x-transition:leave="wt wa ws" x-transition:leave-start="ba"
                                 x-transition:leave-end="opacity-0" aria-hidden="true" x-cloak=""></div>
                            <!-- Modal dialog -->
                            <div id="search-modal" class="m w tx la flex aj _ ri justify-center vs jj" role="dialog"
                                 aria-modal="true" x-show="searchOpen" x-transition:enter="wt wu wr"
                                 x-transition:enter-start="opacity-0 u_" x-transition:enter-end="ba uj"
                                 x-transition:leave="wt wu wr" x-transition:leave-start="ba uj"
                                 x-transition:leave-end="opacity-0 u_" x-cloak="">
                                <div class="bg-white lu ua ou oe rounded bd" @click.outside="searchOpen = false"
                                     @keydown.escape.window="searchOpen = false">
                                    <!-- Search form -->
                                    <form class="cs border-slate-200">
                                        <div class="y">
                                            <label for="modal-search" class="d">Search</label>
                                            <input id="modal-search" class="ou cn kf bo av vo mn mr" type="search"
                                                   placeholder="Search Anything…" x-ref="searchInput">
                                            <button class="g w j kk" type="submit" aria-label="Search">
                                                <svg class="oo sl ub du gq kj rs mr-2" viewBox="0 0 16 16"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                                                    <path
                                                        d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                    <div class="vu vi">
                                        <!-- Recent searches -->
                                        <div class="ro ww">
                                            <div class="go gh gq gv vi ru">Recent searches</div>
                                            <ul class="text-sm">
                                                <li>
                                                    <a class="flex items-center dx text-slate-800 xc xn rounded kk"
                                                       href="#0" @click="searchOpen = false" @focus="searchOpen = true"
                                                       @focusout="searchOpen = false">
                                                        <svg class="oo sl du gq kq _t ub ra" viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z"></path>
                                                        </svg>
                                                        <span>Form Builder - 23 hours on-demand video</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="flex items-center dx text-slate-800 xc xn rounded kk"
                                                       href="#0" @click="searchOpen = false" @focus="searchOpen = true"
                                                       @focusout="searchOpen = false">
                                                        <svg class="oo sl du gq kq _t ub ra" viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z"></path>
                                                        </svg>
                                                        <span>Access Mosaic on mobile and TV</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="flex items-center dx text-slate-800 xc xn rounded kk"
                                                       href="#0" @click="searchOpen = false" @focus="searchOpen = true"
                                                       @focusout="searchOpen = false">
                                                        <svg class="oo sl du gq kq _t ub ra" viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z"></path>
                                                        </svg>
                                                        <span>Product Update - Q4 2021</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="flex items-center dx text-slate-800 xc xn rounded kk"
                                                       href="#0" @click="searchOpen = false" @focus="searchOpen = true"
                                                       @focusout="searchOpen = false">
                                                        <svg class="oo sl du gq kq _t ub ra" viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z"></path>
                                                        </svg>
                                                        <span>Master Digital Marketing Strategy course</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="flex items-center dx text-slate-800 xc xn rounded kk"
                                                       href="#0" @click="searchOpen = false" @focus="searchOpen = true"
                                                       @focusout="searchOpen = false">
                                                        <svg class="oo sl du gq kq _t ub ra" viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z"></path>
                                                        </svg>
                                                        <span>Dedicated forms for products</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="flex items-center dx text-slate-800 xc xn rounded kk"
                                                       href="#0" @click="searchOpen = false" @focus="searchOpen = true"
                                                       @focusout="searchOpen = false">
                                                        <svg class="oo sl du gq kq _t ub ra" viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z"></path>
                                                        </svg>
                                                        <span>Product Update - Q4 2021</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Recent pages -->
                                        <div class="ro ww">
                                            <div class="go gh gq gv vi ru">Recent pages</div>
                                            <ul class="text-sm">
                                                <li>
                                                    <a class="flex items-center dx text-slate-800 xc xn rounded kk"
                                                       href="#0" @click="searchOpen = false" @focus="searchOpen = true"
                                                       @focusout="searchOpen = false">
                                                        <svg class="oo sl du gq kq _t ub ra" viewBox="0 0 16 16">
                                                            <path
                                                                d="M14 0H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h8l5-5V1c0-.6-.4-1-1-1zM3 2h10v8H9v4H3V2z"></path>
                                                        </svg>
                                                        <span><span class="gp text-slate-800 kq">Messages</span> - Conversation / … / Mike Mills</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="flex items-center dx text-slate-800 xc xn rounded kk"
                                                       href="#0" @click="searchOpen = false" @focus="searchOpen = true"
                                                       @focusout="searchOpen = false">
                                                        <svg class="oo sl du gq kq _t ub ra" viewBox="0 0 16 16">
                                                            <path
                                                                d="M14 0H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h8l5-5V1c0-.6-.4-1-1-1zM3 2h10v8H9v4H3V2z"></path>
                                                        </svg>
                                                        <span><span class="gp text-slate-800 kq">Messages</span> - Conversation / … / Eva Patrick</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Notifications button -->
                        <div class="y inline-flex" x-data="{ open: false }">
                            <button class="os sf flex items-center justify-center hi xt wt wi rounded-full"
                                    :class="{ 'hu': open }" aria-haspopup="true" @click.prevent="open = !open"
                                    :aria-expanded="open">
                                <span class="d">Notifications</span>
                                <svg class="oo sl" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <path class="du text-slate-500"
                                          d="M6.5 0C2.91 0 0 2.462 0 5.5c0 1.075.37 2.074 1 2.922V12l2.699-1.542A7.454 7.454 0 006.5 11c3.59 0 6.5-2.462 6.5-5.5S10.09 0 6.5 0z"></path>
                                    <path class="du gq"
                                          d="M16 9.5c0-.987-.429-1.897-1.147-2.639C14.124 10.348 10.66 13 6.5 13c-.103 0-.202-.018-.305-.021C7.231 13.617 8.556 14 10 14c.449 0 .886-.04 1.307-.11L15 16v-4h-.012C15.627 11.285 16 10.425 16 9.5z"></path>
                                </svg>
                                <div class="g k q oa sc ha cr cc rounded-full"></div>
                            </button>
                            <div class="uk tk g z q rf _g ut bg-white border border-slate-200 va rounded bd la re"
                                 @click.outside="open = false" @keydown.escape.window="open = false" x-show="open"
                                 x-transition:enter="wt wa wr au" x-transition:enter-start="opacity-0 uq"
                                 x-transition:enter-end="ba uj" x-transition:leave="wt wa wr"
                                 x-transition:leave-start="ba" x-transition:leave-end="opacity-0" x-cloak="">
                                <div class="go gh gq gv mi ms vs">Notifications</div>
                                <ul>
                                    <li class="cs border-slate-200 wk">
                                        <a class="block vr vs xr" href="#0" @click="open = false" @focus="open = true"
                                           @focusout="open = false">
                                            <span class="block text-sm ru">📣 <span class="gp text-slate-800">Edit your information in a swipe</span> Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.</span>
                                            <span class="block go gp gq">Feb 12, 2021</span>
                                        </a>
                                    </li>
                                    <li class="cs border-slate-200 wk">
                                        <a class="block vr vs xr" href="#0" @click="open = false" @focus="open = true"
                                           @focusout="open = false">
                                            <span class="block text-sm ru">📣 <span class="gp text-slate-800">Edit your information in a swipe</span> Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.</span>
                                            <span class="block go gp gq">Feb 9, 2021</span>
                                        </a>
                                    </li>
                                    <li class="cs border-slate-200 wk">
                                        <a class="block vr vs xr" href="#0" @click="open = false" @focus="open = true"
                                           @focusout="open = false">
                                            <span class="block text-sm ru">🚀<span class="gp text-slate-800">Say goodbye to paper receipts!</span> Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.</span>
                                            <span class="block go gp gq">Jan 24, 2020</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Info button -->
                        <div class="y inline-flex" x-data="{ open: false }">
                            <button class="os sf flex items-center justify-center hi xt wt wi rounded-full"
                                    :class="{ 'hu': open }" aria-haspopup="true" @click.prevent="open = !open"
                                    :aria-expanded="open">
                                <span class="d">Info</span>
                                <svg class="oo sl" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <path class="du text-slate-500"
                                          d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"></path>
                                </svg>
                            </button>
                            <div class="uk tk g z q un bg-white border border-slate-200 va rounded bd la re"
                                 @click.outside="open = false" @keydown.escape.window="open = false" x-show="open"
                                 x-transition:enter="wt wa wr au" x-transition:enter-start="opacity-0 uq"
                                 x-transition:enter-end="ba uj" x-transition:leave="wt wa wr"
                                 x-transition:leave-start="ba" x-transition:leave-end="opacity-0" x-cloak="">
                                <div class="go gh gq gv mi ms vn">Need help?</div>
                                <ul>
                                    <li>
                                        <a class="gp text-sm text-indigo-500 xh flex items-center vf vn" href="#0"
                                           @click="open = false" @focus="open = true" @focusout="open = false">
                                            <svg class="w-3 h-3 du text-indigo-300 ub mr-2" viewBox="0 0 12 12">
                                                <rect y="3" width="12" height="9" rx="1"></rect>
                                                <path d="M2 0h8v2H2z"></path>
                                            </svg>
                                            <span>Documentation</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="gp text-sm text-indigo-500 xh flex items-center vf vn" href="#0"
                                           @click="open = false" @focus="open = true" @focusout="open = false">
                                            <svg class="w-3 h-3 du text-indigo-300 ub mr-2" viewBox="0 0 12 12">
                                                <path
                                                    d="M10.5 0h-9A1.5 1.5 0 000 1.5v9A1.5 1.5 0 001.5 12h9a1.5 1.5 0 001.5-1.5v-9A1.5 1.5 0 0010.5 0zM10 7L8.207 5.207l-3 3-1.414-1.414 3-3L5 2h5v5z"></path>
                                            </svg>
                                            <span>Support Site</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="gp text-sm text-indigo-500 xh flex items-center vf vn" href="#0"
                                           @click="open = false" @focus="open = true" @focusout="open = false">
                                            <svg class="w-3 h-3 du text-indigo-300 ub mr-2" viewBox="0 0 12 12">
                                                <path
                                                    d="M11.854.146a.5.5 0 00-.525-.116l-11 4a.5.5 0 00-.015.934l4.8 1.921 1.921 4.8A.5.5 0 007.5 12h.008a.5.5 0 00.462-.329l4-11a.5.5 0 00-.116-.525z"></path>
                                            </svg>
                                            <span>Contact us</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Divider -->
                        <hr class="of so hu">

                        <!-- User button -->
                        <div class="y inline-flex" x-data="{ open: false }">
                            <button class="inline-flex justify-center items-center kk" aria-haspopup="true"
                                    @click.prevent="open = !open" :aria-expanded="open">
                                <img class="os sf rounded-full" src="{{ asset('/images/ui/user-avatar-32.png') }}" width="32" height="32"
                                     alt="User">
                                <div class="flex items-center ld">
                                    <span class="ld nq text-sm gp kz">Acme Inc.</span>
                                    <svg class="w-3 h-3 ub nz du gq" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="uk tk g z q un bg-white border border-slate-200 va rounded bd la re"
                                 @click.outside="open = false" @keydown.escape.window="open = false" x-show="open"
                                 x-transition:enter="wt wa wr au" x-transition:enter-start="opacity-0 uq"
                                 x-transition:enter-end="ba uj" x-transition:leave="wt wa wr"
                                 x-transition:leave-start="ba" x-transition:leave-end="opacity-0" x-cloak="">
                                <div class="mu ms vn rt cs border-slate-200">
                                    <div class="gp text-slate-800">Acme Inc.</div>
                                    <div class="go text-slate-500 gm">Administrator</div>
                                </div>
                                <ul>
                                    <li>
                                        <a class="gp text-sm text-indigo-500 xh flex items-center vf vn"
                                           href="settings.html" @click="open = false" @focus="open = true"
                                           @focusout="open = false">Settings</a>
                                    </li>
                                    <li>
                                        <a class="gp text-sm text-indigo-500 xh flex items-center vf vn"
                                           href="signin.html" @click="open = false" @focus="open = true"
                                           @focusout="open = false">Sign Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </header>

        <main>
            <div class="vs jj ttm vl ou uf na">

                <!-- Welcome banner -->
                <div class="y pr dw jk rounded-sm la rc">

                    <!-- Background illustration -->
                    <div class="g q k ip id pointer-events-none hidden tnh" aria-hidden="true">
                        <svg width="319" height="198" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs>
                                <path id="welcome-a" d="M64 0l64 128-64-20-64 20z"></path>
                                <path id="welcome-e" d="M40 0l40 80-40-12.5L0 80z"></path>
                                <path id="welcome-g" d="M40 0l40 80-40-12.5L0 80z"></path>
                                <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="welcome-b">
                                    <stop stop-color="#A5B4FC" offset="0%"></stop>
                                    <stop stop-color="#818CF8" offset="100%"></stop>
                                </linearGradient>
                                <linearGradient x1="50%" y1="24.537%" x2="50%" y2="100%" id="welcome-c">
                                    <stop stop-color="#4338CA" offset="0%"></stop>
                                    <stop stop-color="#6366F1" stop-opacity="0" offset="100%"></stop>
                                </linearGradient>
                            </defs>
                            <g fill="none" fill-rule="evenodd">
                                <g transform="rotate(64 36.592 105.604)">
                                    <mask id="welcome-d" fill="#fff">
                                        <use xlink:href="#welcome-a"></use>
                                    </mask>
                                    <use fill="url(#welcome-b)" xlink:href="#welcome-a"></use>
                                    <path fill="url(#welcome-c)" mask="url(#welcome-d)" d="M64-24h80v152H64z"></path>
                                </g>
                                <g transform="rotate(-51 91.324 -105.372)">
                                    <mask id="welcome-f" fill="#fff">
                                        <use xlink:href="#welcome-e"></use>
                                    </mask>
                                    <use fill="url(#welcome-b)" xlink:href="#welcome-e"></use>
                                    <path fill="url(#welcome-c)" mask="url(#welcome-f)"
                                          d="M40.333-15.147h50v95h-50z"></path>
                                </g>
                                <g transform="rotate(44 61.546 392.623)">
                                    <mask id="welcome-h" fill="#fff">
                                        <use xlink:href="#welcome-g"></use>
                                    </mask>
                                    <use fill="url(#welcome-b)" xlink:href="#welcome-g"></use>
                                    <path fill="url(#welcome-c)" mask="url(#welcome-h)"
                                          d="M40.333-15.147h50v95h-50z"></path>
                                </g>
                            </g>
                        </svg>
                    </div>

                    <!-- Content -->
                    <div class="y">
                        <h1 class="gu teu text-slate-800 font-bold rt">Good afternoon, Acme Inc. 👋</h1>
                        <p>Here is what’s happening with your projects today:</p>
                    </div>

                </div>

                <!-- Dashboard actions -->
                <div class="je jd jc rc">

                    <!-- Left: Avatars -->
                    <ul class="flex flex-wrap justify-center jh rc _y fp rd">
                        <li>
                            <a class="block" href="#0">
                                <img class="op sv rounded-full" src="{{ asset('/images/ui/user-36-01.jpg') }}" width="36" height="36"
                                     alt="User 01">
                            </a>
                        </li>
                        <li>
                            <a class="block" href="#0">
                                <img class="op sv rounded-full" src="{{ asset('/images/ui/user-36-02.jpg') }}" width="36" height="36"
                                     alt="User 02">
                            </a>
                        </li>
                        <li>
                            <a class="block" href="#0">
                                <img class="op sv rounded-full" src="{{ asset('/images/ui/user-36-03.jpg') }}" width="36" height="36"
                                     alt="User 03">
                            </a>
                        </li>
                        <li>
                            <a class="block" href="#0">
                                <img class="op sv rounded-full" src="{{ asset('/images/ui/user-36-04.jpg') }}" width="36" height="36"
                                     alt="User 04">
                            </a>
                        </li>
                        <li>
                            <button
                                class="flex justify-center items-center op sv rounded-full bg-white border border-slate-200 hover--border-slate-300 text-indigo-500 bv wt wi nq">
                                <span class="d">Add new user</span>
                                <svg class="oo sl du" viewBox="0 0 16 16">
                                    <path
                                        d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"></path>
                                </svg>
                            </button>
                        </li>
                    </ul>

                    <!-- Right: Actions -->
                    <div class="sn am jo az jp ft">

                        <!-- Filter button -->
                        <div class="y inline-flex" x-data="{ open: false }">
                            <button
                                class="btn bg-white border-slate-200 hover--border-slate-300 text-slate-500 hover--text-slate-600"
                                aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                                <span class="d">Filter</span>
                                <wbr>
                                <svg class="oo sl du" viewBox="0 0 16 16">
                                    <path
                                        d="M9 15H7a1 1 0 010-2h2a1 1 0 010 2zM11 11H5a1 1 0 010-2h6a1 1 0 010 2zM13 7H3a1 1 0 010-2h10a1 1 0 010 2zM15 3H1a1 1 0 010-2h14a1 1 0 010 2z"></path>
                                </svg>
                            </button>
                            <div class="uk tk g z x j qc qh ui bg-white border border-slate-200 mi rounded bd la re"
                                 @click.outside="open = false" @keydown.escape.window="open = false" x-show="open"
                                 x-transition:enter="wt wa wr au" x-transition:enter-start="opacity-0 uq"
                                 x-transition:enter-end="ba uj" x-transition:leave="wt wa wr"
                                 x-transition:leave-start="ba" x-transition:leave-end="opacity-0" x-cloak="">
                                <div class="go gh gq gv mi ms vs">Filters</div>
                                <ul class="ri">
                                    <li class="vf vn">
                                        <label class="flex items-center">
                                            <input type="checkbox" class="i" checked="">
                                            <span class="text-sm gp nq">Direct VS Indirect</span>
                                        </label>
                                    </li>
                                    <li class="vf vn">
                                        <label class="flex items-center">
                                            <input type="checkbox" class="i" checked="">
                                            <span class="text-sm gp nq">Real Time Value</span>
                                        </label>
                                    </li>
                                    <li class="vf vn">
                                        <label class="flex items-center">
                                            <input type="checkbox" class="i" checked="">
                                            <span class="text-sm gp nq">Top Channels</span>
                                        </label>
                                    </li>
                                    <li class="vf vn">
                                        <label class="flex items-center">
                                            <input type="checkbox" class="i">
                                            <span class="text-sm gp nq">Sales VS Refunds</span>
                                        </label>
                                    </li>
                                    <li class="vf vn">
                                        <label class="flex items-center">
                                            <input type="checkbox" class="i">
                                            <span class="text-sm gp nq">Last Order</span>
                                        </label>
                                    </li>
                                    <li class="vf vn">
                                        <label class="flex items-center">
                                            <input type="checkbox" class="i">
                                            <span class="text-sm gp nq">Total Spent</span>
                                        </label>
                                    </li>
                                </ul>
                                <div class="vr vn co border-slate-200 hp">
                                    <ul class="flex items-center fe">
                                        <li>
                                            <button
                                                class="btn-xs bg-white border-slate-200 hover--border-slate-300 text-slate-500 hover--text-slate-600">
                                                Clear
                                            </button>
                                        </li>
                                        <li>
                                            <button class="btn-xs ho xi ye" @click="open = false"
                                                    @focusout="open = false">Apply
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Datepicker built with flatpickr -->
                        <div class="y">
                            <input class="datepicker s me text-slate-500 hover--text-slate-600 gp xq ol"
                                   placeholder="Select dates" data-class="flatpickr-right">
                            <div class="g w j flex items-center pointer-events-none">
                                <svg class="oo sl du text-slate-500 ml-3" viewBox="0 0 16 16">
                                    <path
                                        d="M15 2h-2V0h-2v2H9V0H7v2H5V0H3v2H1a1 1 0 00-1 1v12a1 1 0 001 1h14a1 1 0 001-1V3a1 1 0 00-1-1zm-1 12H2V6h12v8z"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Add view button -->
                        <button class="btn ho xi ye">
                            <svg class="oo sl du bf ub" viewBox="0 0 16 16">
                                <path
                                    d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"></path>
                            </svg>
                            <span class="hidden trm nq">Add View</span>
                        </button>

                    </div>

                </div>

                <!-- Cards -->
                <div class="sn ag fn">

                    <!-- Line chart (Acme Plus) -->
                    <div class="flex ak tz _c tns bg-white bd rounded-sm border border-slate-200">
                        <div class="vc mb">
                            <header class="flex fe aj ru">
                                <!-- Icon -->
                                <img src="{{ asset('/images/ui/icon-01.svg') }}" width="32" height="32" alt="Icon 01">
                                <!-- Menu button -->
                                <div class="y inline-flex" x-data="{ open: false }">
                                    <button class="gq xv rounded-full" :class="{ 'hi text-slate-500': open }"
                                            aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                                        <span class="d">Menu</span>
                                        <svg class="os sf du" viewBox="0 0 32 32">
                                            <circle cx="16" cy="16" r="2"></circle>
                                            <circle cx="10" cy="16" r="2"></circle>
                                            <circle cx="22" cy="16" r="2"></circle>
                                        </svg>
                                    </button>
                                    <div class="uk tk g z q us bg-white border border-slate-200 va rounded bd la re"
                                         @click.outside="open = false" @keydown.escape.window="open = false"
                                         x-show="open" x-transition:enter="wt wa wr au"
                                         x-transition:enter-start="opacity-0 uq" x-transition:enter-end="ba uj"
                                         x-transition:leave="wt wa wr" x-transition:leave-start="ba"
                                         x-transition:leave-end="opacity-0" x-cloak="">
                                        <ul>
                                            <li>
                                                <a class="gp text-sm g_ xg flex vf vn" href="#0" @click="open = false"
                                                   @focus="open = true" @focusout="open = false">Option 1</a>
                                            </li>
                                            <li>
                                                <a class="gp text-sm g_ xg flex vf vn" href="#0" @click="open = false"
                                                   @focus="open = true" @focusout="open = false">Option 2</a>
                                            </li>
                                            <li>
                                                <a class="gp text-sm yl xy flex vf vn" href="#0" @click="open = false"
                                                   @focus="open = true" @focusout="open = false">Remove</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </header>
                            <h2 class="ga gh text-slate-800 ru">Acme Plus</h2>
                            <div class="go gh gq gv rt">Sales</div>
                            <div class="flex aj">
                                <div class="text-3xl font-bold text-slate-800 mr-2">$24,780</div>
                                <div class="text-sm gh ye vk hd rounded-full">+49%</div>
                            </div>
                        </div>
                        <!-- Chart built with Chart.js 3 -->
                        <!-- Check out src/js/components/dashboard-card-01.js for config -->
                        <div class="uw">
                            <!-- Change the height attribute to adjust the chart height -->
                            <canvas id="dashboard-card-01" width="389" height="128"></canvas>
                        </div>
                    </div>

                    <!-- Line chart (Acme Advanced) -->
                    <div class="flex ak tz _c tns bg-white bd rounded-sm border border-slate-200">
                        <div class="vc mb">
                            <header class="flex fe aj ru">
                                <!-- Icon -->
                                <img src="{{ asset('/images/ui/icon-02.svg') }}" width="32" height="32" alt="Icon 02">
                                <!-- Menu button -->
                                <div class="y inline-flex" x-data="{ open: false }">
                                    <button class="gq xv rounded-full" :class="{ 'hi text-slate-500': open }"
                                            aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                                        <span class="d">Menu</span>
                                        <svg class="os sf du" viewBox="0 0 32 32">
                                            <circle cx="16" cy="16" r="2"></circle>
                                            <circle cx="10" cy="16" r="2"></circle>
                                            <circle cx="22" cy="16" r="2"></circle>
                                        </svg>
                                    </button>
                                    <div class="uk tk g z q us bg-white border border-slate-200 va rounded bd la re"
                                         @click.outside="open = false" @keydown.escape.window="open = false"
                                         x-show="open" x-transition:enter="wt wa wr au"
                                         x-transition:enter-start="opacity-0 uq" x-transition:enter-end="ba uj"
                                         x-transition:leave="wt wa wr" x-transition:leave-start="ba"
                                         x-transition:leave-end="opacity-0" x-cloak="">
                                        <ul>
                                            <li>
                                                <a class="gp text-sm g_ xg flex vf vn" href="#0" @click="open = false"
                                                   @focus="open = true" @focusout="open = false">Option 1</a>
                                            </li>
                                            <li>
                                                <a class="gp text-sm g_ xg flex vf vn" href="#0" @click="open = false"
                                                   @focus="open = true" @focusout="open = false">Option 2</a>
                                            </li>
                                            <li>
                                                <a class="gp text-sm yl xy flex vf vn" href="#0" @click="open = false"
                                                   @focus="open = true" @focusout="open = false">Remove</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </header>
                            <h2 class="ga gh text-slate-800 ru">Acme Advanced</h2>
                            <div class="go gh gq gv rt">Sales</div>
                            <div class="flex aj">
                                <div class="text-3xl font-bold text-slate-800 mr-2">$17,489</div>
                                <div class="text-sm gh ye vk hy rounded-full">-14%</div>
                            </div>
                        </div>
                        <!-- Chart built with Chart.js 3 -->
                        <!-- Check out src/js/components/dashboard-card-01.js for config -->
                        <div class="uw">
                            <!-- Change the height attribute to adjust the chart height -->
                            <canvas id="dashboard-card-02" width="389" height="128"></canvas>
                        </div>
                    </div>

                    <!-- Line chart (Acme Professional) -->
                    <div class="flex ak tz _c tns bg-white bd rounded-sm border border-slate-200">
                        <div class="vc mb">
                            <header class="flex fe aj ru">
                                <!-- Icon -->
                                <img src="{{ asset('/images/ui/icon-03.svg') }}" width="32" height="32" alt="Icon 03">
                                <!-- Menu button -->
                                <div class="y inline-flex" x-data="{ open: false }">
                                    <button class="gq xv rounded-full" :class="{ 'hi text-slate-500': open }"
                                            aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                                        <span class="d">Menu</span>
                                        <svg class="os sf du" viewBox="0 0 32 32">
                                            <circle cx="16" cy="16" r="2"></circle>
                                            <circle cx="10" cy="16" r="2"></circle>
                                            <circle cx="22" cy="16" r="2"></circle>
                                        </svg>
                                    </button>
                                    <div class="uk tk g z q us bg-white border border-slate-200 va rounded bd la re"
                                         @click.outside="open = false" @keydown.escape.window="open = false"
                                         x-show="open" x-transition:enter="wt wa wr au"
                                         x-transition:enter-start="opacity-0 uq" x-transition:enter-end="ba uj"
                                         x-transition:leave="wt wa wr" x-transition:leave-start="ba"
                                         x-transition:leave-end="opacity-0" x-cloak="">
                                        <ul>
                                            <li>
                                                <a class="gp text-sm g_ xg flex vf vn" href="#0" @click="open = false"
                                                   @focus="open = true" @focusout="open = false">Option 1</a>
                                            </li>
                                            <li>
                                                <a class="gp text-sm g_ xg flex vf vn" href="#0" @click="open = false"
                                                   @focus="open = true" @focusout="open = false">Option 2</a>
                                            </li>
                                            <li>
                                                <a class="gp text-sm yl xy flex vf vn" href="#0" @click="open = false"
                                                   @focus="open = true" @focusout="open = false">Remove</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </header>
                            <h2 class="ga gh text-slate-800 ru">Acme Professional</h2>
                            <div class="go gh gq gv rt">Sales</div>
                            <div class="flex aj">
                                <div class="text-3xl font-bold text-slate-800 mr-2">$9,962</div>
                                <div class="text-sm gh ye vk hd rounded-full">+29%</div>
                            </div>
                        </div>
                        <!-- Chart built with Chart.js 3 -->
                        <!-- Check out src/js/components/dashboard-card-01.js for config -->
                        <div class="uw">
                            <!-- Change the height attribute to adjust the chart height -->
                            <canvas id="dashboard-card-03" width="389" height="128"></canvas>
                        </div>
                    </div>

                    <!-- Bar chart (Direct vs Indirect) -->
                    <div class="flex ak tz _c bg-white bd rounded-sm border border-slate-200">
                        <header class="vc vu cs ch">
                            <h2 class="gh text-slate-800">Direct VS Indirect</h2>
                        </header>
                        <!-- Chart built with Chart.js 3 -->
                        <!-- Check out src/js/components/dashboard-card-04.js for config -->
                        <div id="dashboard-card-04-legend" class="vc vo">
                            <ul class="flex flex-wrap"></ul>
                        </div>
                        <div class="uw">
                            <!-- Change the height attribute to adjust the chart height -->
                            <canvas id="dashboard-card-04" width="595" height="248"></canvas>
                        </div>
                    </div>

                    <!-- Line chart (Real Time Value) -->
                    <div class="flex ak tz _c bg-white bd rounded-sm border border-slate-200">
                        <header class="vc vu cs ch flex items-center">
                            <h2 class="gh text-slate-800">Real Time Value</h2>
                            <div class="y nq" x-data="{ open: false }" @mouseenter="open = true"
                                 @mouseleave="open = false">
                                <button class="block" aria-haspopup="true" :aria-expanded="open" @focus="open = true"
                                        @focusout="open = false" @click.prevent="">
                                    <svg class="oo sl du gq" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"></path>
                                    </svg>
                                </button>
                                <div class="tk g ti ts uz">
                                    <div class="bg-white border border-slate-200 dk rounded bd la ru" x-show="open"
                                         x-transition:enter="wt wa wr au" x-transition:enter-start="opacity-0 an"
                                         x-transition:enter-end="ba uj" x-transition:leave="wt wa wr"
                                         x-transition:leave-start="ba" x-transition:leave-end="opacity-0" x-cloak="">
                                        <div class="go gn lm">Built with <a class="br" @focus="open = true"
                                                                            @focusout="open = false"
                                                                            href="https://www.chartjs.org/"
                                                                            target="_blank">Chart.js</a></div>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <!-- Chart built with Chart.js 3 -->
                        <!-- Check out src/js/components/dashboard-card-05.js for config -->
                        <div class="vc vo">
                            <div class="flex aj">
                                <div class="text-3xl font-bold text-slate-800 mr-2 gy">$<span
                                        id="dashboard-card-05-value">57.81</span></div>
                                <div id="dashboard-card-05-deviation" class="text-sm gh ye vk rounded-full"></div>
                            </div>
                        </div>
                        <div class="uw">
                            <!-- Change the height attribute to adjust the chart height -->
                            <canvas id="dashboard-card-05" width="595" height="248"></canvas>
                        </div>
                    </div>

                    <!-- Doughnut chart (Top Countries) -->
                    <div class="flex ak tz _c tns bg-white bd rounded-sm border border-slate-200">
                        <header class="vc vu cs ch">
                            <h2 class="gh text-slate-800">Top Countries</h2>
                        </header>
                        <!-- Chart built with Chart.js 3 -->
                        <!-- Check out src/js/components/dashboard-card-06.js for config -->
                        <div class="uw flex ak justify-center">
                            <div>
                                <!-- Change the height attribute to adjust the chart height -->
                                <canvas id="dashboard-card-06" width="389" height="260"></canvas>
                            </div>
                            <div id="dashboard-card-06-legend" class="vc mh mp">
                                <ul class="flex flex-wrap justify-center -m-1"></ul>
                            </div>
                        </div>
                    </div>

                    <!-- Table (Top Channels) -->
                    <div class="tz tni bg-white bd rounded-sm border border-slate-200">
                        <header class="vc vu cs ch">
                            <h2 class="gh text-slate-800">Top Channels</h2>
                        </header>
                        <div class="dk">

                            <!-- Table -->
                            <div class="lf">
                                <table class="ux ou">
                                    <!-- Table header -->
                                    <thead class="go gv gq hp rounded-sm">
                                    <tr>
                                        <th class="dx">
                                            <div class="gh gt">Source</div>
                                        </th>
                                        <th class="dx">
                                            <div class="gh gn">Visitors</div>
                                        </th>
                                        <th class="dx">
                                            <div class="gh gn">Revenues</div>
                                        </th>
                                        <th class="dx">
                                            <div class="gh gn">Sales</div>
                                        </th>
                                        <th class="dx">
                                            <div class="gh gn">Conversion</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <!-- Table body -->
                                    <tbody class="text-sm gp le ln">
                                    <!-- Row -->
                                    <tr>
                                        <td class="dx">
                                            <div class="flex items-center">
                                                <svg class="ub mr-2 _b" width="36" height="36" viewBox="0 0 36 36">
                                                    <circle fill="#24292E" cx="18" cy="18" r="18"></circle>
                                                    <path
                                                        d="M18 10.2c-4.4 0-8 3.6-8 8 0 3.5 2.3 6.5 5.5 7.6.4.1.5-.2.5-.4V24c-2.2.5-2.7-1-2.7-1-.4-.9-.9-1.2-.9-1.2-.7-.5.1-.5.1-.5.8.1 1.2.8 1.2.8.7 1.3 1.9.9 2.3.7.1-.5.3-.9.5-1.1-1.8-.2-3.6-.9-3.6-4 0-.9.3-1.6.8-2.1-.1-.2-.4-1 .1-2.1 0 0 .7-.2 2.2.8.6-.2 1.3-.3 2-.3s1.4.1 2 .3c1.5-1 2.2-.8 2.2-.8.4 1.1.2 1.9.1 2.1.5.6.8 1.3.8 2.1 0 3.1-1.9 3.7-3.7 3.9.3.4.6.9.6 1.6v2.2c0 .2.1.5.6.4 3.2-1.1 5.5-4.1 5.5-7.6-.1-4.4-3.7-8-8.1-8z"
                                                        fill="#FFF"></path>
                                                </svg>
                                                <div class="text-slate-800">Github.com</div>
                                            </div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn">2.4K</div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn yt">$3,877</div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn">267</div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn yv">4.7%</div>
                                        </td>
                                    </tr>
                                    <!-- Row -->
                                    <tr>
                                        <td class="dx">
                                            <div class="flex items-center">
                                                <svg class="ub mr-2 _b" width="36" height="36" viewBox="0 0 36 36">
                                                    <circle fill="#1DA1F2" cx="18" cy="18" r="18"></circle>
                                                    <path
                                                        d="M26 13.5c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4 0 1.6 1.1 2.9 2.6 3.2-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H10c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4c.7-.5 1.3-1.1 1.7-1.8z"
                                                        fill="#FFF" fill-rule="nonzero"></path>
                                                </svg>
                                                <div class="text-slate-800">Twitter</div>
                                            </div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn">2.2K</div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn yt">$3,426</div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn">249</div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn yv">4.4%</div>
                                        </td>
                                    </tr>
                                    <!-- Row -->
                                    <tr>
                                        <td class="dx">
                                            <div class="flex items-center">
                                                <svg class="ub mr-2 _b" width="36" height="36" viewBox="0 0 36 36">
                                                    <circle fill="#EA4335" cx="18" cy="18" r="18"></circle>
                                                    <path
                                                        d="M18 17v2.4h4.1c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C21.6 11.7 20 11 18.1 11c-3.9 0-7 3.1-7 7s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H18z"
                                                        fill="#FFF" fill-rule="nonzero"></path>
                                                </svg>
                                                <div class="text-slate-800">Google (organic)</div>
                                            </div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn">2.0K</div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn yt">$2,444</div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn">224</div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn yv">4.2%</div>
                                        </td>
                                    </tr>
                                    <!-- Row -->
                                    <tr>
                                        <td class="dx">
                                            <div class="flex items-center">
                                                <svg class="ub mr-2 _b" width="36" height="36" viewBox="0 0 36 36">
                                                    <circle fill="#4BC9FF" cx="18" cy="18" r="18"></circle>
                                                    <path
                                                        d="M26 14.3c-.1 1.6-1.2 3.7-3.3 6.4-2.2 2.8-4 4.2-5.5 4.2-.9 0-1.7-.9-2.4-2.6C14 19.9 13.4 15 12 15c-.1 0-.5.3-1.2.8l-.8-1c.8-.7 3.5-3.4 4.7-3.5 1.2-.1 2 .7 2.3 2.5.3 2 .8 6.1 1.8 6.1.9 0 2.5-3.4 2.6-4 .1-.9-.3-1.9-2.3-1.1.8-2.6 2.3-3.8 4.5-3.8 1.7.1 2.5 1.2 2.4 3.3z"
                                                        fill="#FFF" fill-rule="nonzero"></path>
                                                </svg>
                                                <div class="text-slate-800">Vimeo.com</div>
                                            </div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn">1.9K</div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn yt">$2,236</div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn">220</div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn yv">4.2%</div>
                                        </td>
                                    </tr>
                                    <!-- Row -->
                                    <tr>
                                        <td class="dx">
                                            <div class="flex items-center">
                                                <svg class="ub mr-2 _b" width="36" height="36" viewBox="0 0 36 36">
                                                    <circle fill="#0E2439" cx="18" cy="18" r="18"></circle>
                                                    <path
                                                        d="M14.232 12.818V23H11.77V12.818h2.46zM15.772 23V12.818h2.462v4.087h4.012v-4.087h2.456V23h-2.456v-4.092h-4.012V23h-2.461z"
                                                        fill="#E6ECF4"></path>
                                                </svg>
                                                <div class="text-slate-800">Indiehackers.com</div>
                                            </div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn">1.7K</div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn yt">$2,034</div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn">204</div>
                                        </td>
                                        <td class="dx">
                                            <div class="gn yv">3.9%</div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <!-- Line chart (Sales Over Time) -->
                    <div class="flex ak tz _c bg-white bd rounded-sm border border-slate-200">
                        <header class="vc vu cs ch flex items-center">
                            <h2 class="gh text-slate-800">Sales Over Time (all stores)</h2>
                        </header>
                        <div class="vc vo">
                            <div class="flex flex-wrap fe aq">
                                <div class="flex aj">
                                    <div class="text-3xl font-bold text-slate-800 mr-2">$1,482</div>
                                    <div class="text-sm gh ye vk hy rounded-full">-22%</div>
                                </div>
                                <div id="dashboard-card-08-legend" class="uw nq rt">
                                    <ul class="flex flex-wrap justify-end"></ul>
                                </div>
                            </div>
                        </div>
                        <!-- Chart built with Chart.js 3 -->
                        <!-- Check out src/js/components/dashboard-card-08.js for config -->
                        <div class="uw">
                            <!-- Change the height attribute to adjust the chart height -->
                            <canvas id="dashboard-card-08" width="595" height="248"></canvas>
                        </div>
                    </div>

                    <!-- Stacked bar chart (Sales VS Refunds) -->
                    <div class="flex ak tz _c bg-white bd rounded-sm border border-slate-200">
                        <header class="vc vu cs ch flex items-center">
                            <h2 class="gh text-slate-800">Sales VS Refunds</h2>
                            <div class="y nq" x-data="{ open: false }" @mouseenter="open = true"
                                 @mouseleave="open = false">
                                <button class="block" href="#0" aria-haspopup="true" :aria-expanded="open"
                                        @focus="open = true" @focusout="open = false" @click.prevent="">
                                    <svg class="oo sl du gq" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"></path>
                                    </svg>
                                </button>
                                <div class="tk g ti ts uz">
                                    <div class="uo bg-white border border-slate-200 dk rounded bd la ru" x-show="open"
                                         x-transition:enter="wt wa wr au" x-transition:enter-start="opacity-0 an"
                                         x-transition:enter-end="ba uj" x-transition:leave="wt wa wr"
                                         x-transition:leave-start="ba" x-transition:leave-end="opacity-0" x-cloak="">
                                        <div class="text-sm">Sint occaecat cupidatat non proident, sunt in culpa qui
                                            officia deserunt mollit.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <div class="vc vo">
                            <div class="flex aj">
                                <div class="text-3xl font-bold text-slate-800 mr-2">+$6,796</div>
                                <div class="text-sm gh ye vk hy rounded-full">-34%</div>
                            </div>
                        </div>
                        <!-- Chart built with Chart.js 3 -->
                        <!-- Check out src/js/components/dashboard-card-09.js for config -->
                        <div class="uw">
                            <!-- Change the height attribute to adjust the chart height -->
                            <canvas id="dashboard-card-09" width="595" height="248"></canvas>
                        </div>
                    </div>

                    <!-- Card (Recent Activity) -->
                    <div class="tz tno bg-white bd rounded-sm border border-slate-200">
                        <header class="vc vu cs ch">
                            <h2 class="gh text-slate-800">Recent Activity</h2>
                        </header>
                        <div class="dk">

                            <!-- Card content -->
                            <!-- "Today" group -->
                            <div>
                                <header class="go gv gq hp rounded-sm gh dx">Today</header>
                                <ul class="nm">
                                    <!-- Item -->
                                    <li class="flex vi">
                                        <div class="op sv rounded-full ub ho ng ra">
                                            <svg class="op sv du text-indigo-50" viewBox="0 0 36 36">
                                                <path
                                                    d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"></path>
                                            </svg>
                                        </div>
                                        <div class="uw flex items-center cs ch text-sm vr">
                                            <div class="uw flex fe">
                                                <div class="lo"><a class="gp text-slate-800 xd" href="#0">Nick Mark</a>
                                                    mentioned <a class="gp text-slate-800" href="#0">Sara Smith</a> in a
                                                    new post
                                                </div>
                                                <div class="ub ls nq">
                                                    <a class="gp text-indigo-500 xh" href="#0">View<span
                                                            class="hidden _z"> -&gt;</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Item -->
                                    <li class="flex vi">
                                        <div class="op sv rounded-full ub ha ng ra">
                                            <svg class="op sv du yi" viewBox="0 0 36 36">
                                                <path
                                                    d="M25 24H11a1 1 0 01-1-1v-5h2v4h12v-4h2v5a1 1 0 01-1 1zM14 13h8v2h-8z"></path>
                                            </svg>
                                        </div>
                                        <div class="uw flex items-center cs ch text-sm vr">
                                            <div class="uw flex fe">
                                                <div class="lo">The post <a class="gp text-slate-800" href="#0">Post
                                                        Name</a> was removed by <a class="gp text-slate-800 xd"
                                                                                   href="#0">Nick Mark</a></div>
                                                <div class="ub ls nq">
                                                    <a class="gp text-indigo-500 xh" href="#0">View<span
                                                            class="hidden _z"> -&gt;</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Item -->
                                    <li class="flex vi">
                                        <div class="op sv rounded-full ub hd ng ra">
                                            <svg class="op sv du yr" viewBox="0 0 36 36">
                                                <path
                                                    d="M15 13v-3l-5 4 5 4v-3h8a1 1 0 000-2h-8zM21 21h-8a1 1 0 000 2h8v3l5-4-5-4v3z"></path>
                                            </svg>
                                        </div>
                                        <div class="uw flex items-center text-sm vr">
                                            <div class="uw flex fe">
                                                <div class="lo"><a class="gp text-slate-800 xd" href="#0">Patrick
                                                        Sullivan</a> published a new <a class="gp text-slate-800"
                                                                                        href="#0">post</a></div>
                                                <div class="ub ls nq">
                                                    <a class="gp text-indigo-500 xh" href="#0">View<span
                                                            class="hidden _z"> -&gt;</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- "Yesterday" group -->
                            <div>
                                <header class="go gv gq hp rounded-sm gh dx">Yesterday</header>
                                <ul class="nm">
                                    <!-- Item -->
                                    <li class="flex vi">
                                        <div class="op sv rounded-full ub hv ng ra">
                                            <svg class="op sv du yu" viewBox="0 0 36 36">
                                                <path
                                                    d="M23 11v2.085c-2.841.401-4.41 2.462-5.8 4.315-1.449 1.932-2.7 3.6-5.2 3.6h-1v2h1c3.5 0 5.253-2.338 6.8-4.4 1.449-1.932 2.7-3.6 5.2-3.6h3l-4-4zM15.406 16.455c.066-.087.125-.162.194-.254.314-.419.656-.872 1.033-1.33C15.475 13.802 14.038 13 12 13h-1v2h1c1.471 0 2.505.586 3.406 1.455zM24 21c-1.471 0-2.505-.586-3.406-1.455-.066.087-.125.162-.194.254-.316.422-.656.873-1.028 1.328.959.878 2.108 1.573 3.628 1.788V25l4-4h-3z"></path>
                                            </svg>
                                        </div>
                                        <div class="uw flex items-center cs ch text-sm vr">
                                            <div class="uw flex fe">
                                                <div class="lo"><a class="gp text-slate-800 xd" href="#0">240+</a> users
                                                    have subscribed to <a class="gp text-slate-800" href="#0">Newsletter
                                                        #1</a></div>
                                                <div class="ub ls nq">
                                                    <a class="gp text-indigo-500 xh" href="#0">View<span
                                                            class="hidden _z"> -&gt;</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Item -->
                                    <li class="flex vi">
                                        <div class="op sv rounded-full ub ho ng ra">
                                            <svg class="op sv du text-indigo-50" viewBox="0 0 36 36">
                                                <path
                                                    d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"></path>
                                            </svg>
                                        </div>
                                        <div class="uw flex items-center text-sm vr">
                                            <div class="uw flex fe">
                                                <div class="lo">The post <a class="gp text-slate-800" href="#0">Post
                                                        Name</a> was suspended by <a class="gp text-slate-800 xd"
                                                                                     href="#0">Nick Mark</a></div>
                                                <div class="ub ls nq">
                                                    <a class="gp text-indigo-500 xh" href="#0">View<span
                                                            class="hidden _z"> -&gt;</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <!-- Card (Income/Expenses) -->
                    <div class="tz tno bg-white bd rounded-sm border border-slate-200">
                        <header class="vc vu cs ch">
                            <h2 class="gh text-slate-800">Income/Expenses</h2>
                        </header>
                        <div class="dk">

                            <!-- Card content -->
                            <!-- "Today" group -->
                            <div>
                                <header class="go gv gq hp rounded-sm gh dx">Today</header>
                                <ul class="nm">
                                    <!-- Item -->
                                    <li class="flex vi">
                                        <div class="op sv rounded-full ub ha ng ra">
                                            <svg class="op sv du yi" viewBox="0 0 36 36">
                                                <path
                                                    d="M17.7 24.7l1.4-1.4-4.3-4.3H25v-2H14.8l4.3-4.3-1.4-1.4L11 18z"></path>
                                            </svg>
                                        </div>
                                        <div class="uw flex items-center cs ch text-sm vr">
                                            <div class="uw flex fe">
                                                <div class="lo"><a class="gp text-slate-800 xd" href="#0">Qonto</a>
                                                    billing
                                                </div>
                                                <div class="ub li nq">
                                                    <span class="gp text-slate-800">-$49.88</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Item -->
                                    <li class="flex vi">
                                        <div class="op sv rounded-full ub hd ng ra">
                                            <svg class="op sv du yr" viewBox="0 0 36 36">
                                                <path
                                                    d="M18.3 11.3l-1.4 1.4 4.3 4.3H11v2h10.2l-4.3 4.3 1.4 1.4L25 18z"></path>
                                            </svg>
                                        </div>
                                        <div class="uw flex items-center cs ch text-sm vr">
                                            <div class="uw flex fe">
                                                <div class="lo"><a class="gp text-slate-800 xd" href="#0">Cruip.com</a>
                                                    Market Ltd 70 Wilson St London
                                                </div>
                                                <div class="ub li nq">
                                                    <span class="gp yt">+249.88</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Item -->
                                    <li class="flex vi">
                                        <div class="op sv rounded-full ub hd ng ra">
                                            <svg class="op sv du yr" viewBox="0 0 36 36">
                                                <path
                                                    d="M18.3 11.3l-1.4 1.4 4.3 4.3H11v2h10.2l-4.3 4.3 1.4 1.4L25 18z"></path>
                                            </svg>
                                        </div>
                                        <div class="uw flex items-center cs ch text-sm vr">
                                            <div class="uw flex fe">
                                                <div class="lo"><a class="gp text-slate-800 xd" href="#0">Notion Labs
                                                        Inc</a></div>
                                                <div class="ub li nq">
                                                    <span class="gp yt">+99.99</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Item -->
                                    <li class="flex vi">
                                        <div class="op sv rounded-full ub hd ng ra">
                                            <svg class="op sv du yr" viewBox="0 0 36 36">
                                                <path
                                                    d="M18.3 11.3l-1.4 1.4 4.3 4.3H11v2h10.2l-4.3 4.3 1.4 1.4L25 18z"></path>
                                            </svg>
                                        </div>
                                        <div class="uw flex items-center cs ch text-sm vr">
                                            <div class="uw flex fe">
                                                <div class="lo"><a class="gp text-slate-800 xd" href="#0">Market Cap
                                                        Ltd</a></div>
                                                <div class="ub li nq">
                                                    <span class="gp yt">+1,200.88</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Item -->
                                    <li class="flex vi">
                                        <div class="op sv rounded-full ub hu ng ra">
                                            <svg class="op sv du gq" viewBox="0 0 36 36">
                                                <path
                                                    d="M21.477 22.89l-8.368-8.367a6 6 0 008.367 8.367zm1.414-1.413a6 6 0 00-8.367-8.367l8.367 8.367zM18 26a8 8 0 110-16 8 8 0 010 16z"></path>
                                            </svg>
                                        </div>
                                        <div class="uw flex items-center cs ch text-sm vr">
                                            <div class="uw flex fe">
                                                <div class="lo"><a class="gp text-slate-800 xd" href="#0">App.com</a>
                                                    Market Ltd 70 Wilson St London
                                                </div>
                                                <div class="ub li nq">
                                                    <span class="gp text-slate-800 bi">+$99.99</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Item -->
                                    <li class="flex vi">
                                        <div class="op sv rounded-full ub ha ng ra">
                                            <svg class="op sv du yi" viewBox="0 0 36 36">
                                                <path
                                                    d="M17.7 24.7l1.4-1.4-4.3-4.3H25v-2H14.8l4.3-4.3-1.4-1.4L11 18z"></path>
                                            </svg>
                                        </div>
                                        <div class="uw flex items-center text-sm vr">
                                            <div class="uw flex fe">
                                                <div class="lo"><a class="gp text-slate-800 xd" href="#0">App.com</a>
                                                    Market Ltd 70 Wilson St London
                                                </div>
                                                <div class="ub li nq">
                                                    <span class="gp text-slate-800">-$49.88</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                </div>

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


<script async src='https://www.googletagmanager.com/gtag/js'></script>
<script>window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', '', {'anonymize_ip': true});</script>
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
