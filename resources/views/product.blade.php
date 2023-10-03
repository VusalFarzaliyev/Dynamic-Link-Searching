<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Product Details</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto mt-3">
                @if(isset($error))
                <p>Error: {{ $error }}</p>
                @else
                <h4>{{ $productInfo['name'] ?? 'N/A' }}</h4>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" style="max-height: 300px;object-fit:contain" src="{{ $productInfo['image'] ?? 'N/A' }}" alt="Product İmage">
                    <div class="card-body">
                    <h5 class="card-title">{{ $productInfo['price'] ?? 'N/A' }}</h5>
                    <p class="card-text">{!! Str::limit($productInfo['description'] ?? 'N/A',300) !!}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
