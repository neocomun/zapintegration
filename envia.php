<?php


                        
function CallAPI($method, $url, $data = false)

                          {

                          $curl = curl_init();


                        
 switch ($method)

                          {

                          case "POST":

                          curl_setopt($curl, CURLOPT_POST, 1);


                        
 if ($data)

                          curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

                          break;

                          case "PUT":

                          curl_setopt($curl, CURLOPT_PUT, 1);

                          break;

                          default:

                          if ($data)

                          $url = sprintf("%s?%s", $url, http_build_query($data));

                          }


                        
 

                          curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

                          curl_setopt($curl, CURLOPT_URL, $url);

                          curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);


                        
 $result = curl_exec($curl);


                        
 curl_close($curl);


                        
 return json_decode($result);

                          }


                        
$nome = "Valdeci";


                        
$id = "20";


                        
 $to = "5531985294349";


                        
$mensagem = "Olá $nome,%0Aenvio essa mensagem de teste para whatsapp.";


                        
 if($to != "")

                          {

                          $celular_remetente = $to;


                        
 $response = CallAPI("GET", str_replace(' ', '%20',"http://bot.zapatendimento.com.br/mensagem?id_usuario=$id&contato=$to&mensagem=$mensagem"));

                          //var_dump($response);


                        
?> 