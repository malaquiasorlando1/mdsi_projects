<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Receitas</title>
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/home.css">  

    </head>
    <body>
       <header>
       <span class='Logo'>Rece<strong>itas</strong> </span>
       <ul class='ulHeader'>
        <li class='active'>Inicio</li>
        <li>Minhas Receitas</li>
        <li>Notificações</li>
        <li>Detalhes</li>
       </ul>
        <div class="singInOut">
       
            {{ $userData->first_name}}
            <nav>
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class='logoutBtn'>Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endauth
            </nav>
        </div>
        </header>

<!-- ////////////////////////////////////terá componentes aqui;;;;;;;;;;;;;;;; -->

            <main>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form  class='form' action="" id="publicReceitas" name="publicReceitas">
                    <input type="text" id="openModal">
                    <button >Publicar</button>
                </form>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Publicação</h2>
                        <form method="POST" action="{{ route('receitas')}}">
                        @csrf
                            <input type="text" name="title" id="title" placeholder="Título">
                            <input type="text" name="ingredient" id="ingredient" placeholder="Igredientes">
                            <input type="text" name="preparationTime" id="preparationTime" placeholder="Tempo de Cozimento">
                            <textarea name="preparationMethod" id="preparationMethod" placeholder="Modo de preparação"></textarea>
                            <button type="submit">Publicar</button>
                        </form>
                    </div>
                </div>
            <div class="containerReceitas">
           

                
                @foreach (array_reverse($receitas->all()) as $receita)
                <div class="card">

           
                       <a href="{{ route('detalhes') }}">  <img  src="/imgs/pratodecomidafotomarcossantos003.jpg" alt=""> </a>
                        <h2>{{$receita->title}}  ola</h2>
                        <div class="user-rating">
                            <input type="radio" id="star1" name="rating" value="1">
                            <label onclick='avaliarReceita("1")' for="star1">1</label>
                            <input type="radio" id="star2" name="rating" value="2">
                            <label onclick='avaliarReceita("2")' for="star2">2</label>
                            <input type="radio" id="star3" name="rating" value="3">
                            <label onclick='avaliarReceita("3")' for="star3">3</label>
                            <input type="radio" id="star4" name="rating" value="4">
                            <label onclick='avaliarReceita("4")' for="star4">4</label>
                            <input type="radio" id="star5" name="rating" value="5">
                            <label onclick='avaliarReceita("5")' for="star5">5</label>
                        </div>
                        <div class="user-datas">
                        @foreach ($users as $user)
                            @if ($user->id == $receita->user_id)
                            <div class="imgUser">
                              {{$user -> first_name[0]}}{{$user -> last_name[0]}}
                            </div>
                            <div class="userName">
                            </div>
                                {{ $user->first_name }} {{ $user->last_name }}
                            @endif
                        @endforeach
                        </div>
                        </div>
                    @endforeach
               
                
            </div>  

            </main>
            <footer>
                Copyright 2024, All right reserved
            </footer>

    </body>
    
    <!-- <script>
        avaliarReceita= () =>{
            fetch('api')
        }
    </script> -->
    <script src="/js/index.js"></script>
    <script src="/js/home.js"></script>
</html>

