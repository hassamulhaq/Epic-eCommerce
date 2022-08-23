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
                            <a class="flex items-center vp vr rounded lm hm" href="settings.html">
                                <svg class="oo sl ub du text-indigo-400 mr-2" viewBox="0 0 16 16">
                                    <path d="M12.311 9.527c-1.161-.393-1.85-.825-2.143-1.175A3.991 3.991 0 0012 5V4c0-2.206-1.794-4-4-4S4 1.794 4 4v1c0 1.406.732 2.639 1.832 3.352-.292.35-.981.782-2.142 1.175A3.942 3.942 0 001 13.26V16h14v-2.74c0-1.69-1.081-3.19-2.689-3.733zM6 4c0-1.103.897-2 2-2s2 .897 2 2v1c0 1.103-.897 2-2 2s-2-.897-2-2V4zm7 10H3v-.74c0-.831.534-1.569 1.33-1.838 1.845-.624 3-1.436 3.452-2.422h.436c.452.986 1.607 1.798 3.453 2.422A1.943 1.943 0 0113 13.26V14z"></path>
                                </svg>
                                <span class="text-sm gp text-indigo-500">My Account</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Group Menu Item -->
                <div class="mt-7">
                    <div class="go gh gq gv ro">Add Routes</div>
                    <section>
                        <div class="">
                            <div class="mr-2">
                                <label class="text-sm block" for="route_title">Route Title</label>
                                <input id="route_title" name="route_title[]" class="s" type="text" placeholder="Customers data">
                            </div>

                            <div class="mr-2">
                                <label class="text-sm block" for="route">Route</label>
                                <input id="route" name="route[]" class="s" type="text" placeholder="customers">
                            </div>

                            <div class="mr-2">
                                <label class="text-sm block" for="route_name">Route Name</label>
                                <input id="route_name" name="route_name[]" class="s" type="text" placeholder="customers.data">
                            </div>
                        </div>

                        <div class="mt-7" style="margin-top: 32px;" x-data="{ is_icon: true }">
                            <div class="flex items-center fl rh">
                                <div>
                                    <label for="">Icon/SVG</label>
                                </div>
                                <div>
                                    <div class="flex items-center">
                                        <div class="c">
                                            <input type="checkbox" id="toggle" class="d" x-model="is_icon">
                                            <label class="h_" for="toggle">
                                                <span class="bg-white bv" aria-hidden="true"></span>
                                                <span class="d">Enable smart sync</span>
                                            </label>
                                        </div>
                                        <div class="text-sm gq gm nq" x-text="is_icon ? 'SVG' : 'Icon'">Icon</div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div x-bind:class="is_icon ? 'hidden' : ''">
                                    <label for="route_image" class="d">Route Image</label>
                                    <input type="file" id="route_image" class="s" name="route_image">
                                </div>
                                <div class="uw" x-bind:class="!is_icon ? 'hidden' : ''">
                                    <label for="route_icon" class="d">Write a comment…</label>
                                    <textarea name="route_icon" id="route_icon" class="f ou xq" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </section>
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
                        <h3 class="text-slate-800 font-bold ii">Add Routes</h3>
                        <div class="flex flex-wrap rw">
                            <div class="mr-2">
                                <label class="text-sm block" for="route_title">Route Title</label>
                                <input id="route_title" name="route_title[]" class="s" type="text" placeholder="Customers data">
                            </div>

                            <div class="mr-2">
                                <label class="text-sm block" for="route">Route</label>
                                <input id="route" name="route[]" class="s" type="text" placeholder="customers">
                            </div>

                            <div class="mr-2">
                                <label class="text-sm block" for="route_name">Route Name</label>
                                <input id="route_name" name="route_name[]" class="s" type="text" placeholder="customers.data">
                            </div>
                        </div>

                        <div class="mt-7" style="margin-top: 32px;" x-data="{ is_icon: true }">
                            <div class="flex items-center fl rh">
                                <div>
                                    <label for="">Icon/SVG</label>
                                </div>
                                <div>
                                    <div class="flex items-center">
                                        <div class="c">
                                            <input type="checkbox" id="toggle" class="d" x-model="is_icon">
                                            <label class="h_" for="toggle">
                                                <span class="bg-white bv" aria-hidden="true"></span>
                                                <span class="d">Enable smart sync</span>
                                            </label>
                                        </div>
                                        <div class="text-sm gq gm nq" x-text="is_icon ? 'SVG' : 'Icon'">Icon</div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div x-bind:class="is_icon ? 'hidden' : ''">
                                    <label for="route_image" class="d">Route Image</label>
                                    <input type="file" id="route_image" class="s" name="route_image">
                                </div>
                                <div class="uw" x-bind:class="!is_icon ? 'hidden' : ''">
                                    <label for="route_icon" class="d">Write a comment…</label>
                                    <textarea name="route_icon" id="route_icon" class="f ou xq" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
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
@endsection
