@extends('layouts.dashboard')

@section('content')
    <div class="rc">
        <!-- Title -->
        <h3 class="gu text-slate-800 font-bold">Menus</h3>
    </div>
    <div class="bg-white bd rounded-sm rc">
        <div class="flex ak zc qv">

            <!-- Sidebar -->
            <div class="flex a_ lh l qx z_ vn vh cs zz tee border-slate-200 ur zg">
                <!-- Group 1 -->
                <div>
                    <div class="go gh gq gv ro">Add menu items</div>
                    <ul class="flex a_ qx ra qm">
                        <li class="rv qm qg">
                            <a class="flex items-center vp vr rounded lm hm" href="javascript:void(0)">
                                <svg class="oo sl ub du text-indigo-400 mr-2" viewBox="0 0 16 16">
                                    <path d="M12.311 9.527c-1.161-.393-1.85-.825-2.143-1.175A3.991 3.991 0 0012 5V4c0-2.206-1.794-4-4-4S4 1.794 4 4v1c0 1.406.732 2.639 1.832 3.352-.292.35-.981.782-2.142 1.175A3.942 3.942 0 001 13.26V16h14v-2.74c0-1.69-1.081-3.19-2.689-3.733zM6 4c0-1.103.897-2 2-2s2 .897 2 2v1c0 1.103-.897 2-2 2s-2-.897-2-2V4zm7 10H3v-.74c0-.831.534-1.569 1.33-1.838 1.845-.624 3-1.436 3.452-2.422h.436c.452.986 1.607 1.798 3.453 2.422A1.943 1.943 0 0113 13.26V14z"></path>
                                </svg>
                                <span class="text-sm gp text-indigo-500">Dashboard Menu</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Group Menu Item -->
                <div class="mt-7">
                    <div class="go gh gq gv ro flex flex items-center">
                        Add Routes
                        <div class="nr">
                            <!-- Start -->
                            <button class="btn-xs border-slate-200 hover--border-slate-300">
                                <svg class="oo sl du bf ub" viewBox="0 0 16 16">
                                    <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"></path>
                                </svg>
                            </button>
                            <!-- End -->
                        </div>
                    </div>
                    <div class="border dw">
                        <form action="" method="get" id="blank-route-form">
                            <!-- route-block -->
                            <div class="routeFormatBlock">
                                <div class="mb-3">
                                    <label class="text-sm block" for="route_title">
                                        <span>Route Title</span>
                                        <input name="route_title[]" class="s block" type="text" placeholder="Customers data">
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <label class="text-sm block" for="route">
                                        <span>Route</span>
                                        <input name="route[]" class="s block" type="text" placeholder="customers">
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <label class="text-sm block" for="route_name">
                                        <span>Route Name</span>
                                        <input name="route_name[]" class="s block" type="text" placeholder="customers.data">
                                    </label>
                                </div>
                                {{--<div class="mb-3">
                                    <label for="" class="text-sm block">Prefer SVG/Image</label>
                                    <div class="flex items-center gap-3">
                                        <div class="text-sm gq gm nq">Image</div>
                                        <div class="c">
                                            <input type="checkbox" name="pp[]" id="svg-toggle" class="d">
                                            <label class="h_" for="svg-toggle">
                                                <span class="bg-white bv" aria-hidden="true"></span>
                                                <span class="d">Immigration</span>
                                            </label>
                                        </div>
                                        <div class="text-sm gq gm nq">SVG</div>
                                    </div>
                                </div>--}}
                                {{--<div class="mb-3">
                                    <label for="route_icon" class="text-sm block">Route svg</label>
                                    <input type="text" name="route_icon[]" id="route_icon" class="f ou xq">
                                </div>--}}
                                <div class="mb-3">
                                    <label class="text-sm block">
                                        <span>Route Image/SVG</span>
                                        <input type="file" name="route_image[]" class="block w-full text-sm text-slate-500
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-gray-50 file:text-gray-700
                                        hover:file:bg-gray-100">
                                    </label>
                                </div>
                            </div> <!-- /_route-block -->
                            <div class="mb-3">
                                <button class="btn border-slate-200 hover--border-slate-300 g_">
                                    <svg class="oo sl du bf ub" viewBox="0 0 16 16">
                                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"></path>
                                    </svg>
                                    <span class="nq">Add</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /_Group Menu Item -->
            </div>

            <!-- Panel -->
            <div class="uw">

                <!-- Panel body -->
                <div class="d_ fd">
                    <h4 class="text-slate-800 font-bold ii">Menu structure</h4>

                    <!-- Business Profile -->
                    <section>
                        <div class="je jc fg jm jb rw">
                            <div class="jr">
                                <label class="block text-sm gp rt" for="name">Menu Name</label>
                                <input type="hidden" class="s ou" name="menu_name" value="null">
                                <input id="name" class="s ou" type="text" placeholder="Posts">
                            </div>
                        </div>
                    </section>

                    <!-- Email -->
                    <section class="mt-7">
                        <h3 class="text-slate-800 font-bold ii">Routes</h3>
                        <form action="" method="post">
                            @csrf

                            <ul id="routeList" class="list-none"></ul>
                        </form>
                    </section>
                </div>

                <!-- Panel footer -->
                <footer>
                    <div class="flex ak vm vg co border-slate-200">
                        <div class="flex ls">
                            <button class="btn border-slate-200 hover--border-slate-300 g_">Cancel</button>
                            <button class="btn ho xi ye ml-3">Save Changes</button>
                        </div>
                    </div>
                </footer>

            </div>

        </div>
    </div>


    @push('css_after')
        <style>
            .routeListItem {
                border: 1px dotted #cecece;
                border-radius: .25rem;
                margin-bottom: 2px;
            }
            .routeListItem .routeFormatBlock {
                display: flex;
                gap: 6px;
            }
            .mint-background-class {
                background-color: #c0ffe8;
            }
        </style>
    @endpush

    @push('js_after')
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

        <script>
            new Sortable(routeList, {
                animation: 150,
                ghostClass: 'mint-background-class'
            })


            let itemNo = 0;
            $('form#blank-route-form').on('submit', (e) => {
                e.preventDefault();
                itemNo++;

                let $form = $(e.target);
                let UlRouteList = $('ul#routeList');
                //$form.find(".routeFormatBlock").clone().appendTo(UlRouteList);
                let removeBtn = '<button type="button" onclick="removeList(this, itemNo)" class="btn-xs"><svg class="oo sl du yl ub" viewBox="0 0 16 16"> <path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z"></path></svg></button>';
                UlRouteList.append('<li id="routeListItem-'+itemNo+'" class="routeListItem flex items-center">'+removeBtn+'</li>');
                $('#routeListItem-'+itemNo+'').append($form.find(".routeFormatBlock").clone())

                $form.trigger('reset');
            })


            function removeList(target, itemNo) {
                $(target).parent('li').remove();
            }
        </script>
    @endpush
@endsection
