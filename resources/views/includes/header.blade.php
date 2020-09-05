<div class="flex">
    <header class="h-25 text-gray-100 bg-gray-900 body-font shadow w-full">
        <div class="p-6 flex-col items-center">
            <nav class="flex flex-wrap items-center text-base md:ml-0">
                <a href="{{ route('calendar') }}" class="mr-2 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white
             hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">{{ __('menu.calendar') }}</a>
                <a href="{{ route('flow_board') }}" class="mr-2 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white
             hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">{{ __('menu.flow_board') }}</a>
                <div class="dropdown inline-block relative">
                    <a href="#" class="mr-2 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white
                       bg-gray-700 hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 inline-flex items-center">
                        <span class="mr-0.5">{{ __('menu.patient_client') }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                    </a>
                    <ul class="dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg">
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="{{ route('patient_client.index') }}">Finder</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Add New/Search</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Recycle Bin</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Summary</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Track Appointments</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Visits</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Records</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Visit Forms</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Import</a></li>

                    </ul>
                </div>
                <div class="dropdown inline-block relative">
                    <a href="{{ route('fees') }}" class="mr-2 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white
                        hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 inline-flex items-center">
                        <span class="mr-0.5">{{ __('menu.fees') }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                    </a>
                    <ul class="dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg">
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Fee Sheet</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Payment</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Checkout</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Billing</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Posting</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Batch Payment</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Verify Patient Billing Data</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">EDI History</a></li>
                    </ul>
                </div>
                <div class="dropdown inline-block relative">
                    <a href="{{ route('inventory') }}" class="mr-2 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white
                        hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 inline-flex items-center">
                        <span class="mr-0.5">{{ __('menu.inventory') }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                    </a>
                    <ul class="dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg">
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Management</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Destroyed</a></li>
                    </ul>
                </div>
                <div class="dropdown inline-block relative">
                    <a href="#" class="mr-2 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white
                        hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 inline-flex items-center">
                        <span class="mr-0.5">{{ __('menu.procedures') }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                    </a>
                    <ul class="dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg">
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Providers</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Configuration</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Load Compendium</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Pending Review</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Patient Results</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Lab Overview</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Batch Results</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Electronic Reports</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Lab Documents</a></li>
                    </ul>
                </div>
                <div class="dropdown inline-block relative">
                    <a href="#" class="mr-2 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white
                        hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 inline-flex items-center">
                        <span class="mr-0.5">{{ __('menu.reports') }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                    </a>
                    <ul class="dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg">
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Clients</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Visit</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Financial</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Inventory</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Procedures</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Insurance</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Blank Forms</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Services</a></li>
                    </ul>
                </div>
                <div class="dropdown inline-block relative">
                    <a href="#" class="mr-2 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white
                        hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 inline-flex items-center">
                        <span class="mr-0.5">{{ __('menu.popups') }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                    </a>
                    <ul class="dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg">
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Issues</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Appts</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Superbill</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Payment</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Letter</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Chart Label</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Barcode Label</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Address Label</a></li>
                    </ul>
                </div>
                <div class="dropdown inline-block relative">
                    <a href="#" class="mr-2 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white
                        hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 inline-flex items-center">
                        <span class="mr-0.5">{{ __('menu.miscellaneous') }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                    </a>
                    <ul class="dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg">
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Patient Education</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Patient Portal</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Authorizations</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Addr Book</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Order Catalog</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">BatchCom</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Preferences</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">New Documents</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Utilities</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Document Templates</a></li>
                    </ul>
                </div>
                <div class="dropdown inline-block relative">
                    <a href="#" class="mr-2 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white
                        hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 inline-flex items-center">
                        <span class="mr-0.5">{{ __('menu.qa_measures') }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                    </a>
                    <ul class="dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg">
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">One</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Two</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Three is the magic number</a></li>
                    </ul>
                </div>
                <div class="dropdown inline-block relative">
                    <a href="#" class="mr-2 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white
                        hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 inline-flex items-center">
                        <span class="mr-0.5">{{ __('menu.help') }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                    </a>
                    <ul class="dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg">
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">One</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Two</a></li>
                        <li class=""><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap" href="#">Three is the magic number</a></li>
                    </ul>
                </div>
                <div class="hidden md:block">
                    <div class="ml-2 flex items-center md:ml-4">
                        <div class="dropdown flex items-center cursor-pointer text-sm py-1 px-2">
                            <img src="{{ asset('flags/gb.svg') }}" class="mr-1 h-4 w-5">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            <ul class="dropdown-menu absolute hidden py-1 w-10 bg-white rounded-md shadow-lg">
                                <li class=""><img src="{{ asset('flags/gb.svg') }}" class="h-4 w-10 p-"></li>
                                <li class=""><img src="{{ asset('flags/gb.svg') }}" class="h-4 w-10"></li>
                                <li class=""><img src="{{ asset('flags/gb.svg') }}" class="h-4 w-10"></li>
                            </ul>
                        </div>
                        <a href="#" class="dropdown text-sm rounded-full text-white items-center">
                            <div class="relative w-6 h-6">
                                <svg class="" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                <div class="absolute top-0 right-0 h-3 w-3 items-center border-1 border-red rounded-full bg-red-400 text-sm text-center"></div>
                            </div>
                        </a>
                        <button class="p-2 border-transparent text-gray-400 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-700">

                        </button>
                        <div class="ml-1 relative">
                            <div>
                                <button class="dropdown max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid">
                                    <div class="relative w-8 h-8">
                                        <img class="rounded-full border border-gray-100 shadow-sm" src="/images/avatars/admin.jpg" alt="user image">
                                        <div class="absolute top-0 right-0 h-2 w-2 border-2 border-white rounded-full bg-green-400 z-1"></div>
                                    </div>
                                </button>
                            </div>
                            <div class="dropdown-menu hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                                <div class="py-1 rounded-md bg-white shadow-xs">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your Profile</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mr-2 flex md:hidden">
                    <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </nav>
            <p class="h-2"></p>
            <div class="flex flex-wrap items-center text-base md:ml-2">
                <p class="text-sm ...">Patient:
                    <span class="font-bold">Mua Ndzo Laurent</span>
                </p>
            </div>
        </div>
    </header>
</div>
