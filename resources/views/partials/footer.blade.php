<div class="footer">
    <div class="w-full flex justify-center items-center border-grey p-4 pin-b">
        <div class="flex pb-5 px-3 text-center mx-auto pt-5 border-t text-gray-800 text-sm">
            <div class="mt-2">
                <span class="text-xs text-gray-500 tracking-widest">
                    (v{{ app_version() }}) | <a href="{{ route('acknowledge_license_cert') }}" class="font-medium text-gray-600 underline pr-2 hover:text-orange-500">
                        {{ __('general.acknowledgement_licensing_and_cert') }}
                    </a>
                </span>
            </div>
            <div class="mt-2"> {!! copyrights_text() !!}</div>
        </div>
    </div>
</div>

