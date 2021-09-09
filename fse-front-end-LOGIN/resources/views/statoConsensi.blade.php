@extends('layout2')
@section('head')
    <style>
      


        .title{
            color: black; 
        }
        
        .cons{
            background-color: white;
            padding: 1%;   
            border-block-end-style: ridge;
            border-radius: 1px 1px 1px 1px;
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .text{
            text-align: justify;
        }

    </style>

@endsection
@section('body')


<div class=" main" style="padding:15px;">
    <h1 style="text-align: left; color:#641220; font-weight:bold" > Stato Consensi  </h1> 
    <br> 
    <hr style='height:2px;border-width:0;color: black;background-color:black'>
    <br>
        <?php
          
            $curlSES=curl_init(); 
                
                curl_setopt($curlSES,CURLOPT_URL,"http://localhost:8888/fse/statoConsensi"); 
                curl_setopt($curlSES,CURLOPT_POST, true);
                curl_setopt($curlSES,CURLOPT_RETURNTRANSFER,true);
                curl_setopt($curlSES,CURLOPT_HEADER, false); 
                
                $result=curl_exec($curlSES);
                
            if(strpos($result, 'MockServices') != false) {
                echo "error from server";
                curl_close($curlSES);
                        
            }else{
            
                $http_code = curl_getinfo( $curlSES, CURLINFO_HTTP_CODE );
	            if (( $http_code != "200" )) {
                    echo "<p> errore di caricamento </p>";
                    echo $http_code;
                    curl_close($curlSES);
                    
                    

                }
                else{
                    curl_close($curlSES);
                
                
                    $result = json_decode($result,true);
                
                    

                    if($result["esito"] == 9999){
                        echo "<p class = 'color'> errore di caricamento </p>";
                    }
                    elseif ($result["esito"] == 0000) {
                        
                        echo "<h2 class ='title'> I consensi attivi sono: </h2>";
                            if( $result["listaConsensi"]["consenso"][0]["valoreConsenso"] == "true"){
                                $v = "• Consenso alla alimentazione ";
                            }

                            if( $result["listaConsensi"]["consenso"][1]["valoreConsenso"] == "true"){
                                $vv = "• Consenso alla consutazione ";
                            }

                            if( $result["listaConsensi"]["consenso"][2]["valoreConsenso"] == "true"){
                                $vvv = "• Consenso al pregresso ";
                            }
                        
                         
                ?>
                            
                            
                            <br>
                            <button class="cons " onclick="myFunctionn('1')">{{$v}}</button>
                            <p class='text' id = "1"> </p> 
                            <br>
                            <button class="cons" onclick="myFunctionn('2')">{{$vv}}</button>
                            <p class='text' id = "2"> </p> 
                            <br>
                            <button class="cons" onclick="myFunctionn('3')">{{$vvv}}</button>
                            <p class='text' id = "3"> </p>
                            <br>
                            

                            
                            <script>
                                function myFunctionn(stati) {
                                    if(stati== "1"){
                                        document.getElementById(stati).innerHTML = " <br> Il FSE può essere alimentato solo con consenso esplicito, libero e informato reso dall’assistito o di chi lo rappresenta a seguito della visione della relativa informativa, ai sensi dell’art. 8, comma 1 del DPCM attuativo. Il consenso all’alimentazione del FSE, anche se manifestato unitamente a quello previsto per il trattamento dei dati a fini di cura  all’interno dell’Azienda Sanitaria, deve essere autonomo e specifico.";
                                    }
                                    else if(stati == "2"){
                                        document.getElementById(stati).innerHTML = " <br> La consultazione dei dati e dei documenti presenti nel FSE, da parte dei MMG/PLS o degli operatori e professionisti sanitari e socio-sanitari che abbiano necessità di trattare i dati per finalità di cura ai sensi dell’art. 14 del DPCM attuativo, può avvenire solo previo consenso libero ed informato espresso dell’assistito, reso a seguito della visione della relativa informativa, come indicato all’art. 8, comma 2 del DPCM attuativo.";
                                    }
                                    else if(stati == "3"){
                                        document.getElementById(stati).innerHTML = " <br> È possibile decidere una tantum se far inserire nel Fascicolo Sanitario Elettronico anche i documenti sanitari elettronici eventualmente indicizzati prima dell’istituzione del Fascicolo (PREGRESSO): se il sistema ha indicizzato dei documenti, il cittadino può decidere se renderli consultabili o oscurarli definitivamente. Una volta espresso, si potrà sempre attivare la procedura di oscuramento prevista dal successivo punto 11, per non rendere più visibili uno opiù documenti.";
                                    }
                                }

                            </script>
        <?php
                    
                   }
                }
                
                
            
            }
        ?>
        
        
       

        

    </div>
    

    
        
@endsection