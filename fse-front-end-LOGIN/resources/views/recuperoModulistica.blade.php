@extends('layout2')
@section('head')
    <style>
       
    </style>

@endsection
@section('body')
    

<div class=" main" style="text-align: center; font-size:15px; padding:15px;  font-family: 'Open Sans', sans-serif;">
    <h1 style="text-align: left; color:#641220; font-weight:bold" > Recupero Modulistica  </h1> 
    <br> 
    <hr style='height:2px;border-width:0;color: black;background-color:black'>
    <br>
        <?php
     

                    $d = array( "identificativoUtente"=> "PROVAX00X00X000Y",
                            "pinCode" => "LsQiYtf7FcpMYVKvf+51V6t1BSUk+E/dGOB2vmwNl0DhirZ8QzvTI2Ay04p6+t+eH+DjzkJpXrlEEZvKRz6wKVNOt7uYSQUYKBIFcbcEQJnqT7zTgtz7jV3BK+QaEphfKRsOP1Iejv+vKvJ/3te2xNMHPkNYZIAjxEQHftw9Swk=",
                            "identificativoOrganizzazione"=>"190",
                            "strutturaUtente"=> "",
                            "ruoloUtente"=> "APR",
                            "tipoAttivita"=> "READ",
                            "identificativoInformativa"=> "190^0001",
                            
                    );
                    $data = json_encode($d);
                  

                    $curlSES=curl_init(); 
                        
                        curl_setopt($curlSES,CURLOPT_URL,"http://localhost:8888/fse/recuperoModulistica");  //  http://localhost:8888/fse/recuperoModulistica   http://localhost:3000/fse/consenso/recuperoinformativaprova
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
                            echo "<p> errore di caricamento </p>";
                            echo $http_code;
                            curl_close($curlSES);
                            
                            

                        }
                        else{
                        
                                curl_close($curlSES);

                                $header_size = curl_getinfo($curlSES, CURLINFO_HEADER_SIZE);
                                $result = substr($result_response, $header_size);
                                $result = json_decode($result,true);

                                
                            
                                
                                
                                if($result["esito"] == 9999){
                                    echo "<p > errore di caricamento </p>";
                                }
                                elseif ($result["esito"] == 0000) {
                                    
                             
                                    $doc_encode = $result["modulistica"];
                                    
                                    
                                    $pdf_decoded = base64_decode ($doc_encode);

                                    
                                  
                                    $doc_pdf = fopen("./assets/document/modulistica.pdf", "w");
                                    fwrite($doc_pdf,$pdf_decoded);
                                    fclose($doc_pdf);
                                    
                                    header('Content-type: application/pdf');

                                    $doc = file_get_contents('./assets/document/modulistica.pdf');
                                    
                                echo "<iframe  align='center' src='/assets/document/modulistica.pdf' width='100%' height='1200px'></iframe>";
                                }
                            }


            }

        ?>
    </div>

@endsection
