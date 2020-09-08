@extends('layouts.installer')

@section('title', __('installer.server_requirements'))

@section('content')
    <div class="w-full h-screen flex">
        <div class="bg-white flex flex-col justify-start w-1/5 items-center max-h-full overflow-scroll-container overflow-auto overflow-x-hidden">
            <img class="w-full h-8 mt-10 mb-2 px-5" src="{{ asset('images/logos/ehr_logo.png') }}" alt="LibreHealth Logo">
            <div class="p-4 justify-center">
                <h4 class="leading-10 prose underline uppercase font-semibold">Installation Steps</h4>
                @include('includes.installer_sidebar', ['step' => 1])
             </div>
        </div>
        <div class="bg-white flex flex-col w-4/5 items-center max-h-full overflow-scroll-container overflow-auto shadow-lg border-solid border-t-4 border-orange-600">
            <div class="flex fixed top-5 right-10 z-50 justify-center">
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
            <div class="my-5 w-full">
                <div class="mr-32 ml-32 mt-10 rounded-sm border border-gray-200 bg-white shadow-lg">
                    <div class="text-right p-4">
                        <span class="text-xs text-gray-500 tracking-widest">
                            <span class="uppercase">{{ app_name() }}</span> <span>(v{{ app_version() }})</span>
                        </span>
                    </div>
                    <div class="flex items-center relative mt-2 mb-8">
                        <div class="ml-20 mr-2">
                            @include('includes.installer_step', ['step' => 1])
                        </div>
                        <div class="border-t border-gray-200 z-20 w-full"></div>
                        <div class="rounded-full bg-white border border-t z-20 p-2 inline-block absolute mx-5">
                            <a href="https://github.com/LibreHealthIO/lh-ehr-laravel.git" alt="LibreHealth Github Repo" title="Fork me on Github">
                                <img alt="{{ config('app.name') }}" src="{{ asset('images/logo.png') }}" class="fill-current text-white inline-block h-8 w-8">
                            </a>
                        </div>
                        <div class="rounded-full bg-gray-800 z-20 p-2 inline-block right-5 absolute mx-5">
                            <a href="https://github.com/LibreHealthIO/lh-ehr-laravel.git" alt="LibreHealth Github Repo" title="Fork me on Github">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white inline-block h-8 w-8" viewBox="0 0 25 25">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="pr-32 pl-32 pb-16 w-full">
                        <table class="w-full table-auto text-base">
                            <thead>
                            <tr>
                                <th class="px-4 py-2">PHP</th>
                                <th class="px-4 py-2">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="border px-4 pl-10 py-2">Openssl</td>
                                <td class="border px-4 py-2">true</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex flex-row justify-between">
                        <div class="justify-start">
                            <a href="{{ route('ehr_installer.index') }}" class="ehr_prev_button flex text-base text-white items-center ml-10 mr-10 px-10 py-3 rounded-md bg-gray-900 mb-3">
                                <svg class="ehr_btn_icon -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                                </svg>
                                {{ __('forms.previous') }}
                                <svg class="ehr_btn_loader hidden animate-spin ml-2 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="justify-end">
                            <a href="{{ route('ehr_installer.index') }}" class="ehr_next_button flex text-base text-white items-center ml-10 mr-10 px-10 py-3 rounded-md bg-gray-900 mb-3">
                                {{ __('forms.continue') }}
                                <svg class="ehr_btn_loader hidden animate-spin ml-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <svg class="ehr_btn_icon -mr-1 ml-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @include('partials.footer')
        </div>
    </div>
@endsection

@section('js_scripts')

@endsection
