@extends('layouts.app')

@section('title', title(__('Home')))

@section('content')
<script>
  $('document').ready(function() {
    initializeMap({!! json_encode([$event]) !!});
  })
</script>
<div class="container">
    <div class="text-center">
        <img class="mb-4" src="{{$event->image}}" alt="" width="70%">
    </div>

    <div class="content event-content">
        <h1 class="mt-4 mb-4">{{$event->name}}</h1>

        <div class="card event-details">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <h5 class="label">When</h5>
                        <table width="80%">
                            <thead>
                                <tr>
                                    <td><strong>From:</strong></td>
                                    <td><strong>Until:</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        {{Carbon\Carbon::parse($event->start_date)->format('d M Y')}}
                                        {{Carbon\Carbon::parse($event->start_time)->format('H:i')}}
                                    </td>
                                    <td>
                                        {{Carbon\Carbon::parse($event->end_date)->format('d M Y')}}
                                        {{Carbon\Carbon::parse($event->end_time)->format('H:i')}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <h5 class="label">Where</h5>
                        <p>
                            {{$event->address}}, {{$event->city}}, {{$event->country}}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <h5 class="label">Type</h5>
                        <p>
                            {{ucwords($event->type)}}
                        </p>
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <h5 class="label">Hosted by</h5>
                        <p>
                            {{ucwords($event->hosted_by)}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 mb-4">
            <p>{!! $event->full_description !!}</p>
        </div>

        <div class="row mb-4">
          <div class="col-12 mt-2">
            <!-- Map -->
            <div id="map" class="map">
              <!-- Popup -->
              <div id="popup"></div>
            </div>
          </div>
        </div>

        <div class="text-center">
            <a href="{{url('/events')}}" class="btn btn-lg btn-dark">
                See Other Events
            </a>
        </div>
    </div>
</div>

@endsection
