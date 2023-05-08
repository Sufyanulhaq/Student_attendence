<div class="col-md-3 col-lg-2 px-0 position-fixed h-100 bg-white shadow-sm sidebar" id="sidebar">
    <h1 class="bi bi-bootstrap text-primary d-flex my-4 justify-content-center"></h1>
    <div class="list-group rounded-0">
        <a href="{{url('/dashboard')}}"
            class="list-group-item list-group-item-action active border-0 d-flex align-items-center">
            <span class="bi bi-border-all"></span>
            <span class="ml-2">Dashboard</span>
        </a>
        <a href="{{url('mark')}}" class="list-group-item list-group-item-action border-0 align-items-center">
            <span class="bi bi-person-check"></span>
            <span class="ml-2">Mark Attendence</span>
        </a>

        <button
            class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center"
            data-toggle="collapse" data-target="#sale-collapse">
            <a href="{{url('leave')}}" class=" list-group-item-action border-0 align-items-center">

            <div>
                <span class="bi bi-person"></span>
                <span class="ml-2">Mark Leave</span>
            </div>
            </a>
        </button>

        <button
            class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center"
            data-toggle="collapse" data-target="#purchase-collapse">
            <a href="{{url('view')}}" class=" list-group-item-action border-0 align-items-center">

            <div>
                {{-- <a href="{{url('view')}}" class="list-group-item list-group-item-action border-0 align-items-center"> --}}
                <span class="bi bi-box"></span>
                <span class="ml-2">View</span>
            </div>
            </a>
        </button>

    </div>
</div>
