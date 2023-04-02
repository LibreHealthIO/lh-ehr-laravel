<template>
    <svg v-if="name === 'logo'" width="300.000000pt" height="300.000000pt" viewBox="0 0 300.000000 300.000000" preserveAspectRatio="xMidYMid meet">
        <g transform="translate(0.000000,300.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
            <path d="M485 2832 c-35 -12 -66 -36 -86 -70 -21 -32 -21 -44 -21 -971 l0 -938 22 -46 c29 -61 84 -119 143 -151 107 -59 198 -110 507 -288 367 -212 348 -203 450 -203 96 0 121 10 340 140 30 18 91 53 135 77 44 25 139 79 210 120 136 78 193 111 273 154 59 32 113 90 142 151 l22 48 -1 920 c0 506 -1 930 -1 942 0 29 -56 92 -97 109 -26 12 -212 14 -1025 13 -546 -1 -1002 -4 -1013 -7z m2001 -23 c3 -5 9 -7 14 -4 15 9 68 -35 83 -69 12 -26 15 -178 16 -943 1 -896 0 -914 -20 -968 -23 -63 -87 -126 -171 -170 -72 -37 -94 -49 -238 -132 -147 -84 -153 -87 -340 -193 -80 -45 -158 -92 -175 -104 -16 -11 -32 -20 -35 -20 -3 1 -16 -3 -30 -8 -14 -6 -55 -11 -91 -11 -54 0 -77 6 -135 33 -38 19 -88 47 -111 62 -23 15 -45 28 -49 28 -4 0 -43 22 -88 48 -45 27 -101 60 -126 73 -25 13 -47 26 -50 30 -3 3 -23 13 -45 23 -22 11 -42 22 -45 26 -3 3 -41 26 -85 51 -44 24 -88 48 -97 54 -9 5 -43 24 -75 40 -32 17 -81 53 -110 81 -86 86 -82 25 -80 1076 2 911 2 917 23 945 46 62 18 61 1086 61 586 0 970 -3 974 -9z">
            </path>
            <path d="M1304 2508 c-15 -15 -17 -53 -20 -279 -1 -144 -5 -263 -8 -266 -3 -3 -123 -7 -267 -8 -209 -3 -265 -7 -276 -18 -22 -21 -24 -363 -3 -393 16 -22 35 -23 501 -24 l56 0 -1 -262 c-1 -219 1 -265 14 -280 16 -19 75 -23 295 -19 89 1 102 3 113 21 10 16 13 86 12 280 l0 260 37 0 c21 0 130 1 243 1 228 0 266 4 275 27 3 9 6 97 6 195 0 140 -3 183 -14 194 -10 10 -73 15 -278 19 -145 4 -266 8 -269 11 -2 2 -5 121 -5 264 -1 227 -3 261 -18 276 -14 14 -43 17 -197 18 -163 1 -182 0 -196 -17z m386 -293 l0 -285 285 0 285 0 0 -190 0 -191 -285 3 -286 3 1 -283 1 -284 -190 -1 -191 -2 0 285 0 285 -285 -3 -285 -3 0 191 0 190 285 0 285 0 0 285 0 285 190 0 190 0 0 -285z">
            </path>
        </g>
    </svg>
    <svg v-else-if="name === 'dashboard'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'ban'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'bookmark'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" stroke-linecap="round" stroke-linejoin="round"
              stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'calendar'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
    </svg>
    <svg v-else-if="name === 'camera'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
        <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'reply'" fill="currentColor" stroke="currentColor" viewBox="0 0 512 512" x="0px"
         xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" y="0px">
        <g>
            <g>
                <path d="M171.154,312.882L45.846,187.142c-7.799-7.798-7.799-20.486-0.032-28.252L171.098,34.174
            c7.828-7.793,7.856-20.456,0.063-28.284c-7.792-7.829-20.455-7.856-28.284-0.064L17.56,130.574
            c-23.393,23.394-23.393,61.458-0.023,84.828l125.284,125.716c3.907,3.921,9.036,5.882,14.166,5.882
            c5.107,0,10.215-1.944,14.119-5.834C178.929,333.369,178.952,320.706,171.154,312.882z"/>
            </g>
        </g>
        <g>
            <g>
                <path d="M332.487,153h-213.5c-11.046,0-20,8.954-20,20s8.954,20,20,20h213.5c76.921,0,139.5,62.58,139.5,139.5
            S409.408,472,332.487,472c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20c98.977,0,179.5-80.523,179.5-179.5
            S431.464,153,332.487,153z"/>
            </g>
        </g>
    </svg>
    <svg v-else-if="name === 'check'" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
    </svg>
    <svg v-else-if="name === 'badge-check'" class="rounded-full text-white bg-theme-1 ml-1" fill="none"
         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
    </svg>
    <svg v-else-if="name === 'arrows-expand'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'bell'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'settings'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'dots-vertical'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'dots-horizontal'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'fire'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
        <path d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" stroke-linecap="round"
              stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'flag'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'folder-open'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'gift'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'heart'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'key'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'rss-feed'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M6 5c7.18 0 13 5.82 13 13M6 11a7 7 0 017 7m-6 0a1 1 0 11-2 0 1 1 0 012 0z" stroke-linecap="round"
              stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'shopping-bag'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" stroke-linecap="round" stroke-linejoin="round"
              stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'lightening'" stroke="currentColor" viewBox="0 0 52 52">
        <polygon fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23" stroke-linecap="round" stroke-linejoin="round"
                 stroke-width="4"></polygon>
    </svg>
    <svg v-else-if="name === 'shopping-cart'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'sparkles'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'star'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'scissors'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M7.848 8.25l1.536.887M7.848 8.25a3 3 0 11-5.196-3 3 3 0 015.196 3zm1.536.887a2.165 2.165 0 011.083 1.839c.005.351.054.695.14 1.024M9.384 9.137l2.077 1.199M7.848 15.75l1.536-.887m-1.536.887a3 3 0 11-5.196 3 3 3 0 015.196-3zm1.536-.887a2.165 2.165 0 001.083-1.838c.005-.352.054-.695.14-1.025m-1.223 2.863l2.077-1.199m0-3.328a4.323 4.323 0 012.068-1.379l5.325-1.628a4.5 4.5 0 012.48-.044l.803.215-7.794 4.5m-2.882-1.664A4.331 4.331 0 0010.607 12m3.736 0l7.794 4.5-.802.215a4.5 4.5 0 01-2.48-.043l-5.326-1.629a4.324 4.324 0 01-2.068-1.379M14.343 12l-2.882 1.664" />
    </svg>
    <svg v-else-if="name === 'wrench-screwdriver'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
    </svg>
    <svg v-else-if="name === 'sort-ascending'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" stroke-linecap="round" stroke-linejoin="round"
              stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'tag'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'thumb-down'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'thumb-up'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'upload'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" stroke-linecap="round"
              stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'view-grid'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'volume-up'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'volume-off'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd"
              d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
        <path d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'share'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'search'" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round" stroke-linejoin="round"
              stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'refresh'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'pencil-alt'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'mail-open'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'mail-close'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'link'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'filter'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'adjustments'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'lock-closed'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'video-camera'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'identification'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'document-report'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'document-text'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
    </svg>
    <svg v-else-if="name === 'facility'" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="currentColor">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0193 11.9846C13.0768 11.2752 13.2616 10.6012 13.5512 9.98462H6V12.4662L10 15.4969V42.0154H38V15.5321L42.5 12.5014V9.98462H24.4488C24.7384 10.6012 24.9232 11.2752 24.9807 11.9846H39.687L36 14.4678V40.0154H12V14.5031L8.67616 11.9846H13.0193Z"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M20 26H16V30H20V26ZM14 24V32H22V24H14Z"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M32 26H26V40H32V26ZM24 24V42H34V24H24Z"/>
        <path d="M6 41C6 41.5523 6.44772 42 7 42H41C41.5523 42 42 41.5523 42 41C42 40.4477 41.5523 40 41 40H7C6.44772 40 6 40.4477 6 41Z"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 16H10V14H15V16Z"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M37.5 16H23V14H37.5V16Z"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M25 12C25 15.3137 22.3137 18 19 18C15.6863 18 13 15.3137 13 12C13 8.68629 15.6863 6 19 6C22.3137 6 25 8.68629 25 12ZM20 9V11H22V13H20V15H18V13H16V11H18V9H20Z"/>
    </svg>
    <svg v-else-if="name === 'menu-alt-2'" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M4 6h16M4 12h16M4 18h7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'announcement'" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'circle-loader'" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75"
              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
              fill="currentColor"></path>
    </svg>
    <svg v-else-if="name === 'chat'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'info'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round"
              stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'spinner'" class="-ml-1 mr-2 animate-spin" fill="none" stroke="currentColor"
         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75"
              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
              fill="currentColor"></path>
    </svg>
    <svg v-else-if="name === 'transfer'" viewBox="-15 0 463 463.152" xmlns="http://www.w3.org/2000/svg">
        <path
            d="m216.074219 179.574219c-30.925781 0-56 25.074219-56 56 0 30.929687 25.074219 56 56 56 30.929687 0 56-25.070313 56-56-.035157-30.910157-25.085938-55.964844-56-56zm0 96c-22.089844 0-40-17.90625-40-40 0-22.089844 17.910156-40 40-40 22.09375 0 40 17.910156 40 40-.023438 22.082031-17.917969 39.976562-40 40zm0 0"/>
        <path d="m48.074219 155.574219h16v-16h-24c-4.417969 0-8 3.582031-8 8v24h16zm0 0"/>
        <path d="m48.074219 299.574219h-16v24c0 4.421875 3.582031 8 8 8h24v-16h-16zm0 0"/>
        <path
            d="m.0742188 115.574219v240c0 4.421875 3.5820312 8 8.0000002 8h416c4.421875 0 8-3.578125 8-8v-240c0-4.417969-3.578125-8-8-8h-416c-4.417969 0-8.0000002 3.582031-8.0000002 8zm16.0000002 8h400v224h-400zm0 0"/>
        <path
            d="m392.074219 195.574219c-26.496094-.023438-47.972657-21.5-48-48 0-4.417969-3.578125-8-8-8h-240c-4.417969 0-8 3.582031-8 8-.023438 26.5-21.5 47.976562-48 48-4.417969 0-8 3.582031-8 8v64c0 4.421875 3.582031 8 8 8 26.5.027343 47.976562 21.503906 48 48 0 4.421875 3.582031 8 8 8h240c4.421875 0 8-3.578125 8-8 .027343-26.496094 21.503906-47.972657 48-48 4.421875 0 8-3.578125 8-8v-64c0-4.417969-3.578125-8-8-8zm-8 64.496093c-28.980469 3.703126-51.800781 26.523438-55.503907 55.503907h-224.992187c-3.703125-28.980469-26.519531-51.800781-55.503906-55.503907v-48.992187c28.984375-3.703125 51.800781-26.519531 55.503906-55.503906h224.992187c3.703126 28.984375 26.523438 51.800781 55.503907 55.503906zm0 0"/>
        <path d="m392.074219 139.574219h-24v16h16v16h16v-24c0-4.417969-3.578125-8-8-8zm0 0"/>
        <path d="m384.074219 315.574219h-16v16h24c4.421875 0 8-3.578125 8-8v-24h-16zm0 0"/>
        <path
            d="m108.074219 48.480469 8 13.839843c54.410156-31.375 120.398437-35.367187 178.195312-10.785156l-33.769531 16.878906 7.152344 14.320313 48-24c1.90625-.9375 3.359375-2.601563 4.039062-4.613281.679688-2.015625.53125-4.21875-.414062-6.121094l-24-48-14.320313 7.152344 13.597657 27.199218c-61.078126-23.851562-129.6875-18.65625-186.480469 14.128907zm0 0"/>
        <path
            d="m316.074219 414.671875-8-13.839844c-54.40625 31.371094-120.390625 35.367188-178.183594 10.785157l33.769531-16.882813-7.152344-14.320313-48 24c-3.957031 1.976563-5.5625 6.785157-3.582031 10.738282l24 48 14.316407-7.152344-13.597657-27.199219c61.066407 23.835938 129.65625 18.640625 186.429688-14.128906zm0 0"/>
    </svg>
    <svg v-else-if="name === 'twitter'" fill="currentColor">
        <path
            d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"></path>
    </svg>
    <svg v-else-if="name === 'trash'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'users'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
    </svg>
    <svg v-else-if="name === 'eye'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
        <path
            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'mic'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'repost'" fill="currentColor" height="512pt" viewBox="0 -91 512 512" width="512pt"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="m512 250.644531-79.796875 79.671875-80.363281-80.03125 28.210937-28.328125 31.871094 31.738281v-193.613281c.035156-5.277343-1.996094-10.246093-5.71875-13.992187-3.757813-3.785156-8.777344-5.867188-14.128906-5.867188h-215.230469l-40.144531-39.980468h255.375c16.082031 0 31.171875 6.277343 42.492187 17.667968 11.265625 11.34375 17.417969 26.382813 17.332032 42.363282v193.882812l31.851562-31.804688zm-184.039062 39.449219h-208.035157c-5.355469 0-10.371093-2.082031-14.128906-5.863281-3.722656-3.746094-5.753906-8.71875-5.71875-13.996094v-193.613281l31.871094 31.738281 28.210937-28.328125-80.363281-80.03125-79.796875 79.675781 28.25 28.289063 31.851562-31.800782v193.878907c-.085937 15.980469 6.066407 31.023437 17.332032 42.363281 11.320312 11.390625 26.410156 17.667969 42.492187 17.667969h255.375l-40.144531-39.980469zm0 0"/>
    </svg>
    <svg v-else-if="name === 'like'" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd"
              d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
              fill-rule="evenodd"/>
    </svg>
    <svg v-else-if="name === 'headphones'" id="Layer_2" data-name="Layer 2" height="512" viewBox="0 0 128 128"
         width="512" xmlns="http://www.w3.org/2000/svg">
        <path
            d="m123.25 64a59.076 59.076 0 0 0 -21.484-45.658 59.264 59.264 0 0 0 -75.53 0 59.223 59.223 0 0 0 -17.684 66.519 14.208 14.208 0 0 0 -2.4 15.784l6.978 14.547a14.172 14.172 0 0 0 18.935 6.659l1.476-.708a1.726 1.726 0 0 0 .352-.231 6.925 6.925 0 0 0 8.4-9.587l-15.971-33.262a6.918 6.918 0 0 0 -10.678-2.334 49.707 49.707 0 0 1 16.011-49.47 5.081 5.081 0 0 0 2.316.584 5.19 5.19 0 0 0 3.015-.973 46.641 46.641 0 0 1 54.029 0 5.125 5.125 0 0 0 5.34.4 49.706 49.706 0 0 1 16 49.461 6.918 6.918 0 0 0 -10.678 2.334l-15.967 33.26a6.912 6.912 0 0 0 8.4 9.588 1.765 1.765 0 0 0 .352.23l1.476.709a14.194 14.194 0 0 0 18.935-6.66l6.978-14.547a14.208 14.208 0 0 0 -2.4-15.784 58.687 58.687 0 0 0 3.799-20.861zm-100.875 55.142a10.625 10.625 0 0 1 -6.093-5.463l-6.977-14.548a10.7 10.7 0 0 1 4.915-14.215l16.225 33.828a10.621 10.621 0 0 1 -8.07.398zm-3.8-41.175a3.408 3.408 0 0 1 1.482-.339 3.445 3.445 0 0 1 3.105 1.95l15.973 33.262a3.438 3.438 0 1 1 -6.2 2.975l-15.935-33.2-.029-.062a3.435 3.435 0 0 1 1.611-4.586zm-7.825-13.967a53.2 53.2 0 0 0 2.461 16.018 6.882 6.882 0 0 0 -.064 1.53l-.339.162a14.268 14.268 0 0 0 -1.406.782 55.73 55.73 0 0 1 15.843-60.386l1.755 1.824a53.033 53.033 0 0 0 -18.25 40.07zm82.294-40.981a50.139 50.139 0 0 0 -58.088 0 1.646 1.646 0 0 1 -2.154-.182l-2.862-2.978a55.769 55.769 0 0 1 68.12 0l-2.86 2.977a1.646 1.646 0 0 1 -2.156.183zm5.956.911 1.753-1.824a55.73 55.73 0 0 1 15.847 60.386 14.268 14.268 0 0 0 -1.406-.782l-.339-.163a6.873 6.873 0 0 0 -.064-1.529 53.179 53.179 0 0 0 -15.791-56.088zm-8.526 93.5a3.441 3.441 0 0 1 -1.611-4.586l15.968-33.262a3.445 3.445 0 0 1 3.105-1.95 3.437 3.437 0 0 1 3.093 4.925l-.029.062-15.939 33.2a3.436 3.436 0 0 1 -4.587 1.611zm28.219-18.3-6.977 14.548a10.691 10.691 0 0 1 -14.163 5.065l16.227-33.827a10.7 10.7 0 0 1 4.92 14.215z"/>
    </svg>
    <svg v-else-if="name === 'book'" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M6 4H5a1 1 0 1 1 0-2h11V1a1 1 0 0 0-1-1H4a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V5a1 1 0 0 0-1-1h-7v8l-2-2-2 2V4z"/>
    </svg>
    <svg v-else-if="name === 'location'" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 20S3 10.87 3 7a7 7 0 1 1 14 0c0 3.87-7 13-7 13zm0-11a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
    </svg>
    <svg v-else-if="name === 'office'" height="100" viewBox="0 0 100 100" width="100"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M7 0h86v100H57.108V88.418H42.892V100H7V0zm9 64h11v15H16V64zm57 0h11v15H73V64zm-19 0h11v15H54V64zm-19 0h11v15H35V64zM16 37h11v15H16V37zm57 0h11v15H73V37zm-19 0h11v15H54V37zm-19 0h11v15H35V37zM16 11h11v15H16V11zm57 0h11v15H73V11zm-19 0h11v15H54V11zm-19 0h11v15H35V11z"
            fill-rule="evenodd"/>
    </svg>
    <svg v-else-if="name === 'printer'" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path d="M4 16H0V6h20v10h-4v4H4v-4zm2-4v6h8v-6H6zM4 0h12v5H4V0zM2 8v2h2V8H2zm4 0v2h2V8H6z"/>
    </svg>
    <svg v-else-if="name === 'store-front'" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M18 9.87V20H2V9.87a4.25 4.25 0 0 0 3-.38V14h10V9.5a4.26 4.26 0 0 0 3 .37zM3 0h4l-.67 6.03A3.43 3.43 0 0 1 3 9C1.34 9 .42 7.73.95 6.15L3 0zm5 0h4l.7 6.3c.17 1.5-.91 2.7-2.42 2.7h-.56A2.38 2.38 0 0 1 7.3 6.3L8 0zm5 0h4l2.05 6.15C19.58 7.73 18.65 9 17 9a3.42 3.42 0 0 1-3.33-2.97L13 0z"/>
    </svg>
    <svg v-else-if="name === 'eye'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
        <path
            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'eye-off'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'pencil-alt'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'close'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'dots'" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/>
    </svg>
    <svg v-else-if="name === 'dots-circle'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round"
              stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'copy'" fill="none" stroke="currentColor" version="1.1" viewBox="0 0 210.107 210.107"
         x="0px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
         y="0px">
        <g>
            <path d="M168.506,0H80.235C67.413,0,56.981,10.432,56.981,23.254v2.854h-15.38
        c-12.822,0-23.254,10.432-23.254,23.254v137.492c0,12.822,10.432,23.254,23.254,23.254h88.271
        c12.822,0,23.253-10.432,23.253-23.254V184h15.38c12.822,0,23.254-10.432,23.254-23.254V23.254C191.76,10.432,181.328,0,168.506,0z
         M138.126,186.854c0,4.551-3.703,8.254-8.253,8.254H41.601c-4.551,0-8.254-3.703-8.254-8.254V49.361
        c0-4.551,3.703-8.254,8.254-8.254h88.271c4.551,0,8.253,3.703,8.253,8.254V186.854z M176.76,160.746
        c0,4.551-3.703,8.254-8.254,8.254h-15.38V49.361c0-12.822-10.432-23.254-23.253-23.254H71.981v-2.854
        c0-4.551,3.703-8.254,8.254-8.254h88.271c4.551,0,8.254,3.703,8.254,8.254V160.746z" style="fill:#1D1D1B;"/>
        </g>
    </svg>
    <svg v-else-if="name === 'website'" fill="currentColor" stroke="none" viewBox="0 0 512 512"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M256 48C141.124 48 48 141.125 48 256s93.124 208 208 208c114.875 0 208-93.125 208-208S370.875 48 256 48zm-21.549 384.999c-39.464-4.726-75.978-22.392-104.519-50.932C96.258 348.393 77.714 303.622 77.714 256c0-42.87 15.036-83.424 42.601-115.659.71 8.517 2.463 17.648 2.014 24.175-1.64 23.795-3.988 38.687 9.94 58.762 5.426 7.819 6.759 19.028 9.4 28.078 2.583 8.854 12.902 13.498 20.019 18.953 14.359 11.009 28.096 23.805 43.322 33.494 10.049 6.395 16.326 9.576 13.383 21.839-2.367 9.862-3.028 15.937-8.13 24.723-1.557 2.681 5.877 19.918 8.351 22.392 7.498 7.497 14.938 14.375 23.111 21.125 12.671 10.469-1.231 24.072-7.274 39.117zm147.616-50.932c-25.633 25.633-57.699 42.486-92.556 49.081 4.94-12.216 13.736-23.07 21.895-29.362 7.097-5.476 15.986-16.009 19.693-24.352 3.704-8.332 8.611-15.555 13.577-23.217 7.065-10.899-17.419-27.336-25.353-30.781-17.854-7.751-31.294-18.21-47.161-29.375-11.305-7.954-34.257 4.154-47.02-1.417-17.481-7.633-31.883-20.896-47.078-32.339-15.68-11.809-14.922-25.576-14.922-42.997 12.282.453 29.754-3.399 37.908 6.478 2.573 3.117 11.42 17.042 17.342 12.094 4.838-4.043-3.585-20.249-5.212-24.059-5.005-11.715 11.404-16.284 19.803-24.228 10.96-10.364 34.47-26.618 32.612-34.047s-23.524-28.477-36.249-25.193c-1.907.492-18.697 18.097-21.941 20.859.086-5.746.172-11.491.26-17.237.055-3.628-6.768-7.352-6.451-9.692.8-5.914 17.262-16.647 21.357-21.357-2.869-1.793-12.659-10.202-15.622-8.968-7.174 2.99-15.276 5.05-22.45 8.039 0-2.488-.302-4.825-.662-7.133a176.585 176.585 0 0 1 45.31-13.152l14.084 5.66 9.944 11.801 9.924 10.233 8.675 2.795 13.779-12.995L282 87.929V79.59c27.25 3.958 52.984 14.124 75.522 29.8-4.032.361-8.463.954-13.462 1.59-2.065-1.22-4.714-1.774-6.965-2.623 6.531 14.042 13.343 27.89 20.264 41.746 7.393 14.801 23.793 30.677 26.673 46.301 3.394 18.416 1.039 35.144 2.896 56.811 1.788 20.865 23.524 44.572 23.524 44.572s10.037 3.419 18.384 2.228c-7.781 30.783-23.733 59.014-46.769 82.052z"/>
    </svg>
    <svg v-else-if="name === 'user-add'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'lock-closed'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'chevron-down'" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
    </svg>
    <svg v-else-if="name === 'chevron-left'" fill="currentColor" stroke="currentColor" viewBox="0 0 20 20"
         xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd"
              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
              fill-rule="evenodd"/>
    </svg>
    <svg v-else-if="name === 'chevron-right'" fill="currentColor" stroke="currentColor" viewBox="0 0 20 20"
         xmlns="http://www.w3.org/2000/svg">
        <polygon points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707"/>
    </svg>
    <svg v-else-if="name === 'printer'" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path d="M4 16H0V6h20v10h-4v4H4v-4zm2-4v6h8v-6H6zM4 0h12v5H4V0zM2 8v2h2V8H2zm4 0v2h2V8H6z"/>
    </svg>
    <svg v-else-if="name === 'profile'" fill="none" stroke="currentColor" strokeLinecap="round" strokeLinejoin="round"
         strokeWidth="1" viewBox="0 0 24 24">
        <path
            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
    </svg>
    <svg v-else-if="name === 'arrow-narrow-right'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M17 8l4 4m0 0l-4 4m4-4H3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'arrow-narrow-left'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M7 16l-4-4m0 0l4-4m-4 4h18" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'check-circle'" fill="currentColor" stroke="currentColor" viewBox="0 0 20 20"
         xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd"
              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
              fill-rule="evenodd"/>
    </svg>
    <svg v-else-if="name === 'shield-check'" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd"
              d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
              fill-rule="evenodd"/>
    </svg>
    <svg v-else-if="name === 'view-grid-add'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'plus-circle'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round"
              stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'money'" id="Capa_1" fill="currentColor" stroke="currentColor"
         style="enable-background:new 0 0 407.534 407.534;" version="1.1" viewBox="0 0 407.534 407.534" x="0px"
         xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" y="0px">
        <g>
            <g>
                <g>
                    <path d="M406.962,226.838c-0.001-0.002-0.001-0.003-0.002-0.005l-76.944-193.2c-1.633-4.105-6.286-6.109-10.391-4.476
                c-0.003,0.001-0.006,0.002-0.009,0.004L7.464,153.457c-1.273,0.55-2.377,1.428-3.2,2.544C1.668,157.35,0.028,160.02,0,162.945
                v208c0,4.418,3.582,8,8,8h336c4.418,0,8-3.582,8-8v-113.6l50.496-20.112C406.6,235.596,408.599,230.942,406.962,226.838z
                 M336,362.945H16v-192h320V362.945z M133.48,154.985l133.952-53.376c11.955,12.566,28.52,19.708,45.864,19.776l13.36,33.6H133.48
                z M352,240.161v-77.216c0-4.418-3.582-8-8-8h-0.128l-16.952-42.576c-0.188-0.355-0.407-0.693-0.656-1.008
                c-0.858-3.853-4.426-6.482-8.36-6.16c-16.138,1.471-31.925-5.327-41.944-18.064c-2.493-3.077-6.875-3.842-10.264-1.792
                c-0.38,0.045-0.757,0.115-1.128,0.208l-163.536,65.12c-1.979,0.776-3.562,2.315-4.392,4.272H46.976l271.136-107.96l71.032,178.36
                L352,240.161z"/>
                    <path d="M37.712,308.937c15.532,4.591,27.686,16.73,32.296,32.256c1.011,3.389,4.128,5.711,7.664,5.712
                c0.415-0.026,0.827-0.088,1.232-0.184c0.359,0.102,0.726,0.177,1.096,0.224h192c0.33-0.043,0.656-0.11,0.976-0.2
                c3.997,0.972,8.025-1.479,8.998-5.476c0.003-0.015,0.007-0.029,0.01-0.044c4.598-15.542,16.754-27.698,32.296-32.296
                c3.769-1.152,6.111-4.908,5.488-8.8c0.107-0.388,0.184-0.784,0.232-1.184v-64c-0.047-0.401-0.127-0.797-0.24-1.184
                c0.627-3.893-1.716-7.651-5.488-8.8c-15.542-4.597-27.695-16.758-32.28-32.304c-1.158-3.795-4.951-6.143-8.864-5.488
                c-0.37-0.103-0.747-0.178-1.128-0.224H80c-0.403,0.048-0.802,0.128-1.192,0.24c-3.891-0.62-7.645,1.721-8.8,5.488
                c-4.601,15.539-16.756,27.691-32.296,32.288c-3.769,1.152-6.111,4.908-5.488,8.8c-0.104,0.389-0.179,0.784-0.224,1.184v64
                c0.046,0.376,0.121,0.748,0.224,1.112C31.568,303.974,33.915,307.772,37.712,308.937z M48,238.193
                c16.064-6.452,28.796-19.184,35.248-35.248h185.496c6.455,16.064,19.19,28.796,35.256,35.248v57.504
                c-16.059,6.459-28.789,19.189-35.248,35.248H83.248C76.789,314.886,64.059,302.156,48,295.697V238.193z"/>
                    <path d="M176,314.945c26.51,0,48-21.49,48-48c0-26.51-21.49-48-48-48c-26.51,0-48,21.49-48,48
                C128.026,293.444,149.501,314.919,176,314.945z M176,234.945c17.673,0,32,14.327,32,32s-14.327,32-32,32s-32-14.327-32-32
                S158.327,234.945,176,234.945z"/>
                    <path d="M88,278.945c6.627,0,12-5.373,12-12c0-6.627-5.373-12-12-12s-12,5.373-12,12C76,273.573,81.373,278.945,88,278.945z
                 M88,262.945c2.209,0,4,1.791,4,4c0,2.209-1.791,4-4,4c-2.209,0-4-1.791-4-4C84,264.736,85.791,262.945,88,262.945z"/>
                    <path d="M264,278.945c6.627,0,12-5.373,12-12c0-6.627-5.373-12-12-12c-6.627,0-12,5.373-12,12
                C252,273.573,257.373,278.945,264,278.945z M264,262.945c2.209,0,4,1.791,4,4c0,2.209-1.791,4-4,4c-2.209,0-4-1.791-4-4
                C260,264.736,261.791,262.945,264,262.945z"/>
                </g>
            </g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
        <g>
        </g>
    </svg>
    <svg v-else-if="name === 'user-remove'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'view-list'" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd"
              d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
              fill-rule="evenodd"/>
    </svg>
    <svg v-else-if="name === 'volume-up'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'volume-off'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd"
              d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
        <path d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'shuffle'" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
         stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
        <polyline points="16 3 21 3 21 8"></polyline>
        <line x1="4" x2="21" y1="20" y2="3"></line>
        <polyline points="21 16 21 21 16 21"></polyline>
        <line x1="15" x2="21" y1="15" y2="21"></line>
        <line x1="4" x2="9" y1="4" y2="9">
        </line>
    </svg>
    <svg v-else-if="name === 'next'" fill="currentColor" version="1.1" viewBox="0 0 17.804 17.804" x="0px"
         xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" y="0px">
        <g>
            <g id="c93_stop">
                <path d="M2.44,0.043c0.14-0.071,0.304-0.051,0.425,0.044l10.777,8.502c0.094,0.074,0.152,0.191,0.152,0.31
            c0,0.118-0.059,0.24-0.152,0.314L2.864,17.718c-0.072,0.056-0.162,0.086-0.25,0.086l-0.175-0.04
            c-0.137-0.065-0.223-0.206-0.223-0.362V0.403C2.216,0.249,2.302,0.106,2.44,0.043z"></path>
                <path d="M12.616,0.034h2.656c0.175,0,0.316,0.181,0.316,0.399v16.935c0,0.222-0.142,0.403-0.316,0.403h-2.656
            c-0.174,0-0.316-0.182-0.316-0.403V0.434C12.3,0.215,12.443,0.034,12.616,0.034z"></path>
            </g>
        </g>
    </svg>
    <svg v-else-if="name === 'previous'" fill="currentColor" version="1.1" viewBox="0 0 17.802 17.802" x="0px"
         xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" y="0px">
        <g>
            <g id="c92_stop">
                <path d="M15.363,0.042c-0.139-0.07-0.303-0.051-0.424,0.043L4.163,8.587C4.069,8.664,4.01,8.78,4.01,8.9
            c0,0.119,0.059,0.24,0.153,0.314l10.776,8.502c0.071,0.057,0.162,0.086,0.249,0.086l0.175-0.039
            c0.139-0.064,0.225-0.207,0.225-0.361V0.403C15.588,0.249,15.502,0.107,15.363,0.042z"></path>
                <path d="M5.188,0.033H2.53c-0.172,0-0.315,0.182-0.315,0.401V17.37c0,0.221,0.143,0.403,0.315,0.403h2.657
            c0.174,0,0.315-0.183,0.315-0.403V0.434C5.503,0.215,5.361,0.033,5.188,0.033z"></path>
            </g>
        </g>
    </svg>
    <svg v-else-if="name=== 'light-bulb'" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name=== 'loading'" class="w-8 h-8 text-theme-1 items-center mx-auto justify-center"
         fill="currentColor" viewBox="0 0 55 80" width="15" xmlns="http://www.w3.org/2000/svg">
        <g transform="matrix(1 0 0 -1 0 80)">
            <rect height="20" rx="3" width="10">
                <animate attributeName="height" begin="0s" calcMode="linear" dur="4.3s" repeatCount="indefinite"
                         values="20;45;57;80;64;32;66;45;64;23;66;13;64;56;34;34;2;23;76;79;20"></animate>
            </rect>
            <rect height="80" rx="3" width="10" x="15">
                <animate attributeName="height" begin="0s" calcMode="linear" dur="2s" repeatCount="indefinite"
                         values="80;55;33;5;75;23;73;33;12;14;60;80"></animate>
            </rect>
            <rect height="50" rx="3" width="10" x="30">
                <animate attributeName="height" begin="0s" calcMode="linear" dur="1.4s" repeatCount="indefinite"
                         values="50;34;78;23;56;23;34;76;80;54;21;50"></animate>
            </rect>
            <rect height="30" rx="3" width="10" x="45">
                <animate attributeName="height" begin="0s" calcMode="linear" dur="2s" repeatCount="indefinite"
                         values="30;45;13;80;56;72;45;76;34;23;67;30"></animate>
            </rect>
        </g>
    </svg>
    <svg v-else-if="name === 'x-circle'" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
         stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
        <circle cx="12" cy="12" r="10"></circle>
        <line x1="15" x2="9" y1="9" y2="15"></line>
        <line x1="9" x2="15" y1="9" y2="15"></line>
    </svg>
    <svg v-else-if="name === 'x'" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'chevron-double-right'" class="h-6 w-6" fill="none" stroke="currentColor"
         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M13 5l7 7-7 7M5 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    </svg>
    <svg v-else-if="name === 'home-icon'" class="h-5 w-5" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
    >
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
    </svg>
    <svg v-else-if="name === 'hamburger'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path v-if="!isMenuOpen" stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
  <path v-if="isMenuOpen" stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
<svg v-else-if="name === 'chat-bubble'" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="{2}" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
 </svg>

</template>
<script>
export default {
    name: 'Icon',
    props: {
        name: String,
        isMenuOpen: Boolean,
    },

}

</script>
