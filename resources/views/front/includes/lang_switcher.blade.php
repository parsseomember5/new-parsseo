<form action="{{route('change_lang')}}" class="lang-switcher" method="post">
    @csrf
    <i class="fa fa-language"></i>
    <select name="lang" id="lang" aria-label="lang" class="lang-switcher-select">
        <option value="fa" {{session()->get('locale') == 'fa' ? 'selected' : ''}}>فارسی</option>
        <option value="en" {{session()->get('locale') == 'en' ? 'selected' : ''}}>English</option>
    </select>
</form>
