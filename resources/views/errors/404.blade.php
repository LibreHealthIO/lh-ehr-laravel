@extends('layouts.installer')

@section('title', __('general.welcome'))

@section('content')
    <div class="w-full h-screen flex">
        <img src="{{ asset('images/svg/404.svg') }}"
             alt="background" class="object-center object-center h-screen w-7/12">
        <div class="bg-white flex flex-col justify-center items-center w-5/12 shadow-lg border-solid border-t-4 border-orange-600">
            <div class="flex fixed top-5 right-10 z-50 justify-center">
                <button type="button"
                        class="flex items-center">
                    <img src="/flags/{{ app()->getLocale() }}.svg" alt="flag" class="fill-current h-4 w-4">
                    <span class="ml-2 text-xs whitespace-no-wrap uppercase font-bold">{{ app()->getLocale() }}</span>
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22" width="22" height="20"><path class="heroicon-ui" d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z"></path></svg>
                </button>
                <ul class="absolute hidden normal-case font-normal xs:left-0 top-5 right-0 bg-white shadow overflow-auto rounded w-48 max-h-64 border mt-2 py-3">
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap">
                            <img src="/flags/en.svg" alt="english flag" class="h-4 w-4">
                            <span class="ml-2">English</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap">
                            <img src="/flags/en.svg" alt="english flag" class="h-4 w-4">
                            <span class="ml-2">English</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="my-5">
                @if($errors->any() or session()->has('error'))
                    <div class="mb-3 mt-8  bg-red-100 border-red-500 text-red-900 rounded-b border-t-4 px-4 py-3 shadow-md" role="alert">
                        <div class="flex">
                            <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                            <p class="text-sm py-2 font-semibold">
                                @if($errors->any()) {{ $errors->first() }}  @elseif(session()->has('error')) {{ __('auth.'.session()->get('error')) }} @endif
                            </p>
                        </div>
                    </div>
                @endif

                <div class="max-w-md rounded-sm border border-gray-200 bg-white shadow-lg">
                    <div class="text-right p-4">
                        <span class="text-xs text-gray-500 tracking-widest">
                            <span class="uppercase">LibreHealth EHR</span> <span>(v3.0.0)</span>
                        </span>
                    </div>

                    <div class="flex items-center relative mb-10">
                        <div class="border-t border-gray-200 z-20 w-full"></div>
                        <div class="rounded-full bg-gray-800 z-20 p-2 inline-block absolute mx-5">
                            <a href="https://github.com/LibreHealthIO/lh-ehr-laravel.git" alt="LibreHealth Github Repo" title="Fork me on Github">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white inline-block h-8 w-8" viewBox="0 0 25 25">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <form id="loginForm" action="{{ route('login') }}" method="post" class="px-5 pb-2 flex flex-col justify-center">
                        {{ @csrf_field() }}
                        <img class="h-10 mb-10 justify-center px-20" src="{{ asset('images/logos/ehr_logo.png') }}" alt="LibreHealth Logo">
                        <div class="-mx-3 mb-2">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="login">
                                    Email/Username *
                                </label>
                                <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-500
                                 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                       id="login" value="@if(old("login") != null) {{ old("login") }} @endif"
                                       name="login" type="text" minlength="3" maxlength="50" required placeholder="Email/Username">
                            </div>
                        </div>
                        <div class="-mx-3 mb-2">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                                    Password *
                                </label>
                                <input id="password" class="appearance-none block w-full bg-white text-gray-700 border
                                 border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white
                                  focus:border-gray-500" autocomplete="true" name="password" type="password" minlength="3" maxlength="50"
                                       required placeholder="Password">
                            </div>
                        </div>
                        <button type="submit" class="flex text-base text-white justify-center ml-10 mr-10 px-10 py-3 rounded-md bg-gray-900 mb-3">
                            <svg class="ehr_btn_loader hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Continue with EHR
                        </button>
                    </form>
                </div>
            </div>

            @include('partials.footer')
        </div>
    </div>
@endsection

@section('js_scripts')
    <script type="text/javascript" src="{{ asset('js/lib/jquery/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            'use strict';
            $(document).ready(function () {
                $("#loginForm").submit(function (e) {
                    e.preventDefault();
                    $(".ehr_btn_loader").removeClass("hidden");
                    setTimeout(function(){ $("#loginForm")[0].submit(); }, 1000);
                });
            });
        });
    </script>
@endsection
