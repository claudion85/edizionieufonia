            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Main</li>
                            <li>
                                <a href="/" class="waves-effect">
                                    <i class="mdi mdi-view-dashboard"></i><span class="badge badge-primary badge-pill float-right">2</span> <span> Dashboard </span>
                                </a>
                            </li>
                            


                            <li class="menu-title">Components</li>

                            <li>
                               <!-- <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-buffer"></i> <span> Prodotti <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </a>-->
                                <li>
                                @php 
                                $id_casa=App\Models\Casa_Editrice::where('user_id','=',Auth::user()->id)->get();
                               
                                @endphp




                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-buffer"></i> <span> Prodotti <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </a>
                            <ul class="submenu">
                            

                            <li>
                                <a href="/spartiti_libri" class="waves-effect">
                                    <i class="mdi mdi-grease-pencil"></i><span> Spartiti/Libri </span>
                                </a>
                            </li>
                            <li>
                                <a href="/prodotti_accessoris" class="waves-effect">
                                    <i class="mdi mdi-grease-pencil"></i><span> Prodotti Accessori </span>
                                </a>
                            </li>
                            <li>
                                <a href="/attributi_prodottis" class="waves-effect">
                                    <i class="mdi mdi-grease-pencil"></i><span> Attributi Prodotti </span>
                                </a>
                            </li>

                            </ul>
                               

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-outline"></i><span> Ordini <span class="badge badge-pill badge-success float-right">6</span> </span></a>
                              
                            </li>
                            <li>
                                @php 
                                $id_casa=App\Models\Casa_Editrice::where('user_id','=',Auth::user()->id)->get();
                               
                                @endphp
                                <a href="/{{$id_casa[0]->id}}/manage-profile" class="waves-effect"><i class="mdi mdi-account"></i> <span> Gestisci Profilo <span class="float-right menu-arrow"></span> </span> </a>
                                
                            </li>
                         

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->