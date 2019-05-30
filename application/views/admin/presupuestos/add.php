<!-- TITULO DE LA PAGINA -->
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Solicitud de Presupuestos</h1>
          <p class="lead text-muted">Solicite su presupuesto vía online, el cual será evaluado por nuestro personal y envíado a su correo electrónico</p>
          <p>
            <!-- <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a> -->
          </p>
        </div>
      </section>
   <!-- FIN TITULO --> 
    
    <div class="container mt-5">
      <div class="row justify-content-center">
        <!-- FORMULARIO -->

        <div class="col-md-12 col-lg-7">
          <form class="form-group">
            <div class="form-row">
              <div class="col-4 mb-2">

                <label for="cedula">Nº de Cédula</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fa fa-address-card fa-lg" aria-hidden="true"></i>
                   </div>
                  </div>
                  <input type="text" class="form-control" id="cedula">
                </div>
                
              </div>

              <div class="col-8 mb-2">
                <label for="nombre">Nombre completo</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fa fa-user-circle fa-lg" aria-hidden="true"></i>
                   </div>
                  </div>
                  <input type="text" class="form-control" id="nombre">
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
                  <input type="text" class="form-control" id="telefono">
                </div>
              </div>

              <div class="col-6 mb-2">
                <label for="e-mail">Email</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="far fa-envelope fa-lg" aria-hidden="true"></i></div>
                  </div>
                  <input type="email" class="form-control" id="e-mail">
                </div>
              </div>
            </div>
              
            <div class="form-row">
              <div class="col-6 mb-2">
                <label for="edad">Edad</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fas fa-birthday-cake" aria-hidden="true"></i>
                   </div>
                  </div>
                  <input type="number" class="form-control" id="edad">
                </div>
              </div>

            
              <div class="col-6 mb-2">
                <label for="peso">Peso en Kg.</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fas fa-weight" aria-hidden="true"></i>
                   </div>
                  </div>
                  <input type="number" class="form-control" id="peso">
                </div>
              </div>  

            </div>

            <div class="form-row">
              <div class="col-12 mb-2">
                <label for="dia">Dirigido a <small>(Indique nombre de la empresa u organismo)</small></label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fas fa-industry" aria-hidden="true"></i>
                   </div>
                  </div>
                  <input type="text" class="form-control" id="peso" readonly>
                </div>
              </div>
      
             

              <div class="form-group col-12 mb-2">
                <label for="informe">Informe Médico <small>(Transcriba textualmente lo reflejado en el informe médico o suba una imagen del informe</small></label><br>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                   <div class="input-group-text"><i class="far fa-file-alt" aria-hidden="true"></i>
                   </div>
                  </div>
                  <textarea class="form-control" id="informe" rows="6"></textarea>
                </div>

              </div>  

               
              <div class="col-6 mb-2">
                <div class="form-group">
                  <label for="subir-informe">Adjuntar imagen del informe</label>
                  <input type="file" class="form-control-file" id="subir-informe">
                </div>
              </div>  

              <div class="col-6 mb-2 align-self-center">
                <div class="form-group text-center">
                   <button type="submit" class="btn btn-primary btn-lg">Enviar Solicitud</button>
                </div>
              </div>  

            </div>
               
          </form>  
        </div> 

      </div>      
   </div>     