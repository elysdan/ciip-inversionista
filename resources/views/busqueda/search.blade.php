
@extends('layouts.panel')
@section('content')
    

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      
   </head>
   
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Busqueda</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                        <!-- table section -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              
                              <div class="full inbox_inner_section" >
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="full padding_infor_info" >
                                          <div class="mail-box">
                                           
                                             <aside class="lg-side">

                                                <div class="inbox-head ">
                                                  
                                                   <form action="{{route('result')}}" class="pull-left position search_inbox w-100">
                                                      @csrf
                                                      <div class="input-append w-100" >

                                                         <input type="text" class="sr-input  " name="busqueda" placeholder="Busque por Cedula, Rif o Correo" style="width:90%;border-top-left-radius: 2rem;border-bottom-left-radius: 2rem;">

                                                         <button class="btn sr-btn" type="submit" style="border-top-right-radius: 2rem;border-bottom-right-radius: 2rem;"><i class="fa fa-search"></i></button>

                                                      </div>
                                                   </form>

                                                </div>
                                               
                                             </aside>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- table section -->
                     </div>
                  </div>
                  <!-- footer -->
                 
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
         <!-- model popup -->
      </div>
     
   </body>
</html>


          @endsection     