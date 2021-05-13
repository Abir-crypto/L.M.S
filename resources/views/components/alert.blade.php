<div>
    <!-- An unexamined life is not worth living. - Socrates -->
    @if ($errors->any())
        <div class="border-2 red text-white">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('msg'))
        <div class="border-2 red text-white">
            <p class="flow-text red lighten-2">{{session()->get('msg')}}</p>
        </div>
    @endif
</div>
