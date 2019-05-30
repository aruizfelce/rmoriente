<!-- TITULO DE LA PAGINA -->
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Solicitud de Cita</h1>
          <p class="lead text-muted">Solicite su cita vía online, llenando los datos solicitados, seleccionando el día y el turno que estén disponibles, luego será contactado por nuestro personal para concretar la cita</p>
          <p>
            <!-- <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a> -->
          </p>
        </div>
      </section>
   <!-- FIN TITULO --> 
    <!-- TABLA DIAS DISPONIBLES -->
    <div class="container mt-5">
      <div class="row">
       <div class="col-md-12 col-lg-5">
          <div class="row">

               <table class="table table-bordered">
                <thead class="thead-dark text-center">
                  <tr>
                    <th scope="col" width="50%">Día</th>
                    <th scope="col">Mañana</th>
                    <th scope="col">Tarde</th>
                  </tr>
                </thead>
                
                <tr class="table-active ">
                  <td class="table-active">Lunes 12/03/2018</td>
                  <td class="table-primary bg-success" width="25%">
                    
                      <input type="button" name="" class="selcelda btn-block" onclick="darcita('12/03/2018','Mañana')" value="Seleccionar">
                    
                  </td>
                  <td class="table-primary bg-info" width="25%"></td>
                </tr>

                <tr class="table-active">
                  <td class="table-active">Martes 13/03/2018</td>
                  <td class="table-primary bg-success"></td>
                  <td class="table-primary bg-info"></td>
                </tr>

                <tr class="table-active">
                  <td class="table-active">Miércoles 14/03/2018</td>
                  <td class="table-primary bg-info"></td>
                  <td class="table-primary bg-success"></td>
                </tr>

                <tr class="table-active">
                  <td class="table-active">Jueves 15/03/2018</td>
                  <td class="table-primary bg-success"></td>
                  <td class="table-primary bg-info"></td>
                </tr>

                <tr class="table-active">
                  <td class="table-active">Viernes 16/03/2018</td>
                  <td class="table-primary bg-success"></td>
                  <td class="table-primary bg-info"></td>
                </tr>
               </table>  
           </div>

           <div class="row">
               <table class="table table-bordered">
               
                  <tr class="table-active ">
                      <td class="table-active">Seleccione el día y turno</td>
                      <td class="table-primary bg-success text-white font-weight-bold text-center" width="25%">Disponible</td>
                      <td class="table-primary bg-info text-white font-weight-bold text-center" width="25%">Sin Cupo</td>
                    </tr>
               </table>     
           </div>    
          
        </div> 
<!-- FIN TABLA -->        

