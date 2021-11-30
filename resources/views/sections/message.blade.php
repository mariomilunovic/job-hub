<div>
    MESSAGE
    @if (session('success'))
        <div >
            {{session('success')}}
            <button>Close</button>
        </div>
    @endif

    @if (session('error'))
        <div >
            {{session('error')}}
            <button>Close</button>
        </div>
    @endif
</div>
