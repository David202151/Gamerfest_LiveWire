<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}.nav-link {transition: all 0.2s;}.nav-link:hover {text-decoration: underline;}  
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #5C0A71;
            }
        </style>
    </head>
    
    <body class="antialiased" >
        <div>
        <nav class="navbar navbar-expand-lg bg-dark" >
        <div class="container-fluid">
            <img src="imagenes/gamerfest.png" width="100" heigth="60">
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul>
                <li class="nav-link">
                <a href="{{ route('login') }}"><h5 class="text-white">Log in</h5></a>
                </li>
            </ul>
            <ul>
                <li class="nav-link">
                <a href="{{ route('register') }}"><h5 class="text-white">Register</h5></a>
                </li>
            </ul>
            <ul>
                <li class="nav-link">
                <a href="#"><h5 class="text-white">Productos</h5></a>
                </li>
            </ul>
            <ul>
                <li class="nav-link">
                <a href="{{ url('views/eventos_ant.blade.php') }}"><h5 class="text-white">Eventos anteriores</h5></a>
                </li>
            </ul>
            <ul>
                <li class="nav-link">
                <a href="#"><h5 class="text-white">Normativa del evento</h5></a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
            

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div>
                    <center><img src="imagenes/gamerfest.png" width="160" heigth="110"></center>

                <div class="mt-8  dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md" style="background-color: #5C0A71;">


                            

                        <div class="container text-center" >
                            <div class="row">
                                <div class="col">

                                <center>
                        <div class="grid grid-cols-1 md" >
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                    <img src="imagenes/lol.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                    <img src="imagenes/mario.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                    <img src="imagenes/valorant.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                </div>
                                </div>
                                </center>

                                </div>
                                <div class="col order-5">

                                <center>
                        <div class="grid grid-cols-1 md" >
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" >
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                    <img src="imagenes/mario.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                    <img src="imagenes/valorant.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                    <img src="imagenes/lol.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                </div>
                                </div>
                                </center>
                                </div>
                                <div class="col order-1">
                                <center>
                        <div class="grid grid-cols-1 md" >
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" >
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                    <img src="imagenes/valorant.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                    <img src="imagenes/lol.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                    <img src="imagenes/mario.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                </div>
                                </div>
                                </center>
                                </div>

                            </div>
                        </div>  
                    </div>
                </div>    
            </div>        
        </div>
        <br>
        <br>
        
        <div class="container justify-content-center">

        <center>
        
        </center>
       
        </div>
    
        
        <br>
        
    </body>
    
    </div>

    <footer>
    <div class="bg-dark text-white">
    <br>
    
    <div class="container text-center">
  <div class="row">
      
    <div class="col">
    
   
    </div>
    <div class="col order-3">
    </div>
    <div class="col order-4">
   
    </div>
    <div class="col order-5">
    
    </div>
    <div class="col order-6">
    </div>
    <div class="col order-7">
    </div>
    <div class="col order-8">
    <a  href="https://instagram.com/gamerfest.ec?igshid=YmMyMTA2M2Y=" target="_blank"><img src="imagenes/instagram.png" alt="" width="45" height="45"></a>
    <p>instagram</p>
    </div>
    <div class="col order-9">
    <a  href="https://ne-np.facebook.com/gamerfest.ec/" target="_blank"><img src="imagenes/facebook.png" alt="" width="45" height="45"></a>
    <p>facebook</p>
    </div>
    <div class="col order-12">
    <a  href="https://ne-np.facebook.com/gamerfest.ec/" target="_blank"><img src="imagenes/google.png" alt="" width="45" height="45"></a>
    <p>google</p>
    </div>
  </div>
</div>


<br> 

<div class="row align-items-center">
    <div class="col">
     
    </div>
    
    
    <div class="col">
    <br>
        <figure class="text-center">
            <blockquote class="blockquote">
                <p> «La fuerza no procede de la capacidad física, sino de una voluntad indomable» </p>
            </blockquote>
            <figcaption class="blockquote-footer">
               <cite title="Título fuente">Mahatma Gandhi</cite>
            </figcaption>
        </figure>
    </div>
    <div class="col">
    
    </div>
</div>
  <br> 
  
  <div class="row justify-content-center">
            <div class="card col-sm-6 col-md-5 col-lg-6" style="width: 40rem;">
            
            <div class="card-body">
                <h5 class="card-title">Ubicación</h5>
                <img class="card-img-top" src="imagenes/Ubicacion-gamer-fest.png" alt="Card image cap">
                <br>
                <a href="https://www.google.com/maps/place/ESPE+-+Campus+Belisario+Quevedo/@-0.9988703,-78.5882864,17z/data=!3m1!4b1!4m5!3m4!1s0x91d4639e3fb9755f:0x22fe7f63301b5fee!8m2!3d-0.9988703!4d-78.5860977" class="btn btn-primary" target="_blank">+ info</a>
            </div>
            </div>
            <div class="card col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0" style="width: 18rem;">
            <br>
                <img class="card-img-top" src="imagenes/Jugger.jpg" alt="Card image cap">
            </div>
    </div>
    <div class="row mx-5 my-5">
    <div class="col" >
             
        <img src="imagenes/sobre.png" alt="" width="30" height="30">
              gameFest@info.com 
    </div>
    <div class="col mx-2" >
       <img src="imagenes/telefono.png" alt="" width="30" height="30"> 
      (578)768-344
    </div>
    <br><br>
    <div class="col " >
    <img src="imagenes/home.png" alt="" width="30" height="30">
       <a href="https://www.google.com/maps/place/ESPE+-+Campus+Belisario+Quevedo/@-0.9988703,-78.5882864,17z/data=!3m1!4b1!4m5!3m4!1s0x91d4639e3fb9755f:0x22fe7f63301b5fee!8m2!3d-0.9988703!4d-78.5860977" target="_blank">Ubicación Gamer Fest</a>
    </div>
  </div>
</div>


    </div>
</footer>
</html>

