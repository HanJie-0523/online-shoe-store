<x-layouts.user>

    <div id="content">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="card text-center">
                <div class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                      </svg>
                </div>
                <div class="card-body p-5">
                    <h5 class="card-title">Payment Success !</h5>
                    <p class="card-text">Thank You For Your Purchasing!</p>
                    <a href="{{route('welcome')}}" class="btn btn-primary">Home</a>
                </div>
                {{-- <div class="card-footer text-muted">
                    2 days ago
                </div> --}}
            </div>
        </div>
    </div>



</x-layouts.user>
