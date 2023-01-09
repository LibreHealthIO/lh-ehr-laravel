<div class="text-uppercase -ml-2">
    @for($i = 0; $i < 3; $i++)
        <div class="flex py-4 items-start">
            <div class="flex-shrink-0">
                    <span class="@isset($step) @if($step > $i) bg-green-500 @elseif($step == $i) bg-orange-500 @else bg-gray-900 @endif @endisset
                        h-8 w-8 pt-0.5 flex items-center justify-center rounded-full text-xs
                        leading-10 font-display font-bold text-white">0{{ $i + 1 }}</span>
            </div>
            <div class="mt-2 text-xs">
                @switch($i)
                    @case(0)
                    <a href="{{ route('ehr_installer.index') }}" class="px-1 -mx-1 py-1 transition duration-200 ease-in-out relative block hover:translate-x-2px
                     hover:text-gray-900 text-gray-600 ml-2 uppercase font-semibold text-xs">
                        <span class="no-underline"> {{ __('installer.introduction') }}</span>
                    </a>
                    @break
                    @case(1)
                    <a href="{{ route('ehr_installer.requirements') }}" class="px-1 -mx-1 py-1 transition duration-200 ease-in-out relative block hover:translate-x-2px
                     hover:text-gray-900 text-gray-600 ml-2 uppercase font-semibold text-xs">
                        <span class="no-underline">{{ __('installer.server_requirements') }}</span>
                    </a>
                    @break
                    @case(2)
                    <a href="{{ route('ehr_installer.file_permissions') }}" class="px-1 -mx-1 py-1 transition duration-200 ease-in-out relative block hover:translate-x-2px
                     hover:text-gray-900 text-gray-600 ml-2 uppercase font-semibold text-xs">
                        <span class="no-underline">{{ __('installer.file_permissions') }}</span>
                    </a>
                    @break
                    @default
                    <a href="#" class="px-1 -mx-1 py-1 transition duration-200 ease-in-out relative block hover:translate-x-2px
                     hover:text-gray-900 text-gray-600 ml-2 uppercase font-semibold text-xs">
                        <span class="no-underline">{{ __('installer.Introduction') }}</span>
                    </a>
                @endswitch
            </div>
        </div>
    @endfor
</div>

