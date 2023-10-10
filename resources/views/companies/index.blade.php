<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M.D._Soft</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="text-center pt4 text-primary col pt-4 pb-4">Copy of SurverFrom</h2>
            </div>
            <hr>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <table class="table table-bordered border-dark table-striped">
                <tr class="table table-primary border-dark">
                    <th>No.</th>
                    <th>Occupation</th>
                    <th>Name</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>CompanyPerformance</th>
                    <th>MediaConsume</th>
                    <th>Other</th>
                    <th>Action</th>
                </tr>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>

                        @if($company->occupation=='Development')
                            <td class="table-info border-dark">{{ $company->occupation}}</td>
                        @elseif($company->occupation=='Student')
                            <td class="table-success border-dark">{{ $company->occupation}}</td>
                        @elseif($company->occupation=='Document')
                            <td class="table-warning border-dark">{{ $company->occupation}}</td>
                        @endif

                        <td>{{ $company->name }}</td>
                        <td>{{ $company->lastName }}</td>
                        <td>{{ $company->email }}</td>

                        @if($company->companyperformance=='Good')
                            <td class="table-info border-dark">{{ $company->companyperformance}}</td>
                        @elseif($company->companyperformance=='Fairly')
                            <td class="table-success border-dark">{{ $company->companyperformance}}</td>
                        @elseif($company->companyperformance=='Bad')
                            <td class="table-warning border-dark">{{ $company->companyperformance}}</td>
                        @endif

                        <td>{{ $company->media }}</td>
                        <td>{{ $company->Other }}</td>
                        <td>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div>
                <a href="{{ route('companies.create') }}" class="btn btn-success">+Create SurverFrom</a>
            </div>
            {!! $companies->links('pagination::bootstrap-5') !!}
        </div>
    </div>

</body>
</html>