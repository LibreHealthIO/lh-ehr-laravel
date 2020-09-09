<div class="flex fixed top-5 right-10 z-30 justify-center">
    <button type="button" id="languageSelector"
            class="dropdown flex items-center outline-none bg-white">
        <img src="/flags/{{ app()->getLocale() }}.svg" alt="flag" class="fill-current h-4 w-4">
        <span class="ml-2 text-xs whitespace-no-wrap uppercase font-bold">{{ app()->getLocale() }}</span>
        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22" width="22" height="20"><path class="heroicon-ui" d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z"></path></svg>
    </button>
    <ul id="languageWrapper" class="overflow-scroll-container dropdown-menu absolute hidden normal-case font-normal xs:left-0 top-5 right-0 bg-white shadow overflow-auto rounded w-48 max-h-64 border mt-2 py-3">
        @foreach(config()->get('app.supported_locales') as $code => $lang)
            @if($code != app()->getLocale())
                <li>
                    <a href="{{ route('locale.set', $code) }}" class="flex items-center ltr:px-4 rtl:px-4 ltr:py-2 rtl:py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap">
                        <img src="/flags/{{$code}}.svg" alt="english flag" class="h-4 w-4">
                        <span class="ltr:ml-2 rtl:mr-2">{{ __('languages.'.$lang) }}</span>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
