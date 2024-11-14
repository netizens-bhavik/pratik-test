<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>

    <div class="jumbotron">
        <div class="container text-center">
            <h1>Dad Jokes</h1>      
            <p>Read and Rate Dad's Jokes</p>
        </div>
    </div>

    <div class="container" >    
        <div class="row">
            @foreach ($jokes as $joke)
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            {{ $joke->content }}
                        </div>
                        <div class="panel-footer">
                        <form method="POST" action="/add-review">
                            @csrf
                            <input type="hidden" name="joke_id" id='joke_id' value="{{ $joke->id }}">
                            <div class="form-group mb-2">
                            <select name="rate" id="rate">
                                <option value="1">1 Star</option>
                                <option value="2">2 Star</option>
                                <option value="3">3 Star</option>
                                <option value="4">4 Star</option>
                                <option value="5">5 Star</option>
                            </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <hr>
                            Ratings: {{ $joke->ratings_avg_rate }}
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
    </div>  

    </body>
</html>
