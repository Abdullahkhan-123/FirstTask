@extends('Master')
@section('content')

    <!-- row -->
    <div class="container-fluid">
        <div class="row">

            <div class="col">
                <form method="post" action="{{ route('Update_Data', $CSVData->id) }}">
                    @csrf
                    <div class="row">
                        <!-- First Row -->
                        <div class="col-lg-12 col-sm-12">
                            <!-- Inquiry Information form -->
                            <div class="card col-lg-6 col-sm-12 m-auto">
                                <div class="card-header">
                                    <h4 class="card-title">Insert Data Form</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">

                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Code:</label>
                                                    <input type="text" class="form-control input-default" name="Code" placeholder="Code" value="{{ $CSVData->Code }}">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Grouping:</label>
                                                    <input type="text" class="form-control input-default" name="Grouping" placeholder="Grouping" value="{{ $CSVData->Grouping }}">
                                                </div>
                                            </div>
                                            
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Classification:</label>
                                                    <input type="text" class="form-control input-default" name="Classification" placeholder="Classification" value="{{ $CSVData->Classification }}">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Effective Date:</label>
                                                    <input type="date" class="form-control input-default" name="Effective_Date" placeholder="Effective Date" value="{{ $CSVData->Specialization }}">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Specialization:</label>
                                                    <input type="text" class="form-control input-default" name="Specialization" placeholder="Specialization" value="{{ $CSVData->Effective_Date }}">
                                                </div>
                                            </div>


                                            <div class="col">
                                                <div class="form-group" bis_skin_checked="1">
                                                    <label>Definition</label>
                                                    <textarea class="form-control" rows="2" name="Definition" placeholder="Definition" required>{{ $CSVData->Definition }}</textarea>
                                                </div>
                                            </div>

                                        <!-- added date will added automatically -->

                                        <div class="form-group d-flex justify-content-end align-items-end">
                                            <button type="submit" class="btn btn-primary mb-2">Save</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            
        </div>
    </div>
@endsection