<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#111111">
    <title>Con gusto @if (!empty($data)) - {{$data->title}} @endif 
    </title>
    @if (!empty($data->description))
    <meta name="description" content="{{ $data->description }}"> 
    @endif
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="{{ asset('css/main/main.style.min.css') }}?01" rel="stylesheet">
    <noscript>
      <style>
        /**
        * Reinstate scrolling for non-JS clients
        */
        .simplebar-content-wrapper {
          scrollbar-width: auto;
          -ms-overflow-style: auto;
        }
    
        .simplebar-content-wrapper::-webkit-scrollbar,
        .simplebar-hide-scrollbar::-webkit-scrollbar {
          display: initial;
          width: initial;
          height: initial;
        }
      </style>
    </noscript>
  </head>
  