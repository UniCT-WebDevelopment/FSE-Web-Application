@extends('layout2')
@section('body')
   
   
    <div class=" main" style="text-align: center; font-size:15px ; padding:15px;   font-family: 'Open Sans', sans-serif;">
        <h1 style="text-align: left; color:#641220; font-weight:bold" > Ricerca Documenti  </h1> 
        <br> 
        <hr style='height:2px;border-width:0;color: black;background-color:black'>
        <br>
   
        <?php
               
                

                    $d = array( "identificativoUtente"=> "PROVAX00X00X000Y",
                            "pinCode" => "LsQiYtf7FcpMYVKvf+51V6t1BSUk+E/dGOB2vmwNl0DhirZ8QzvTI2Ay04p6+t+eH+DjzkJpXrlEEZvKRz6wKVNOt7uYSQUYKBIFcbcEQJnqT7zTgtz7jV3BK+QaEphfKRsOP1Iejv+vKvJ/3te2xNMHPkNYZIAjxEQHftw9Swk=",
                            "identificativoOrganizzazione"=>"190",
                            "strutturaUtente"=> "206123456",
                            "ruoloUtente"=> "DRS",
                            "contestoOperativo"=> "TREATMENT",
                            "identificativoAssistito"=> "TSTTTN71A01H501B",
                            "presaInCarico"=> "true",
                    );
                    $data = json_encode($d);
                    
                    
                    $curlSES=curl_init(); 
                        
                        curl_setopt($curlSES,CURLOPT_URL,"http://localhost:8888/fse/ricercaDocumenti"); 
                        curl_setopt($curlSES, CURLOPT_POST, true);
                        curl_setopt($curlSES, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($curlSES,CURLOPT_RETURNTRANSFER,true);
                        curl_setopt($curlSES,CURLOPT_HEADER, true); 
                        curl_setopt($curlSES, CURLOPT_HTTPHEADER,array(
                                        'Content-Type:application/json',
                                    )
                        );
                        $result_response=curl_exec($curlSES);
              
                        
            if(strpos($result_response, 'MockServices') != false) {
                echo "error from server";
                curl_close($curlSES);
                        
            }else{
                        $http_code = curl_getinfo( $curlSES, CURLINFO_HTTP_CODE );
                        if (( $http_code != "200" )) {
                            echo "<p>  errore di caricamento </p>";
                            echo $http_code;
                            curl_close($curlSES);
                            
                            
                        }
                        else{
                        
                                curl_close($curlSES);
                                $header_size = curl_getinfo($curlSES, CURLINFO_HEADER_SIZE);
                                $result = substr($result_response, $header_size);

                                
                                $result = json_decode($result,true);
                                
                              
                                if($result["esito"] == 9999){
                                    echo "<p class = 'color'>  errore di caricamento </p>";
                                }
                                elseif ($result["esito"] == 0000) {
                                    $i = 0;
                                        //FOR PER I DOCUMENTI ALL'INTERNO DEL TAG METADATO
                                        foreach ($result['metadato'] as $v) {
                                            echo "<br> Documento numero " . ($i+1). "<br>";

                                            //CREAZIONE RICHIESTA RECUPERO DOCUMENTO CON CAMPI PRESI DALLA RICERCA DOCUMENTI
                                            $richiesta = array("identificativoUtente"=> "PROVAX00X00X000Y",
                                                "pinCode" => "LsQiYtf7FcpMYVKvf+51V6t1BSUk+E/dGOB2vmwNl0DhirZ8QzvTI2Ay04p6+t+eH+DjzkJpXrlEEZvKRz6wKVNOt7uYSQUYKBIFcbcEQJnqT7zTgtz7jV3BK+QaEphfKRsOP1Iejv+vKvJ/3te2xNMHPkNYZIAjxEQHftw9Swk=",
                                                "identificativoOrganizzazione"=>"190",
                                                "strutturaUtente"=> "206123456",
                                                "ruoloUtente"=> "DRS",
                                                "contestoOperativo"=> "TREATMENT",
                                                "identificativoAssistito"=> "TSTTTN71A01H501B",
                                                "presaInCarico"=> "true",
                                                "identificativoOrgDoc"=>$v['identificativoOrgDoc'],
                                                "identificativoRepository"=>$v['identificativoRepository'],
                                                "identificativoDocumento"=> $v['identificativoDocumento'],
                                            );



                                            $dataF = json_encode($richiesta);
                                            
                                            $curlSESF=curl_init();
                                            
                                            $url = "http://localhost:8888/fse/recuperoDocumento$i";
                                          
                                                
                                            curl_setopt($curlSESF,CURLOPT_URL,$url); 
                                            curl_setopt($curlSESF, CURLOPT_POST, true);
                                            curl_setopt($curlSESF, CURLOPT_POSTFIELDS, $dataF);
                                            curl_setopt($curlSESF,CURLOPT_RETURNTRANSFER,true);
                                            curl_setopt($curlSESF,CURLOPT_HEADER, true); 
                                            curl_setopt($curlSESF, CURLOPT_HTTPHEADER,array(
                                                            'Content-Type:application/json',
                                                    )
                                            );
                                            $result_responseF=curl_exec($curlSESF);

                                           
                                            $i++;       
                                            
                                            $http_codeF = curl_getinfo( $curlSESF, CURLINFO_HTTP_CODE );

                                            

                                            if (( $http_codeF != "200" )) {
                                                echo "<p> errore di caricamento </p>";
                                                echo $http_codeF;
                                                curl_close($curlSESF);
                                                
                                                
                                            }
                                            else{
                                            
                                                    curl_close($curlSESF);
                                                    $header_sizeF = curl_getinfo($curlSESF, CURLINFO_HEADER_SIZE);
                                                    $resultF = substr($result_responseF, $header_sizeF);
                                                   
                                                    $resultF = json_decode($resultF,true);
                                                    
                                                    
                                                
                                                    if($resultF["esito"] == 9999){
                                                        echo "<p class = 'color'>  errore di caricamento </p>";
                                                    }
                                                    elseif ($resultF["esito"] == 0000) {

                                                         //IDENTIFICATIVO DOCUMENTO
                                                        $doc_encodeF = $resultF["documento"];
                                                        
                                                        //DECODIFICA BASE64
                                                        $xml_decodedF = base64_decode ($doc_encodeF); //parsing
                                                        
                                                        //SOTTOSTRINGA
                                                        $num = strpos($xml_decodedF, "JVB");

                                                        $parse = substr($xml_decodedF,0, $num);

                                                        echo $parse;
                                                        
                                                        //Convert HL7 string data into XML object
                                                        $doc_xmlF = simplexml_load_string($xml_decodedF);


                                                        //Convert XML object into JSON object
                                                        $jsonObjectF = json_encode($doc_xmlF);

                                                        //Convert JSON object into an associative array
                                                        $assArrayF = json_decode($jsonObjectF, true);

                                                         
                                                        
                                                        $v;
                                                        foreach ($assArrayF['component']['structuredBody']['component'] as $fF) {
                                      
                                                            if( isset($fF['section']['entry']['observationMedia']['value'])){
                                                                $v = $fF['section']['entry']['observationMedia']['value'];
                                                                echo"<br> <br> <br>";
                                                            }
                                                        } 
                                                        
                                                            $file = base64_decode($v);
                                            
                                                            $x = "./assets/document/document".$i.".pdf";
                                                            $doc_pdf = fopen($x, "w");
                                                            fwrite($doc_pdf,$file);
                                                            fclose($doc_pdf);
                                                            
                                                            header('Content-type: application/pdf');
                                                            $doc = file_get_contents($x);
                                                            echo "<iframe  align='center' src='$x' width='100%' height='900px'></iframe>";
                                                            echo "<br> <br>";

                                                    }
                                            }
                                        }
                                        
                               }
                        }
                    }
      
        ?>

   
    </div>

    
        
@endsection

