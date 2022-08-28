<form action="" method="get">
    <div class="flex gap-3 items-center">
        <label>
            <select class="border-slate-200 hover--border-slate-300 g_" name="selected_menu">
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
