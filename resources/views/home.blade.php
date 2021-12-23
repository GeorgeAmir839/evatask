@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                                @php
                                
                                    $orders=Auth::user()->orders;
                                @endphp
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3> {!!  ('Hello Mr.'). Auth::user()->user_name !!} </h3>
                    {{-- <small> {!!"Your Orders count: " . count(Auth::user()->orders)!!}</small> --}}
                    <h3> {!!  ('Your Orders count :'). count($orders) !!}</h3>
                    <a href="{{ route('orders.create') }}" class='btn btn-dark'> ADD New Order </a>

                    
                </div>
                <div class="card-header">
                   
                   @php
                   $sum=0;
                        foreach ($orders as $order){
                            $sum += $order->commission->commission_value; 
                    }
                
                   @endphp
                
                    <h3 > {!!  ('Total Commission: ').$sum.'EG' !!} </h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
