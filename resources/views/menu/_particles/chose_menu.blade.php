<form action="" method="get">
    <div class="flex gap-3 items-center">
        <label>
            <select class="w-full w-40 p-1.5 bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-indigo-500" name="selected_menu">
                <option value="" disabled selected>-- chose --</option>
                @forelse($onlyMenus as $menu)
                    <option value="{{ $menu['id'] }}" {{ ($menu['id'] == Request::get('selected_menu')) ? 'selected' : '' }}>
                        <span class="text-sm gp text-indigo-500">{{ $menu['title'] }}</span>
                    </option>
                @empty
                    <option value="">No record found!</option>
                @endforelse
            </select>
        </label>
        <div>
            <button type="submit" class="btn border-slate-200 hover--border-slate-300 g_">Select</button>
        </div>
    </div>
</form>
