<!DOCTYPE html>
<html>
<head>
    
    <link rel="icon" href="{{ url('assets/img/logosicilia.png') }}">
    <link rel="stylesheet" [type="text/css"] href="assets/css/my.css" >

   
    @yield('hd')
</head>

<body class="body">
    <div class="grid-container">


        <div class="header ">
            <div class="fse" > 
                
                <img class='Img' src="{{ URL::to('/assets/img/cartelle.jpg') }}" height="50px"  >

                <span > Fascicolo Sanitario Elettronico </span>
                
                <hr style="height:4px;border-width:0;color: #011627;background-color:#011627">
               
            </div>
           
            
        </div>

        <div class="sidebarB " >
            
            
            <div> 
               
                <p > <img src="{{ URL::to('/assets/img/logo_blu.png') }}"  height="100px" style=" margin-top: 5ch" onclick="window.location.href = 'http://127.0.0.1:8000/'" >
            </div>

            
        </div>

        <div class="sidebarM " >
           
        </div>
       
        <div class="sidebarA ">
            @yield('menu')
        </div>

        @yield('bd')   
    </div>

    <div class="footer copy" style="line-height: 30px">
        <br>
        <br>
        <br>
    
        <p>  
            <img  src="{{ URL::to('/assets/img/repubblicacolorata.jpg') }}" height="50px"  > 
            &nbsp;
            &nbsp;
            <img  src="{{ URL::to('/assets/img/regione_siciliana.png') }}" height="50px"  >
        </p>
       
        <p style="  font-family: 'Open Sans', sans-serif;"> Contatti: fse.assistenza@regione.sicilia.it </p>
        
        <p style="  font-family: 'Open Sans', sans-serif;"> © 2021 Regione Siciliana </p>
        <br>
    </div>
    
                
    <script>

            const gr =  document.getElementsByClassName("grid-container")[0];
            function myFunction(x) {
                if (x.matches) { 
                    gr.style.gridTemplateColumns="repeat(1,1fr)";
                    if(document.getElementById("menu").style.display=="block"){
                        gr.style.gridTemplateAreas = '"hd"  "sdb" "sdm"  "sda" "Msda" "main" "Msdb" "ft"'; 
                    }else{
                        gr.style.gridTemplateAreas = '"hd"   "sdb" "sdm" "sda" "main" "Msdb" "ft"';
                    }
                } else {
                    gr.style.gridTemplateColumns="repeat(5,1fr)";
                    if (document.getElementById("menu").style.display=="block"){
                        gr.style.gridTemplateAreas =  '"hd   hd  hd  hd  hd" "sda  sdm sdm sdm sdb" "Msda main main main Msdb" "ft ft ft ft ft"';  
                    }else{
                        gr.style.gridTemplateAreas =  '"hd   hd  hd  hd  hd" "sda  sdm sdm sdm sdb" "main main main main Msdb" "ft ft ft ft ft"';  
                    }
                }
            }



            var x = window.matchMedia("(max-width: 865px)");
            myFunction(x);
            x.addListener(myFunction);

            
</script>
    

</body>
</html>