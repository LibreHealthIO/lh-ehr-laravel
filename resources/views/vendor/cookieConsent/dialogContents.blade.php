<div class="js-cookie-consent cookie-consent flex flex-col fixed bottom-5 left-10 p-10 items-start z-100">
    <svg class="absolute top-0 left-0 text-theme-1" width="100%" height="100%" viewBox="0 0 671 468" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M59.2331 368.038C122.319 390.067 193.561 374.407 257.395 399.919C328.694 428.415 385.666 473.099 465.891 467.524C533.181 462.844 558.112 407.693 565.246 347.375C572.657 284.693 594.447 270.919 634.197 224.951C666.966 187.049 689.716 136.148 649.605 96.4065C606.737 53.9342 535.29 74.0478 480.472 70.981C442.903 68.8788 403.269 63.3108 371.479 44.8004C353.77 34.4959 335.224 20.2431 315.059 13.5874C273.518 -0.13323 222.704 -9.89894 181.936 17.193C141.169 44.2849 -113.021 307.9 59.2331 368.038Z"
              fill="#70c986" stroke="#fff"
              style="box-shadow:  0 0 3px rgba(0, 0, 0, .1), 0 0 10px rgba(0, 0, 0, .3)">
        </path>
    </svg>
    <div class="relative z-50 flex flex-col">
        <div>
            <span class="cookie-consent__message">{!! trans('cookieConsent::texts.message') !!}</span>
        </div>
        <a href="#" class="js-cookie-consent-agree cookie-consent__agree underline">
            {{ trans('cookieConsent::texts.agree') }}
        </a>
    </div>
</div>
