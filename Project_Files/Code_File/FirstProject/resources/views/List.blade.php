@extends('Master')
@section('content')

    <!-- row -->
    <div class="container-fluid">
        <div class="row">
        
                <div class="col-lg-12">
        
                @if(Session::has('status'))
                    <div class="alert alert-danger mb-0 text-center" role="alert">
                        {{ Session::get('status') }}
                    </div>
                @elseif(Session::has('Success_status'))
                    <div class="alert alert-success mb-0 text-center" role="alert">
                        {{ Session::get('Success_status') }}
                    </div>
                @endif
                
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Manage Data</h4>
                            <h4 class="card-title">

                                <button class="btn btn-primary mb-2"> <a href="{{ route('Add_Data') }}" class="text-decoration-none text-white">Add More</a> </button>
                                
                                <button class="btn btn-primary mb-2"> <a href="{{ route('Export-Csv') }}" class="text-decoration-none text-white">Export CSV</a> </button>

                                <button class="btn btn-primary mb-2" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Import CSV</button>
                                

                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Code</th>
                                            <th scope="col">Grouping</th>
                                            <th scope="col">Classification</th>
                                            <th scope="col">Specialization</th>                                            
                                            <th scope="col">Definition</th>
                                            <th scope="col">Effective Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if(!empty($CSVData) && $CSVData->isNotEmpty())
                                            @php $No = $No ?? 1; @endphp
                                            @foreach($CSVData as $data)
                                                <tr>
                                                    <td>{{ $No++ }}</td>
                                                    <td>{{ $data->Code }}</td>
                                                    <td>{{ \Illuminate\Support\Str::words($data->Grouping, 2, '...') }}</td>
                                                    <td>{{ $data->Classification }}</td>
                                                    <td>{{ $data->Specialization }}</td>
                                                    <td>{{ \Illuminate\Support\Str::words($data->Definition, 3, '...') }}</td>
                                                    <td>{{ $data->Effective_Date }}</td>                                            
                                                    <td>
                                                        <span>
                                                            <a href="{{ route('Edit_Data', $data->id) }}" class="mr-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="fa fa-pencil color-muted"></i> 
                                                            </a>

                                                            <a href="{{ route('Drop_Data', $data->id) }}" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <i class="fa fa-close color-danger"></i>
                                                            </a>
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @elseif(!empty($Result_CSVData))
                                            @php $No = $No ?? 1; @endphp
                                            <tr>
                                                <td>{{ $No++ }}</td>
                                                <td>{{ $Result_CSVData->Code }}</td>
                                                <td>{{ \Illuminate\Support\Str::words($Result_CSVData->Grouping, 2, '...') }}</td>
                                                <td>{{ $Result_CSVData->Classification }}</td>
                                                <td>{{ $Result_CSVData->Specialization }}</td>
                                                <td>{{ \Illuminate\Support\Str::words($Result_CSVData->Definition, 3, '...') }}</td>
                                                <td>{{ $Result_CSVData->Effective_Date }}</td>                                            
                                                <td>
                                                    <span>
                                                        <a href="{{ route('Edit_Data', $Result_CSVData->id) }}" class="mr-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fa fa-pencil color-muted"></i> 
                                                        </a>

                                                        <a href="{{ route('Drop_Data', $Result_CSVData->id) }}" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="fa fa-close color-danger"></i>
                                                        </a>
                                                    </span>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="8" class="text-center">No data available.</td>
                                            </tr>
                                        @endif


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>


@include('Modal')
@endsection