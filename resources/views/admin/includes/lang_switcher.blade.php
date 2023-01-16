<form action="{{route('change_lang')}}" class="d-flex align-items-center bg-label-secondary p-2 rounded" method="post">
    @csrf
    <h5 class="mb-0 me-2 flex-shrink-0"><i class="bx bx-globe me-1"></i><span>انتخاب زبان</span></h5>

    <select name="lang" id="lang" aria-label="lang" class="lang-switcher-select form-select">
        <option value="fa" {{session()->get('locale') == 'fa' ? 'selected' : ''}}>فارسی</option>
        <option value="en" {{session()->get('locale') == 'en' ? 'selected' : ''}}>English</option>
    </select>
</form>
