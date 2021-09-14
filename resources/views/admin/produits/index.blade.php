 @extends('layouts.app')
 {!! Form::hidden('', $inc = 1) !!}
 @section('content')

     <div class="container my-3">
         <div class="row">           
             <div class="col-12 card  my-5">
                 <div class="card-body">
                     <h4 class="card-title">Nos livres</h4>                      
                     @if (Session::has('status'))
                         <div class="alert alert-success">
                             {{ Session::get('status') }}
                         </div>
                     @endif
                     <div class="row">
                         <div class="col-12">
                             <div class="table-responsive">
                                 <table id="order-listing" class="table">
                                     <thead>
                                         <tr>
                                             <th>Order #</th>
                                             <th  width="200">Image</th>
                                             <th>Nom </th>
                                             <th>Prix</th> 
                                             <th>Status</th>
                                             <th>Actions</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($products as $product)
                                             <tr>
                                                 <td>{{ $inc }}</td>
                                                 <td>
                                                     <img class="img-thumbnail"
                                                         src="{{ asset('storage/product_images/' . $product->product_image) }}">
                                                 </td>

                                                 <td>{{ $product->product_name }}</td>
                                                
                                                 <td>{{ $product->product_price }}</td>

                                                 <td>
                                                     @if ($product->status)
                                                         <label class="badge badge-success">Activé</label>

                                                     @else
                                                         <label class="badge badge-danger">Désactivé</label>

                                                     @endif
                                                 </td>
                                                 <td>
                                                     <button class="btn btn-outline-primary d-inline btn-sm" onclick="window.location=
                                         '{{ url('/admin/editProduit/' . $product->id) }}'">Modifier</button>


                                                     @if ($product->status)
                                                         <button class="btn btn-outline-secondary d-inline btn-sm" onclick="window.location=
                                         '{{ url('/admin/disableProduit/' . $product->id) }}'">Désactiver</button>

                                                     @else
                                                         <button class="btn btn-outline-success d-inline btn-sm" onclick="window.location=
                                         '{{ url('/admin/enableProduit/' . $product->id) }}'">Activer</button>

                                                     @endif

                                                     {{-- <button class="btn btn-outline-danger">
                                                         <a class="text text-danger"
                                                             href="{{ url('/admin/deleteProduit/' . $product->id) }}"
                                                             id="delete">
                                                             Supprimer</a>
                                                     </button> --}}




                                                     <form action="{{url('/admin/deleteProduit/' . $product->id)}}" method="POST" class="d-inline" 
                                                        onsubmit="return confirm('Etes-vous sûr de vouloir supprimer le livre #{{ $product->product_name }} ?');">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" id="delete" class="btn btn-outline-danger btn-sm">
                                                             Supprimer
                                                        </button>
                                                    </form>

                                                 </td>
                                             </tr>
                                             {{ Form::hidden('', $inc = $inc + 1) }}
                                         @endforeach


                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </div>
 @endsection
