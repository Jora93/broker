<div class="col-md-12">
    @if(isset($load) && $load->documents)
        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Load ID</th>
                <th scope="col">Description</th>
                <th scope="col">Uploaded On</th>
                <th scope="col">Uploaded By</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($load->documents as $document)
                <tr>
                    <td>
                        <a href="{{url('document-download/'.$document->id)}}">
                            <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
                        </a>
                        <span onclick="editDocument({{$document}})" class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </td>
                    <th scope="row">
                        <a href="{{url(env('AWS_STORAGE_URL').$document->name)}}" target="_blank">
                            {{$document->name}}
                        </a>
                    </th>
                    <td>{{$document->type}}</td>
                    <td>{{$document->load_id}}</td>
                    <td>{{$document->description}}</td>
                    <td>{{$document->created_at}}</td>
                    <td>{{$document->user->email}}</td>
                    <td>
                        <span class="glyphicon glyphicon-trash document-delete" data-id="{{$document->id}}" aria-hidden="true"></span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
