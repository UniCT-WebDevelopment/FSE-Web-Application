@extends('layout')

@section('hd')

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" [type="text/css"] href="assets/css/my.css" />

    
@endsection

@section('bd')
    
    <h1 id="1" class="main benvenuti" onclick="none()"> </h1>

    <h3 id="2" class=" main log" onclick="none()"> </h3>

    <div class="main formInput" style="visibility:hidden; box-sizing: content-box;" id="fra" >
        
        <form method="POST" action="{{ route('login') }}" >
            @csrf
            <div>
                <label for="email" :value="__('Email')" > Email </label><br>

                <input id="email" class="input" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <br>
            
            <div >
                <label for="password" :value="__('Password')" > Password </label>

                <input id="password" class="input" type="password"  name="password" required autocomplete="current-password" />
            </div>

            <br>
            <br>
            
            <button class="button" type="submit">        {{ __('Log in') }}   </button>
           
         
            
    
        </form>
    </div>

    <script>
        function none(){
            document.body.getElementsByTagName('h1')[0].style.visibility= "hidden";
            document.body.getElementsByTagName('h3')[0].style.visibility= "hidden";
            document.body.getElementsByClassName('formInput')[0].style.visibility="visible";
        }
        
        window.onload = function(){
            document.body.getElementsByTagName('h1')[0].innerHTML="BENVENUTI!";
            document.body.getElementsByTagName('h3')[0].innerHTML="CLICK FOR LOGIN  <span class='material-icons icon'> login</span>";
        }
        
</script>   



@endsection


