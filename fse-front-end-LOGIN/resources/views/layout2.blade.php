@extends('layout') 
@section('hd')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

<link rel="stylesheet" [type="text/css"] href="my.css" />

@yield('head')
@endsection

@section('bd')


<div class="sidebarA ">
    <p class="user"> 
        <span class="material-icons">  portrait  </span>
        {{ Auth::user()->name }}
    </p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <p><a class=" user" href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();"> 
            <span class="material-icons">  logout  </span>
          {{ __('Logout') }}
        
        </a>
        </p>
    </form>


    <input type="checkbox" id='check'>
    <label for="check" class='checkbtn'>
        
        <span  style="color: white">
            <i class="fa fa-bars" onclick="funzione()" style="font-size: 30px" ></i>
            
        </span>
    </label>

</div>




<div class="Msda" id="menu" style="display: block">

    <nav>
       
        <br>
        <ul id="lista" style="left: 0px">
            <li > <a class="active" id='c1' href='/statoConsensi'> 
                <span class="material-icons">  settings_accessibility  </span>
                Stato consensi </a> </li>
            <li > <a class="active" id='c1' href='/ricercaDocumenti'> 
                <span class="material-icons">  description  </span>
                Ricerca documenti </a> </li>
            <li> <a class="active" id='c1' href='/recuperoInformativa'> 
                <span class="material-icons">  info  </span>
                Recupero informativa </a> </li>
            <li > <a  class="active" id='c1' href='/recuperoModulistica'> 
                <span class="material-icons">  mode  </span> 
                Recupero modulilstica </a> </li>
        </ul>

    </nav>
    <br>
    <br>
    
    <img  class="img-1" src="{{ URL::to('/assets/img/medico-fascicolo.png') }}"  >


</div>



<div class="Msdb flex-container" >
    <br>
    
    <img class="img-2" src="{{ URL::to('/assets/img/taccuino.png') }}"  >

    <br>
    <br>
    <button class='flex-item'><a href='/dashboard'> Che cos'è il FSE </a></button>
    <button class='flex-item'><a href='/comeSiUsa'>Come si usa </a> </button>
    <button class='flex-item'> <a href='/vantaggi'>Vantaggi</a></button>
    
</div>



<script>

    

    const xf =  document.getElementsByClassName("grid-container")[0];
    function funzione(){
        
        if (window.matchMedia("(max-width: 858px)").matches) {
         
            if( document.getElementById("menu").style.display=="none"){ 
                xf.style.gridTemplateColumns="repeat(1, 1fr)"; 
                xf.style.gridTemplateAreas = '"hd"    "sdb" "sdm" "sda" "Msda" "main" "Msdb" "ft"'; 
                document.getElementById("menu").style.display="block";
            }
            else{
                document.getElementById("menu").style.display="none";
                xf.style.gridTemplateAreas = '"hd"   "sdb" "sdm" "sda" "main" "Msdb" "ft"';
            }
    
            
        } else {
              if( document.getElementById("menu").style.display=="none"){  
                xf.style.gridTemplateAreas = '"hd   hd  hd  hd  hd" "sda  sdm sdm sdm sdb" "Msda main main main Msdb" "ft ft ft ft ft"'; 
                document.getElementById("menu").style.display="block";
            }
            else{
                document.getElementById("menu").style.display="none";
                xf.style.gridTemplateAreas = '"hd   hd  hd  hd  hd" "sda  sdm sdm sdm sdb" "main main main main Msdb" "ft ft ft ft ft"';
            }
        }
    
       

    }



    
</script>
@yield('body')


@endsection
