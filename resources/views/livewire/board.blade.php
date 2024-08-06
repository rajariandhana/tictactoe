<div class="bg-indigo-50">
    {{-- <button wire:click="ccc">CLICK</button> --}}
    {{-- <form wire:submit.prevent> --}}
        {{-- @csrf --}}
        <table>
            @for ($i = 1; $i <= 3; $i++)
                <tr>
                    @for ($j = 1; $j <= 3; $j++)
                        @php
                            $value = ($i - 1) * 3 + $j;
                        @endphp
                        <td>
                            <button wire:click="Click('{{ $value }}')">{{ $value }}</button>
                        </td>
                    @endfor
                </tr>
            @endfor
        </table>
    {{-- </form> --}}

</div>
