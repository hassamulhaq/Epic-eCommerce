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
                <!-- Group 2 -->
                <div>
                    <div class="go gh gq gv ro">Experience</div>
                    <ul class="flex a_ qx ra qm">
                        <li class="rv qm qg">
                            <a class="flex items-center vp vr rounded lm" href="feedback.html">
                                <svg class="oo sl ub du gq mr-2" viewBox="0 0 16 16">
                                    <path d="M7.001 3h2v4h-2V3zm1 7a1 1 0 110-2 1 1 0 010 2zM15 16a1 1 0 01-.6-.2L10.667 13H1a1 1 0 01-1-1V1a1 1 0 011-1h14a1 1 0 011 1v14a1 1 0 01-1 1zM2 11h9a1 1 0 01.6.2L14 13V2H2v9z"></path>
                                </svg>
                                <span class="text-sm gp g_ xp">Give Feedback</span>
                            </a>
                        </li>
                    </ul>
                </div>
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
                                <label class="block text-sm gp rt" for="name">Business Name</label>
                                <input id="name" class="s ou" type="text" value="Acme Inc.">
                            </div>
                            <div class="jr">
                                <label class="block text-sm gp rt" for="business-id">Business ID</label>
                                <input id="business-id" class="s ou" type="text" value="Kz4tSEqtUmA">
                            </div>
                            <div class="jr">
                                <label class="block text-sm gp rt" for="location">Location</label>
                                <input id="location" class="s ou" type="text" value="London, UK">
                            </div>
                        </div>
                    </section>

                    <!-- Email -->
                    <section>
                        <h3 class="gf gb text-slate-800 font-bold rt">Email</h3>
                        <div class="text-sm">Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia.</div>
                        <div class="flex flex-wrap rw">
                            <div class="mr-2">
                                <label class="d" for="email">Business email</label>
                                <input id="email" class="s" type="email" value="admin@acmeinc.com">
                            </div>
                            <button class="btn border-slate-200 hover--border-slate-300 bv text-indigo-500">Change</button>
                        </div>
                    </section>

                    <!-- Password -->
                    <section>
                        <h3 class="gf gb text-slate-800 font-bold rt">Password</h3>
                        <div class="text-sm">You can set a permanent password if you don't want to use temporary login codes.</div>
                        <div class="rw">
                            <button class="btn border-slate-200 bv text-indigo-500">Set New Password</button>
                        </div>
                    </section>

                    <!-- Smart Sync -->
                    <section>
                        <h3 class="gf gb text-slate-800 font-bold rt">Smart Sync update for Mac</h3>
                        <div class="flex items-center rw" x-data="{ checked: true }">
                            <div class="c">
                                <input type="checkbox" id="toggle" class="d" x-model="checked">
                                <label class="h_" for="toggle">
                                    <span class="bg-white bv" aria-hidden="true"></span>
                                    <span class="d">Enable smart sync</span>
                                </label>
                            </div>
                            <div class="text-sm gq gm nq" x-text="checked ? 'On' : 'Off'">On</div>
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
