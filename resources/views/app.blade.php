<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @section ('title')
            Blog
        @show
    </title>

    @section ('css')
        <link href="{! asset('output/styles.css') !}" rel="stylesheet">
        <!-- Fonts -->
        <!-- <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'> -->
        <!-- <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0&#45;beta.3/css/select2.min.css" rel="stylesheet" /> -->


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    @show
</head>
<body>
    @include ('partials.navbar')

    <div class="container">
        @include ('partials.flash')

        @yield ('content')
    </div>

    @section ('script')                                                                                                                                                                        
        <!-- Scripts -->
        <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
        <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/twitter&#45;bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
        <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0&#45;beta.3/js/select2.min.js"></script> -->

        <script src="{! asset('output/scripts.js') !}"></script>
    @show

    <footer>                                                                                                                                                                                  
        @section ('footer')                                                                                                                                                                    
            <p>Powered by <a href="http://laravel.com" target="_blank">Laravel</a>. Copyright &copy; Dilbadil Inc</p>                                                                   
        @show                                                                                                                                                                                 
    </footer>                                                                                                                                                                                 

    <script>
        $('div.alert').not('.alert-important').delay(3000).slideUp(3000);
    </script>
</body>
</html>
