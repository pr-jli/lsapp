@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br>
                    <br>
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <br>
                    <br>
                    <h3>Your Blog Posts</h3>
                    <br>
                    @if(count($posts) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                            <td>
                                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <p>You have no posts</p>
                    @endif

                </div>
            </div>
            <br><br>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="md-col-8">
                        <div id="dashboard_div">
                            <!--Divs that will hold each control and chart-->
                            <div id="filter_div"></div>
                            <div id="chart_div"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <div class="wrapper">
        <h1>World population over time</h1>
        <h2>Number of people (in millions) living on earth, the last 500 years</h2>

        <canvas id="myChart" width="1600" height="900"></canvas>
    </div>

    <script>
        
        var years = [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050];
        
        var africa = [86, 114, 106, 106, 107, 111, 133, 221, 783, 2478];
        var asia = [282, 350, 411, 502, 635, 809, 947, 1402, 3700, 5267];
        var europe = [168, 170, 178, 190, 203, 276, 408, 547, 675, 734];
        var latinAmerica = [40, 20, 10, 16, 24, 38, 74, 167, 508, 784];
        var northAmerica = [6, 3, 2, 2, 7, 26, 82, 172, 312, 433];

        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: years,
                datasets: [{
                        data: africa,
                        label: "Africa",
                        borderColor: "#3e95cd",
                        fill: false
                    },
                    {
                        data: asia,
                        label: "Asia",
                        borderColor: "#8e5ea2",
                        fill: false
                    },
                    {
                        data: europe,
                        label: "Europe",
                        borderColor: "#3cba9f",
                        fill: false
                    },
                    {
                        data: latinAmerica,
                        label: "Latin America",
                        borderColor: "#e8c3b9",
                        fill: false
                    },
                    {
                        data: northAmerica,
                        label: "North America",
                        borderColor: "#c45850",
                        fill: false
                    }
                ]
            }
        });
    </script>

</div>

@endsection