<!-- FORMULARIO -->
 
      <script>
        contenido_textarea = "";
        num_caracteres_permitidos = 20;
        nuevo=0;
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            
            $('#cedula').on('blur',function(){
             
            var user_id = $('#cedula').val();
            $.ajax({
                
                type:'GET',
                url:'getData.php',
                dataType: "json",
                data:{user_id:user_id},
                success:function(data){
                    if(data.status == 'ok'){
                        
                        $('#nombre').val(data.result.nombre);
                        $('#telefono').val(data.result.telefono);
                        $('#email').val(data.result.email);
                        $('#edad').val(data.result.edad);
                        $('#peso').val(data.result.peso);
                    }else{
                        nuevo=1;
                        /*$('#nombre').val("");
                        $('#telefono').val("");
                        $('#email').val("");
                        $('#edad').val("");
                        $('#peso').val("");*/
                    } 
                    
                }
            });
        });
           
           
           
        });
      
        
        function comenzar(){
            var formulario = document.getElementById("formcita");
             
            formulario.addEventListener("input",validartr,false);
            formulario.addEventListener("focusin",focoin,false);
            formulario.addEventListener("focusout",focoout,false);
            
            document.getElementById("enviar").addEventListener("click",enviar,false);
            
            
        }
          
        function validartr(e){
            var elemento = e.target;
            e.preventDefault();  
            var elemento = e.target;
            if(elemento.validity.valid){
                elemento.style.borderColor="green";
                elemento.style.boxShadow = "0 0 3px green";  
             }else{ 
                elemento.style.boxShadow = "0 0 3px red";    
                elemento.style.borderColor="#ff3716";
            }
        }  
          
          function focoin(e){
            var elemento = e.target;
            if(elemento.value!=""){
                e.preventDefault();
                var elemento = e.target;
                    if(elemento.validity.valid){

                      elemento.style.borderColor="#80bdff";
                      elemento.style.boxShadow = "0 0 0 0.2rem rgba(0, 123, 255, 0.25)";  

                    }
                    else{
                      elemento.style.boxShadow = "0 0 3px red";    
                      elemento.style.borderColor="#ff3716";
                    }
            }
          }
            
            
           function focoout(e){
            
            var elemento = e.target;
            if(elemento.value!=""){
               e.preventDefault();
                var elemento = e.target;
                    if(elemento.validity.valid){
                      elemento.style.borderColor="green";
                      elemento.style.boxShadow = "0 0 3px green";      

                    }
                    else{
                        elemento.style.boxShadow = "0 0 3px red";    
                        elemento.style.borderColor="#ff3716";
                    }
            }
           }

           function enviar(e){
              var formu = document.getElementById("formcita");
              var correcto = formu.checkValidity(); //devuelve si la validación es true o false
              var mensaje = document.getElementById("alerta");
              var archivo = document.getElementById("archivo").value;  
              var diacita = document.getElementById("diacita");   
              
              if(correcto && comprueba_extension(formu, archivo)==1 && diacita.value!=null && validarImagen()){
                    document.miformulario.submit(); 
                
              }else{
                
                  e.preventDefault();
                  formu.classList.add('was-validated');
                  if(!correcto){
                      mensaje.innerHTML = "<div id='success-alert' class= 'alert alert-danger'>Rellene todos los datos</div>";
                      $("#success-alert").fadeTo(2000, 500).fadeOut(500, function(){ $("#success-alert").alert('close'); });
                      return 1;
                  }      
                  
                  if (diacita.value==null || diacita.value==""){
                      mensaje.innerHTML = "<div id='success-alert' class= 'alert alert-danger'>Seleccione el día de la cita</div>";  
                      $("#success-alert").fadeTo(2000, 500).fadeOut(500, function(){ $("#success-alert").alert('close'); });     
                     return 1;
                  }
                  
                  if (comprueba_extension(formu, archivo)==0){
                     mensaje.innerHTML = "<div id='success-alert' class= 'alert alert-danger'>Seleccione un archivo tipo imagen o transcriba el informe</div>";  
                     $("#success-alert").fadeTo(2000, 500).fadeOut(500, function(){ $("#success-alert").alert('close'); });       
                     return 1;
                  }
                  
                  if(validarImagen()==false){
                      mensaje.innerHTML = "<div id='success-alert' class= 'alert alert-danger'>El tamaño del archivo no debe sobrepasar 1mb de tamaño</div>";  
                      $("#success-alert").fadeTo(2000, 500).fadeOut(500, function(){ $("#success-alert").alert('close'); });     
                      return 1;
                  }
              }
             }  
         
          function comprueba_extension(formulario, archivo) {
             extensiones_permitidas = new Array(".gif", ".jpg", ".png", ".bmp");
             mierror = "";
             var informe = document.getElementById("informe");   
             longInforme= document.forms[0].informe.value.length;  
             
             if(longInforme<20 && !archivo){
                /*mierror = "Seleccione el archivo o transcriba el informe";
                alert (mierror); */
               
                return 0;
             }
              
             if(longInforme>=20 && !archivo){
                 return 1
             }
            
             if(archivo){  
                  //recupero la extensión de este nombre de archivo
                  extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
                  
                  //compruebo si la extensión está entre las permitidas
                  permitida = false;
                  for (var i = 0; i < extensiones_permitidas.length; i++) {
                     if (extensiones_permitidas[i] == extension) {
                         permitida = true;
                         break;
                     }
                  }
                  if (!permitida) {
                     /*mierror = "Comprueba la extensión de los archivos a subir. \nSólo se pueden subir archivos con extensiones: " + extensiones_permitidas.join();
                     alert (mierror); */  
                     return 0;  
                   }else{
                     return 1;
                   }
            }
            
        } 
       
          function validarImagen() {
                var fileSize = $('#archivo')[0].files[0].size;
                var siezekiloByte = parseInt(fileSize / 1024);
                
                if (siezekiloByte >  1000) {
                    /*alert("Imagen muy grande");*/
                    return false;
                }else
                    return true;
                
            }

          
            function valida_longitud(){
                
               num_caracteres = document.forms[0].informe.value.length;
               var elemento = document.getElementById("informe");
                
               if (num_caracteres < num_caracteres_permitidos){
                  
                  elemento.style.boxShadow = "0 0 3px red";    
                  elemento.style.borderColor="#ff3716";   
               }else{
                  //contenido_textarea = document.forms[0].informe.value;
                  elemento.style.borderColor="green";
                  elemento.style.boxShadow = "0 0 3px green";        
               }
               cuenta();
            }
          
            function cuenta(){
               document.forms[0].caracteres.value=document.forms[0].informe.value.length;
            }
          
             window.addEventListener("load",comenzar,false);
     </script> 
         
        <div class="pl-5 container col-6">
                      
          <form  action="<?php echo base_url();?>solicitar/citas/store" class="form-group" method="post" id="formcita" autocomplete="off" enctype="multipart/form-data">
            
            <div class="form-row">
              <div class="col-4 mb-2">

                <label for="cedula">Nº de Cédula</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fa fa-address-card fa-lg" aria-hidden="true"></i>
                   </div>
                  </div>
                      
                  <input 
                         data-toggle="tooltip" title="Entre 6 y 9 números. En caso de ser un menor sin cédula colocar el número del representante más un número adicional al final" data-placement="top"
                         type="text" class="form-control" id="cedula" name="cedula"  required pattern="[0-9].{5,9}">
                         
                </div>
                
              </div>
                
              <div class="col-8 mb-2">
                <label for="nombre">Nombre completo</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fa fa-user-circle fa-lg" aria-hidden="true"></i>
                   </div>
                  </div>
                  <input data-toggle="tooltip" title="Introduzca su nombre, solo letras" 
                         type="text" class="form-control" id="nombre" name="nombre" required pattern="[A-Z a-z].{5,}">
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-6 mb-2">
                <label for="telefono">Teléfono</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fa fa-phone fa-lg" aria-hidden="true"></i>
                   </div>
                  </div>
                  <input data-toggle="tooltip" title="Introduzca su teléfono, solo números" 
                         type="text" class="form-control" id="telefono" name="telefono" required pattern="^(0414|0424|0416|0426|0412)[0-9].{6,6}">
                </div>
              </div>

              <div class="col-6 mb-2">
                <label for="email">Email</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="far fa-envelope fa-lg" aria-hidden="true"></i></div>
                  </div>
                  <input data-toggle="tooltip" title="Introduzca su correo de manera válida" 
                         type="email" class="form-control" id="email" name="email" required>
                </div>
              </div>
            </div>
              
            <div class="form-row">
              <div class="col-6 mb-2">
                <label for="edad">Edad</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                   <div class="input-group-text"><i class="far fa-calendar-alt" aria-hidden="true"></i>
                   </div>
                  </div>
                  <input data-toggle="tooltip" title="Introduzca su edad" 
                         type="number" class="form-control" id="edad" name="edad" required min="0" max="120">
                </div>
              </div>

            
              <div class="col-6 mb-2">
                <label for="peso">Peso en Kg.</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fas fa-weight" aria-hidden="true"></i>
                   </div>
                  </div>
                  <input data-toggle="tooltip" title="El peso máximo de nuestro equipo es 90kg."
                         type="number" class="form-control" id="peso" name="peso" required max="90" min="1">
                </div>
              </div>  

            </div>

            <div class="form-row">
              <div class="col-6 mb-2">
                <label for="diacita">Día cita <small>(Seleccione en la tabla)</small></label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                   <div class="input-group-text"><i class="far fa-calendar-alt" aria-hidden="true"></i>
                   </div>
                  </div>
                  <input type="text" class="form-control" id="diacita" name="diacita" readonly required>
                </div>
              </div>
      
              <div class="col-6 mb-2">
                <label for="turno">Turno</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                   <div class="input-group-text"><i class="far fa-calendar-alt" aria-hidden="true"></i>
                   </div>
                  </div>
                  <input data-toggle="tooltip" title="Seleccione el día de la cita"
                         type="text" class="form-control" id="turno" name="turno"  required readonly>
                </div>
              </div>    

              <div class="form-group col-12 mb-2">
                <label for="informe">Informe Médico <small>(Transcriba textualmente lo reflejado en el informe médico o suba una imagen del informe</small></label><br>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                   <div class="input-group-text"><i class="far fa-file-alt" aria-hidden="true"></i>
                   </div>
                  </div>
                    <textarea class="form-control" id="informe" name="informe" rows="6"  onKeyUp="valida_longitud()" pattern=".{0}|.{20,100}"> </textarea>
                </div>

              </div>  

               
              <div class="col-6 mb-2">
                  <!--<div class="custom-file">
                      <input type="file" class="custom-file-input" id="archivo" name="archivo" lang="es" size="2">
                      <label class="custom-file-label" for="archivo">Seleccione el archivo</label>
                </div>-->
                  
                      
                <div class="form-group">
                  <label for="subir-informe">Adjuntar imagen del informe</label>
                  <input type="file" class="form-control-file" id="archivo" name="archivo">
                </div>
              </div>  
                
              <div class="col-6 mb-2 align-self-center">
                <div class="form-group text-center">
                   <input type="submit" class="btn btn-primary btn-lg" value="Enviar" id="enviar" >
                    <div id="alerta">
              
                    </div>    
                </div>
              </div>  
                
               
              
              
            </div>
               
          </form>  
        </div> 

      </div>      
   </div>         
    


