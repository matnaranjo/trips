@extends('pages.private')

@section('addinput')

<div class="container-md mt-4">
    <form action="{{route('addtrip')}}" method="POST">
        @csrf

        <!-- Success and fail messages -->
        @if (Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif

        @if (Session::get('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
        @endif

        <!-- inputs -->
        <div class="input-group mb-3">
            <input type="text" placeholder="From" class="form-control" name="from">
            <input type="text" placeholder="To" class="form-control" name="to">
        </div>
        <div class="input-group mb-3">
            <input type="text" placeholder="Value" class="form-control" name="value">
            <input type="text" placeholder="Payment" class="form-control" name="payment">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Received</span>
            </div>
            <input type="date" placeholder="received" class="form-control" name="received"></input>
            <div class="mx-2"></div>
            <div class="input-group-prepend ml-2">
                <span class="input-group-text" id="basic-addon1">Delivered</span>
            </div>
            <input type="date" placeholder="delivered" class="form-control" name="delivered"></input>
        </div>

        <!-- error messages -->
        <div style="color:red;">@error('from'){{$message}}
        @enderror</div>
        <div style="color:red;">@error('to'){{$message}}
        @enderror</div>
        <div style="color:red;">@error('value'){{$message}}
        @enderror</div>
        <div style="color:red;">@error('payment'){{$message}}
        @enderror</div>
        <div style="color:red;">@error('received'){{$message}}
        @enderror</div>
        <div style="color:red;">@error('delivered'){{$message}}
        @enderror</div>
        <button type="submit" class="btn btn-primary">Add Trip</button>
    </form>
</div>

@endsection