<div class="m-catagory--modal">
    @foreach ($types as $type)
        @if ($type->description)
            <div class="m-catagory--modal__modal" id="catagory-modal-{{$type->id}}" data-modal="{{$type->id}}">
                <div class="m-catagory--modal__modal__header">
                    <h4>{{$type->keywords}}</h4>
                </div>
                <div class="m-catagory--modal__modal__body">
                    {!! $type->description !!}
                </div>
                <div class="m-catagory--modal__modal__footer">
                    <button class="btn btn-primary close-modal">Sluit</button>
                </div>
            </div>
        @endif
    @endforeach
</div>