<div class="col-md-12">
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
            <tbody id="document-list-body">
            @if(isset($model) && $model->documents)
                @foreach($model->documents as $document)
                    <tr class="document-row-{{$document->id}}">
                        <td>
                            <a href="{{url('document-download/'.$document->id)}}">
                                <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
                            </a>
                            <span onclick="editDocument({{$document}})" class="glyphicon glyphicon-edit document-edit" aria-hidden="true"></span>
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
                        @if($document->user)
                            <td>{{$document->user->email}}</td>
                        @else
                            <td></td>
                        @endif
                        <td>
                            <span class="glyphicon glyphicon-trash document-delete" data-id="{{$document->id}}" aria-hidden="true"></span>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
</div>
