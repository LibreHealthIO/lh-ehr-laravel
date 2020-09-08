<div class="flex flex-row">
    @for($i = 0; $i <= 6; $i++)
        <div class="h-1.5 w-10 m-1 rounded-tr rounded-bl
        @isset($step) @if($step > $i) bg-green-500 @elseif ($step == $i) bg-orange-500
        @else bg-gray-200 @endif @endisset text-xs"></div>
    @endfor
</div>


